<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ModerationDashboardPreferences implements JsonSerializable
{
    public function __construct(public ?bool $flagUserOnFlaggedContent = null,
        public ?bool $mediaQueueBlurEnabled = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'flag_user_on_flagged_content' => $this->flagUserOnFlaggedContent,
            'media_queue_blur_enabled' => $this->mediaQueueBlurEnabled,
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
        
        return new static(flagUserOnFlaggedContent: $json['flag_user_on_flagged_content'] ?? null,
            mediaQueueBlurEnabled: $json['media_queue_blur_enabled'] ?? null
        );
    }
} 
