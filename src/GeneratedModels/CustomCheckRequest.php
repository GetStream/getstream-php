<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $entityID
 * @property string $entityType
 * @property array<CustomCheckFlag> $flags
 * @property string|null $entityCreatorID
 * @property string|null $userID
 * @property ModerationPayload|null $moderationPayload
 * @property UserRequest|null $user
 */
class CustomCheckRequest extends BaseModel
{
    public function __construct(
        public ?string $entityID = null, // Unique identifier of the entity
        public ?string $entityType = null, // Type of entity to perform custom check on
        /** @var array<CustomCheckFlag>|null List of custom check flags (1-10 flags required) */
        #[ArrayOf(CustomCheckFlag::class)]
        public ?array $flags = null, // List of custom check flags (1-10 flags required)
        public ?string $entityCreatorID = null, // ID of the user who created the entity (required for non-message entities)
        public ?string $userID = null,
        public ?ModerationPayload $moderationPayload = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
