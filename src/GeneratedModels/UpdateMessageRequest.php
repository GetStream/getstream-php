<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpdateMessageRequest implements JsonSerializable
{
    public function __construct(public ?MessageRequest $message = null,
        public ?bool $skipEnrichUrl = null,
        public ?bool $skipPush = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'message' => $this->message,
            'skip_enrich_url' => $this->skipEnrichUrl,
            'skip_push' => $this->skipPush,
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
        
        return new static(message: $json['message'] ?? null,
            skipEnrichUrl: $json['skip_enrich_url'] ?? null,
            skipPush: $json['skip_push'] ?? null
        );
    }
} 
