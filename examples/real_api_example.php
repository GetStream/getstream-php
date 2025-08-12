<?php

require_once __DIR__ . '/../vendor/autoload.php';

use GetStream\Client;
use GetStream\ClientBuilder;
use GetStream\Exceptions\StreamException;
use GetStream\Exceptions\StreamApiException;

// Load credentials from environment

try {
    echo "🚀 GetStream PHP SDK - Real API Example\n";
    echo "=====================================\n\n";
    
    // Initialize the GetStream client from environment
    $client = ClientBuilder::fromEnv()->build();
    echo "✅ Client initialized successfully\n";
    
    // Generate a unique user ID for this example
    $userId = 'demo-user-' . uniqid();
    echo "👤 Using user ID: {$userId}\n\n";
    
    // Get a user feed
    $userFeed = $client->feed('user', $userId);
    echo "📡 Created feed: {$userFeed->getFeedIdentifier()}\n";
    
    // Create a user token (for client-side authentication)
    $userToken = $client->createUserToken($userId, ['role' => 'user'], 3600);
    echo "🔐 Generated user token: " . substr($userToken, 0, 50) . "...\n\n";
    
    // Add an activity
    echo "📝 Adding an activity...\n";
    $activity = [
        'actor' => 'user:' . $userId,
        'verb' => 'post',
        'object' => 'message:' . uniqid(),
        'message' => 'Hello from GetStream PHP SDK! 🎉',
        'time' => date('c'),
        'extra_data' => [
            'likes' => 0,
            'shares' => 0,
        ]
    ];
    
    $addResponse = $userFeed->addActivity($activity);
    
    if ($addResponse->isSuccessful()) {
        $activityData = $addResponse->getData();
        echo "✅ Activity added successfully!\n";
        echo "   ID: {$activityData['id']}\n";
        echo "   Actor: {$activityData['actor']}\n";
        echo "   Message: {$activityData['message']}\n\n";
    }
    
    // Get activities from the feed
    echo "📖 Retrieving activities...\n";
    $getResponse = $userFeed->getActivities(['limit' => 5]);
    
    if ($getResponse->isSuccessful()) {
        $data = $getResponse->getData();
        $activities = $data['results'] ?? [];
        
        echo "✅ Retrieved " . count($activities) . " activities:\n";
        foreach ($activities as $act) {
            $message = $act['message'] ?? 'No message';
            echo "   - {$act['verb']} by {$act['actor']}: {$message}\n";
        }
        echo "\n";
    }
    
    // Follow another user (demo)
    $targetUserId = 'demo-target-' . uniqid();
    echo "👥 Following user: {$targetUserId}...\n";
    
    $followResponse = $userFeed->follow('user', $targetUserId, 10);
    
    if ($followResponse->isSuccessful()) {
        echo "✅ Successfully followed user:{$targetUserId}\n";
        
        // Get following list
        $followingResponse = $userFeed->getFollowing(['limit' => 10]);
        if ($followingResponse->isSuccessful()) {
            $followingData = $followingResponse->getData();
            $following = $followingData['results'] ?? [];
            echo "📋 Currently following " . count($following) . " feeds\n";
        }
    }
    
    echo "\n🎉 Example completed successfully!\n";
    
} catch (StreamApiException $e) {
    echo "❌ API Error: " . $e->getMessage() . "\n";
    echo "   Status Code: " . $e->getStatusCode() . "\n";
    echo "   Response Body: " . $e->getResponseBody() . "\n";
    
    if ($e->getErrorDetails()) {
        echo "   Error Details: " . json_encode($e->getErrorDetails(), JSON_PRETTY_PRINT) . "\n";
    }
} catch (StreamException $e) {
    echo "❌ SDK Error: " . $e->getMessage() . "\n";
} catch (Exception $e) {
    echo "❌ Unexpected Error: " . $e->getMessage() . "\n";
}
