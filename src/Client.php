<?php

declare(strict_types=1);

namespace GetStream;

use GetStream\Auth\JWTGenerator;
use GetStream\Exceptions\StreamException;
use GetStream\Exceptions\StreamTaskException;
use GetStream\Exceptions\StreamTransportException;
use GetStream\Generated\CommonTrait;
use GetStream\Http\GuzzleHttpClient;
use GetStream\Http\HttpClientInterface;

/**
 * Main GetStream client for interacting with the API.
 */
class Client
{
    use CommonTrait;

    private string $apiKey;
    private string $apiSecret;
    private string $baseUrl;
    private HttpClientInterface $httpClient;
    private JWTGenerator $jwtGenerator;
    private array $defaultHeaders;

    /**
     * Create a new GetStream client.
     *
     * @param string                   $apiKey     The API key
     * @param string                   $apiSecret  The API secret
     * @param string                   $baseUrl    The base URL for the API
     * @param HttpClientInterface|null $httpClient Optional HTTP client
     */
    public function __construct(
        string $apiKey,
        string $apiSecret,
        string $baseUrl = 'https://chat.stream-io-api.com',
        ?HttpClientInterface $httpClient = null
    ) {
        if (empty($apiKey)) {
            throw new StreamException('API key cannot be empty');
        }

        if (empty($apiSecret)) {
            throw new StreamException('API secret cannot be empty');
        }

        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
        $this->baseUrl = rtrim($baseUrl, '/');
        $this->httpClient = $httpClient ?? new GuzzleHttpClient();
        $this->jwtGenerator = new JWTGenerator($apiSecret);

        $this->defaultHeaders = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'User-Agent' => 'getstream-php-sdk/' . Constant::VERSION,
            'x-stream-client' => 'stream-php-client-' . Constant::VERSION,
        ];
    }

    /**
     * Get the API key.
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * Get the API secret.
     */
    public function getApiSecret(): string
    {
        return $this->apiSecret;
    }

    /**
     * Get the base URL.
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * Get the HTTP client.
     */
    public function getHttpClient(): HttpClientInterface
    {
        return $this->httpClient;
    }

    /**
     * Get the JWT generator.
     */
    public function getJWTGenerator(): JWTGenerator
    {
        return $this->jwtGenerator;
    }

    /**
     * Verify a webhook signature using this client's API secret.
     *
     * Convenience wrapper around \GetStream\Webhook::verifySignature that supplies
     * the secret automatically. The static method is still available.
     */
    public function verifySignature(string $body, string $signature): bool
    {
        return \GetStream\Webhook::verifySignature($body, $signature, $this->apiSecret);
    }

    /**
     * Verify and parse a webhook payload in one call, using this client's API secret.
     *
     * Handles gzip-compressed bodies transparently.
     *
     * @throws \GetStream\Exceptions\InvalidWebhookException on signature mismatch or parse failure
     */
    public function verifyAndParseWebhook(string $body, string $signature): object
    {
        return \GetStream\Webhook::verifyAndParseWebhook($body, $signature, $this->apiSecret);
    }

    /**
     * Decode + parse a Stream-delivered SQS message body.
     *
     * Convenience wrapper around \GetStream\Webhook::parseSqs. No signature is
     * required; SQS deliveries are authenticated via AWS IAM.
     */
    public function parseSqs(string $messageBody): object
    {
        return \GetStream\Webhook::parseSqs($messageBody);
    }

    /**
     * Decode + parse a Stream-delivered SNS notification body.
     *
     * Accepts either the raw SNS HTTP envelope JSON or the pre-extracted Message
     * string. Convenience wrapper around \GetStream\Webhook::parseSns. No signature
     * is required; SNS deliveries are authenticated via AWS IAM.
     */
    public function parseSns(string $notificationBody): object
    {
        return \GetStream\Webhook::parseSns($notificationBody);
    }

    /**
     * Create a feed instance.
     *
     * @param string $feedGroup The feed group (e.g., 'user', 'timeline')
     * @param string $feedId    The feed ID (e.g., user ID)
     *
     * @throws StreamException
     */
    public function feed(string $feedGroup, string $feedId): Feed
    {
        // Create a FeedsV3Client instance using the same configuration
        $feedsV3Client = new FeedsV3Client($this->apiKey, $this->apiSecret, $this->baseUrl, $this->httpClient);

        return new Feed($feedsV3Client, $feedGroup, $feedId);
    }

    /**
     * Make an authenticated HTTP request to the GetStream API.
     *
     * @param string $method      HTTP method
     * @param string $path        API path
     * @param array  $queryParams Query parameters
     * @param mixed  $body        Request body
     * @param array  $pathParams  Path parameters for URL substitution
     *
     * @return StreamResponse<mixed>
     *
     * @throws StreamException
     */
    public function makeRequest(
        string $method,
        string $path,
        array $queryParams = [],
        mixed $body = null,
        array $pathParams = []
    ): StreamResponse {
        // Replace path parameters
        foreach ($pathParams as $key => $value) {
            $path = str_replace('{' . $key . '}', (string) $value, $path);
        }

        // Build URL
        $url = $this->baseUrl . $path;

        // The API reads a list query parameter as comma-separated values and ignores the key[0]= form.
        foreach ($queryParams as $key => $value) {
            if (is_array($value) && $value !== [] && array_is_list($value) && array_filter($value, 'is_scalar') === $value) {
                if (array_filter($value, fn ($v) => is_string($v) && str_contains($v, ',')) !== []) {
                    throw new StreamException("Query parameter '{$key}' has a value containing a comma, which the API would split into separate values");
                }
                $queryParams[$key] = implode(',', $value);
            }
        }

        // Add API key to query parameters
        $queryParams['api_key'] = $this->apiKey;

        // Add query parameters (there will always be at least api_key)
        $url .= '?' . http_build_query($queryParams);

        // Generate authentication token
        $token = $this->jwtGenerator->generateServerToken();

        // Prepare headers
        $headers = array_merge($this->defaultHeaders, [
            'Authorization' => $token,
            'stream-auth-type' => 'jwt',
        ]);

        // Check if this is an upload request (needs multipart/form-data) - like Go SDK
        if ($body instanceof GeneratedModels\ImageUploadRequest || $body instanceof GeneratedModels\FileUploadRequest) {
            unset($headers['Content-Type']); // Let Guzzle set multipart Content-Type

            $multipart = [];
            $isImage = $body instanceof GeneratedModels\ImageUploadRequest;

            // File field is always treated strictly as base64-encoded content.
            // Callers uploading a local filesystem path must use uploadFileFromPath() or uploadImageFromPath().
            if ($body->file !== null) {
                $fileContent = base64_decode((string) $body->file, true);
                if ($fileContent === false) {
                    throw new StreamException('Failed to decode base64 file data');
                }

                $multipart[] = [
                    'name' => 'file',
                    'contents' => $fileContent,
                    'filename' => $isImage ? 'image.jpg' : 'file.pdf',
                ];
            }

            // User field (JSON string)
            if ($body->user !== null) {
                $multipart[] = ['name' => 'user', 'contents' => json_encode($body->user)];
            }

            // Upload sizes (images only, JSON string)
            if ($isImage && $body->uploadSizes !== null && !empty($body->uploadSizes)) {
                $multipart[] = ['name' => 'upload_sizes', 'contents' => json_encode($body->uploadSizes)];
            }

            return $this->httpClient->request($method, $url, $headers, $multipart);
        }

        // Make the request
        return $this->httpClient->request($method, $url, $headers, $body);
    }

    /**
     * Upload a local file from disk by explicit filesystem path.
     *
     * @param string                        $filePath Local filesystem path to upload
     * @param ?GeneratedModels\OnlyUserID   $user     Optional user performing the upload
     * @param string                        $endpoint Upload endpoint path (defaults to '/api/v2/uploads/file')
     *
     * @return StreamResponse<GeneratedModels\FileUploadResponse>
     *
     * @throws StreamException
     */
    public function uploadFileFromPath(
        string $filePath,
        ?GeneratedModels\OnlyUserID $user = null,
        string $endpoint = '/api/v2/uploads/file'
    ): StreamResponse {
        $response = $this->uploadLocalMultipart($endpoint, $filePath, $user, null);

        return StreamResponse::fromJson($response, GeneratedModels\FileUploadResponse::class);
    }

    /**
     * Upload a local image from disk by explicit filesystem path.
     *
     * @param string                                      $filePath    Local filesystem path to upload
     * @param ?GeneratedModels\OnlyUserID                 $user        Optional user performing the upload
     * @param ?array<int, array<string, mixed>|GeneratedModels\ImageSize> $uploadSizes Optional image resize specs
     * @param string                                      $endpoint    Upload endpoint path (defaults to '/api/v2/uploads/image')
     *
     * @return StreamResponse<GeneratedModels\ImageUploadResponse>
     *
     * @throws StreamException
     */
    public function uploadImageFromPath(
        string $filePath,
        ?GeneratedModels\OnlyUserID $user = null,
        ?array $uploadSizes = null,
        string $endpoint = '/api/v2/uploads/image'
    ): StreamResponse {
        $response = $this->uploadLocalMultipart($endpoint, $filePath, $user, $uploadSizes);

        return StreamResponse::fromJson($response, GeneratedModels\ImageUploadResponse::class);
    }

    /**
     * @param ?array<int, array<string, mixed>|GeneratedModels\ImageSize> $uploadSizes
     *
     * @return StreamResponse<mixed>
     *
     * @throws StreamException
     */
    private function uploadLocalMultipart(
        string $endpoint,
        string $filePath,
        ?GeneratedModels\OnlyUserID $user,
        ?array $uploadSizes
    ): StreamResponse {
        if ($filePath === '' || !is_file($filePath) || !is_readable($filePath)) {
            throw new StreamException("File not found or not readable: {$filePath}");
        }

        $fileContent = file_get_contents($filePath);
        if ($fileContent === false) {
            throw new StreamException("Failed to read file: {$filePath}");
        }

        $url = $this->baseUrl . $endpoint . '?' . http_build_query(['api_key' => $this->apiKey]);
        $headers = array_merge($this->defaultHeaders, [
            'Authorization' => $this->jwtGenerator->generateServerToken(),
            'stream-auth-type' => 'jwt',
        ]);
        unset($headers['Content-Type']);

        $multipart = [
            [
                'name' => 'file',
                'contents' => $fileContent,
                'filename' => basename($filePath),
            ],
        ];

        if ($user !== null) {
            $multipart[] = ['name' => 'user', 'contents' => json_encode($user)];
        }

        if ($uploadSizes !== null && !empty($uploadSizes)) {
            $multipart[] = ['name' => 'upload_sizes', 'contents' => json_encode($uploadSizes)];
        }

        return $this->httpClient->request('POST', $url, $headers, $multipart);
    }

    /**
     * Generate a user token for client-side authentication.
     *
     * @param string   $userId     The user ID
     * @param array    $claims     Additional claims
     * @param int|null $expiration Token expiration in seconds (null for no expiration)
     *
     * @return string JWT token
     */
    public function createUserToken(string $userId, array $claims = [], ?int $expiration = null): string
    {
        return $this->jwtGenerator->generateUserToken($userId, $claims, $expiration);
    }

    /**
     * Create or update users.
     *
     * @param array $users Array of user data keyed by user ID
     *
     * @return StreamResponse<mixed>
     *
     * @throws StreamException
     */
    public function upsertUsers(array $users): StreamResponse
    {
        $path = '/api/v2/users';
        $requestData = ['users' => $users];

        return $this->makeRequest('POST', $path, [], $requestData);
    }

    /**
     * Poll the task-status endpoint until the task settles into `completed`,
     * settles into `failed`, or the timeout elapses.
     *
     * @param string $taskId             Task ID returned by an async operation
     * @param int    $pollIntervalSeconds Delay between polls (default 1s)
     * @param int    $timeoutSeconds      Maximum total wait (default 60s)
     *
     * @return GeneratedModels\GetTaskResponse Settled task payload
     *
     * @throws StreamTaskException       On task `status: "failed"`
     * @throws StreamTransportException  When polling does not settle before $timeoutSeconds
     * @throws StreamException           Propagated from the underlying poll request
     */
    public function waitForTask(
        string $taskId,
        int $pollIntervalSeconds = 1,
        int $timeoutSeconds = 60,
    ): GeneratedModels\GetTaskResponse {
        $deadline = $this->now() + $timeoutSeconds;
        $pollMicros = max(0, $pollIntervalSeconds) * 1_000_000;

        while (true) {
            $response = $this->getTask($taskId);
            /** @var GeneratedModels\GetTaskResponse $task */
            $task = $response->getData();

            if ($task->status === 'completed') {
                return $task;
            }

            if ($task->status === 'failed') {
                $error = $task->error;
                throw new StreamTaskException(
                    $task->taskID ?? $taskId,
                    $error?->type ?? '',
                    $error?->description ?? '',
                    $error?->stacktrace ?? null,
                    $error?->version ?? null,
                );
            }

            if ($this->now() >= $deadline) {
                throw new StreamTransportException(
                    sprintf('waitForTask: timed out after %ds (task %s status=%s)', $timeoutSeconds, $taskId, $task->status ?? 'unknown'),
                    StreamTransportException::ERROR_TYPE_TIMEOUT,
                    new \RuntimeException('waitForTask deadline exceeded'),
                );
            }

            usleep($pollMicros);
        }
    }

    /**
     * Override hook for tests that need a deterministic clock.
     */
    protected function now(): int
    {
        return time();
    }
}
