<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ModerationV2Response implements JsonSerializable
{
    public function __construct(public ?string $action = null,
        public ?string $originalText = null,
        public ?string $blocklistMatched = null,
        public ?bool $platformCircumvented = null,
        public ?string $semanticFilterMatched = null,
        public ?array $imageHarms = null,
        public ?array $textHarms = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'action' => $this->action,
            'original_text' => $this->originalText,
            'blocklist_matched' => $this->blocklistMatched,
            'platform_circumvented' => $this->platformCircumvented,
            'semantic_filter_matched' => $this->semanticFilterMatched,
            'image_harms' => $this->imageHarms,
            'text_harms' => $this->textHarms,
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
            originalText: $json['original_text'] ?? null,
            blocklistMatched: $json['blocklist_matched'] ?? null,
            platformCircumvented: $json['platform_circumvented'] ?? null,
            semanticFilterMatched: $json['semantic_filter_matched'] ?? null,
            imageHarms: $json['image_harms'] ?? null,
            textHarms: $json['text_harms'] ?? null
        );
    }
} 
