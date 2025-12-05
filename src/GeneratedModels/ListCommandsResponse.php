<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<Command> $commands
 */
class ListCommandsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<Command>|null List of commands */
        #[ArrayOf(Command::class)]
        public ?array $commands = null, // List of commands
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
