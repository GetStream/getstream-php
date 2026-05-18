# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added

- Webhook handling spec helpers (CHA-2961): `UnknownEvent` class for forward-compat;
  `gunzipPayload`, `decodeSqsPayload`, `decodeSnsPayload` primitives;
  `verifyAndParseWebhook` HTTP composite; `parseSqs` / `parseSns`
  queue composites (no signature — backend emits no HMAC for queue messages today;
  trust is established via AWS IAM controls on the SQS queue / SNS topic).
  Transparent gzip via magic-byte detection.
- New `GetStream\Webhook` namespace alias (preferred); `GetStream\Generated\Webhook`
  retained as backward-compat alias. PSR-4 shim (`src/Webhook.php`) ensures the
  canonical name resolves on first touch.
- New exception class: `GetStream\Exceptions\InvalidWebhookException` (unified —
  covers signature mismatches, parse failures, decompression errors, etc.).
- New `GetStream\Models\UnknownEvent` class.
- New instance methods on `GetStream\Client`: `verifySignature($body, $signature)`
  and `verifyAndParseWebhook($body, $signature)` — drop the api_secret parameter
  in favor of the client's stored secret. Dual API: static methods remain available.
- New instance methods on `GetStream\Client`: `parseSqs(string $messageBody)`,
  `parseSns(string $notificationBody)` (no signature; AWS IAM).
- Conformance fixture suite under `tests/fixtures/webhooks/`.

### Changed

- No breaking changes.

[Spec](https://www.notion.so/stream-wiki/Server-Side-SDK-Webhook-Handling-Spec-34b6a5d7f9f681e78003c443f227493c)

## [4.0.0] - 2026-03-05

### Breaking Changes

- Type names across all products now follow the OpenAPI spec naming convention: response types are suffixed with `Response`, input types with `Request`. See [MIGRATION_v3_to_v4.md](./MIGRATION_v3_to_v4.md) for the complete rename mapping.
- `Event` (WebSocket envelope type) renamed to `WSEvent`. Base event type renamed from `BaseEvent` to `Event` (with field `type` instead of `T`).
- Event composition changed from monolithic `*Preset` embeds to modular `Has*` types.
- `Pager` renamed to `PagerResponse` and migrated from offset-based to cursor-based pagination (`next`/`prev` tokens).

### Added

- Full product coverage: Chat, Video, Moderation, and Feeds APIs are all supported in a single SDK.
- **Feeds**: activities, feeds, feed groups, follows, comments, reactions, collections, bookmarks, membership levels, feed views and more.
- **Video**: calls, recordings, transcription, closed captions, SFU, call statistics, user feedback analytics, and more.
- **Moderation**: flags, review queue, moderation rules, config, appeals, moderation logs, and more.
- Push notification types, preferences, and templates.
- Webhook support: `WHEvent` envelope class for receiving webhook payloads, utility functions for decoding and verifying webhook signatures, and a full set of individual typed event classes for every event across all products (Chat, Video, Moderation, Feeds) usable as discriminated event types.
- Cursor-based pagination across all list endpoints.

## [3.0.0] - 2026-02-03

## [2.1.0] - 2026-01-15

## [2.0.2] - 2025-12-11

## [2.0.0] - 2025-09-30
