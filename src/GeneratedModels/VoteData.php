<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class VoteData implements JsonSerializable
{
    public function __construct(public ?string $answerText = null,
        public ?string $optionID = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'answer_text' => $this->answerText,
            'option_id' => $this->optionID,
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
        
        return new static(answerText: $json['answer_text'] ?? null,
            optionID: $json['option_id'] ?? null
        );
    }
} 
