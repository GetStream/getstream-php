# getstream-php

Official PHP server SDK for Stream Chat, Video, Feeds, and Moderation.

- Default branch: `master` (CI also accepts `main`)
- Packagist: `getstream/getstream-php`
- Namespace: `GetStream\` → `src/`
- PHP `^8.1`; CI matrix 8.1 / 8.2 / 8.3 (integration on 8.1 only)
- Version: `composer.json` `"version": "vX.Y.Z"` and `GetStream\Constant::VERSION` in `src/Constant.php`
- Clone sibling of the chat monorepo as `../chat` (required for OpenAPI regen)

## Layout

Generated: `src/Generated/`, `src/GeneratedModels/`, plus generated client surfaces (`ChatClient.php`, `FeedsV3Client.php`, `VideoClient.php`, `ModerationClient.php`, `Webhook.php` as produced by the generator).

Handwritten: `src/Client.php`, `ClientBuilder.php`, `Feed.php`, `Constant.php`, `StreamResponse.php`, `src/Auth/`, `src/Exceptions/`, `src/Http/`, `src/Utils/`, and remaining support code.

- Unit tests: `tests/` excluding group `integration`
- Integration: `tests/Integration/` (paratest, 8 workers)
- Webhook fixtures: `tests/fixtures/webhooks/`

`composer-generated.json` exists alongside `composer.json`; runtime package metadata is `composer.json`.

## Local commands

```bash
cp .env.example .env   # STREAM_API_KEY, STREAM_API_SECRET, STREAM_BASE_URL
make install
make test-unit
make test-integration
make test              # unit + integration
make lint              # phpstan + php-cs-fixer check if installed
make phpstan
make quality           # lint + unit
make generate          # ./generate.sh
./vendor/bin/phpunit --filter TestClassName::testMethodName
```

`php-cs-fixer` is optional locally (Makefile skips if missing). CI `make lint` expects whatever `composer.lock` installed.

## OpenAPI regen

`./generate.sh`:

1. Requires `composer` and `../chat`.
2. `make openapi` in chat, then `./build/chat-manager openapi generate-client --language php --spec ./releases/v2/serverside-api.yaml --output <this repo>`.
3. Webhook fixtures: `generate-webhook-fixtures --output ../getstream-php/tests/fixtures/webhooks` (expects this repo named `getstream-php` next to chat).
4. `sed` patch on `src/GeneratedModels/CallParticipant.php` duplicate `$role` (macOS `sed -i ''`).
5. Optional php-cs-fixer / phpstan; `composer dump-autoload`.

Uses chat’s local spec. Generator is internal.

Additive regen = **minor**. Use `feat: [TICKET] …`, not `feat!:`, unless the PHP API actually breaks.

## CI

`.github/workflows/ci.yml` (`ci`):

- `Validate PR title` (`aslafy-z/conventional-pr-title-action`) on pull_request.
- `🧪 Test & lint` needs that job; environment `ci`; PHP 8.1–8.3.

`.github/workflows/release.yml` (`Release`): merged PR to `main`/`master`, or `workflow_dispatch`.

Vars: `STREAM_API_KEY`, `PACKAGIST_USERNAME`.
Secrets: `STREAM_API_SECRET`, `PACKAGIST_TOKEN`.

Known flakes: live Chat API 503 if the CI app is on a bad shard.

## Release

Tags: `vX.Y.Z`. GitHub Release + Packagist update (no Composer package upload; Packagist tracks GitHub).

- PR title must be conventional **and** include a ticket: `type: [FEEDS-1234] description` (type first so the bump parser still matches).
- `feat:` → minor; `fix:`/`bug:` → patch; `feat!:` / `<type>(scope)!:` → major. `chore:`/`docs:`/`test:` do not release.
- Fallback: Actions → **Release** with `version_bump` and optional `use_current_version` / `prerelease`.
- `scripts/release/bump_version.php` updates `composer.json` and `src/Constant.php`, commits, pushes to the default branch, tags, GitHub release, then POST Packagist `update-package` if token/username are set.

## PR conventions

Conventional title with ticket in the subject, e.g. `feat: [FEEDS-1350] regenerate from OpenAPI`. `docs:` will not publish.
