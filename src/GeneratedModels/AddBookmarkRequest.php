<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $folderID
 * @property string|null $userID
 * @property object|null $custom
 * @property AddFolderRequest|null $newFolder
 * @property UserRequest|null $user
 */
class AddBookmarkRequest extends BaseModel
{
    public function __construct(
        public ?string $folderID = null, // ID of the folder to add the bookmark to
        public ?string $userID = null,
        public ?object $custom = null, // Custom data for the bookmark
        public ?AddFolderRequest $newFolder = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
