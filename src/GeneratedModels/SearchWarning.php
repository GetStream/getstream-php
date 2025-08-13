<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class SearchWarning implements JsonSerializable
{
    public function __construct(public ?int $warningCode = null,
        public ?string $warningDescription = null,
        public ?int $channelSearchCount = null,
        public ?array $channelSearchCids = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'warning_code' => $this->warningCode,
            'warning_description' => $this->warningDescription,
            'channel_search_count' => $this->channelSearchCount,
            'channel_search_cids' => $this->channelSearchCids,
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
        
        return new static(warningCode: $json['warning_code'] ?? null,
            warningDescription: $json['warning_description'] ?? null,
            channelSearchCount: $json['channel_search_count'] ?? null,
            channelSearchCids: $json['channel_search_cids'] ?? null
        );
    }
} 
