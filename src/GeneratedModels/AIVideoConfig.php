<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool|null $async
 * @property bool|null $enabled
 * @property array<AWSRekognitionRule>|null $rules
 */
class AIVideoConfig extends BaseModel
{
    public function __construct(
        public ?bool $async = null,
        public ?bool $enabled = null,
        /** @var array<AWSRekognitionRule>|null */
        #[ArrayOf(AWSRekognitionRule::class)]
        public ?array $rules = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
