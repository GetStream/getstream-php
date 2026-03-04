<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChannelBatchUpdateRequest extends BaseModel
{
    public function __construct(
        public ?string $operation = null,
        public ?object $filter = null,
        /** @var array<ChannelBatchMemberRequest>|null */
        #[ArrayOf(ChannelBatchMemberRequest::class)]
        public ?array $members = null,
        public ?ChannelDataUpdate $data = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
