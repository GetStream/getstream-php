<?php

declare(strict_types=1);

namespace GetStream\Tests\Integration;

use GetStream\GeneratedModels;
use PHPUnit\Framework\Attributes\Group;

/**
 * Chat Moderation integration tests.
 *
 * Tests: ban/unban user (app-level and channel-level), mute/unmute user,
 * flag message, flag user.
 *
 * Follows the patterns from getstream-go's TestChatBanIntegration,
 * TestChatMuteIntegration, and TestChatFlagIntegration.
 */
#[Group('integration')]
class ChatModerationIntegrationTest extends ChatTestCase
{
    // =========================================================================
    // Ban / Unban
    // =========================================================================

    public function testBanUnbanUser(): void
    {
        $userIDs = $this->createTestUsers(3);
        $adminID = $userIDs[0];
        $targetID = $userIDs[1];
        $targetID2 = $userIDs[2];

        // --- App-level ban ---

        // Ban a user with reason and timeout
        $banResp = $this->banUser(new GeneratedModels\BanRequest(
            targetUserID: $targetID,
            bannedByID: $adminID,
            reason: 'test ban reason',
            timeout: 60, // 60 minutes
        ));
        $this->assertResponseSuccess($banResp, 'ban user at app level');

        // Query banned users
        $qResp = $this->queryBannedUsers(new GeneratedModels\QueryBannedUsersPayload(
            filterConditions: (object) ['user_id' => (object) ['$eq' => $targetID]],
        ));
        $this->assertResponseSuccess($qResp, 'query banned users');
        self::assertNotEmpty($qResp->getData()->bans, 'Should find the banned user');

        $ban = $qResp->getData()->bans[0];
        self::assertEquals('test ban reason', $ban->reason);
        // When timeout is set, expires should be populated
        self::assertNotNull($ban->expires, 'Ban with timeout should have Expires set');

        // Unban the user
        $unbanResp = $this->unbanUser($targetID);
        $this->assertResponseSuccess($unbanResp, 'unban user at app level');

        // Verify ban is gone
        $qResp2 = $this->queryBannedUsers(new GeneratedModels\QueryBannedUsersPayload(
            filterConditions: (object) ['user_id' => (object) ['$eq' => $targetID]],
        ));
        $this->assertResponseSuccess($qResp2, 'query banned users after unban');
        self::assertEmpty($qResp2->getData()->bans, 'Bans should be empty after unban');

        // --- Channel-level ban ---

        [$channelType, $channelID] = $this->createTestChannelWithMembers($adminID, [$adminID, $targetID2]);
        $cid = "{$channelType}:{$channelID}";

        // Ban user in the specific channel
        $chBanResp = $this->banUser(new GeneratedModels\BanRequest(
            targetUserID: $targetID2,
            bannedByID: $adminID,
            channelCid: $cid,
            reason: 'channel-specific ban',
        ));
        $this->assertResponseSuccess($chBanResp, 'ban user in channel');

        // Unban from channel
        $chUnbanResp = $this->unbanUser($targetID2, $cid);
        $this->assertResponseSuccess($chUnbanResp, 'unban user from channel');

        // Verify channel ban is gone
        $qResp3 = $this->queryBannedUsers(new GeneratedModels\QueryBannedUsersPayload(
            filterConditions: (object) ['channel_cid' => (object) ['$eq' => $cid]],
        ));
        $this->assertResponseSuccess($qResp3, 'query banned users after channel unban');
        self::assertEmpty($qResp3->getData()->bans, 'Channel bans should be empty after unban');
    }

    // =========================================================================
    // Mute / Unmute
    // =========================================================================

