<?php

declare(strict_types=1);

namespace GetStream\Auth;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use GetStream\Exceptions\StreamException;

/**
 * JWT token generator for GetStream authentication.
 */
class JWTGenerator
{
    /**
     * Claims a user token's custom claims may not set. The token's identity comes only
     * from the user ID argument (the backend treats a token without a user_id as a server
     * token), and "egress" lets a token join calls without the app's role grants.
     */
    private const RESERVED_USER_CLAIMS = ['user_id', 'server', 'egress'];

    /**
     * The claim names the backend reads from a token. It decodes them with Go's
     * encoding/json, which matches names case-insensitively with Unicode simple folding
     * (so "USER_ID" and "u\u{017F}er_id" both set user_id) and lets the last matching key
     * win, so a custom claim may use only the exact spelling.
     */
    private const BACKEND_CLAIMS = [
        'user_id', 'call_cids', 'channel_cids', 'role', 'egress', 'stream_check_writes',
        'scoped_call_cid', 'iss', 'sub', 'aud', 'exp', 'nbf', 'iat', 'jti', 'server',
    ];

    private string $secret;
    private string $algorithm;

    /**
     * Create a new JWTGenerator.
     *
     * @param string $secret    The API secret
     * @param string $algorithm JWT algorithm (default: HS256)
     */
    public function __construct(string $secret, string $algorithm = 'HS256')
    {
        if (empty($secret)) {
            throw new StreamException('JWT secret cannot be empty');
        }

        $this->secret = $secret;
        $this->algorithm = $algorithm;
    }

    /**
     * Generate a server-side token for API authentication.
     *
     * @param array    $claims     Additional claims to include
     * @param int|null $expiration Token expiration in seconds (null for no expiration)
     *
     * @return string JWT token
     */
    public function generateServerToken(array $claims = [], ?int $expiration = null): string
    {
        $now = time();

        $payload = array_merge([
            'iat' => $now,
            'server' => true,
        ], $claims);

        if ($expiration !== null) {
            $payload['exp'] = $now + $expiration;
        }

        return JWT::encode($payload, $this->secret, $this->algorithm);
    }

    /**
     * Generate a user token for client-side authentication.
     *
     * @param string   $userId     The user ID
     * @param array    $claims     Additional claims to include. They cannot set the reserved
     *                             "user_id", "server" or "egress" claims or use another
     *                             spelling (such as "USER_ID") of a claim the backend reads.
     *                             A custom "iat" must be a positive whole Unix timestamp that
     *                             is not in the future. A custom "exp" is ignored when
     *                             $expiration is given.
     * @param int|null $expiration Token expiration in seconds (null for no expiration)
     *
     * @return string JWT token
     *
     * @throws StreamException If the user ID is empty or $claims sets a claim it may not set
     */
    public function generateUserToken(string $userId, array $claims = [], ?int $expiration = null): string
    {
        if (empty($userId)) {
            throw new StreamException('User ID cannot be empty');
        }

        $now = time();
        self::checkUserClaims($claims, $now);

        $payload = array_merge(['iat' => $now], $claims);

        if ($expiration !== null) {
            $payload['exp'] = $now + $expiration;
        }

        // user_id goes last, so no other key in the payload can come after it.
        $payload['user_id'] = $userId;

        return JWT::encode($payload, $this->secret, $this->algorithm);
    }

    /**
     * @throws StreamException If $claims sets a claim a user token may not set
     */
    private static function checkUserClaims(array $claims, int $now): void
    {
        foreach (array_keys($claims) as $key) {
            $key = (string) $key;
            $folded = self::foldClaimName($key);
            if ($key !== $folded && in_array($folded, self::BACKEND_CLAIMS, true)) {
                throw new StreamException(sprintf('Claim "%s" is read by the backend as "%s"; use "%s"', $key, $folded, $folded));
            }
            if (in_array($key, self::RESERVED_USER_CLAIMS, true)) {
                throw new StreamException(sprintf('Claim "%s" is reserved and cannot be set on a user token', $key));
            }
        }

        // The backend skips per-user token revocation for a token without an iat, and a
        // later iat outlives revocations made before it.
        if (array_key_exists('iat', $claims)) {
            $iat = $claims['iat'];
            $whole = is_int($iat) || (is_float($iat) && is_finite($iat) && floor($iat) === $iat);
            if (!$whole || $iat <= 0 || $iat > $now) {
                throw new StreamException('Claim "iat" must be a positive whole Unix timestamp that is not in the future');
            }
        }
    }

    /**
     * Folds a claim name the way Go's encoding/json matches names. The names in
     * BACKEND_CLAIMS are ASCII, and the only non-ASCII characters that fold to ASCII
     * letters are the Kelvin sign (to k) and the long s (to s).
     */
    private static function foldClaimName(string $name): string
    {
        $lower = strtr($name, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz');

        return str_replace(["\u{212A}", "\u{017F}"], ['k', 's'], $lower);
    }

    /**
     * Verify and decode a JWT token.
     *
     * @param string $token The JWT token to verify
     *
     * @return array Decoded token payload
     *
     * @throws StreamException
     */
    public function verifyToken(string $token): array
    {
        try {
            $decoded = JWT::decode($token, new Key($this->secret, $this->algorithm));

            return (array) $decoded;
        } catch (\Exception $e) {
            throw new StreamException('Invalid JWT token: ' . $e->getMessage(), 0, $e);
        }
    }

    /**
     * Verify a webhook signature.
     *
     * @param string $body      The request body
     * @param string $signature The signature to verify
     *
     * @return bool True if signature is valid
     */
    public function verifyWebhookSignature(string $body, string $signature): bool
    {
        $expectedSignature = hash_hmac('sha256', $body, $this->secret);

        return hash_equals($expectedSignature, $signature);
    }
}
