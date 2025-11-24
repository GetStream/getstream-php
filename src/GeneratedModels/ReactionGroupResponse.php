<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * ReactionGroupResponse contains all information about a reaction of the same type.
 */
class ReactionGroupResponse extends BaseModel
{
    public function __construct(
        public ?int $count = null,    // Count is the number of reactions of this type. 
        public ?\DateTime $firstReactionAt = null,    // FirstReactionAt is the time of the first reaction of this type. This is the same also if all reaction of this type are deleted, because if someone will react again with the same type, will be preserved the sorting. 
        public ?\DateTime $lastReactionAt = null,    // LastReactionAt is the time of the last reaction of this type. 
        public ?int $sumScores = null,    // SumScores is the sum of all scores of reactions of this type. Medium allows you to clap articles more than once and shows the sum of all claps from all users. For example, you can send `clap` x5 using `score: 5`. 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
