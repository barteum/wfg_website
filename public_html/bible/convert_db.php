<?php
// convert_db.php
// Converts standard web.csv to Pick-Formatted web.db

$inputFile = __DIR__ . '/web.csv';
$outputFile = __DIR__ . '/web.db'; // Using .db for the new format

if (!file_exists($inputFile)) {
    die("Error: web.csv not found.");
}

$content = file_get_contents($inputFile);
// Handle Windows/Unix line endings
$lines = preg_split('/\r\n|\r|\n/', $content);
$AM = "\xC3\xBE"; // UTF-8 for þ (Thorn)

echo "Reading " . count($lines) . " lines...<br>";

$fp = fopen($outputFile, 'w');
// Write Header (Bible.html expects a header line to skip)
fwrite($fp, "Book" . $AM . "Chapter" . $AM . "Verse" . $AM . "Text\n");

$count = 0;
foreach ($lines as $i => $line) {
    if ($i == 0) continue; // Skip CSV Header
    $line = trim($line);
    if (!$line) continue;
    
    // Parse Regex (matches the one in bible.html)
    // Matches quoted strings containing possible escaped quotes
    if (preg_match_all('/"((?:[^"]|"")*)"/', $line, $matches)) {
        $parts = $matches[1];
        if (count($parts) >= 4) {
            // Unescape CSV quotes ("" -> ")
            $book = str_replace('""', '"', $parts[0]);
            $chap = str_replace('""', '"', $parts[1]);
            $vers = str_replace('""', '"', $parts[2]);
            $text = str_replace('""', '"', $parts[3]);
            
            // Pick Line Construction: No quotes around fields!
            $newLine = $book . $AM . $chap . $AM . $vers . $AM . $text . "\n";
            fwrite($fp, $newLine);
            $count++;
        }
    }
}
fclose($fp);

$oldSize = filesize($inputFile);
$newSize = filesize($outputFile);
$saving = $oldSize - $newSize;
$pct = round(($saving / $oldSize) * 100, 1);

echo "<h2>Conversion Complete</h2>";
echo "Processed $count lines.<br>";
echo "Original Size: " . number_format($oldSize) . " bytes<br>";
echo "New Size: " . number_format($newSize) . " bytes<br>";
echo "<strong>Saved: " . number_format($saving) . " bytes ($pct%)</strong><br>";
echo "<br>File saved to: $outputFile";
?>
