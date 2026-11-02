<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * How a feed group selects the activities it shows.
 */
class ActivitySelectorType
{
    public const CURRENT_FEED = 'current_feed';
    public const FOLLOWING = 'following';
    public const FOLLOW_SUGGESTION = 'follow_suggestion';
    public const INTEREST = 'interest';
    public const POPULAR = 'popular';
    public const PROXIMITY = 'proximity';
    public const QUERY = 'query';
}
