<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool|null $audio
 * @property bool|null $muteAllUsers
 * @property string|null $mutedByID
 * @property bool|null $screenshare
 * @property bool|null $screenshareAudio
 * @property bool|null $video
 * @property array|null $userIds
 * @property UserRequest|null $mutedBy
 */
class MuteUsersRequest extends BaseModel
{
    public function __construct(
        public ?bool $audio = null,
        public ?bool $muteAllUsers = null,
        public ?string $mutedByID = null,
        public ?bool $screenshare = null,
        public ?bool $screenshareAudio = null,
        public ?bool $video = null,
        public ?array $userIds = null,
        public ?UserRequest $mutedBy = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
