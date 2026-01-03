<?php

namespace XCloner;

if (!\defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
\header('X-Test: Bar');
?>
bar
<?php 
