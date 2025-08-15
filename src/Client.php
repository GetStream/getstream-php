<?php

declare(strict_types=1);

namespace GetStream;

use GetStream\Exceptions\StreamException;
use GetStream\Http\HttpClientInterface;
use GetStream\Http\GuzzleHttpClient;
use GetStream\Auth\JWTGenerator;
use GetStream\Generated\CommonClient;

/**
 * Main GetStream client for interacting with the API
 */
class Client
{
    use CommonClient;
    private string $apiKey;
    private string $apiSecret;
    private string $baseUrl;
    private HttpClientInterface $httpClient;
    private JWTGenerator $jwtGenerator;
    private array $defaultHeaders;

    /**
     * Create a new GetStream client
     *
     * @param string $apiKey The API key
     * @param string $apiSecret The API secret  
     * @param string $baseUrl The base URL for the API
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
            'User-Agent' => 'stream-php-sdk/1.0.0',
        ];
    }

    /**
     * Get the API key
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * Get the API secret
     */
    public function getApiSecret(): string
    {
        return $this->apiSecret;
    }

    /**
     * Get the base URL
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * Get the HTTP client
     */
    public function getHttpClient(): HttpClientInterface
    {
        return $this->httpClient;
    }

    /**
     * Get the JWT generator
     */
    public function getJWTGenerator(): JWTGenerator
    {
        return $this->jwtGenerator;
    }

    /**
     * Create a feed instance
     *
     * @param string $feedGroup The feed group (e.g., 'user', 'timeline')
     * @param string $feedId The feed ID (e.g., user ID)
     * @return Feed
     * @throws StreamException
     */
    public function feed(string $feedGroup, string $feedId): Feed
    {
        // Create a FeedsV3Client instance using the same configuration
        $feedsV3Client = new FeedsV3Client($this->apiKey, $this->apiSecret, $this->baseUrl, $this->httpClient);
        return new Feed($feedsV3Client, $feedGroup, $feedId);
    }

    /**
     * Make an authenticated HTTP request to the GetStream API
     *
     * @param string $method HTTP method
     * @param string $path API path
     * @param array $queryParams Query parameters
     * @param mixed $body Request body
     * @param array $pathParams Path parameters for URL substitution
     * @return StreamResponse<mixed>
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
            $path = str_replace('{' . $key . '}', (string)$value, $path);
        }

        // Build URL
        $url = $this->baseUrl . $path;
        
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

        // Make the request
        return $this->httpClient->request($method, $url, $headers, $body);
    }



    /**
     * Generate a user token for client-side authentication
     *
     * @param string $userId The user ID
     * @param array $claims Additional claims
     * @param int|null $expiration Token expiration in seconds (null for no expiration)
     * @return string JWT token
     */
    public function createUserToken(string $userId, array $claims = [], ?int $expiration = null): string
    {
        return $this->jwtGenerator->generateUserToken($userId, $claims, $expiration);
    }

    /**
     * Create or update users
     *
     * @param array $users Array of user data keyed by user ID
     * @return StreamResponse<mixed>
     * @throws StreamException
     */
    public function upsertUsers(array $users): StreamResponse
    {
        $path = '/api/v2/users';
        $requestData = ['users' => $users];
        
        return $this->makeRequest('POST', $path, [], $requestData);
    }
}
