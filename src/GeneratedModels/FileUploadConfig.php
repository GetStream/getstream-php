<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FileUploadConfig extends BaseModel
{
    public function __construct(
        public ?array $allowedFileExtensions = null,
        public ?array $blockedFileExtensions = null,
        public ?array $allowedMimeTypes = null,
        public ?array $blockedMimeTypes = null,
        public ?int $sizeLimit = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
