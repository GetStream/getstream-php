<?php

declare(strict_types=1);

namespace GetStream\Tests\Integration;

use GetStream\Client;
use GetStream\ClientBuilder;
use GetStream\Exceptions\StreamApiException;
use GetStream\Exceptions\StreamException;
use GetStream\GeneratedModels;
use GetStream\ModerationClient;
use GetStream\StreamResponse;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;

/**
 * Comprehensive Integration tests for Moderation operations
 * These tests follow a logical flow: setup → create users → moderate → cleanup.
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
#[Group('integration')]
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

    // ------------------------------------------------------------------
    // Class-level shared users (created once per test class)
    // ------------------------------------------------------------------
    private static ?Client $sharedClient = null;
    private static ?ModerationClient $sharedModerationClient = null;
    private static string $sharedUserId = '';
    private static string $sharedUserId2 = '';
    private static string $sharedModeratorUserId = '';
    private static string $sharedReporterUserId = '';

    public static function setUpBeforeClass(): void
    {
        $client = ClientBuilder::fromEnv()->build();
        $moderationClient = ClientBuilder::fromEnv()->buildModerationClient();

        self::$sharedClient = $client;
        self::$sharedModerationClient = $moderationClient;
        self::$sharedUserId = 'test-user-' . uniqid();
        self::$sharedUserId2 = 'test-user-2-' . uniqid();
        self::$sharedModeratorUserId = 'moderator-' . uniqid();
        self::$sharedReporterUserId = 'reporter-' . uniqid();

        // Create shared users once
        $client->updateUsers(new GeneratedModels\UpdateUsersRequest(
            users: [
                self::$sharedUserId => [
                    'id' => self::$sharedUserId,
                    'name' => 'Test User ' . self::$sharedUserId,
                    'role' => 'user',
                ],
                self::$sharedUserId2 => [
                    'id' => self::$sharedUserId2,
                    'name' => 'Test User ' . self::$sharedUserId2,
                    'role' => 'user',
                ],
                self::$sharedModeratorUserId => [
                    'id' => self::$sharedModeratorUserId,
                    'name' => 'Moderator ' . self::$sharedModeratorUserId,
                    'role' => 'admin',
                ],
                self::$sharedReporterUserId => [
                    'id' => self::$sharedReporterUserId,
                    'name' => 'Reporter ' . self::$sharedReporterUserId,
                    'role' => 'user',
                ],
            ]
        ));
    }

    /**
     * @throws StreamException
     */
    protected function setUp(): void
    {
        $this->client = self::$sharedClient;
        $this->moderationClient = self::$sharedModerationClient;

        $this->testUserId = self::$sharedUserId;
        $this->testUserId2 = self::$sharedUserId2;
        $this->moderatorUserId = self::$sharedModeratorUserId;
        $this->reporterUserId = self::$sharedReporterUserId;
        $this->testChannelId = 'test-channel-' . uniqid();
        $this->testChannelCid = 'messaging:' . $this->testChannelId;
    }

    protected function tearDown(): void
    {
        // Cleanup created resources in reverse order
        $this->cleanupResources();
    }

    // =================================================================
    // 1. ENVIRONMENT SETUP TEST (demonstrates the setup process)
    // =================================================================

    /**
     * @test
     */
    public function test01SetupEnvironmentDemo(): void
    {
        echo "\n🔧 Demonstrating moderation environment setup...\n";
        echo "✅ Users are automatically created in setUp()\n";
        echo "   Test User 1: {$this->testUserId}\n";
        echo "   Test User 2: {$this->testUserId2}\n";
        echo "   Moderator: {$this->moderatorUserId}\n";
        echo "   Reporter: {$this->reporterUserId}\n";

        self::assertTrue(true); // Just a demo test
    }

    // =================================================================
    // 2. BAN/UNBAN OPERATIONS
    // =================================================================

    /**
     * @test
     */
    public function test02BanUserWithReason(): void
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

    /**
     * @test
     */
    public function test04UnbanUser(): void
    {
        echo "\n✅ Testing user unban...\n";

        // First ensure user is banned
        if (!in_array($this->testUserId, $this->bannedUserIds, true)) {
            $this->test02BanUserWithReason();
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

    /**
     * @test
     */
    public function test05MuteUser(): void
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

    /**
     * @test
     */
    public function test06UnmuteUser(): void
    {
        echo "\n🔊 Testing user unmute...\n";

        // First ensure user is muted
        if (!in_array($this->testUserId2, $this->mutedUserIds, true)) {
            $this->test05MuteUser();
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

    /**
     * @test
     */
    public function test07FlagUser(): void
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

    /**
     * @test
     */
    public function test12QueryReviewQueue(): void
    {
        self::markTestSkipped('backend issue');

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

    /**
     * @test
     */
    public function test13QueryModerationFlags(): void
    {
        self::markTestSkipped('backend issue');

        echo "\n🚩 Testing moderation flags query...\n";

        // snippet-start: QueryModerationFlags
        $request = new GeneratedModels\QueryModerationFlagsRequest(
            filter: json_decode('{"has_text":"true"}'),
            limit: 50
        );

        $response = $this->moderationClient->queryModerationFlags($request);
        // snippet-stop: QueryModerationFlags

        $this->assertResponseSuccess($response, 'query moderation flags');

        echo "✅ Successfully queried moderation flags\n";
    }

    /**
     * @test
     */
    public function test14QueryModerationLogs(): void
    {
        self::markTestSkipped('backend issue');
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

    /**
     * @test
     */
    public function test15QueryTemplates(): void
    {
        echo "\n📄 Testing template query...\n";

        // snippet-start: V2QueryTemplates
        $response = $this->moderationClient->v2QueryTemplates();
        // snippet-stop: V2QueryTemplates

        $this->assertResponseSuccess($response, 'query templates');

        echo "✅ Successfully queried moderation templates\n";
    }

    // =================================================================
    // ENVIRONMENT SETUP (called in setUp for each test)
    // =================================================================

    // snippet-start: CreateModerationUsers
    // Users are created once in setUpBeforeClass() for all tests in this class.
    // snippet-end: CreateModerationUsers

    // =================================================================
    // HELPER METHODS
    // =================================================================

    private function assertResponseSuccess(StreamResponse $response, string $operation): void
    {
        if (!$response->isSuccessful()) {
            self::fail("Failed to {$operation}: " . $response->getRawBody());
        }
        self::assertTrue($response->isSuccessful(), "Response should be successful for {$operation}");
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
