<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class Device implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?string $id = null,
        public ?string $pushProvider = null,
        public ?string $userID = null,
        public ?bool $disabled = null,
        public ?string $disabledReason = null,
        public ?string $pushProviderName = null,
        public ?bool $voip = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'id' => $this->id,
            'push_provider' => $this->pushProvider,
            'user_id' => $this->userID,
            'disabled' => $this->disabled,
            'disabled_reason' => $this->disabledReason,
            'push_provider_name' => $this->pushProviderName,
            'voip' => $this->voip,
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
        
        return new static(createdAt: $json['created_at'] ?? null,
            id: $json['id'] ?? null,
            pushProvider: $json['push_provider'] ?? null,
            userID: $json['user_id'] ?? null,
            disabled: $json['disabled'] ?? null,
            disabledReason: $json['disabled_reason'] ?? null,
            pushProviderName: $json['push_provider_name'] ?? null,
            voip: $json['voip'] ?? null
        );
    }
} 
