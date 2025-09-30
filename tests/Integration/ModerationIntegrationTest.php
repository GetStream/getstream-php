<?php

declare(strict_types=1);

namespace GetStream\Tests\Integration;

use GetStream\Client;
use GetStream\ClientBuilder;
use GetStream\GeneratedModels;
use GetStream\ModerationClient;
use GetStream\StreamResponse;
use GetStream\Exceptions\StreamException;
use GetStream\Exceptions\StreamApiException;
use PHPUnit\Framework\TestCase;

/**
 * Comprehensive Integration tests for Moderation operations
 * These tests follow a logical flow: setup → create users → moderate → cleanup
 *
 * Test order:
 * 1. Environment Setup (users, channels)
 * 2. Ban/Unban Operations
 * 3. Mute/Unmute Operations
 * 4. Flag Operations
 * 5. Content Moderation
 * 6. Configuration Management
 * 7. Review Queue Operations
 * 8. Rules and Templates
 * 9. Cleanup
 */
class ModerationIntegrationTest extends TestCase
{
    private ModerationClient $moderationClient;
    private Client $client;

    // Test users
    private string $testUserId;
    private string $testUserId2;
    private string $moderatorUserId;
    private string $reporterUserId;

    // Test resources
    private string $testChannelId;
    private string $testChannelCid;
    private string $testMessageId = '';

    // Track created resources for cleanup
    private array $createdUserIds = [];
    private array $bannedUserIds = [];
    private array $mutedUserIds = [];
    private array $createdConfigs = [];

    /**
     * @throws StreamException
     */
    protected function setUp(): void
    {
        $this->client = ClientBuilder::fromEnv()->build();
        $this->moderationClient = ClientBuilder::fromEnv()->buildModerationClient();

        $this->testUserId = 'test-user-' . uniqid();
        $this->testUserId2 = 'test-user-2-' . uniqid();
        $this->moderatorUserId = 'moderator-' . uniqid();
        $this->reporterUserId = 'reporter-' . uniqid();
        $this->testChannelId = 'test-channel-' . uniqid();
        $this->testChannelCid = 'messaging:' . $this->testChannelId;

        // Setup environment for each test
        $this->setupEnvironment();
    }

    protected function tearDown(): void
    {
        // Cleanup created resources in reverse order
        $this->cleanupResources();
    }

    // =================================================================
    // ENVIRONMENT SETUP (called in setUp for each test)
    // =================================================================

    private function setupEnvironment(): void
    {
        try {
            // Create test users
            // snippet-start: CreateModerationUsers
            $response = $this->client->updateUsers(new GeneratedModels\UpdateUsersRequest(
                users: [
                    $this->testUserId => [
                        'id' => $this->testUserId,
                        'name' => 'Test User 1',
                        'role' => 'user'
                    ],
                    $this->testUserId2 => [
                        'id' => $this->testUserId2,
                        'name' => 'Test User 2',
                        'role' => 'user'
                    ],
                    $this->moderatorUserId => [
                        'id' => $this->moderatorUserId,
                        'name' => 'Moderator User',
                        'role' => 'admin'
                    ],
                    $this->reporterUserId => [
                        'id' => $this->reporterUserId,
                        'name' => 'Reporter User',
                        'role' => 'user'
                    ]
                ]
            ));
            // snippet-end: CreateModerationUsers

            if (!$response->isSuccessful()) {
                throw new StreamException('Failed to create users: ' . $response->getRawBody());
            }

            $this->createdUserIds = [$this->testUserId, $this->testUserId2, $this->moderatorUserId, $this->reporterUserId];

            echo "✅ Created test users for moderation tests\n";
            echo "   Target User: {$this->testUserId}\n";
            echo "   Target User 2: {$this->testUserId2}\n";
            echo "   Moderator: {$this->moderatorUserId}\n";
            echo "   Reporter: {$this->reporterUserId}\n";

        } catch (StreamApiException $e) {
            echo "⚠️ Setup failed: " . $e->getMessage() . "\n";
            echo "ResponseBody: " . $e->getResponseBody() . "\n";
            echo "ErrorDetail: " . $e->getErrorDetails() . "\n";
            throw $e;

        } catch (\Exception $e) {
            echo "⚠️ Setup failed: " . $e->getMessage() . "\n";
            // Continue with tests even if setup partially fails
        }
    }

