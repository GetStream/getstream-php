<?php

declare(strict_types=1);

namespace GetStream;

use Dotenv\Dotenv;
use GetStream\Exceptions\StreamException;
use GetStream\Http\GuzzleHttpClient;
use GetStream\Http\HttpClientInterface;
use GetStream\Http\PoolConfig;

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

    /** Cap concurrent TCP connections per host. Default: 5. Ignored when httpClient() is used. */
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
     * Resolve the HttpClient. If the user supplied one via httpClient(),
     * return it as-is (§7 escape hatch). Otherwise build a GuzzleHttpClient.
     * Task 3 will pass $this->pool here once GuzzleHttpClient's constructor
     * accepts a PoolConfig argument.
     */
    private function resolveHttpClient(): HttpClientInterface
    {
        if ($this->httpClient !== null) {
            return $this->httpClient;
        }

        return new GuzzleHttpClient();
    }
}
