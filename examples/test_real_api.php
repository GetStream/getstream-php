<?php

require_once __DIR__ . '/../vendor/autoload.php';

use GetStream\ClientBuilder;
use GetStream\Exceptions\StreamException;
use GetStream\Exceptions\StreamApiException;

/**
 * Simple script to test real API calls
 * Usage: php examples/test_real_api.php
 */

try {
    echo "🧪 Testing Real GetStream API Calls\n";
    echo "==================================\n\n";
    
    // Load client from environment
    $client = ClientBuilder::fromEnv()->build();
    echo "✅ Client initialized with API key: {$client->getApiKey()}\n\n";
    
    // Generate test user ID
    $userId = 'api-test-' . uniqid();
    echo "👤 Test user ID: {$userId}\n";
    
    // Test 1: Token generation (no API call)
    echo "\n🔐 Test 1: Token Generation\n";
    $token = $client->createUserToken($userId);
    echo "✅ Token generated: " . substr($token, 0, 50) . "...\n";
    
    // Test 2: Create feed (no API call)
    echo "\n📡 Test 2: Feed Creation\n";
    $userFeed = $client->feed('user', $userId);
    echo "✅ Feed created: {$userFeed->getFeedIdentifier()}\n";
    
    // Test 3: Try to add activity (REAL API CALL)
    echo "\n📝 Test 3: Add Activity (REAL API CALL)\n";
    $activity = [
        'actor' => 'user:' . $userId,
        'verb' => 'test',
        'object' => 'api-test:' . uniqid(),
        'message' => 'Testing GetStream PHP SDK API integration',
        'time' => date('c'),
        'test_run' => true,
    ];
    
    echo "Attempting to add activity...\n";
    
    try {
        $response = $userFeed->addActivity($activity);
        
        if ($response->isSuccessful()) {
            $data = $response->getData();
            echo "✅ SUCCESS! Activity added with ID: {$data['id']}\n";
            echo "   Actor: {$data['actor']}\n";
            echo "   Verb: {$data['verb']}\n";
            echo "   Object: {$data['object']}\n";
        } else {
            echo "❌ FAILED! Status code: {$response->getStatusCode()}\n";
        }
        
    } catch (StreamApiException $e) {
        echo "❌ API ERROR!\n";
        echo "   Message: {$e->getMessage()}\n";
        echo "   Status Code: {$e->getStatusCode()}\n";
        echo "   Response Body: {$e->getResponseBody()}\n";
        
        // Check if it's a common error
        if ($e->getStatusCode() === 403) {
            echo "\n💡 This might be because:\n";
            echo "   - Wrong API credentials\n";
            echo "   - Wrong base URL for your GetStream app\n";
            echo "   - API key is for Chat API instead of Feed API\n";
            echo "   - Account/plan limitations\n";
        }
    }
    
    // Test 4: Try to get activities (REAL API CALL)
    echo "\n📖 Test 4: Get Activities (REAL API CALL)\n";
    
    try {
        $response = $userFeed->getActivities(['limit' => 5]);
        
        if ($response->isSuccessful()) {
            $data = $response->getData();
            $activities = $data['results'] ?? [];
            echo "✅ SUCCESS! Retrieved " . count($activities) . " activities\n";
            
            if (count($activities) > 0) {
                echo "   Latest activity: {$activities[0]['verb']} by {$activities[0]['actor']}\n";
            }
        } else {
            echo "❌ FAILED! Status code: {$response->getStatusCode()}\n";
        }
        
    } catch (StreamApiException $e) {
        echo "❌ API ERROR!\n";
        echo "   Message: {$e->getMessage()}\n";
        echo "   Status Code: {$e->getStatusCode()}\n";
    }
    
    echo "\n🎯 Test Summary:\n";
    echo "   - Token generation: Working ✅\n";
    echo "   - Feed creation: Working ✅\n";
    echo "   - API calls: Check results above\n";
    
} catch (StreamException $e) {
    echo "❌ SDK Error: {$e->getMessage()}\n";
    echo "\n💡 Make sure you have a .env file with:\n";
    echo "   STREAM_API_KEY=your-api-key\n";
    echo "   STREAM_API_SECRET=your-api-secret\n";
} catch (Exception $e) {
    echo "❌ Unexpected Error: {$e->getMessage()}\n";
}
