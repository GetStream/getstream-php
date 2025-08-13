<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Check push request
 */
class CheckPushRequest implements JsonSerializable
{
    public function __construct(public ?string $apnTemplate = null,
        public ?string $eventType = null,
        public ?string $firebaseDataTemplate = null,
        public ?string $firebaseTemplate = null,
        public ?string $messageID = null,
        public ?string $pushProviderName = null,
        public ?string $pushProviderType = null,
        public ?bool $skipDevices = null,
        public ?string $userID = null,
        public ?UserRequest $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'apn_template' => $this->apnTemplate,
            'event_type' => $this->eventType,
            'firebase_data_template' => $this->firebaseDataTemplate,
            'firebase_template' => $this->firebaseTemplate,
            'message_id' => $this->messageID,
            'push_provider_name' => $this->pushProviderName,
            'push_provider_type' => $this->pushProviderType,
            'skip_devices' => $this->skipDevices,
            'user_id' => $this->userID,
            'user' => $this->user,
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
        
        return new static(apnTemplate: $json['apn_template'] ?? null,
            eventType: $json['event_type'] ?? null,
            firebaseDataTemplate: $json['firebase_data_template'] ?? null,
            firebaseTemplate: $json['firebase_template'] ?? null,
            messageID: $json['message_id'] ?? null,
            pushProviderName: $json['push_provider_name'] ?? null,
            pushProviderType: $json['push_provider_type'] ?? null,
            skipDevices: $json['skip_devices'] ?? null,
            userID: $json['user_id'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
