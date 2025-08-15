<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CallEgress extends BaseModel
{
    public function __construct(
        public ?int $appPk = null,
        public ?string $callID = null,
        public ?string $callType = null,
        public ?string $egressID = null,
        public ?string $egressType = null,
        public ?string $instanceIp = null,
        public ?\DateTime $startedAt = null,
        public ?string $state = null,
        public ?\DateTime $updatedAt = null,
        public ?\DateTime $stoppedAt = null,
        public ?EgressTaskConfig $config = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
