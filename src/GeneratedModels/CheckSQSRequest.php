<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CheckSQSRequest implements JsonSerializable
{
    public function __construct(public ?string $sqsKey = null,
        public ?string $sqsSecret = null,
        public ?string $sqsUrl = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'sqs_key' => $this->sqsKey,
            'sqs_secret' => $this->sqsSecret,
            'sqs_url' => $this->sqsUrl,
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
        
        return new static(sqsKey: $json['sqs_key'] ?? null,
            sqsSecret: $json['sqs_secret'] ?? null,
            sqsUrl: $json['sqs_url'] ?? null
        );
    }
} 
