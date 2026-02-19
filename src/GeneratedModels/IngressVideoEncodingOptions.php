<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class IngressVideoEncodingOptions extends BaseModel
{
    public function __construct(
        public ?IngressSource $source = null,
        /** @var array<IngressVideoLayer>|null */
        #[ArrayOf(IngressVideoLayer::class)]
        public ?array $layers = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
