<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Request to provide feedback on an activity
 */
class ActivityFeedbackRequest implements JsonSerializable
{
    public function __construct(public ?bool $hide = null,
        public ?bool $muteUser = null,
        public ?string $reason = null,
        public ?bool $report = null,
        public ?bool $showLess = null,
        public ?string $userID = null,
        public ?UserRequest $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'hide' => $this->hide,
            'mute_user' => $this->muteUser,
            'reason' => $this->reason,
            'report' => $this->report,
            'show_less' => $this->showLess,
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
        
        return new static(hide: $json['hide'] ?? null,
            muteUser: $json['mute_user'] ?? null,
            reason: $json['reason'] ?? null,
            report: $json['report'] ?? null,
            showLess: $json['show_less'] ?? null,
            userID: $json['user_id'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
