<?php

declare(strict_types=1);

namespace GetStream\Tests\Integration;

use PHPUnit\Framework\TestCase;

/**
 * @group integration
 */
class ConnectionPoolLogTest extends TestCase
{
    public function testInfoLogContainsAllKnobs(): void
    {
        $tmp = tempnam(sys_get_temp_dir(), 'gs-cp-log-');
        $autoload = realpath(__DIR__ . '/../../vendor/autoload.php');
        $script = <<<PHP
<?php
require_once '{$autoload}';
ini_set('error_log', \$argv[1]);
(new GetStream\\ClientBuilder())
    ->apiKey('k')->apiSecret('s')
    ->maxConnsPerHost(7)->idleTimeout(33)->connectTimeout(2)->requestTimeout(11)
    ->skipEnvLoad()
    ->build();
PHP;
        $scriptPath = tempnam(sys_get_temp_dir(), 'gs-cp-script-') . '.php';
        file_put_contents($scriptPath, $script);

        $cmd = sprintf('php %s %s 2>&1', escapeshellarg($scriptPath), escapeshellarg($tmp));
        exec($cmd, $out, $code);
        self::assertSame(0, $code, implode("\n", $out));

        $log = file_get_contents($tmp);
        self::assertStringContainsString('max_conns_per_host=7', $log);
        self::assertStringContainsString('idle_timeout=33s', $log);
        self::assertStringContainsString('connect_timeout=2s', $log);
        self::assertStringContainsString('request_timeout=11s', $log);
        self::assertStringContainsString('user_http_client=false', $log);

        @unlink($tmp);
        @unlink($scriptPath);
    }

    public function testInfoLogIndicatesEscapeHatchUsed(): void
    {
        $tmp = tempnam(sys_get_temp_dir(), 'gs-cp-log-');
        $autoload = realpath(__DIR__ . '/../../vendor/autoload.php');
        $script = <<<PHP
<?php
require_once '{$autoload}';
ini_set('error_log', \$argv[1]);
\$mock = new class implements GetStream\\Http\\HttpClientInterface {
    public function request(string \$method, string \$url, array \$headers = [], mixed \$body = null, array \$options = []): GetStream\\StreamResponse {
        return new GetStream\\StreamResponse(200, [], null, '');
    }
};
(new GetStream\\ClientBuilder())
    ->apiKey('k')->apiSecret('s')
    ->httpClient(\$mock)
    ->skipEnvLoad()
    ->build();
PHP;
        $scriptPath = tempnam(sys_get_temp_dir(), 'gs-cp-script-') . '.php';
        file_put_contents($scriptPath, $script);

        $cmd = sprintf('php %s %s 2>&1', escapeshellarg($scriptPath), escapeshellarg($tmp));
        exec($cmd, $out, $code);
        self::assertSame(0, $code, implode("\n", $out));

        $log = file_get_contents($tmp);
        self::assertStringContainsString('user_http_client=true', $log);
        self::assertStringContainsString('5 knobs not applied', $log);

        @unlink($tmp);
        @unlink($scriptPath);
    }
}
