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
     * Claims a user token's custom claims may not set: the token's identity comes only
     * from the user ID argument.
     */
    private const RESERVED_USER_CLAIMS = ['user_id', 'server'];

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
     *                             "user_id" or "server" claims. A custom "exp" is ignored when
     *                             $expiration is given.
     * @param int|null $expiration Token expiration in seconds (null for no expiration)
     *
     * @return string JWT token
     *
     * @throws StreamException If the user ID is empty or $claims sets a reserved claim
     */
    public function generateUserToken(string $userId, array $claims = [], ?int $expiration = null): string
    {
        if (empty($userId)) {
            throw new StreamException('User ID cannot be empty');
        }

        foreach (self::RESERVED_USER_CLAIMS as $claim) {
            if (array_key_exists($claim, $claims)) {
                throw new StreamException(sprintf('Claim "%s" is reserved and cannot be set on a user token', $claim));
            }
        }

        $now = time();

        $payload = array_merge([
            'user_id' => $userId,
            'iat' => $now,
        ], $claims);

        if ($expiration !== null) {
            $payload['exp'] = $now + $expiration;
        }

        return JWT::encode($payload, $this->secret, $this->algorithm);
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
