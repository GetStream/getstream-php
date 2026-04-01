# Release Setup Guide

This guide explains how to set up automatic publishing to Packagist using GitHub Actions.

## Prerequisites

1. **Packagist Account**: Create an account at [packagist.org](https://packagist.org)
2. **GitHub Repository**: Ensure this repository is public on GitHub
3. **Packagist API Token**: Generate a token for automatic updates

## Setup Steps

### 1. Create Packagist Account and Submit Package

1. Go to [packagist.org](https://packagist.org) and create an account
2. Click "Submit" and enter your repository URL: `https://github.com/GetStream/getstream-php`
3. Packagist will automatically detect the package name from `composer.json`

### 2. Generate Packagist API Token

1. Go to your Packagist profile: https://packagist.org/profile/
2. Click "Show API Token" in the "API Token" section
3. Copy the token (it looks like: `pkg_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx`)

### 3. Add GitHub Secrets

1. Go to your GitHub repository: https://github.com/GetStream/getstream-php
2. Click "Settings" → "Secrets and variables" → "Actions"
3. Click "New repository secret"
4. Add these secrets:

   - **Name**: `PACKAGIST_TOKEN`
     **Value**: Your Packagist API token from step 2

   - **Name**: `STREAM_API_KEY`
     **Value**: Your Stream API key (for running tests)

   - **Name**: `STREAM_API_SECRET`
     **Value**: Your Stream API secret (for running tests)

### 4. Enable Packagist Auto-Update

1. In your Packagist package page, go to "Settings"
2. Enable "Update by GitHub Hook"
3. Add the GitHub webhook URL: `https://packagist.org/api/github?username=YOUR_USERNAME&packageName=getstream/getstream-php`

## How It Works

### Automatic Publishing

When a PR is merged into `main` or `master`, the release workflow will:

1. Parse the PR title using Conventional Commit style.
   - Required ticket format: `type: [FEEDS-1234] description`
   - Keep `feat`/`fix`/`bug` at the beginning of the title
2. Decide the bump type:
   - `feat:` => minor
   - `fix:` or `bug:` => patch
   - `feat!:` / `fix!:` / `BREAKING CHANGE` => major
3. Update `composer.json` and `src/Constant.php` via `scripts/release/bump_version.php`
4. Commit version files, create a `vX.Y.Z` tag, create a GitHub release
5. Trigger Packagist update

### Creating a Release

1. Open a PR with a Conventional Commit style title, for example:
   - `feat: [FEEDS-1350] add feed search endpoint`
   - `fix: [FEEDS-1402] handle nil reaction id`
   - `feat!: [FEEDS-1410] remove deprecated batch API`
2. Merge the PR into `main` or `master`.
3. GitHub Actions will automatically perform release + Packagist update.

Titles like `chore:`, `docs:`, `test:` do not trigger a release.

### Manual Publishing (if needed)

If automatic publishing fails, you can manually trigger Packagist updates:

```bash
curl -X POST \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer YOUR_PACKAGIST_TOKEN" \
  -d '{"repository":{"url":"https://github.com/GetStream/getstream-php"}}' \
  https://packagist.org/api/update-package?username=YOUR_USERNAME
```

## Troubleshooting

### Common Issues

1. **"Package not found"**: Ensure the package is submitted to Packagist first
2. **"Invalid token"**: Verify the Packagist token is correct
3. **"Tests failing"**: Check that all tests pass before creating a release
4. **"Version already exists"**: Use a new version number

### Checking Status

- **GitHub Actions**: https://github.com/GetStream/getstream-php/actions
- **Packagist Package**: https://packagist.org/packages/getstream/getstream-php
- **Test Installation**: `composer require getstream/getstream-php`

## Security Notes

- Never commit API tokens to the repository
- Use GitHub Secrets for all sensitive data
- Regularly rotate your Packagist token
- Monitor the Actions logs for any security issues




