<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class MarkReviewedRequest implements JsonSerializable
{
    public function __construct(public ?int $contentToMarkAsReviewedLimit = null,
        public ?bool $disableMarkingContentAsReviewed = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'content_to_mark_as_reviewed_limit' => $this->contentToMarkAsReviewedLimit,
            'disable_marking_content_as_reviewed' => $this->disableMarkingContentAsReviewed,
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
        
        return new static(contentToMarkAsReviewedLimit: $json['content_to_mark_as_reviewed_limit'] ?? null,
            disableMarkingContentAsReviewed: $json['disable_marking_content_as_reviewed'] ?? null
        );
    }
} 
