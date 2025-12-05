<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array<IngressVideoLayer> $layers
 * @property IngressSource|null $source
 */
class IngressVideoEncodingOptions extends BaseModel
{
    public function __construct(
        /** @var array<IngressVideoLayer>|null */
        #[ArrayOf(IngressVideoLayer::class)]
        public ?array $layers = null,
        public ?IngressSource $source = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
