<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class DeleteChannelsRequest extends BaseModel
{
    public function __construct(
        public ?array $cids = null, // All channels that should be deleted
        public ?bool $hardDelete = null, // Server-side only. When true, the channels and all their resources are permanently deleted instead of soft-deleted.
        public ?bool $skipTruncate = null, // Server-side only. When true, the soft delete preserves message history instead of hiding it, so a later recreation of any of these channel IDs restores the full history. Only supported for distinct channels. Cannot be combined with hard_delete.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
