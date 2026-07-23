# GetStream PHP SDK

A PHP SDK for the GetStream API.

## Installation

Install via Composer:

```bash
composer require getstream/getstream-php
```

## Migrating from stream-chat-php?

If you are currently using [`stream-chat-php`](https://github.com/GetStream/stream-chat-php), we have a detailed migration guide with side-by-side code examples for common Chat use cases. See the [Migration Guide](docs/migration-from-stream-chat-php/README.md).

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

## Connection Pool Tuning

```php
$client = (new GetStream\ClientBuilder())
    ->apiKey($apiKey)
    ->apiSecret($apiSecret)
    ->maxConnsPerHost(5)   // default 5 (per-host concurrency cap, see runtime caveats)
    ->idleTimeout(55)      // default 55s (per-connection lifetime cap, see runtime caveats)
    ->connectTimeout(10)   // default 10s
    ->requestTimeout(30)   // default 30s
    ->build();
```

**Per-call timeout override:**

```php
$response = $client->getHttpClient()->request(
    'GET', $url, $headers, null, ['timeout' => 2]
);
```

Per-call `curl` overrides replace (do not merge with) the client-level `curl` options, since Guzzle unions options shallowly. Only `['timeout' => N]` is documented for per-call use.

**Runtime caveats.** `maxConnsPerHost` and `idleTimeout` are enforced via libcurl's persistent multi-handle pool (`CURLMOPT_MAX_HOST_CONNECTIONS` and `CURLOPT_MAXLIFETIME_CONN`). They take effect only when the SDK client is reused across requests within a single PHP process: long-running runtimes such as Swoole, RoadRunner, ReactPHP, and CLI daemons. Instantiate the SDK client once and reuse it. Under PHP-FPM (and one-shot CLI scripts) the PHP process exits at the end of each request, so there is no cross-request pool to size; the per-call request and connect timeouts still apply. `idleTimeout` requires libcurl 7.80.0 (Nov 2021) or later; pooling still works without it on older builds, just without active lifetime cycling.

**Escape hatch:** Passing your own client via `->httpClient($mine)` skips all 4 knobs; your client is used as-is.

## Retries (opt-in)

Auto-retry is off by default: the client makes exactly one attempt and surfaces errors unchanged. Enable it with `->retry(new RetryConfig(...))`:

```php
$client = GetStream\ClientBuilder::fromEnv()
    ->retry(new RetryConfig(enabled: true, maxAttempts: 3, maxBackoff: 30.0))
    ->build();
```

When enabled, a failed attempt is retried only if all of the following hold: the method is `GET` or `HEAD`; the failure is an HTTP 429 (and not marked `unrecoverable`) or a transport error (`StreamTransportException`); and fewer than `maxAttempts` attempts have been made. Writes (`POST`/`PUT`/`PATCH`/`DELETE`) and any other 4xx/5xx status are never retried.

Backoff honors a parsed `Retry-After` header when present (capped at `maxBackoff`, no jitter); otherwise it uses exponential backoff with full jitter, also capped at `maxBackoff`. On exhaustion, the last attempt's error is thrown unchanged.

**Breaking change from earlier versions:** this SDK previously retried HTTP 429 responses on every request automatically (`maxRetries`, default 3). That always-on behavior is gone; retries are now opt-in via `RetryConfig` and apply only to `GET`/`HEAD`.

## Logging

The SDK emits structured events through a [PSR-3](https://www.php-fig.org/psr/psr-3/) `Psr\Log\LoggerInterface`. No logger is injected by default (`Psr\Log\NullLogger`, a no-op); pass your own via `->logger(...)`:

```php
$client = (new GetStream\ClientBuilder())
    ->apiKey($apiKey)
    ->apiSecret($apiSecret)
    ->logger($myPsr3Logger)
    ->build();
```

Events emitted:

| Event | Level | When |
|---|---|---|
| `client.initialized` | INFO | Once, at construction |
| `http.request.sent` | DEBUG | Before each HTTP attempt |
| `http.response.received` | DEBUG | After any HTTP response, including 4xx/5xx (status codes are data, not a failure) |
| `http.request.failed` | ERROR | Transport failure that surfaces to the caller unchanged (connection reset, timeout, DNS failure, TLS handshake failure) — no HTTP response was received |
| `http.request.failed` | DEBUG | Also emitted, with a `retry.attempt` field, right before each retry backoff sleep (see [Retries](#retries-opt-in)) |

The SDK never sets the logger's minimum level; that's the caller's responsibility.

**Bodies are not logged by default.** Enable with `->logBodies(true)`; this emits one WARN at construction and adds (key-redacted) `http.request.body` / `http.response.body` fields to the DEBUG events. Query values for `api_key`, `api_secret`, `token` and top-level JSON body keys `api_secret`, `token`, `password` are always redacted (case-insensitive for query values), whether or not body logging is on. No headers are ever logged.

```php
$client = (new GetStream\ClientBuilder())
    ->apiKey($apiKey)
    ->apiSecret($apiSecret)
    ->logger($myPsr3Logger)
    ->logBodies(true)
    ->build();
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

> **Note:** When constructing models directly, always use **named arguments** (e.g. `new Message(text: 'hello')`).
> Positional argument usage is not supported and may break across SDK updates as parameter order is not guaranteed.

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

### Release Workflow

Releases are automated when a pull request is merged into `main` or `master`.

- PR titles must follow Conventional Commit format (for example: `feat: ...`, `fix: ...`).
- Ticket prefix is required in the subject: `type: [FEEDS-1234] description`.
- Keep the commit type first so release automation can parse it.
- Version bump is derived from the PR title:
  - `feat:` => minor
  - `fix:` or `bug:` => patch
  - `feat!:` / `fix!:` / `<type>(scope)!:` (the `!` marker) => major
- Non-release types like `chore:`, `docs:`, `test:` do not create a release.
- The release workflow updates `composer.json` and `src/Constant.php`, pushes a tag, creates a GitHub release, and triggers Packagist.

Examples:

- `feat: [FEEDS-1350] add feed retention endpoint`
- `fix: [FEEDS-1402] handle missing reaction id`
- `feat!: [FEEDS-1410] remove deprecated follow API`

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