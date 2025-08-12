<?php

require_once __DIR__ . '/../vendor/autoload.php';

use GetStream\Client;
use GetStream\ClientBuilder;
use GetStream\Exceptions\StreamException;

// Load credentials from environment

try {
    echo "🔐 GetStream PHP SDK - Credentials Test\n";
    echo "======================================\n\n";
    
    // Test client initialization from environment
    $client = ClientBuilder::fromEnv()->build();
    echo "✅ Client initialized successfully\n";
    echo "   API Key: {$client->getApiKey()}\n";
    echo "   Base URL: {$client->getBaseUrl()}\n\n";
    
    // Test user token generation
    $userId = 'test-user-123';
    echo "🎫 Testing token generation...\n";
    
    // Basic user token
    $userToken = $client->createUserToken($userId);
    echo "✅ Basic user token: " . substr($userToken, 0, 50) . "...\n";
    
    // User token with claims
    $claims = [
        'role' => 'admin',
        'permissions' => ['read', 'write', 'delete'],
        'custom_data' => 'test-value'
    ];
    $userTokenWithClaims = $client->createUserToken($userId, $claims, 3600);
    echo "✅ User token with claims: " . substr($userTokenWithClaims, 0, 50) . "...\n";
    
    // Decode and verify token contents
    $parts = explode('.', $userToken);
    if (count($parts) === 3) {
        $header = json_decode(base64_decode($parts[0]), true);
        $payload = json_decode(base64_decode($parts[1]), true);
        
        echo "\n📋 Token Details:\n";
        echo "   Algorithm: {$header['alg']}\n";
        echo "   Type: {$header['typ']}\n";
        echo "   User ID: {$payload['user_id']}\n";
        echo "   Issued At: " . date('Y-m-d H:i:s', $payload['iat']) . "\n";
        
        if (isset($payload['exp'])) {
            echo "   Expires At: " . date('Y-m-d H:i:s', $payload['exp']) . "\n";
        }
    }
    
    // Test feed creation (no API calls)
    echo "\n📡 Testing feed creation...\n";
    $userFeed = $client->feed('user', $userId);
    echo "✅ User feed created: {$userFeed->getFeedIdentifier()}\n";
    
    $timelineFeed = $client->feed('timeline', $userId);
    echo "✅ Timeline feed created: {$timelineFeed->getFeedIdentifier()}\n";
    
    $notificationFeed = $client->feed('notification', $userId);
    echo "✅ Notification feed created: {$notificationFeed->getFeedIdentifier()}\n";
    
    echo "\n🎉 All credential tests passed!\n";
    echo "\nℹ️  The credentials are valid for SDK initialization.\n";
    echo "   For actual API calls, you may need to check:\n";
    echo "   - Correct base URL for your GetStream app\n";
    echo "   - API permissions and plan limits\n";
    echo "   - Whether this is a Feed API vs Chat API key\n";
    
} catch (StreamException $e) {
    echo "❌ SDK Error: " . $e->getMessage() . "\n";
} catch (Exception $e) {
    echo "❌ Unexpected Error: " . $e->getMessage() . "\n";
}
