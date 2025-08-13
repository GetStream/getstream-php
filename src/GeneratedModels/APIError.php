<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class APIError implements JsonSerializable
{
    public function __construct(public ?int $code = null,
        public ?string $duration = null,
        public ?string $message = null,
        public ?string $moreInfo = null,
        public ?int $statusCode = null,
        public ?array $details = null,
        public ?bool $unrecoverable = null,
        public ?array $exceptionFields = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'code' => $this->code,
            'duration' => $this->duration,
            'message' => $this->message,
            'more_info' => $this->moreInfo,
            'StatusCode' => $this->statusCode,
            'details' => $this->details,
            'unrecoverable' => $this->unrecoverable,
            'exception_fields' => $this->exceptionFields,
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
        
        return new static(code: $json['code'] ?? null,
            duration: $json['duration'] ?? null,
            message: $json['message'] ?? null,
            moreInfo: $json['more_info'] ?? null,
            statusCode: $json['StatusCode'] ?? null,
            details: $json['details'] ?? null,
            unrecoverable: $json['unrecoverable'] ?? null,
            exceptionFields: $json['exception_fields'] ?? null
        );
    }
} 
