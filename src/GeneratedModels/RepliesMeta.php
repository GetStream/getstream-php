<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Cursor & depth information for a comment's direct replies. Mirrors Reddit's 'load more replies' semantics.
 */
class RepliesMeta implements JsonSerializable
{
    public function __construct(public ?bool $depthTruncated = null,
        public ?bool $hasMore = null,
        public ?int $remaining = null,
        public ?string $nextCursor = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'depth_truncated' => $this->depthTruncated,
            'has_more' => $this->hasMore,
            'remaining' => $this->remaining,
            'next_cursor' => $this->nextCursor,
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
        
        return new static(depthTruncated: $json['depth_truncated'] ?? null,
            hasMore: $json['has_more'] ?? null,
            remaining: $json['remaining'] ?? null,
            nextCursor: $json['next_cursor'] ?? null
        );
    }
} 
