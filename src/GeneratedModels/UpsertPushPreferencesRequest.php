<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array<PushPreferenceInput> $preferences
 */
class UpsertPushPreferencesRequest extends BaseModel
{
    public function __construct(
        /** @var array<PushPreferenceInput>|null A list of push preferences for channels, calls, or the user. */
        #[ArrayOf(PushPreferenceInput::class)]
        public ?array $preferences = null, // A list of push preferences for channels, calls, or the user.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
