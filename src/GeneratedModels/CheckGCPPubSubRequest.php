<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CheckGCPPubSubRequest extends BaseModel
{
    public function __construct(
        public ?string $gcpPubsubTopic = null, // Fully qualified GCP Pub/Sub topic name (projects/{project}/topics/{topic})
        public ?string $gcpPubsubRegion = null, // GCP region used for the regional Pub/Sub endpoint when ordering is enabled
        public ?bool $gcpPubsubEventBasedOrderingKeyEnabled = null, // Publish the test message with an ordering key through the regional endpoint, as a hook with ordering enabled would; requires gcp_pubsub_region
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
