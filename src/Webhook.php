<?php

namespace GetStream;

/**
 * GetStream\Webhook is the canonical name for the webhook helper.
 * For backward compatibility it is also available under
 * GetStream\Generated\Webhook. Both refer to the same class via class_alias.
 *
 * This file exists so the PSR-4 autoloader, which maps GetStream\\ -> src/,
 * can resolve the canonical name: a bare reference to \GetStream\Webhook
 * triggers a lookup for src/Webhook.php (this file), which in turn loads
 * the generated class file and runs the class_alias declaration at its
 * bottom. Without this shim the canonical name would only resolve once
 * GetStream\Generated\Webhook had already been loaded for some other
 * reason — i.e. it would fail for first-touch callers.
 */

require_once __DIR__ . '/Generated/Webhook.php';

if (!class_exists(\GetStream\Webhook::class, false)) {
    throw new \LogicException(
        'GetStream\\Webhook alias failed to register; '
        . 'GetStream\\Generated\\Webhook may not have loaded class_alias correctly.'
    );
}
