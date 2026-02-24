<?php

declare(strict_types=1);

namespace GetStream\Tests\Integration;

use GetStream\GeneratedModels;
use GetStream\StreamResponse;

/**
 * Integration tests for Chat Reactions.
 * Follows the patterns from getstream-go/chat_reaction_integration_test.go.
 */
class ChatReactionIntegrationTest extends ChatTestCase
{
    /**
     * Test sending a reaction and retrieving reactions on a message.
     */
    public function testSendAndGetReactions(): void
    {
        $userIDs = $this->createTestUsers(2);
        [$type, $id] = $this->createTestChannelWithMembers($userIDs[0], $userIDs);
        $msgID = $this->sendTestMessage($type, $id, $userIDs[0], 'Message with reactions');

        // Send a "like" reaction from user 1
        $resp = $this->sendReaction($msgID, new GeneratedModels\SendReactionRequest(
            reaction: new GeneratedModels\ReactionRequest(
                type: 'like',
                userID: $userIDs[0],
            ),
        ));
        $this->assertResponseSuccess($resp, 'send like reaction');
        $this->assertNotNull($resp->getData()->reaction);
        $this->assertEquals('like', $resp->getData()->reaction->type);
        $this->assertEquals($userIDs[0], $resp->getData()->reaction->userID);

        // Send a "love" reaction from user 2
        $resp = $this->sendReaction($msgID, new GeneratedModels\SendReactionRequest(
            reaction: new GeneratedModels\ReactionRequest(
                type: 'love',
                userID: $userIDs[1],
            ),
        ));
        $this->assertResponseSuccess($resp, 'send love reaction');
        $this->assertEquals('love', $resp->getData()->reaction->type);

        // Get reactions and verify both are present
        $getResp = $this->getReactions($msgID);
        $this->assertResponseSuccess($getResp, 'get reactions');
        $this->assertNotNull($getResp->getData()->reactions);
        $this->assertGreaterThanOrEqual(2, count($getResp->getData()->reactions));
    }

    /**
     * Test deleting a reaction from a message.
     */
    public function testDeleteReaction(): void
    {
        $userIDs = $this->createTestUsers(1);
        [$type, $id] = $this->createTestChannelWithMembers($userIDs[0], $userIDs);
        $msgID = $this->sendTestMessage($type, $id, $userIDs[0], 'Message for reaction deletion');

        // Send a reaction
        $resp = $this->sendReaction($msgID, new GeneratedModels\SendReactionRequest(
            reaction: new GeneratedModels\ReactionRequest(
                type: 'like',
                userID: $userIDs[0],
            ),
        ));
        $this->assertResponseSuccess($resp, 'send reaction');

        // Delete the reaction
        $delResp = $this->deleteReaction($msgID, 'like', $userIDs[0]);
        $this->assertResponseSuccess($delResp, 'delete reaction');

        // Verify reaction is gone
        $getResp = $this->getReactions($msgID);
        $this->assertResponseSuccess($getResp, 'get reactions after delete');

        $reactions = $getResp->getData()->reactions ?? [];
        foreach ($reactions as $r) {
            if ($r->userID === $userIDs[0]) {
                $this->assertNotEquals('like', $r->type, 'Like reaction should have been deleted');
            }
        }
    }

    /**
     * Test enforce_unique: sending a second reaction with enforce_unique replaces the first.
     */
    public function testEnforceUniqueReaction(): void
    {
        $userIDs = $this->createTestUsers(1);
        [$type, $id] = $this->createTestChannelWithMembers($userIDs[0], $userIDs);
        $msgID = $this->sendTestMessage($type, $id, $userIDs[0], 'Message for unique reaction test');

        // Send "like" with enforce_unique
        $resp = $this->sendReaction($msgID, new GeneratedModels\SendReactionRequest(
            reaction: new GeneratedModels\ReactionRequest(
                type: 'like',
                userID: $userIDs[0],
            ),
            enforceUnique: true,
        ));
        $this->assertResponseSuccess($resp, 'send like reaction with enforce_unique');

        // Send "love" with enforce_unique — should replace "like"
        $resp = $this->sendReaction($msgID, new GeneratedModels\SendReactionRequest(
            reaction: new GeneratedModels\ReactionRequest(
                type: 'love',
                userID: $userIDs[0],
            ),
            enforceUnique: true,
        ));
        $this->assertResponseSuccess($resp, 'send love reaction with enforce_unique');

        // Verify user has only one reaction
        $getResp = $this->getReactions($msgID);
        $this->assertResponseSuccess($getResp, 'get reactions after enforce_unique');

        $reactions = $getResp->getData()->reactions ?? [];
        $userReactions = 0;
        foreach ($reactions as $r) {
            if ($r->userID === $userIDs[0]) {
                $userReactions++;
            }
        }
        $this->assertEquals(1, $userReactions, 'EnforceUnique should keep only one reaction per user');
    }
}