    public function testMuteUnmuteUser(): void
    {
        $userIDs = $this->createTestUsers(4);
        $muterID = $userIDs[0];
        $targetID = $userIDs[1];
        $targetID2 = $userIDs[2];
        $targetID3 = $userIDs[3];

        // --- Mute without timeout ---

        $muteResp = $this->muteUser(new GeneratedModels\MuteRequest(
            targetIds: [$targetID],
            userID: $muterID,
        ));
        $this->assertResponseSuccess($muteResp, 'mute user');
        self::assertNotEmpty($muteResp->getData()->mutes, 'Mute response should contain mutes');

        $mute = $muteResp->getData()->mutes[0];
        self::assertNotNull($mute->user, 'Mute should have a User');
        self::assertNotNull($mute->target, 'Mute should have a Target');
        self::assertNull($mute->expires, 'Mute without timeout should have no Expires');

        // Unmute
        $unmuteResp = $this->unmuteUser(new GeneratedModels\UnmuteRequest(
            targetIds: [$targetID],
            userID: $muterID,
        ));
        $this->assertResponseSuccess($unmuteResp, 'unmute user');

        // --- Mute with timeout ---

        $muteResp2 = $this->muteUser(new GeneratedModels\MuteRequest(
            targetIds: [$targetID2, $targetID3],
            userID: $muterID,
            timeout: 60,
        ));
        $this->assertResponseSuccess($muteResp2, 'mute users with timeout');
        self::assertGreaterThanOrEqual(2, count($muteResp2->getData()->mutes), 'Should have at least 2 mute entries');

        // When timeout is set, Expires should be populated
        foreach ($muteResp2->getData()->mutes as $m) {
            self::assertNotNull($m->expires, 'Mute with timeout should have Expires');
            self::assertNotNull($m->user, 'Mute should have User');
            self::assertNotNull($m->target, 'Mute should have Target');
        }

        // Cleanup: unmute both
        $this->unmuteUser(new GeneratedModels\UnmuteRequest(
            targetIds: [$targetID2, $targetID3],
            userID: $muterID,
        ));
    }

    // =========================================================================
    // Flag
    // =========================================================================

    public function testFlagMessageAndUser(): void
    {
        $userIDs = $this->createTestUsers(2);
        $userID = $userIDs[0];
        $flaggerID = $userIDs[1];

        [$channelType, $channelID] = $this->createTestChannelWithMembers($userID, [$userID, $flaggerID]);
        $msgID = $this->sendTestMessage($channelType, $channelID, $userID, 'Message to be flagged');

        // --- Flag the message ---

        $flagResp = $this->flagContent(new GeneratedModels\FlagRequest(
            entityType: 'stream:chat:v1:message',
            entityID: $msgID,
            entityCreatorID: $userID,
            reason: 'inappropriate content',
            userID: $flaggerID,
        ));
        $this->assertResponseSuccess($flagResp, 'flag message');
        self::assertNotEmpty($flagResp->getData()->itemID, 'Flag should return an item ID');

        // Verify QueryMessageFlags endpoint works (v2 flags may not populate v1 store,
        // but the endpoint itself should return successfully)
        $cid = "{$channelType}:{$channelID}";
        $qResp = $this->queryMessageFlags(new GeneratedModels\QueryMessageFlagsPayload(
            filterConditions: (object) ['channel_cid' => $cid],
        ));
        $this->assertResponseSuccess($qResp, 'query message flags by channel');

        // Also verify QueryMessageFlags with user_id filter
        $qResp2 = $this->queryMessageFlags(new GeneratedModels\QueryMessageFlagsPayload(
            filterConditions: (object) ['user_id' => $flaggerID],
        ));
        $this->assertResponseSuccess($qResp2, 'query message flags by user');

        // --- Flag the user ---

        $flagUserResp = $this->flagContent(new GeneratedModels\FlagRequest(
            entityType: 'user',
            entityID: $userID,
            entityCreatorID: $userID,
            reason: 'spam',
            userID: $flaggerID,
        ));
        $this->assertResponseSuccess($flagUserResp, 'flag user');
        self::assertNotEmpty($flagUserResp->getData()->itemID, 'Flag user should return an item ID');
    }
}
