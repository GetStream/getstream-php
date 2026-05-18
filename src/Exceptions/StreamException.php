<?php

declare(strict_types=1);

namespace GetStream\Exceptions;

/**
 * Base exception for GetStream SDK.
 */
class StreamException extends \Exception
{
    /**
     * Create a new StreamException.
     *
     * @param string          $message  The exception message
     * @param int             $code     The exception code
     * @param \Throwable|null $previous Previous Throwable (any Error or Exception)
     */
    public function __construct(string $message = '', int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
