<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<FeedSuggestionResponse> $suggestions
 * @property string|null $algorithmUsed
 */
class GetFollowSuggestionsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<FeedSuggestionResponse>|null List of suggested feeds to follow */
        #[ArrayOf(FeedSuggestionResponse::class)]
        public ?array $suggestions = null, // List of suggested feeds to follow
        public ?string $algorithmUsed = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
