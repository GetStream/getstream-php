<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpdateBookmarkRequest implements JsonSerializable
{
    public function __construct(public ?string $folderID = null,
        public ?string $newFolderID = null,
        public ?string $userID = null,
        public ?object $custom = null,
        public ?AddFolderRequest $newFolder = null,
        public ?UserRequest $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'folder_id' => $this->folderID,
            'new_folder_id' => $this->newFolderID,
            'user_id' => $this->userID,
            'custom' => $this->custom,
            'new_folder' => $this->newFolder,
            'user' => $this->user,
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
        
        return new static(folderID: $json['folder_id'] ?? null,
            newFolderID: $json['new_folder_id'] ?? null,
            userID: $json['user_id'] ?? null,
            custom: $json['custom'] ?? null,
            newFolder: $json['new_folder'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
