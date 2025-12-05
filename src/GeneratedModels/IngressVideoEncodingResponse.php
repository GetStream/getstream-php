<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array<IngressVideoLayerResponse> $layers
 * @property IngressSourceResponse $source
 */
class IngressVideoEncodingResponse extends BaseModel
{
    public function __construct(
        /** @var array<IngressVideoLayerResponse>|null */
        #[ArrayOf(IngressVideoLayerResponse::class)]
        public ?array $layers = null,
        public ?IngressSourceResponse $source = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
