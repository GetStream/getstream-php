<?php

declare(strict_types=1);

namespace GetStream\Exceptions;

use Exception;

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
     * @param \Exception|null $previous Previous exception
     */
    public function __construct(string $message = '', int $code = 0, ?\Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
