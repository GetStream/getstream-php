<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool $enabled
 * @property string|null $apnTemplate
 * @property string|null $credentialsJson
 * @property string|null $dataTemplate
 * @property string|null $notificationTemplate
 * @property string|null $serverKey
 */
class FirebaseConfigFields extends BaseModel
{
    public function __construct(
        public ?bool $enabled = null,
        public ?string $apnTemplate = null,
        public ?string $credentialsJson = null,
        public ?string $dataTemplate = null,
        public ?string $notificationTemplate = null,
        public ?string $serverKey = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
