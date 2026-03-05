<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Config for creating Azure Blob Storage storage
 */
class AzureRequest extends BaseModel
{
    public function __construct(
        public ?string $absAccountName = null, // The account name
        public ?string $absTenantID = null, // The tenant id
        public ?string $absClientID = null, // The client id
        public ?string $absClientSecret = null, // The client secret
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