    // =================================================================
    // 1. ENVIRONMENT SETUP TEST (demonstrates the setup process)
    // =================================================================

    public function test01_SetupEnvironmentDemo(): void
    {
        echo "\n🔧 Demonstrating moderation environment setup...\n";
        echo "✅ Users are automatically created in setUp()\n";
        echo "   Test User 1: {$this->testUserId}\n";
        echo "   Test User 2: {$this->testUserId2}\n";
        echo "   Moderator: {$this->moderatorUserId}\n";
        echo "   Reporter: {$this->reporterUserId}\n";

        $this->assertTrue(true); // Just a demo test
    }

    // =================================================================
    // 2. BAN/UNBAN OPERATIONS
    // =================================================================

    public function test02_BanUserWithReason(): void
    {
        echo "\n🚫 Testing user ban with reason...\n";

        // snippet-start: BanWithReason
        $request = new GeneratedModels\BanRequest(
            targetUserID: $this->testUserId,
            reason: 'spam',
            timeout: 60, // 60 minutes
            bannedByID: $this->moderatorUserId
        );

        $response = $this->moderationClient->ban($request);
        // snippet-stop: BanWithReason

        $this->assertResponseSuccess($response, 'ban user with reason');
        $this->bannedUserIds[] = $this->testUserId;
        
        echo "✅ Successfully banned user: {$this->testUserId}\n";
    }

    public function test04_UnbanUser(): void
    {
        echo "\n✅ Testing user unban...\n";

        // First ensure user is banned
        if (!in_array($this->testUserId, $this->bannedUserIds)) {
            $this->test02_BanUserWithReason();
        }

        // snippet-start: UnbanUser
        $request = new GeneratedModels\UnbanRequest(
            unbannedByID: $this->moderatorUserId
        );

        $response = $this->moderationClient->unban($this->testUserId, '', '', $request);
        // snippet-stop: UnbanUser

        $this->assertResponseSuccess($response, 'unban user');
        
        // Remove from banned list
        $this->bannedUserIds = array_diff($this->bannedUserIds, [$this->testUserId]);
        
        echo "✅ Successfully unbanned user: {$this->testUserId}\n";
    }

    // =================================================================
    // 3. MUTE/UNMUTE OPERATIONS
    // =================================================================

    public function test05_MuteUser(): void
    {
        echo "\n🔇 Testing user mute...\n";

        // snippet-start: MuteUser
        $request = new GeneratedModels\MuteRequest(
            targetIds: [$this->testUserId2],
            timeout: 30, // 30 minutes
            userID: $this->moderatorUserId
        );

        $response = $this->moderationClient->mute($request);
        // snippet-stop: MuteUser

        $this->assertResponseSuccess($response, 'mute user');
        $this->mutedUserIds[] = $this->testUserId2;
        
        echo "✅ Successfully muted user: {$this->testUserId2}\n";
    }

    public function test06_UnmuteUser(): void
    {
        echo "\n🔊 Testing user unmute...\n";

        // First ensure user is muted
        if (!in_array($this->testUserId2, $this->mutedUserIds)) {
            $this->test05_MuteUser();
        }

        // snippet-start: UnmuteUser
        $request = new GeneratedModels\UnmuteRequest(
            targetIds: [$this->testUserId2],
            userID: $this->moderatorUserId
        );

        $response = $this->moderationClient->unmute($request);
        // snippet-stop: UnmuteUser

        $this->assertResponseSuccess($response, 'unmute user');
        
        // Remove from muted list
        $this->mutedUserIds = array_diff($this->mutedUserIds, [$this->testUserId2]);
        
        echo "✅ Successfully unmuted user: {$this->testUserId2}\n";
    }

    // =================================================================
    // 4. FLAG OPERATIONS
    // =================================================================

    public function test07_FlagUser(): void
    {
        echo "\n🚩 Testing user flagging...\n";

        // snippet-start: FlagUser
        $request = new GeneratedModels\FlagRequest(
            entityType: 'user',
            entityID: $this->testUserId,
            entityCreatorID: $this->testUserId,
            reason: 'spam',
            userID: $this->reporterUserId
        );

        $response = $this->moderationClient->flag($request);
        // snippet-stop: FlagUser

        $this->assertResponseSuccess($response, 'flag user');
        
        echo "✅ Successfully flagged user: {$this->testUserId}\n";
    }

