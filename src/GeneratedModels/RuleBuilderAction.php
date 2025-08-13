<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class RuleBuilderAction implements JsonSerializable
{
    public function __construct(public ?string $type = null,
        public ?BanOptions $banOptions = null,
        public ?FlagContentOptions $flagContentOptions = null,
        public ?FlagUserOptions $flagUserOptions = null,
        public ?BlockContentOptions $removeContentOptions = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => $this->type,
            'ban_options' => $this->banOptions,
            'flag_content_options' => $this->flagContentOptions,
            'flag_user_options' => $this->flagUserOptions,
            'remove_content_options' => $this->removeContentOptions,
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
        
        return new static(type: $json['type'] ?? null,
            banOptions: $json['ban_options'] ?? null,
            flagContentOptions: $json['flag_content_options'] ?? null,
            flagUserOptions: $json['flag_user_options'] ?? null,
            removeContentOptions: $json['remove_content_options'] ?? null
        );
    }
} 
