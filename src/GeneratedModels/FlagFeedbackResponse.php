<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FlagFeedbackResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?string $messageID = null,
        /** @var array<LabelResponse>|null */
        #[ArrayOf(LabelResponse::class)]
        public ?array $labels = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
