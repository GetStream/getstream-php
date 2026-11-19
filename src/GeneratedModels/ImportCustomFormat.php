<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * How custom fields are read from imported items: root (default) takes unknown root keys as custom data, nested reads them from a custom object and is only supported for feeds imports.
 */
class ImportCustomFormat
{
    public const NESTED = 'nested';
    public const ROOT = 'root';
}
