<?php

require_once __DIR__ . '/../vendor/autoload.php';

use GetStream\Client;
use GetStream\Exceptions\StreamException;

try {
    // Initialize the GetStream client
    $client = new Client('your-api-key', 'your-api-secret');
    
    // Get a user feed
    $userFeed = $client->feed('user', '123');
    
    // Add an activity (once you have the Activity models generated)
    $activity = [
        'actor' => 'user:123',
        'verb' => 'post',
        'object' => 'message:1',
        'message' => 'Hello, GetStream!',
        'time' => date('c'),
    ];
    
    $response = $userFeed->addActivity($activity);
    echo "Activity added successfully!\n";
    echo "Response: " . json_encode($response->getData(), JSON_PRETTY_PRINT) . "\n";
    
    // Get activities from the feed
    $activities = $userFeed->getActivities(['limit' => 10]);
    echo "Retrieved activities:\n";
    echo json_encode($activities->getData(), JSON_PRETTY_PRINT) . "\n";
    
    // Follow another feed
    $userFeed->follow('timeline', '456');
    echo "Now following timeline:456\n";
    
    // Create a user token
    $userToken = $client->createUserToken('user-123');
    echo "User token: " . $userToken . "\n";
    
} catch (StreamException $e) {
    echo "Error: " . $e->getMessage() . "\n";
    if ($e instanceof \GetStream\Exceptions\StreamApiException) {
        echo "Status Code: " . $e->getStatusCode() . "\n";
        echo "Response Body: " . $e->getResponseBody() . "\n";
    }
}
