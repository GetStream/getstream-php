# GetStream PHP SDK

A PHP SDK for the GetStream API.

## Installation

Install via Composer:

```bash
composer require getstream/stream-php
```

## Configuration

Copy `.env.example` to `.env` and configure:

```bash
cp .env.example .env
```

Required environment variables:

```env
STREAM_API_KEY=your_api_key_here
STREAM_API_SECRET=your_api_secret_here
STREAM_BASE_URL=https://chat.stream-io-api.com
```

## Code Generation

Generate API methods from OpenAPI spec:

```bash
./generate.sh
```

## Testing

Run tests:

```bash
# Run all tests
make test

# Run unit tests only
make test-unit

# Run integration tests (requires API credentials)
make test-integration
```

## Usage

### Basic Setup

```php
<?php
require_once 'vendor/autoload.php';

use GetStream\ClientBuilder;

$client = ClientBuilder::fromEnv()->build();
$feed = $client->feed('user', 'john-doe');
```

### Working with Activities

```php
use GetStream\GeneratedModels\AddActivityRequest;

// Create an activity
$activity = new AddActivityRequest(
    actor: 'user:john',
    verb: 'post',
    object: 'message:123',
    text: 'Hello World!'
);

$response = $client->addActivity($activity);

// Access response data directly
$createdActivity = $response->activity;
echo "Activity ID: " . $createdActivity->id;

// Or access HTTP metadata
echo "Status: " . $response->getStatusCode();
echo "Duration: " . $response->duration;
```

## Models

### Automatic JSON Parsing

Generated models automatically handle JSON parsing and serialization:

```php
// Models parse JSON based on constructor types
$response = $client->addActivity($request);
$activity = $response->activity;  // Fully typed object
```

### Custom JSON Key Mapping

Override field names using the `JsonKey` attribute:

```php
use GetStream\GeneratedModels\JsonKey;

class CustomModel extends BaseModel {
    public function __construct(
        #[JsonKey('fids')]
        public ?array $feedIds = null,    // Maps to "fids" instead of "feed_ids"
    ) {}
}
```

### Response Access

```php
$response = $client->addActivity($request);

// Direct access
$activity = $response->activity;

// HTTP metadata
$statusCode = $response->getStatusCode();
$duration = $response->duration;
```

## Code Generation

Generate models and clients from OpenAPI spec:

```bash
./generate.sh
```

This creates clean, typed models with automatic JSON handling - no boilerplate code needed.

## Development

### Linting and Code Quality

```bash
# Run all available linting checks
make lint

# Run PHPStan static analysis only
make phpstan

# Fix code style issues (requires php-cs-fixer)
make cs-fix

# Run comprehensive quality checks (lint + tests)
make quality
```

### Testing

```bash
# Run all tests
make test

# Run unit tests only
make test-unit

# Run integration tests
make test-integration
```