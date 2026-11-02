<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * A fork of an agent channel
 */
class ChannelForkSummary extends BaseModel
{
    public function __construct(
        public ?string $channelCid = null, // CID of the fork
        public ?string $sourceChannelCid = null, // CID of the channel the fork was copied from
        public ?string $sourceMessageID = null, // ID of the message of the source channel the fork was made at
        public ?string $status = null, // `completed` once every message is copied. `backfilling` while a background task copies the history older than the newest page; the fork is usable meanwhile, and the newest messages, which an agent reads, are normally already there. The request reads at most 1,000 source messages: when those are mostly deleted, shadowed or replies shown in the channel, it copies fewer, at least the message the fork is made at, and the task copies the rest. `failed` when the copy failed for good (see `failed_reason`): nothing more is copied, the fork keeps what it holds and is usable, and it no longer counts toward the source's fork limit
        public ?int $copiedMessageCount = null, // Number of messages copied into the fork, once completed. On a failed fork, the number of messages of its history, newest first, copied before the copy failed; the fork can hold a few more
        public ?bool $truncated = null, // True, once completed, when the source held more than 10,000 messages up to the fork point: the fork holds the newest 10,000 of them
        public ?string $oldestSourceMessageID = null, // ID, in the source channel, of the oldest message a truncated fork copied. The fork holds no older source message; replies of the oldest copied messages may also have been left out
        public ?string $failedReason = null, // Why the copy of a failed fork failed: `fork_message_id_taken` (the ID a message is copied under is held by another message; fork into another channel ID) or `message_too_large` (a source message is over a size limit of agent channels: its text, custom data or attachments)
        public ?string $taskID = null, // ID of the task copying the older history of a backfilling fork
        public ?\DateTime $createdAt = null, // Date/time of the fork
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
