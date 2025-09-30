<?php

declare(strict_types=1);

namespace GetStream;

use GetStream\Exceptions\StreamException;
use GetStream\Http\HttpClientInterface;
use Dotenv\Dotenv;

/**
 * Builder class for creating GetStream clients with environment variable support
 */
class ClientBuilder
{
    private string $apiKey;
    private string $apiSecret;
    private string $baseUrl = 'https://chat.stream-io-api.com';
    private ?HttpClientInterface $httpClient = null;
    private bool $loadEnv = true;
    private ?string $envPath = null;

    /**
     * Set the API key
     */
    public function apiKey(string $apiKey): self
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    /**
     * Set the API secret
     */
    public function apiSecret(string $apiSecret): self
    {
        $this->apiSecret = $apiSecret;
        return $this;
    }

    /**
     * Set the base URL
     */
    public function baseUrl(string $baseUrl): self
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    /**
     * Set the HTTP client
     */
    public function httpClient(HttpClientInterface $httpClient): self
    {
        $this->httpClient = $httpClient;
        return $this;
    }

    /**
     * Disable loading from environment variables
     */
    public function skipEnvLoad(): self
    {
        $this->loadEnv = false;
        return $this;
    }

    /**
     * Set custom path for .env file (default is current directory)
     */
    public function envPath(string $path): self
    {
        $this->envPath = $path;
        return $this;
    }

    /**
     * Create a client from environment variables
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
     * Build the client
     * @throws StreamException
     */
    public function build(): Client
    {
        $this->loadCreds();
        return new Client($this->apiKey, $this->apiSecret, $this->baseUrl, $this->httpClient);
    }

    /**
     * @throws StreamException
     */
    public function buildFeedsClient(): FeedsV3Client{
        $this->loadCreds();
        return new FeedsV3Client($this->apiKey, $this->apiSecret, $this->baseUrl, $this->httpClient);
    }

/**
     * @throws StreamException
     */
    public function buildModerationClient(): ModerationClient{
        $this->loadCreds();
        return new ModerationClient($this->apiKey, $this->apiSecret, $this->baseUrl, $this->httpClient);
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
     * Load environment variables from .env file
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
     * Get environment variable value
     */
    private function getEnvVar(string $name): ?string
    {
        $value = $_ENV[$name] ?? $_SERVER[$name] ?? getenv($name);
        return $value !== false ? $value : null;
    }
}
