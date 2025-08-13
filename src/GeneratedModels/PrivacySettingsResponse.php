<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class PrivacySettingsResponse implements JsonSerializable
{
    public function __construct(public ?ReadReceiptsResponse $readReceipts = null,
        public ?TypingIndicatorsResponse $typingIndicators = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'read_receipts' => $this->readReceipts,
            'typing_indicators' => $this->typingIndicators,
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
        
        return new static(readReceipts: $json['read_receipts'] ?? null,
            typingIndicators: $json['typing_indicators'] ?? null
        );
    }
} 
