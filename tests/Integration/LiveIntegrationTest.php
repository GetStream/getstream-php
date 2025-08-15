<?php

declare(strict_types=1);

namespace GetStream\Tests\Integration;

use GetStream\ClientBuilder;
use GetStream\Exceptions\StreamApiException;
use PHPUnit\Framework\TestCase;

/**
 * Live integration tests - these make real API calls
 * Run with: ./vendor/bin/phpunit tests/Integration/LiveIntegrationTest.php --testdox
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

    public function testTokenGenerationWorks(): void
    {
        // This doesn't make API calls, just tests token generation
        $token = $this->client->createUserToken($this->testUserId);
        
        $this->assertIsString($token);
        $this->assertNotEmpty($token);
        
        // Verify JWT structure
        $parts = explode('.', $token);
        $this->assertCount(3, $parts);
        
        $payload = json_decode(base64_decode($parts[1]), true);
        $this->assertEquals($this->testUserId, $payload['user_id']);
        
        echo "✅ Token generated for user: {$this->testUserId}\n";
    }

    /**
     * @group live-api
     */
    public function testAddActivityToRealAPI(): void
    {
        $this->markTestIncomplete('Enable this test only when you want to make real API calls');
        
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
            
            $this->assertTrue($response->isSuccessful());
            $data = $response->getData();
            $this->assertArrayHasKey('id', $data);
            
            echo "✅ Activity added with ID: {$data['id']}\n";
            
        } catch (StreamApiException $e) {
            echo "❌ API Error: {$e->getMessage()} (Status: {$e->getStatusCode()})\n";
            echo "Response: {$e->getResponseBody()}\n";
            $this->fail("API call failed");
        }
    }

    /**
     * @group live-api
     */
    public function testGetActivitiesFromRealAPI(): void
    {
        $this->markTestIncomplete('Enable this test only when you want to make real API calls');
        
        $feed = $this->client->feed('user', $this->testUserId);
        
        try {
            $response = $feed->getActivities(['limit' => 5]);
            
            $this->assertTrue($response->isSuccessful());
            $data = $response->getData();
            $this->assertArrayHasKey('results', $data);
            
            echo "✅ Retrieved " . count($data['results']) . " activities\n";
            
        } catch (StreamApiException $e) {
            echo "❌ API Error: {$e->getMessage()} (Status: {$e->getStatusCode()})\n";
            $this->fail("API call failed");
        }
    }
}

