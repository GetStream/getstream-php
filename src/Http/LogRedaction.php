<?php

declare(strict_types=1);

namespace GetStream\Http;

/** Redaction helpers for the SDK's structured log events. Shallow by design. */
final class LogRedaction
{
    public const REDACTED = '<redacted>';
    private const QUERY_PARAMS = ['api_key', 'api_secret', 'token'];
    private const BODY_KEYS = ['api_secret', 'token', 'password'];

    public static function redactQuery(string $query): string
    {
        if ($query === '') {
            return '';
        }
        parse_str($query, $params);
        foreach ($params as $name => $_value) {
            if (in_array(strtolower((string) $name), self::QUERY_PARAMS, true)) {
                $params[$name] = self::REDACTED;
            }
        }

        return urldecode(http_build_query($params));
    }

    public static function redactJsonBody(?string $body): ?string
    {
        if ($body === null || $body === '') {
            return $body;
        }
        $data = json_decode($body, true);
        if (!is_array($data)) {
            return $body;
        }
        $changed = false;
        foreach (self::BODY_KEYS as $key) {
            if (array_key_exists($key, $data)) {
                $data[$key] = self::REDACTED;
                $changed = true;
            }
        }

        if (!$changed) {
            return $body;
        }
        $encoded = json_encode($data);

        return $encoded !== false ? $encoded : $body;
    }

    /**
     * Redact secret query-parameter values wherever `key=value` appears in a
     * free-form string (e.g. a transport exception message that echoes back
     * the failed request URL). Value runs up to the next `&`, whitespace, or
     * end of string; everything else in the message is left untouched.
     */
    public static function redactMessage(string $message): string
    {
        $keys = implode('|', array_map(
            static fn (string $key): string => preg_quote($key, '/'),
            self::QUERY_PARAMS,
        ));

        return (string) preg_replace('/(' . $keys . ')=[^&\s]*/i', '${1}=' . self::REDACTED, $message);
    }
}
