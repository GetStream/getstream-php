<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $entityCreatorID
 * @property string $entityID
 * @property string $entityType
 * @property string|null $configKey
 * @property string|null $configTeam
 * @property bool|null $testMode
 * @property string|null $userID
 * @property ModerationConfig|null $config
 * @property ModerationPayload|null $moderationPayload
 * @property object|null $options
 * @property UserRequest|null $user
 */
class CheckRequest extends BaseModel
{
    public function __construct(
        public ?string $entityCreatorID = null, // ID of the user who created the entity
        public ?string $entityID = null, // Unique identifier of the entity to moderate
        public ?string $entityType = null, // Type of entity to moderate
        public ?string $configKey = null, // Key of the moderation configuration to use
        public ?string $configTeam = null, // Team associated with the configuration
        public ?bool $testMode = null, // Whether to run moderation in test mode
        public ?string $userID = null,
        public ?ModerationConfig $config = null,
        public ?ModerationPayload $moderationPayload = null,
        public ?object $options = null, // Additional moderation configuration options
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
