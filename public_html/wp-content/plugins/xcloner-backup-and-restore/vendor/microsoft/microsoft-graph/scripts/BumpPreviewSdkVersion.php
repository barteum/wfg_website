<?php

namespace XCloner;

if (!\defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
include_once 'SdkVersionUtils.php';
\define('GRAPH_CONSTANTS_FILEPATH', "./src/GraphConstants.php");
$packagistVersion = getLatestPackagistVersion(\false);
if (!$packagistVersion) {
    echo "Failed to fetch latest preview sdk version";
    return;
}
$bumpedSdkVersion = incrementVersion($packagistVersion);
echo "Version after increment: {$bumpedSdkVersion}\n";
updateGraphConstants(\GRAPH_CONSTANTS_FILEPATH, $bumpedSdkVersion);
updateReadme($bumpedSdkVersion);
