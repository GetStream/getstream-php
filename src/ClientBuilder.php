<?php

declare(strict_types=1);

namespace GetStream;

use Dotenv\Dotenv;
use GetStream\Exceptions\StreamException;
use GetStream\Http\GuzzleHttpClient;
use GetStream\Http\HttpClientInterface;
use GetStream\Http\PoolConfig;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * Builder class for creating GetStream clients with environment variable support.
 */
class ClientBuilder
{
    private string $apiKey;
    private string $apiSecret;
    private string $baseUrl = 'https://chat.stream-io-api.com';
    private ?HttpClientInterface $httpClient = null;
    private bool $loadEnv = true;
    private ?string $envPath = null;
    private PoolConfig $pool;
    private ?LoggerInterface $logger = null;
    private bool $logBodies = false;

    public function __construct()
    {
        $this->pool = new PoolConfig();
    }

    /**
     * Set the API key.
     */
    public function apiKey(string $apiKey): self
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * Set the API secret.
     */
    public function apiSecret(string $apiSecret): self
    {
        $this->apiSecret = $apiSecret;

        return $this;
    }

    /**
     * Set the base URL.
     */
    public function baseUrl(string $baseUrl): self
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }

    /**
     * Set the HTTP client.
     */
    public function httpClient(HttpClientInterface $httpClient): self
    {
        $this->httpClient = $httpClient;

        return $this;
    }

    /**
     * Advisory hint for per-host connections. Default: 5. Ignored when httpClient() is used.
     * Sets curl CURLOPT_MAXCONNECTS (a single curl handle's connection-cache size); under Guzzle's
     * default CurlHandler this does not enforce a hard per-host concurrency cap in any runtime.
     */
    public function maxConnsPerHost(int $n): self
    {
        $this->pool = $this->pool->withMaxConnsPerHost($n);

        return $this;
    }

    /**
     * Idle connection lifetime in seconds. Default: 55.
     * No-op under PHP-FPM (curl handle dies with the request); honored in long-running runtimes.
     * Ignored when httpClient() is used.
     */
    public function idleTimeout(int $seconds): self
    {
        $this->pool = $this->pool->withIdleTimeout($seconds);

        return $this;
    }

    /** TCP + TLS handshake cap in seconds (Guzzle `connect_timeout`). Default: 10. Ignored when httpClient() is used. */
    public function connectTimeout(int $seconds): self
    {
        $this->pool = $this->pool->withConnectTimeout($seconds);

        return $this;
    }

    /**
     * Default per-request timeout in seconds (Guzzle `timeout`). Default: 30.
     * Per-call override: pass `['timeout' => N]` as the 5th arg of HttpClientInterface::request().
     * Ignored when httpClient() is used.
     */
    public function requestTimeout(int $seconds): self
    {
        $this->pool = $this->pool->withRequestTimeout($seconds);

        return $this;
    }

    /**
     * Inject a PSR-3 logger for structured `client.initialized` / `http.request.*` /
     * `http.response.*` events. Default when none is set: `Psr\Log\NullLogger` (no-op).
     * The SDK never sets the logger's level; that is the caller's responsibility.
     */
    public function logger(LoggerInterface $logger): self
    {
        $this->logger = $logger;

        return $this;
    }

    /**
     * Include (key-redacted) request/response bodies in the `http.request.sent` /
     * `http.response.received` log events. Off by default. Enabling this emits one
     * WARN at construction time.
     */
    public function logBodies(bool $on): self
    {
        $this->logBodies = $on;

        return $this;
    }

    /**
     * Disable loading from environment variables.
     */
    public function skipEnvLoad(): self
    {
        $this->loadEnv = false;

        return $this;
    }

    /**
     * Set custom path for .env file (default is current directory).
     */
    public function envPath(string $path): self
    {
        $this->envPath = $path;

        return $this;
    }

    /**
     * Create a client from environment variables.
     */
    public static function fromEnv(?string $envPath = null): self
    {
        $builder = new self();
        if ($envPath !== null) {
            $builder->envPath($envPath);
        }

        return $builder;
    }

    /**
     * Build the client.
     *
     * @throws StreamException
     */
    public function build(): Client
    {
        $this->loadCreds();

        return new Client($this->apiKey, $this->apiSecret, $this->baseUrl, $this->resolveHttpClient());
    }

    /**
     * @throws StreamException
     */
    public function buildFeedsClient(): FeedsV3Client
    {
        $this->loadCreds();

        return new FeedsV3Client($this->apiKey, $this->apiSecret, $this->baseUrl, $this->resolveHttpClient());
    }

    /**
     * @throws StreamException
     */
    public function buildChatClient(): ChatClient
    {
        $this->loadCreds();

        return new ChatClient($this->apiKey, $this->apiSecret, $this->baseUrl, $this->resolveHttpClient());
    }

    /**
     * @throws StreamException
     */
    public function buildVideoClient(): VideoClient
    {
        $this->loadCreds();

        return new VideoClient($this->apiKey, $this->apiSecret, $this->baseUrl, $this->resolveHttpClient());
    }

    /**
     * @throws StreamException
     */
    public function buildModerationClient(): ModerationClient
    {
        $this->loadCreds();

        return new ModerationClient($this->apiKey, $this->apiSecret, $this->baseUrl, $this->resolveHttpClient());
    }

    public function loadCreds(): void
    {
        // Load environment variables if enabled
        if ($this->loadEnv) {
            $this->loadEnvironmentVariables();
        }

        // Get credentials from environment if not set
        $apiKey = $this->apiKey ?? $this->getEnvVar('STREAM_API_KEY');
        $apiSecret = $this->apiSecret ?? $this->getEnvVar('STREAM_API_SECRET');
        $baseUrl = $this->baseUrl;

        // Override baseUrl with environment variable if not explicitly set and env var exists
        if ($this->baseUrl === 'https://chat.stream-io-api.com') {
            $envBaseUrl = $this->getEnvVar('STREAM_BASE_URL');
            if ($envBaseUrl !== null) {
                $baseUrl = $envBaseUrl;
            }
        }

        if (empty($apiKey)) {
            throw new StreamException(
                'API key not provided. Set STREAM_API_KEY environment variable or call apiKey() method.'
            );
        }

        if (empty($apiSecret)) {
            throw new StreamException(
                'API secret not provided. Set STREAM_API_SECRET environment variable or call apiSecret() method.'
            );
        }

        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
        $this->baseUrl = $baseUrl;
    }

    /**
     * Load environment variables from .env file.
     */
    private function loadEnvironmentVariables(): void
    {
        try {
            $path = $this->envPath ?? getcwd();

            if ($path !== false && file_exists($path . '/.env')) {
                $dotenv = Dotenv::createImmutable($path);
                $dotenv->load();
            }
        } catch (\Exception $e) {
            // Silently ignore if .env file doesn't exist or can't be loaded
            // Environment variables might be set through other means
        }
    }

    /**
     * Get environment variable value.
     */
    private function getEnvVar(string $name): ?string
    {
        $value = $_ENV[$name] ?? $_SERVER[$name] ?? getenv($name);

        return $value !== false ? $value : null;
    }

    /**
     * Resolve the HttpClient.
     * If the user supplied one via httpClient(), return it as-is (escape hatch).
     * Otherwise build a GuzzleHttpClient with the configured PoolConfig. Either way,
     * emit one `client.initialized` INFO event through the injected PSR-3 logger.
     */
    private function resolveHttpClient(): HttpClientInterface
    {
        $logger = $this->logger ?? new NullLogger();

        $user = $this->httpClient;
        if ($user !== null) {
            $logger->info('client.initialized', $this->clientInitializedContext(userHttpClient: true));
            $this->warnIfLogBodies($logger);

            return $user;
        }

        $client = new GuzzleHttpClient([], 3, $this->pool, $logger, $this->logBodies);

        $logger->info('client.initialized', $this->clientInitializedContext(userHttpClient: false));
        $this->warnIfLogBodies($logger);

        return $client;
    }

    private function warnIfLogBodies(LoggerInterface $logger): void
    {
        if ($this->logBodies) {
            $logger->warning(
                'HTTP request/response bodies will be logged. Auth headers and known-secret fields are still redacted, but other sensitive data (messages, PII) may appear in logs. Disable for production.'
            );
        }
    }

    /** @return array<string, scalar> */
    private function clientInitializedContext(bool $userHttpClient): array
    {
        return [
            'stream.sdk.name' => 'getstream-php',
            'stream.sdk.version' => Constant::VERSION,
            'stream.client.max_conns_per_host' => $this->pool->maxConnsPerHost,
            'stream.client.idle_timeout_seconds' => $this->pool->idleTimeout,
            'stream.client.connect_timeout_seconds' => $this->pool->connectTimeout,
            'stream.client.request_timeout_seconds' => $this->pool->requestTimeout,
            'stream.client.gzip_enabled' => true,
            'stream.client.user_http_client' => $userHttpClient,
            'stream.client.log_bodies' => $this->logBodies,
        ];
    }
}
