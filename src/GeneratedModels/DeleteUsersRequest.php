<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class DeleteUsersRequest extends BaseModel
{
    public function __construct(
        public ?array $userIds = null, // IDs of users to delete
        public ?string $user = null, // User delete mode., * soft - marks user as deleted and retains all user data, * pruning - marks user as deleted and nullifies user information, * hard - deletes user completely. Requires 'hard' option for messages, and 'hard' or 'keep' option for conversations
        public ?string $messages = null, // Message delete mode., * null or empty string - doesn't delete user messages, * soft - marks all user messages as deleted without removing any related message data, * pruning - marks all user messages as deleted, nullifies message information and removes some message data such as reactions and flags, * hard - deletes messages completely with all related information
        public ?string $conversations = null, // Conversation channels delete mode., Conversation channel is any channel which only has two members one of which is the user being deleted., * null or empty string - doesn't delete any conversation channels, unless user is 'hard', in which case it defaults to 'hard', * soft - marks all conversation channels as deleted (same effect as Delete Channels with 'hard' option disabled), * hard - deletes channel and all its data completely including messages (same effect as Delete Channels with 'hard' option enabled), * keep - doesn't delete any conversation channels. Use it with user 'hard', where null or empty string defaults to 'hard'
        public ?string $calls = null, // Calls delete mode., Affected calls are those that include exactly two members, one of whom is the user being deleted., * null or empty string - doesn't delete any calls, * soft - marks user's calls and their related data as deleted (soft-delete), * hard - deletes user's calls and their data completely (hard-delete)
        public ?bool $files = null, // Delete user files., * false or empty string - doesn't delete any files, * true - deletes all files uploaded by the user, including images and attachments.
        public ?string $newChannelOwnerID = null,
        public ?string $newCallOwnerID = null,
        public ?array $excludeChannelCids = null, // Channel CIDs (type:id) to keep intact. Applies to every user in user_ids., Channels listed here keep their rows, messages, memberships, thread participation and reactions, and are not deleted as conversations,, whatever the messages and conversations modes say. Everything else is deleted as usual., * Maximum 1000 entries, duplicates included. Duplicates are then ignored., * Cannot be combined with user 'hard' (400)., * Cannot be combined with files true (400)., * A malformed CID is rejected with 400., * A well-formed CID that does not exist is accepted and excludes nothing., * Scheduled messages are not channel-scoped: with user 'pruning' the user's scheduled messages are still removed in every channel, excluded ones included., * The user.deleted event does not list the kept channels. A consumer that mirrors deletions must skip them itself.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
