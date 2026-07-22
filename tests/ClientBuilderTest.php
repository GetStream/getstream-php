<?php

declare(strict_types=1);

namespace GetStream\Tests;

use GetStream\ChatClient;
use GetStream\Client;
use GetStream\ClientBuilder;
use GetStream\Http\HttpClientInterface;
use GetStream\Tests\Http\RecordingLogger;
use GetStream\VideoClient;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ClientBuilderTest extends TestCase
{
    private HttpClientInterface|MockObject $mockHttpClient;

    protected function setUp(): void
    {
        $this->mockHttpClient = $this->createMock(HttpClientInterface::class);

        // Clear environment variables
        unset($_ENV['STREAM_API_KEY'], $_ENV['STREAM_API_SECRET'], $_ENV['STREAM_BASE_URL']);
    }

    /**
     * @test
     */
    public function buildWithExplicitCredentials(): void
    {
        // Arrange & Act
        $client = (new ClientBuilder())
            ->apiKey('test-key')
            ->apiSecret('test-secret')
            ->baseUrl('https://custom.api.com')
            ->httpClient($this->mockHttpClient)
            ->skipEnvLoad()
            ->build();

        // Assert
        self::assertInstanceOf(Client::class, $client);
        self::assertSame('test-key', $client->getApiKey());
        self::assertSame('test-secret', $client->getApiSecret());
        self::assertSame('https://custom.api.com', $client->getBaseUrl());
        self::assertSame($this->mockHttpClient, $client->getHttpClient());
    }

    /**
     * @test
     */
    public function buildWithEnvironmentVariables(): void
    {
        // Arrange
        $_ENV['STREAM_API_KEY'] = 'env-key';
        $_ENV['STREAM_API_SECRET'] = 'env-secret';
        $_ENV['STREAM_BASE_URL'] = 'https://env.api.com';

        // Act
        $client = (new ClientBuilder())
            ->httpClient($this->mockHttpClient)
            ->skipEnvLoad() // Skip .env file loading, use $_ENV directly
            ->build();

        // Assert
        self::assertInstanceOf(Client::class, $client);
        self::assertSame('env-key', $client->getApiKey());
        self::assertSame('env-secret', $client->getApiSecret());
        self::assertSame('https://env.api.com', $client->getBaseUrl());
    }

    /**
     * @test
     */
    public function fromEnvStaticMethod(): void
    {
        // Arrange
        $_ENV['STREAM_API_KEY'] = 'static-key';
        $_ENV['STREAM_API_SECRET'] = 'static-secret';

        // Act
        $client = ClientBuilder::fromEnv()
            ->httpClient($this->mockHttpClient)
            ->skipEnvLoad()
            ->build();

        // Assert
        self::assertInstanceOf(Client::class, $client);
        self::assertSame('static-key', $client->getApiKey());
        self::assertSame('static-secret', $client->getApiSecret());
    }

    /**
     * @test
     */
    public function explicitCredentialsOverrideEnvironment(): void
    {
        // Arrange
        $_ENV['STREAM_API_KEY'] = 'env-key';
        $_ENV['STREAM_API_SECRET'] = 'env-secret';

        // Act
        $client = (new ClientBuilder())
            ->apiKey('explicit-key')
            ->apiSecret('explicit-secret')
            ->httpClient($this->mockHttpClient)
            ->skipEnvLoad()
            ->build();

        // Assert
        self::assertSame('explicit-key', $client->getApiKey());
        self::assertSame('explicit-secret', $client->getApiSecret());
    }

    /**
     * @test
     */
    public function buildRequiresApiKey(): void
    {
        // Test that providing API secret but no API key still works if key is in environment
        $client = (new ClientBuilder())
            ->apiSecret('test-secret')
            ->build();

        self::assertInstanceOf(Client::class, $client);
        self::assertNotEmpty($client->getApiKey()); // Should get from environment
        self::assertSame('test-secret', $client->getApiSecret());
    }

    /**
     * @test
     */
    public function buildRequiresApiSecret(): void
    {
        // Test that providing API key but no API secret still works if secret is in environment
        $client = (new ClientBuilder())
            ->apiKey('test-key')
            ->build();

        self::assertInstanceOf(Client::class, $client);
        self::assertSame('test-key', $client->getApiKey());
        self::assertNotEmpty($client->getApiSecret()); // Should get from environment
    }

    /**
     * @test
     */
    public function defaultBaseUrl(): void
    {
        // Arrange & Act
        $client = (new ClientBuilder())
            ->apiKey('test-key')
            ->apiSecret('test-secret')
            ->skipEnvLoad()
            ->build();

        // Assert
        self::assertSame('https://chat.stream-io-api.com', $client->getBaseUrl());
    }

    /**
     * @test
     */
    public function environmentBaseUrlOverridesDefault(): void
    {
        // Arrange
        $_ENV['STREAM_API_KEY'] = 'env-key';
        $_ENV['STREAM_API_SECRET'] = 'env-secret';
        $_ENV['STREAM_BASE_URL'] = 'https://custom-env.api.com';

        // Act
        $client = (new ClientBuilder())
            ->skipEnvLoad()
            ->build();

        // Assert
        self::assertSame('https://custom-env.api.com', $client->getBaseUrl());
    }

    /**
     * @test
     */
    public function buildChatClient(): void
    {
        $client = (new ClientBuilder())
            ->apiKey('test-key')
            ->apiSecret('test-secret')
            ->baseUrl('https://custom.api.com')
            ->httpClient($this->mockHttpClient)
            ->skipEnvLoad()
            ->buildChatClient();

        self::assertInstanceOf(ChatClient::class, $client);
        self::assertInstanceOf(Client::class, $client);
        self::assertSame('test-key', $client->getApiKey());
        self::assertSame('test-secret', $client->getApiSecret());
        self::assertSame('https://custom.api.com', $client->getBaseUrl());
        self::assertSame($this->mockHttpClient, $client->getHttpClient());
    }

    /**
     * @test
     */
    public function buildVideoClient(): void
    {
        $client = (new ClientBuilder())
            ->apiKey('test-key')
            ->apiSecret('test-secret')
            ->baseUrl('https://custom.api.com')
            ->httpClient($this->mockHttpClient)
            ->skipEnvLoad()
            ->buildVideoClient();

        self::assertInstanceOf(VideoClient::class, $client);
        self::assertInstanceOf(Client::class, $client);
        self::assertSame('test-key', $client->getApiKey());
        self::assertSame('test-secret', $client->getApiSecret());
        self::assertSame('https://custom.api.com', $client->getBaseUrl());
        self::assertSame($this->mockHttpClient, $client->getHttpClient());
    }

    /**
     * @test
     */
    public function fluentInterface(): void
    {
        // Test that all methods return the builder instance for chaining
        $builder = new ClientBuilder();

        $result = $builder
            ->apiKey('test')
            ->apiSecret('test')
            ->baseUrl('test')
            ->maxConnsPerHost(5)
            ->idleTimeout(55)
            ->connectTimeout(10)
            ->requestTimeout(30)
            ->httpClient($this->mockHttpClient)
            ->skipEnvLoad()
            ->envPath('/test/path');

        self::assertSame($builder, $result);
    }

    /** @test */
    public function poolConfigKnobsAreChained(): void
    {
        $client = (new ClientBuilder())
            ->apiKey('k')
            ->apiSecret('s')
            ->maxConnsPerHost(12)
            ->idleTimeout(40)
            ->connectTimeout(4)
            ->requestTimeout(25)
            ->skipEnvLoad()
            ->build();

        $http = $client->getHttpClient();
        self::assertInstanceOf(\GetStream\Http\GuzzleHttpClient::class, $http);

        $pool = $http->getPoolConfig();
        self::assertSame(12, $pool->maxConnsPerHost);
        self::assertSame(40, $pool->idleTimeout);
        self::assertSame(4, $pool->connectTimeout);
        self::assertSame(25, $pool->requestTimeout);
    }

    /** @test */
    public function userSuppliedHttpClientBypassesBuild(): void
    {
        $mock = $this->createMock(HttpClientInterface::class);

        // The mock must NEVER have request() called during build(); building
        // should be a pure construction step, no probe requests.
        $mock->expects(self::never())->method('request');

        $client = (new ClientBuilder())
            ->apiKey('k')
            ->apiSecret('s')
            ->maxConnsPerHost(99)
            ->idleTimeout(99)
            ->connectTimeout(99)
            ->requestTimeout(99)
            ->httpClient($mock)
            ->skipEnvLoad()
            ->build();

        // Identity check: the user's exact instance comes back unwrapped.
        self::assertSame($mock, $client->getHttpClient());

        // And it is NOT a GuzzleHttpClient (no pool config is applied to it).
        self::assertNotInstanceOf(\GetStream\Http\GuzzleHttpClient::class, $client->getHttpClient());
    }

    /** @test */
    public function loggerReceivesExactlyOneClientInitializedInfoEvent(): void
    {
        $logger = new RecordingLogger();

        (new ClientBuilder())
            ->apiKey('k')
            ->apiSecret('s')
            ->maxConnsPerHost(7)
            ->idleTimeout(33)
            ->connectTimeout(2)
            ->requestTimeout(11)
            ->logger($logger)
            ->skipEnvLoad()
            ->build();

        $events = $logger->named('client.initialized');
        self::assertCount(1, $events);
        self::assertSame('info', $events[0]['level']);

        $context = $events[0]['context'];
        self::assertSame('getstream-php', $context['stream.sdk.name']);
        self::assertSame(\GetStream\Constant::VERSION, $context['stream.sdk.version']);
        self::assertSame(7, $context['stream.client.max_conns_per_host']);
        self::assertSame(33, $context['stream.client.idle_timeout_seconds']);
        self::assertSame(2, $context['stream.client.connect_timeout_seconds']);
        self::assertSame(11, $context['stream.client.request_timeout_seconds']);
        self::assertTrue($context['stream.client.gzip_enabled']);
        self::assertFalse($context['stream.client.user_http_client']);
        self::assertFalse($context['stream.client.log_bodies']);
    }

    /** @test */
    public function logBodiesTrueAddsExactlyOneWarnAndFlagsSchema(): void
    {
        $logger = new RecordingLogger();

        (new ClientBuilder())
            ->apiKey('k')
            ->apiSecret('s')
            ->logger($logger)
            ->logBodies(true)
            ->skipEnvLoad()
            ->build();

        $warnings = array_values(array_filter($logger->records, fn ($r) => $r['level'] === 'warning'));
        self::assertCount(1, $warnings);

        $initialized = $logger->named('client.initialized');
        self::assertCount(1, $initialized);
        self::assertTrue($initialized[0]['context']['stream.client.log_bodies']);
    }

    /** @test */
    public function buildingWithoutLoggerProducesNoErrorLogOutput(): void
    {
        $tmp = tempnam(sys_get_temp_dir(), 'gs-no-log-');
        $previous = ini_set('error_log', $tmp);

        try {
            (new ClientBuilder())
                ->apiKey('k')
                ->apiSecret('s')
                ->skipEnvLoad()
                ->build();
        } finally {
            ini_set('error_log', $previous === false ? '' : $previous);
        }

        self::assertSame('', file_get_contents($tmp), 'no logger injected: construction must produce zero error_log output');
        @unlink($tmp);
    }
}
