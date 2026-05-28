<?php

declare(strict_types=1);

namespace GetStream\Http;

use GetStream\Exceptions\StreamException;
use GetStream\StreamResponse;

/**
 * Interface for HTTP clients used by the GetStream SDK.
 */
interface HttpClientInterface
{
    /**
     * Make an HTTP request.
     *
     * @param string $method  HTTP method (GET, POST, PUT, DELETE, etc.)
     * @param string $url     Full URL to request
     * @param array  $headers Request headers
     * @param mixed  $body    Request body (will be JSON encoded if array)
     * @param array  $options Per-call options. Supported keys:
     *                       - 'timeout' (int|float seconds): overrides the client's RequestTimeout for this single call.
     *                       Implementations MAY accept additional keys but MUST silently ignore unknown ones.
     *
     * @return StreamResponse<mixed>
     *
     * @throws StreamException
     */
    public function request(
        string $method,
        string $url,
        array $headers = [],
        mixed $body = null,
        array $options = []
    ): StreamResponse;
}
