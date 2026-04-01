<?php

declare(strict_types=1);

/**
 * Computes next release version from PR title/body and updates version files.
 * Usage:
 *   php scripts/release/bump_version.php --title "feat: add x" --body "..." --output "$GITHUB_OUTPUT"
 *   php scripts/release/bump_version.php --title "feat: add x" --body-file "/tmp/body.txt" --output "$GITHUB_OUTPUT"
 */
final class ReleaseScriptException extends RuntimeException
{
}

function getArgValue(array $argv, string $name, string $default = ''): string
{
    $prefix = '--' . $name . '=';
    foreach ($argv as $index => $value) {
        if (str_starts_with($value, $prefix)) {
            return (string) substr($value, strlen($prefix));
        }

        if ($value === '--' . $name && isset($argv[$index + 1])) {
            return (string) $argv[$index + 1];
        }
    }

    return $default;
}

function runCommand(string $command): string
{
    $result = shell_exec($command);
    return $result === null ? '' : trim($result);
}

function findLatestSemverTag(): string
{
    $tagsRaw = runCommand('git tag --list');
    if ($tagsRaw === '') {
        return '0.0.0';
    }

    $tags = preg_split('/\R/', $tagsRaw) ?: [];
    $versions = [];

    foreach ($tags as $tag) {
        $normalized = ltrim(trim($tag), 'v');
        if (preg_match('/^\d+\.\d+\.\d+$/', $normalized) === 1) {
            $versions[] = $normalized;
        }
    }

    if ($versions === []) {
        return '0.0.0';
    }

    usort($versions, 'version_compare');
    return end($versions) ?: '0.0.0';
}

function determineBumpType(string $title, string $body): string
{
    $title = trim($title);
    $body = trim($body);

    if (preg_match('/BREAKING[ -]CHANGE/i', $body) === 1) {
        return 'major';
    }

    if (preg_match('/^([a-z]+)(\([^)]+\))?(!)?:/i', $title, $matches) !== 1) {
        return 'none';
    }

    $type = strtolower($matches[1]);
    $isBreakingTitle = isset($matches[3]) && $matches[3] === '!';
    if ($isBreakingTitle) {
        return 'major';
    }

    if ($type === 'feat') {
        return 'minor';
    }

    if ($type === 'fix' || $type === 'bug') {
        return 'patch';
    }

    return 'none';
}

function incrementVersion(string $version, string $bump): string
{
    $parts = array_map('intval', explode('.', $version));
    $major = $parts[0] ?? 0;
    $minor = $parts[1] ?? 0;
    $patch = $parts[2] ?? 0;

    if ($bump === 'major') {
        $major++;
        $minor = 0;
        $patch = 0;
    } elseif ($bump === 'minor') {
        $minor++;
        $patch = 0;
    } elseif ($bump === 'patch') {
        $patch++;
    }

    return sprintf('%d.%d.%d', $major, $minor, $patch);
}

function updateComposerVersion(string $path, string $version): void
{
    $raw = file_get_contents($path);
    if ($raw === false) {
        throw new ReleaseScriptException('Could not read composer.json');
    }

    $updated = preg_replace(
        '/"version":\s*"[^"]*"/',
        '"version": "v' . $version . '"',
        $raw,
        1
    );

    if ($updated === null || $updated === $raw) {
        throw new ReleaseScriptException('Could not update version in composer.json');
    }

    file_put_contents($path, $updated);
}

function updateConstantVersion(string $path, string $version): void
{
    $raw = file_get_contents($path);
    if ($raw === false) {
        throw new ReleaseScriptException('Could not read Constant.php');
    }

    $updated = preg_replace(
        "/public const VERSION = '[^']+';/",
        "public const VERSION = '" . $version . "';",
        $raw,
        1
    );

    if ($updated === null) {
        throw new ReleaseScriptException('Regex failed while updating Constant.php');
    }

    file_put_contents($path, $updated);
}

function writeOutputs(string $outputPath, array $values): void
{
    if ($outputPath === '') {
        foreach ($values as $key => $value) {
            echo $key . '=' . $value . PHP_EOL;
        }
        return;
    }

    $lines = [];
    foreach ($values as $key => $value) {
        $lines[] = $key . '=' . $value;
    }
    file_put_contents($outputPath, implode(PHP_EOL, $lines) . PHP_EOL, FILE_APPEND);
}

function resolveBody(array $argv): string
{
    $bodyFile = getArgValue($argv, 'body-file');
    if ($bodyFile !== '') {
        $raw = file_get_contents($bodyFile);
        if ($raw === false) {
            throw new ReleaseScriptException('Could not read body-file');
        }
        return $raw;
    }

    return getArgValue($argv, 'body');
}

$title = getArgValue($argv, 'title');
$body = resolveBody($argv);
$outputPath = getArgValue($argv, 'output');

$bump = determineBumpType($title, $body);
if ($bump === 'none') {
    writeOutputs($outputPath, [
        'should_release' => 'false',
        'bump' => 'none',
    ]);
    exit(0);
}

$currentVersion = findLatestSemverTag();
$nextVersion = incrementVersion($currentVersion, $bump);

updateComposerVersion('composer.json', $nextVersion);
updateConstantVersion('src/Constant.php', $nextVersion);

writeOutputs($outputPath, [
    'should_release' => 'true',
    'bump' => $bump,
    'previous_version' => $currentVersion,
    'version' => $nextVersion,
    'tag' => 'v' . $nextVersion,
]);
