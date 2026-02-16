<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class AddCommentsBatchRequest extends BaseModel
{
    public function __construct(
        /** @var array<AddCommentRequest>|null */
        #[ArrayOf(AddCommentRequest::class)]
        public ?array $comments = null, // List of comments to add
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
