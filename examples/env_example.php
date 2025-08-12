<?php

require_once __DIR__ . '/../vendor/autoload.php';

use GetStream\ClientBuilder;
use GetStream\Exceptions\StreamException;
use GetStream\Exceptions\StreamApiException;

try {
    echo "🚀 GetStream PHP SDK - Environment Variables Example\n";
    echo "==================================================\n\n";
    
    // Method 1: Create client using environment variables (automatic .env loading)
    echo "📁 Loading credentials from .env file...\n";
    $client = ClientBuilder::fromEnv()->build();
    
    echo "✅ Client created successfully!\n";
    echo "   API Key: {$client->getApiKey()}\n";
    echo "   Base URL: {$client->getBaseUrl()}\n\n";
    
    // Generate a unique user ID for this example
    $userId = 'env-demo-user-' . uniqid();
    echo "👤 Using user ID: {$userId}\n\n";
    
    // Test token generation
    echo "🔐 Testing token generation...\n";
    $userToken = $client->createUserToken($userId, ['role' => 'user'], 3600);
    echo "✅ User token generated: " . substr($userToken, 0, 50) . "...\n";
    
    // Decode and show token details
    $parts = explode('.', $userToken);
    if (count($parts) === 3) {
        $payload = json_decode(base64_decode($parts[1]), true);
        echo "   User ID: {$payload['user_id']}\n";
        echo "   Role: {$payload['role']}\n";
        echo "   Issued At: " . date('Y-m-d H:i:s', $payload['iat']) . "\n";
        if (isset($payload['exp'])) {
            echo "   Expires At: " . date('Y-m-d H:i:s', $payload['exp']) . "\n";
        }
    }
    
    // Test feed creation
    echo "\n📡 Testing feed operations...\n";
    $userFeed = $client->feed('user', $userId);
    echo "✅ User feed: {$userFeed->getFeedIdentifier()}\n";
    
    $timelineFeed = $client->feed('timeline', $userId);
    echo "✅ Timeline feed: {$timelineFeed->getFeedIdentifier()}\n";
    
    $notificationFeed = $client->feed('notification', $userId);
    echo "✅ Notification feed: {$notificationFeed->getFeedIdentifier()}\n";
    
    echo "\n🎉 Environment example completed successfully!\n";
    echo "\nℹ️  To use this example:\n";
    echo "   1. Copy .env.example to .env\n";
    echo "   2. Update .env with your actual GetStream credentials\n";
    echo "   3. Run: php examples/env_example.php\n";
    
} catch (StreamApiException $e) {
    echo "❌ API Error: " . $e->getMessage() . "\n";
    echo "   Status Code: " . $e->getStatusCode() . "\n";
    echo "   Response Body: " . $e->getResponseBody() . "\n";
} catch (StreamException $e) {
    echo "❌ SDK Error: " . $e->getMessage() . "\n";
    echo "\nℹ️  Make sure you have a .env file with valid credentials:\n";
    echo "   STREAM_API_KEY=your-api-key\n";
    echo "   STREAM_API_SECRET=your-api-secret\n";
} catch (Exception $e) {
    echo "❌ Unexpected Error: " . $e->getMessage() . "\n";
}
