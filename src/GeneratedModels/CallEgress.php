<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CallEgress implements JsonSerializable
{
    public function __construct(public ?int $appPk = null,
        public ?string $callID = null,
        public ?string $callType = null,
        public ?string $egressID = null,
        public ?string $egressType = null,
        public ?string $instanceIp = null,
        public ?\DateTime $startedAt = null,
        public ?string $state = null,
        public ?\DateTime $updatedAt = null,
        public ?\DateTime $stoppedAt = null,
        public ?EgressTaskConfig $config = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'app_pk' => $this->appPk,
            'call_id' => $this->callID,
            'call_type' => $this->callType,
            'egress_id' => $this->egressID,
            'egress_type' => $this->egressType,
            'instance_ip' => $this->instanceIp,
            'started_at' => $this->startedAt,
            'state' => $this->state,
            'updated_at' => $this->updatedAt,
            'stopped_at' => $this->stoppedAt,
            'config' => $this->config,
        ], fn($v) => $v !== null);
    }

    public function toArray(): array
    {
        return $this->jsonSerialize();
    }

    /**
     * Create a new instance from JSON data.
     *
     * @param array<string, mixed>|string $json JSON data
     * @return static
     */
    public static function fromJson($json): self
    {
        if (is_string($json)) {
            $json = json_decode($json, true);
        }
        
        return new static(appPk: $json['app_pk'] ?? null,
            callID: $json['call_id'] ?? null,
            callType: $json['call_type'] ?? null,
            egressID: $json['egress_id'] ?? null,
            egressType: $json['egress_type'] ?? null,
            instanceIp: $json['instance_ip'] ?? null,
            startedAt: $json['started_at'] ?? null,
            state: $json['state'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            stoppedAt: $json['stopped_at'] ?? null,
            config: $json['config'] ?? null
        );
    }
} 
