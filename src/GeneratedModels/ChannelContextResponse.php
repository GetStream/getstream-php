<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Slim channel object: identity plus creator
 */
class ChannelContextResponse extends BaseModel
{
    public function __construct(
        public ?string $cid = null, // Channel CID (<type>:<id>)
        public ?string $type = null, // Channel type
        public ?string $id = null, // Channel ID
        public ?UserResponse $createdBy = null, // User response object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
