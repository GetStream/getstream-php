<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CheckRequest extends BaseModel
{
    public function __construct(
        public ?string $entityType = null, // Type of entity to moderate
        public ?string $entityID = null, // Unique identifier of the entity to moderate
        public ?string $entityCreatorID = null, // ID of the user who created the entity
        public ?ModerationPayload $moderationPayload = null,
        public ?string $configKey = null, // Key of the moderation configuration to use
        public ?string $configTeam = null, // Team associated with the configuration
        public ?object $options = null, // Additional moderation configuration options
        public ?bool $testMode = null, // Whether to run moderation in test mode
        public ?ModerationConfig $config = null,
        public ?\DateTime $contentPublishedAt = null, // Original timestamp when the content was produced (for correlating flagged content with source video timeline)
        /** @deprecated */
        public ?string $countryCode = null, // ISO 3166-1 alpha-2 country the content is aimed at (e.g. US, DE). Ignored when country_codes is set, but an invalid value is still rejected with 400.
        public ?string $userID = null,
        public ?UserRequest $user = null, // User request object
        public ?array $countryCodes = null, // ISO 3166-1 alpha-2 countries the content is aimed at (e.g. US, DE), up to 300. The first is the primary country, which AI text providers receive as country context. Takes precedence over country_code.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
