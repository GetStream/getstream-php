<?php

declare(strict_types=1);

namespace GetStream\Tests\Integration;

use GetStream\ClientBuilder;
use GetStream\Exceptions\StreamApiException;
use PHPUnit\Framework\TestCase;

/**
 * Live integration tests - these make real API calls
 * Run with: ./vendor/bin/phpunit tests/Integration/LiveIntegrationTest.php --testdox.
 */
class LiveIntegrationTest extends TestCase
{
    private $client;
    private string $testUserId;

    protected function setUp(): void
    {
        $this->client = ClientBuilder::fromEnv()->build();
        $this->testUserId = 'live-test-' . uniqid();
    }

    /**
     * @test
     */
    public function tokenGenerationWorks(): void
    {
        // This doesn't make API calls, just tests token generation
        $token = $this->client->createUserToken($this->testUserId);

        self::assertIsString($token);
        self::assertNotEmpty($token);

        // Verify JWT structure
        $parts = explode('.', $token);
        self::assertCount(3, $parts);

        $payload = json_decode(base64_decode($parts[1], true), true);
        self::assertSame($this->testUserId, $payload['user_id']);

        echo "✅ Token generated for user: {$this->testUserId}\n";
    }

    /**
     * @group live-api
     *
     * @test
     */
    public function addActivityToRealAPI(): void
    {
        self::markTestIncomplete('Enable this test only when you want to make real API calls');

        $feed = $this->client->feed('user', $this->testUserId);

        $activity = [
            'actor' => 'user:' . $this->testUserId,
            'verb' => 'post',
            'object' => 'message:' . uniqid(),
            'message' => 'Live integration test from PHP SDK!',
            'time' => date('c'),
        ];

        try {
            $response = $feed->addActivity($activity);

            self::assertTrue($response->isSuccessful());
            $data = $response->getData();
            self::assertArrayHasKey('id', $data);

            echo "✅ Activity added with ID: {$data['id']}\n";
        } catch (StreamApiException $e) {
            echo "❌ API Error: {$e->getMessage()} (Status: {$e->getStatusCode()})\n";
            echo "Response: {$e->getResponseBody()}\n";
            self::fail('API call failed');
        }
    }

    /**
     * @group live-api
     *
     * @test
     */
    public function getActivitiesFromRealAPI(): void
    {
        self::markTestIncomplete('Enable this test only when you want to make real API calls');

        $feed = $this->client->feed('user', $this->testUserId);

        try {
            $response = $feed->getActivities(['limit' => 5]);

            self::assertTrue($response->isSuccessful());
            $data = $response->getData();
            self::assertArrayHasKey('results', $data);

            echo '✅ Retrieved ' . count($data['results']) . " activities\n";
        } catch (StreamApiException $e) {
            echo "❌ API Error: {$e->getMessage()} (Status: {$e->getStatusCode()})\n";
            self::fail('API call failed');
        }
    }
}
