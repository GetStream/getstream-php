<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class XiaomiConfig implements JsonSerializable
{
    public function __construct(public ?bool $disabled = null,
        public ?string $packageName = null,
        public ?string $secret = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'Disabled' => $this->disabled,
            'package_name' => $this->packageName,
            'secret' => $this->secret,
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
        
        return new static(disabled: $json['Disabled'] ?? null,
            packageName: $json['package_name'] ?? null,
            secret: $json['secret'] ?? null
        );
    }
} 
