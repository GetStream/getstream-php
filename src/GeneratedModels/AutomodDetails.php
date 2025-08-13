<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class AutomodDetails implements JsonSerializable
{
    public function __construct(public ?string $action = null,
        public ?string $originalMessageType = null,
        public ?array $imageLabels = null,
        public ?FlagMessageDetails $messageDetails = null,
        public ?MessageModerationResult $result = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'action' => $this->action,
            'original_message_type' => $this->originalMessageType,
            'image_labels' => $this->imageLabels,
            'message_details' => $this->messageDetails,
            'result' => $this->result,
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
        
        return new static(action: $json['action'] ?? null,
            originalMessageType: $json['original_message_type'] ?? null,
            imageLabels: $json['image_labels'] ?? null,
            messageDetails: $json['message_details'] ?? null,
            result: $json['result'] ?? null
        );
    }
} 
