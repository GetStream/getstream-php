<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpsertPushTemplateRequest implements JsonSerializable
{
    public function __construct(public ?string $eventType = null,
        public ?string $pushProviderType = null,
        public ?bool $enablePush = null,
        public ?string $pushProviderName = null,
        public ?string $template = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'event_type' => $this->eventType,
            'push_provider_type' => $this->pushProviderType,
            'enable_push' => $this->enablePush,
            'push_provider_name' => $this->pushProviderName,
            'template' => $this->template,
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
        
        return new static(eventType: $json['event_type'] ?? null,
            pushProviderType: $json['push_provider_type'] ?? null,
            enablePush: $json['enable_push'] ?? null,
            pushProviderName: $json['push_provider_name'] ?? null,
            template: $json['template'] ?? null
        );
    }
} 
