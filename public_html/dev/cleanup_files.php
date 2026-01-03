<?php
// cleanup_files.php
// Deletes specific junk/backup files from the current directory.

$files_to_delete = [
    'error_log',
    '.htaccess.bak',
    '.htaccess.bk',
    '.htaccess_lscachebak_01',
    '.htaccess_lscachebak_orig',
    'wp-config-sample.php',
    'readme.html',
    'license.txt'
];

echo "<h1>Cleanup Report</h1>";
echo "<ul>";

foreach ($files_to_delete as $file) {
    // Check if file exists in the current directory
    if (file_exists(__DIR__ . '/' . $file)) {
        if (unlink(__DIR__ . '/' . $file)) {
            echo "<li style='color: green;'><strong>Deleted:</strong> $file</li>";
        } else {
            echo "<li style='color: red;'><strong>Error:</strong> Could not delete $file (Check permissions)</li>";
        }
    } else {
        echo "<li style='color: gray;'><em>Not found:</em> $file (Already deleted or missing)</li>";
    }
}

echo "</ul>";
echo "<p>Cleanup complete. <strong>Please delete this script (cleanup_files.php) now for security.</strong></p>";
?>
