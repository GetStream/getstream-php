<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ImportBlockListRequest extends BaseModel
{
    public function __construct(
        public ?array $items = null,
        public ?int $chunkSize = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
