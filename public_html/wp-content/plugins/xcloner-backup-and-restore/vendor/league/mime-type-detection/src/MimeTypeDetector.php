<?php

declare (strict_types=1);
namespace XCloner\League\MimeTypeDetection;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
interface MimeTypeDetector
{
    /**
     * @param string|resource $contents
     */
    public function detectMimeType(string $path, $contents): ?string;
    public function detectMimeTypeFromBuffer(string $contents): ?string;
    public function detectMimeTypeFromPath(string $path): ?string;
    public function detectMimeTypeFromFile(string $path): ?string;
}
