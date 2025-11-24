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
     * @param array    $claims     Additional claims to include
     * @param int|null $expiration Token expiration in seconds (null for no expiration)
     *
     * @return string JWT token
     */
    public function generateUserToken(string $userId, array $claims = [], ?int $expiration = null): string
    {
        if (empty($userId)) {
            throw new StreamException('User ID cannot be empty');
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
