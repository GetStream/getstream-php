<?php

declare(strict_types=1);

namespace GetStream\Tests;

use GetStream\GeneratedModels\ActivityMarksConfig;
use GetStream\GeneratedModels\CreateFeedGroupRequest;
use GetStream\GeneratedModels\RankingConfig;
use PHPUnit\Framework\TestCase;

class ActivityMarksRankingTest extends TestCase
{
    /**
     * @test
     */
    public function createFeedGroupRequestSerializesActivityMarksAndIsSeenRanking(): void
    {
        $request = new CreateFeedGroupRequest(
            id: 'timeline',
            activityMarks: new ActivityMarksConfig(trackSeen: true, trackRead: true),
            ranking: new RankingConfig(type: 'expression', score: 'is_seen ? 0 : 100'),
        );

        $decoded = json_decode(json_encode($request), true);

        self::assertIsArray($decoded);
        self::assertArrayHasKey('activity_marks', $decoded);
        self::assertTrue($decoded['activity_marks']['track_seen']);
        self::assertTrue($decoded['activity_marks']['track_read']);
        self::assertSame('expression', $decoded['ranking']['type']);
        self::assertSame('is_seen ? 0 : 100', $decoded['ranking']['score']);
    }
}
