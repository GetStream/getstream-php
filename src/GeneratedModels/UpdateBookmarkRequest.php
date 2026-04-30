<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpdateBookmarkRequest extends BaseModel
{
    public function __construct(
        public ?string $folderID = null, // ID of the folder containing the bookmark
        public ?string $newFolderID = null, // Move the bookmark to this folder (empty string removes the folder)
        public ?AddFolderRequest $newFolder = null,
        public ?object $custom = null, // Custom data for the bookmark
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
