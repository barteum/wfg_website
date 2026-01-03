<?php

namespace XCloner;

if (!\defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
include_once 'SdkVersionUtils.php';
\define('GRAPH_CONSTANTS_FILEPATH', "./src/Core/GraphConstants.php");
$packagistVersion = getLatestPackagistVersion();
if (!$packagistVersion) {
    echo "Failed to fetch latest stable sdk version";
    return;
}
$bumpedSdkVersion = incrementVersion($packagistVersion);
echo "Version after increment: {$bumpedSdkVersion}\n";
updateGraphConstants(\GRAPH_CONSTANTS_FILEPATH, $bumpedSdkVersion);
updateReadme($bumpedSdkVersion);
updateDocs($packagistVersion, $bumpedSdkVersion);
