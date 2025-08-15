<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class DeleteUsersRequest extends BaseModel
{
    public function __construct(
        public ?array $userIds = null,    // IDs of users to delete 
        public ?string $calls = null,    // Calls delete mode. , Affected calls are those that include exactly two members, one of whom is the user being deleted. , * null or empty string - doesn't delete any calls , * soft - marks user's calls and their related data as deleted (soft-delete) , * hard - deletes user's calls and their data completely (hard-delete) 
        public ?string $conversations = null,    // Conversation channels delete mode. , Conversation channel is any channel which only has two members one of which is the user being deleted. , * null or empty string - doesn't delete any conversation channels , * soft - marks all conversation channels as deleted (same effect as Delete Channels with 'hard' option disabled) , * hard - deletes channel and all its data completely including messages (same effect as Delete Channels with 'hard' option enabled) 
        public ?bool $files = null,    // Delete user files. , * false or empty string - doesn't delete any files , * true - deletes all files uploaded by the user, including images and attachments. 
        public ?string $messages = null,    // Message delete mode. , * null or empty string - doesn't delete user messages , * soft - marks all user messages as deleted without removing any related message data , * pruning - marks all user messages as deleted, nullifies message information and removes some message data such as reactions and flags , * hard - deletes messages completely with all related information 
        public ?string $newCallOwnerID = null,
        public ?string $newChannelOwnerID = null,
        public ?string $user = null,    // User delete mode. , * soft - marks user as deleted and retains all user data , * pruning - marks user as deleted and nullifies user information , * hard - deletes user completely. Requires 'hard' option for messages and conversations as well 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
