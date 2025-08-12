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

```php
<?php
require_once 'vendor/autoload.php';

use GetStream\ClientBuilder;

$client = ClientBuilder::fromEnv()->build();
$feed = $client->feed('user', 'john-doe');
```