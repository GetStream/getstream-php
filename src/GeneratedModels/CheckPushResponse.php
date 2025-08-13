<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CheckPushResponse implements JsonSerializable
{
    public function __construct(public ?string $duration = null,
        public ?string $eventType = null,
        public ?string $renderedApnTemplate = null,
        public ?string $renderedFirebaseTemplate = null,
        public ?bool $skipDevices = null,
        public ?array $generalErrors = null,
        public ?array $deviceErrors = null,
        public ?array $renderedMessage = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'duration' => $this->duration,
            'event_type' => $this->eventType,
            'rendered_apn_template' => $this->renderedApnTemplate,
            'rendered_firebase_template' => $this->renderedFirebaseTemplate,
            'skip_devices' => $this->skipDevices,
            'general_errors' => $this->generalErrors,
            'device_errors' => $this->deviceErrors,
            'rendered_message' => $this->renderedMessage,
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
        
        return new static(duration: $json['duration'] ?? null,
            eventType: $json['event_type'] ?? null,
            renderedApnTemplate: $json['rendered_apn_template'] ?? null,
            renderedFirebaseTemplate: $json['rendered_firebase_template'] ?? null,
            skipDevices: $json['skip_devices'] ?? null,
            generalErrors: $json['general_errors'] ?? null,
            deviceErrors: $json['device_errors'] ?? null,
            renderedMessage: $json['rendered_message'] ?? null
        );
    }
} 
