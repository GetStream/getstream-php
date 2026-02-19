<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class IngressVideoEncodingResponse extends BaseModel
{
    public function __construct(
        public ?IngressSourceResponse $source = null,
        /** @var array<IngressVideoLayerResponse>|null */
        #[ArrayOf(IngressVideoLayerResponse::class)]
        public ?array $layers = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
