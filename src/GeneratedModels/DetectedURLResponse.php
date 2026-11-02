<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class DetectedURLResponse extends BaseModel
{
    public function __construct(
        public ?string $url = null, // The URL as found.
        public ?string $source = null, // Where it was found: `qr` (decoded from a QR code in an image), `ocr` (in text visible in an image) or `text` (in a moderated text).
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
