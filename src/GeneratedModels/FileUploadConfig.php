<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FileUploadConfig extends BaseModel
{
    public function __construct(
        public ?int $sizeLimit = null,
        public ?array $allowedFileExtensions = null,
        public ?array $allowedMimeTypes = null,
        public ?array $blockedFileExtensions = null,
        public ?array $blockedMimeTypes = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
