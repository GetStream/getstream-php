<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CheckRequest extends BaseModel
{
    public function __construct(
        public ?string $configKey = null,    // Key of the moderation configuration to use 
        public ?string $entityCreatorID = null,    // ID of the user who created the entity 
        public ?string $entityID = null,    // Unique identifier of the entity to moderate 
        public ?string $entityType = null,    // Type of entity to moderate 
        public ?string $configTeam = null,    // Team associated with the configuration 
        public ?bool $testMode = null,    // Whether to run moderation in test mode 
        public ?string $userID = null,
        public ?ModerationPayload $moderationPayload = null,
        public ?object $options = null,    // Additional moderation configuration options 
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
