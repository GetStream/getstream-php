<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChannelBatchUpdateRequest extends BaseModel
{
    public function __construct(
        public ?string $operation = null,
        public ?object $filter = null, // Filter to apply to the query
        /** @var array<ChannelBatchMemberRequest>|null */
        #[ArrayOf(ChannelBatchMemberRequest::class)]
        public ?array $members = null,
        public ?ChannelDataUpdate $data = null,
        public ?object $customSet = null, // `updateData` only. Merges these keys into each channel's existing custom object, leaving every other custom key untouched. Keys are dot-paths, so `a.b` sets key `b` inside object `a` (the parent object must already exist). Cannot be combined with `data.custom`
        public ?array $customUnset = null, // `updateData` only. Deletes these keys from each channel's existing custom object, leaving every other custom key untouched. Keys are dot-paths; deleting a key that does not exist is a no-op. Cannot be combined with `data.custom`
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
