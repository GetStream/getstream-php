<?php

declare(strict_types=1);

namespace GetStream\Exceptions;

/**
 * Thrown when a network-layer failure prevents an HTTP response from being
 * received (connection reset, timeout, TLS handshake failure, DNS failure).
 *
 * `getErrorType()` returns one of the canonical enum values listed below; the
 * underlying transport error is accessible via `getPrevious()`.
 */
class StreamTransportException extends StreamException
{
    public const ERROR_TYPE_CONNECTION_RESET = 'connection_reset';
    public const ERROR_TYPE_TIMEOUT = 'timeout';
    public const ERROR_TYPE_DNS_FAILURE = 'dns_failure';
    public const ERROR_TYPE_TLS_HANDSHAKE_FAILED = 'tls_handshake_failed';
    public const ERROR_TYPE_UNKNOWN = 'unknown';

    private string $errorType;

    public function __construct(
        string $message,
        string $errorType,
        ?\Throwable $previous = null,
    ) {
        parent::__construct($message, 0, $previous);
        $this->errorType = $errorType;
    }

    /**
     * Canonical transport-error enum. One of:
     *   connection_reset | timeout | dns_failure | tls_handshake_failed | unknown
     */
    public function getErrorType(): string
    {
        return $this->errorType;
    }
}
