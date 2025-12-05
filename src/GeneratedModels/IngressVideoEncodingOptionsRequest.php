<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array<IngressVideoLayerRequest> $layers
 * @property IngressSourceRequest $source
 */
class IngressVideoEncodingOptionsRequest extends BaseModel
{
    public function __construct(
        /** @var array<IngressVideoLayerRequest>|null */
        #[ArrayOf(IngressVideoLayerRequest::class)]
        public ?array $layers = null,
        public ?IngressSourceRequest $source = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
