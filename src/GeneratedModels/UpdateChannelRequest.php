<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpdateChannelRequest implements JsonSerializable
{
    public function __construct(public ?bool $acceptInvite = null,
        public ?int $cooldown = null,
        public ?bool $hideHistory = null,
        public ?bool $rejectInvite = null,
        public ?bool $skipPush = null,
        public ?string $userID = null,
        public ?array $addMembers = null,
        public ?array $addModerators = null,
        public ?array $assignRoles = null,
        public ?array $demoteModerators = null,
        public ?array $invites = null,
        public ?array $removeMembers = null,
        public ?ChannelInput $data = null,
        public ?MessageRequest $message = null,
        public ?UserRequest $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'accept_invite' => $this->acceptInvite,
            'cooldown' => $this->cooldown,
            'hide_history' => $this->hideHistory,
            'reject_invite' => $this->rejectInvite,
            'skip_push' => $this->skipPush,
            'user_id' => $this->userID,
            'add_members' => $this->addMembers,
            'add_moderators' => $this->addModerators,
            'assign_roles' => $this->assignRoles,
            'demote_moderators' => $this->demoteModerators,
            'invites' => $this->invites,
            'remove_members' => $this->removeMembers,
            'data' => $this->data,
            'message' => $this->message,
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
        
        return new static(acceptInvite: $json['accept_invite'] ?? null,
            cooldown: $json['cooldown'] ?? null,
            hideHistory: $json['hide_history'] ?? null,
            rejectInvite: $json['reject_invite'] ?? null,
            skipPush: $json['skip_push'] ?? null,
            userID: $json['user_id'] ?? null,
            addMembers: $json['add_members'] ?? null,
            addModerators: $json['add_moderators'] ?? null,
            assignRoles: $json['assign_roles'] ?? null,
            demoteModerators: $json['demote_moderators'] ?? null,
            invites: $json['invites'] ?? null,
            removeMembers: $json['remove_members'] ?? null,
            data: $json['data'] ?? null,
            message: $json['message'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
