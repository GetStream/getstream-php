<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ListCommandsResponse extends BaseModel
{
    public function __construct(
        /** @var array<Command>|null */
        #[ArrayOf(Command::class)]
        public ?array $commands = null, // List of commands
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
