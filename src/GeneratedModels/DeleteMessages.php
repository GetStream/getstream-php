<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * How a ban or user deletion treats the user's messages.
 */
class DeleteMessages
{
    public const HARD = 'hard';
    public const PRUNING = 'pruning';
    public const SOFT = 'soft';
}
