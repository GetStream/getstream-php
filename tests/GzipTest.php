<?php

declare(strict_types=1);

namespace GetStream\Tests;

use GetStream\Http\GuzzleHttpClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Utils;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Regression tests guarding Guzzle's default `decode_content => true`, which
 * gives transparent gzip advertise + decode. Real negotiation happens in
 * Guzzle's curl layer (not visible to MockHandler), so the tests assert the
 * resolved `decode_content` option and exercise end-to-end via a middleware
 * that mirrors EasyHandle's decoding logic.
 */
class GzipTest extends TestCase
{
    /**
     * Middleware that mirrors GuzzleHttp\Handler\EasyHandle::createResponse:
     * when decode_content is truthy and Content-Encoding indicates gzip,
     * the response body is decompressed and the Content-Encoding header is
     * stripped before reaching the SDK.
     *
     * Letting decode_content default through (= true) is exactly what the
     * SDK relies on; flipping it to false here would skip decoding.
     */
    private static function decodingMiddleware(): callable
    {
        return Middleware::mapResponse(static function (ResponseInterface $response): ResponseInterface {
            // The middleware doesn't see the options array directly through
            // mapResponse, so the more faithful check (decode_content === true)
            // is the dedicated test below. Here we always decode, matching
            // Guzzle's behavior under the default decode_content=true.
            $encoding = strtolower($response->getHeaderLine('Content-Encoding'));
            if ($encoding === 'gzip' || $encoding === 'x-gzip') {
                $raw = (string) $response->getBody();
                $decoded = gzdecode($raw);
                if ($decoded === false) {
                    return $response;
                }
                return $response
                    ->withoutHeader('Content-Encoding')
                    ->withBody(Utils::streamFor($decoded));
            }
            return $response;
        });
    }

    /**
     * Build a GuzzleHttpClient wired to a MockHandler and history capture.
     *
     * @param array<int, Response>          $responses
     * @param array<int, array<string, mixed>> $capturedHistory
     */
    private function makeClient(array $responses, array &$capturedHistory): GuzzleHttpClient
    {
        $mock = new MockHandler($responses);
        $stack = HandlerStack::create($mock);
        $stack->push(self::decodingMiddleware());
        $stack->push(Middleware::history($capturedHistory));

        return new GuzzleHttpClient(['handler' => $stack]);
    }

    /**
     * @test
     *
     * Asserts the SDK does NOT override `decode_content` to false. With the
     * default (true), Guzzle's curl layer sets CURLOPT_ENCODING => '',
     * which advertises `Accept-Encoding: gzip, deflate` on the wire.
     *
     * Middleware::history records the request + the options array Guzzle
     * passes to the handler, after applyOptions() has merged defaults and
     * user config. Any future regression that sets decode_content => false
     * will surface here.
     */
    public function testRequestEnablesGzipDecoding(): void
    {
        $history = [];
        $client = $this->makeClient(
            [new Response(200, ['Content-Type' => 'application/json'], '{"ok":true}')],
            $history,
        );

        $client->request('GET', 'https://example.invalid/ping');

        self::assertCount(1, $history);
        $options = $history[0]['options'];
        self::assertArrayHasKey('decode_content', $options, 'decode_content option must reach the handler');
        self::assertNotFalse(
            $options['decode_content'],
            'SDK must not set decode_content => false; it disables gzip advertise + decode',
        );
        self::assertTrue(
            $options['decode_content'] === true,
            'decode_content must remain at Guzzle default (true) for transparent gzip decoding',
        );

        // Sanity: the request object reaching the handler has no Accept-Encoding
        // header set by Guzzle itself when decode_content === true. Guzzle
        // delegates that to curl (CURLOPT_ENCODING), so middleware-level
        // assertions on the header alone would be misleading. We assert via
        // the option, which is the real toggle.
        /** @var RequestInterface $req */
        $req = $history[0]['request'];
        self::assertNotNull($req);
    }

    /**
     * @test
     *
     * Asserts that when a response arrives gzip-encoded, the SDK's caller
     * sees the decoded JSON, not raw gzip bytes. The decoding-middleware in
     * makeClient stands in for Guzzle's curl/StreamHandler decoding path.
     */
    public function testResponseIsTransparentlyGunzipped(): void
    {
        $expected = ['hello' => 'world', 'n' => 42];
        $plainJson = (string) json_encode($expected);
        $gzipped = gzencode($plainJson);
        self::assertNotFalse($gzipped, 'gzencode must succeed');

        $history = [];
        $client = $this->makeClient(
            [new Response(
                200,
                ['Content-Type' => 'application/json', 'Content-Encoding' => 'gzip'],
                $gzipped,
            )],
            $history,
        );

        $response = $client->request('GET', 'https://example.invalid/ping');

        self::assertSame($expected, $response->getData());
        self::assertSame($plainJson, $response->getRawBody());
    }
}
