<?php

namespace XCloner;

if (!\defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
$data = \str_repeat('x', 32 * 1024 * 1024);
\header('Content-Length: ' . \strlen($data));
\header('Content-Type: text/plain');
echo $data;
