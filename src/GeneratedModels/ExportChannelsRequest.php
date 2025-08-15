<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ExportChannelsRequest extends BaseModel
{
    public function __construct(
        public ?array $channels = null,    // Export options for channels 
        public ?bool $clearDeletedMessageText = null,    // Set if deleted message text should be cleared 
        public ?bool $exportUsers = null,
        public ?bool $includeSoftDeletedChannels = null,    // Set if you want to include deleted channels 
        public ?bool $includeTruncatedMessages = null,    // Set if you want to include truncated messages 
        public ?string $version = null,    // Export version 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
