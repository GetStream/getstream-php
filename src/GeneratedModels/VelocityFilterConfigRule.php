<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class VelocityFilterConfigRule implements JsonSerializable
{
    public function __construct(public ?string $action = null,
        public ?int $banDuration = null,
        public ?string $cascadingAction = null,
        public ?int $cascadingThreshold = null,
        public ?bool $checkMessageContext = null,
        public ?int $fastSpamThreshold = null,
        public ?int $fastSpamTtl = null,
        public ?bool $ipBan = null,
        public ?int $probationPeriod = null,
        public ?bool $shadowBan = null,
        public ?int $slowSpamThreshold = null,
        public ?int $slowSpamTtl = null,
        public ?bool $urlOnly = null,
        public ?int $slowSpamBanDuration = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'action' => $this->action,
            'ban_duration' => $this->banDuration,
            'cascading_action' => $this->cascadingAction,
            'cascading_threshold' => $this->cascadingThreshold,
            'check_message_context' => $this->checkMessageContext,
            'fast_spam_threshold' => $this->fastSpamThreshold,
            'fast_spam_ttl' => $this->fastSpamTtl,
            'ip_ban' => $this->ipBan,
            'probation_period' => $this->probationPeriod,
            'shadow_ban' => $this->shadowBan,
            'slow_spam_threshold' => $this->slowSpamThreshold,
            'slow_spam_ttl' => $this->slowSpamTtl,
            'url_only' => $this->urlOnly,
            'slow_spam_ban_duration' => $this->slowSpamBanDuration,
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
        
        return new static(action: $json['action'] ?? null,
            banDuration: $json['ban_duration'] ?? null,
            cascadingAction: $json['cascading_action'] ?? null,
            cascadingThreshold: $json['cascading_threshold'] ?? null,
            checkMessageContext: $json['check_message_context'] ?? null,
            fastSpamThreshold: $json['fast_spam_threshold'] ?? null,
            fastSpamTtl: $json['fast_spam_ttl'] ?? null,
            ipBan: $json['ip_ban'] ?? null,
            probationPeriod: $json['probation_period'] ?? null,
            shadowBan: $json['shadow_ban'] ?? null,
            slowSpamThreshold: $json['slow_spam_threshold'] ?? null,
            slowSpamTtl: $json['slow_spam_ttl'] ?? null,
            urlOnly: $json['url_only'] ?? null,
            slowSpamBanDuration: $json['slow_spam_ban_duration'] ?? null
        );
    }
} 