    public function test12_QueryReviewQueue(): void
    {
        $this->markTestSkipped("backend issue");

        echo "\n📋 Testing review queue query...\n";

        // snippet-start: QueryReviewQueueWithFilter
        $request = new GeneratedModels\QueryReviewQueueRequest(
            filter: [],
            limit: 25
        );

        $response = $this->moderationClient->queryReviewQueue($request);
        // snippet-stop: QueryReviewQueueWithFilter

        $this->assertResponseSuccess($response, 'query review queue');
        
        echo "✅ Successfully queried review queue\n";
    }

    // =================================================================
    // 8. QUERY OPERATIONS
    // =================================================================

    public function test13_QueryModerationFlags(): void
    {

        $this->markTestSkipped("backend issue");

        echo "\n🚩 Testing moderation flags query...\n";

        // snippet-start: QueryModerationFlags
        $request = new GeneratedModels\QueryModerationFlagsRequest(
            filter:json_decode('{"has_text":"true"}'),
            limit: 50
        );

        $response = $this->moderationClient->queryModerationFlags($request);
        // snippet-stop: QueryModerationFlags

        $this->assertResponseSuccess($response, 'query moderation flags');
        
        echo "✅ Successfully queried moderation flags\n";
    }

    public function test14_QueryModerationLogs(): void
    {
        $this->markTestSkipped("backend issue");
        echo "\n📝 Testing moderation logs query...\n";

        // snippet-start: QueryModerationLogs
        $request = new GeneratedModels\QueryModerationLogsRequest(
            filter: [],
            limit: 25
        );

        $response = $this->moderationClient->queryModerationLogs($request);
        // snippet-stop: QueryModerationLogs

        $this->assertResponseSuccess($response, 'query moderation logs');
        
        echo "✅ Successfully queried moderation logs\n";
    }

    // =================================================================
    // 9. TEMPLATE OPERATIONS
    // =================================================================

    public function test15_QueryTemplates(): void
    {
        echo "\n📄 Testing template query...\n";

        // snippet-start: V2QueryTemplates
        $response = $this->moderationClient->v2QueryTemplates();
        // snippet-stop: V2QueryTemplates

        $this->assertResponseSuccess($response, 'query templates');
        
        echo "✅ Successfully queried moderation templates\n";
    }

    // =================================================================
    // HELPER METHODS
    // =================================================================

    private function assertResponseSuccess(StreamResponse $response, string $operation): void
    {
        if (!$response->isSuccessful()) {
            $this->fail("Failed to {$operation}: " . $response->getRawBody());
        }
        $this->assertTrue($response->isSuccessful(), "Response should be successful for {$operation}");
    }

    private function cleanupResources(): void
    {
        echo "\n🧹 Cleaning up moderation test resources...\n";
        
        // Unban any remaining banned users
        if (!empty($this->bannedUserIds)) {
            foreach ($this->bannedUserIds as $userId) {
                try {
                    $request = new GeneratedModels\UnbanRequest(
                        unbannedByID: $this->moderatorUserId
                    );
                    $this->moderationClient->unban($userId, '', '', $request);
                    echo "✅ Cleaned up ban for user: {$userId}\n";
                } catch (StreamApiException $e) {
                    echo "Warning: Failed to unban user {$userId}: " . $e->getMessage() . "\n";
                }
            }
        }
        
        // Unmute any remaining muted users
        if (!empty($this->mutedUserIds)) {
            foreach ($this->mutedUserIds as $userId) {
                try {
                    $request = new GeneratedModels\UnmuteRequest(
                        targetIds: [$userId],
                        userID: $this->moderatorUserId
                    );
                    $this->moderationClient->unmute($request);
                    echo "✅ Cleaned up mute for user: {$userId}\n";
                } catch (StreamApiException $e) {
                    echo "Warning: Failed to unmute user {$userId}: " . $e->getMessage() . "\n";
                }
            }
        }
        
        // Delete any created moderation configs
        if (!empty($this->createdConfigs)) {
            foreach ($this->createdConfigs as $configKey) {
                try {
                    $this->moderationClient->deleteConfig($configKey, 'default');
                    echo "✅ Cleaned up config: {$configKey}\n";
                } catch (StreamApiException $e) {
                    echo "Warning: Failed to delete config {$configKey}: " . $e->getMessage() . "\n";
                }
            }
        }
        
        echo "🧹 Moderation cleanup completed\n";
    }
}
