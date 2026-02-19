<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class MuteUsersRequest extends BaseModel
{
    public function __construct(
        public ?UserRequest $mutedBy = null,
        public ?bool $muteAllUsers = null,
        public ?array $userIds = null,
        public ?bool $audio = null,
        public ?bool $video = null,
        public ?bool $screenshare = null,
        public ?bool $screenshareAudio = null,
        public ?string $mutedByID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
