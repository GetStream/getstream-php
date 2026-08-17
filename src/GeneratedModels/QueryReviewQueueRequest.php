<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryReviewQueueRequest extends BaseModel
{
    public function __construct(
        public ?object $filter = null, // Filter conditions for review queue items. Accepts built-in fields (e.g. status, channel_cid, severity, recommended_action) and customer-supplied moderation_payload.custom keys: any key that is not a built-in field is matched against the item's custom moderation data (e.g. {"location_id": "loc-42"}). Use filter_config.filterable_custom_keys to discover which custom keys the app exposes as chips.
        /** @var array<SortParamRequest>|null */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null, // Sorting parameters for the results
        public ?bool $lockItems = null, // Whether to lock items for review (true), unlock items (false), or just fetch (nil)
        public ?int $lockDuration = null, // Duration for which items should be locked
        public ?int $lockCount = null, // Number of items to lock (1-25)
        public ?bool $statsOnly = null, // Whether to return only statistics
        public ?bool $excludeDefaultActionConfig = null,
        public ?int $limit = null,
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $userID = null,
        public ?UserRequest $user = null, // User request object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
