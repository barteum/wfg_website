<?php
// Generate options.csv with correct delimiters
$file = __DIR__ . '/users.csv';
$username = 'peterk';

$VM = chr(253);
$SM = chr(252);

// Data structure
$data = [
    "Name of God" => "Yahweh",
    "Name of Messiah" => "Yeshua",
    "Bible Information" => "Start using this program",
    "Device ID" => "?"
];

// Build Blob
$parts = [];
foreach ($data as $k => $v) {
    $parts[] = $k . $SM . $v;
}
$blob = implode($VM, $parts);

// CSV Line
$fp = fopen($file, 'w');
fputcsv($fp, [$username, $blob]);
fclose($fp);

echo "options.csv created.";
?>
