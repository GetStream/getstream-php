<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FeedGroup implements JsonSerializable
{
    public function __construct(public ?int $aggregationVersion = null,
        public ?int $appPK = null,
        public ?\DateTime $createdAt = null,
        public ?string $defaultVisibility = null,
        public ?string $iD = null,
        public ?\DateTime $updatedAt = null,
        public ?array $activityProcessors = null,
        public ?array $activitySelectors = null,
        public ?object $custom = null,
        public ?\DateTime $deletedAt = null,
        public ?\DateTime $lastFeedGetAt = null,
        public ?AggregationConfig $aggregation = null,
        public ?NotificationConfig $notification = null,
        public ?RankingConfig $ranking = null,
        public ?StoriesConfig $stories = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'AggregationVersion' => $this->aggregationVersion,
            'AppPK' => $this->appPK,
            'created_at' => $this->createdAt,
            'DefaultVisibility' => $this->defaultVisibility,
            'ID' => $this->iD,
            'updated_at' => $this->updatedAt,
            'ActivityProcessors' => $this->activityProcessors,
            'ActivitySelectors' => $this->activitySelectors,
            'Custom' => $this->custom,
            'DeletedAt' => $this->deletedAt,
            'LastFeedGetAt' => $this->lastFeedGetAt,
            'Aggregation' => $this->aggregation,
            'Notification' => $this->notification,
            'Ranking' => $this->ranking,
            'Stories' => $this->stories,
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
        
        return new static(aggregationVersion: $json['AggregationVersion'] ?? null,
            appPK: $json['AppPK'] ?? null,
            createdAt: $json['created_at'] ?? null,
            defaultVisibility: $json['DefaultVisibility'] ?? null,
            iD: $json['ID'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            activityProcessors: $json['ActivityProcessors'] ?? null,
            activitySelectors: $json['ActivitySelectors'] ?? null,
            custom: $json['Custom'] ?? null,
            deletedAt: $json['DeletedAt'] ?? null,
            lastFeedGetAt: $json['LastFeedGetAt'] ?? null,
            aggregation: $json['Aggregation'] ?? null,
            notification: $json['Notification'] ?? null,
            ranking: $json['Ranking'] ?? null,
            stories: $json['Stories'] ?? null
        );
    }
} 
