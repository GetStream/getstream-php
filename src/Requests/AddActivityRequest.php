<?php

declare(strict_types=1);

namespace GetStream\Requests;

class AddActivityRequest implements \JsonSerializable
{
    public function __construct(
        public string $type,
        public array $fids,
        public ?string $expiresAt = null,
        public ?string $id = null,
        public ?string $parentId = null,
        public ?string $pollId = null,
        public ?string $text = null,
        public ?string $userId = null,
        public ?string $visibility = null,
        public ?string $visibilityTag = null,
        public array $attachments = [],
        public array $filterTags = [],
        public array $interestTags = [],
        public array $mentionedUserIds = [],
        public array $custom = []
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => $this->type,
            'fids' => $this->fids,
            'expires_at' => $this->expiresAt,
            'id' => $this->id,
            'parent_id' => $this->parentId,
            'poll_id' => $this->pollId,
            'text' => $this->text,
            'user_id' => $this->userId,
            'visibility' => $this->visibility,
            'visibility_tag' => $this->visibilityTag,
            'attachments' => $this->attachments ?: null,
            'filter_tags' => $this->filterTags ?: null,
            'interest_tags' => $this->interestTags ?: null,
            'mentioned_user_ids' => $this->mentionedUserIds ?: null,
            'custom' => $this->custom ?: null,
        ], static fn ($v) => $v !== null);
    }

    public function toArray(): array
    {
        return $this->jsonSerialize();
    }
}
