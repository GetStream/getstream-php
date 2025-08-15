<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ChannelGetOrCreateRequest extends BaseModel
{
    public function __construct(
        public ?bool $hideForCreator = null,    // Whether this channel will be hidden for the user who created the channel or not 
        public ?bool $state = null,    // Refresh channel state 
        public ?bool $threadUnreadCounts = null,
        public ?ChannelInput $data = null,
        public ?PaginationParams $members = null,
        public ?MessagePaginationParams $messages = null,
        public ?PaginationParams $watchers = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
