<?php
mysqli_report(MYSQLI_REPORT_OFF); 
echo "<h3>Database Diagnostic (Improved)</h3>";

$tests = [
    ['host' => 'localhost', 'user' => 'root', 'pass' => ''],
    ['host' => 'localhost', 'user' => 'root', 'pass' => 'mysql'],
    ['host' => '127.0.0.1', 'user' => 'root', 'pass' => ''],
    ['host' => '127.0.0.1', 'user' => 'root', 'pass' => 'mysql'],
];

foreach ($tests as $t) {
    echo "Testing: {$t['user']}@{$t['host']} (Pass: '{$t['pass']}') ... ";
    $conn = new mysqli($t['host'], $t['user'], $t['pass']);
    if ($conn->connect_error) {
        echo "<span style='color:red'>FAILED</span> (" . $conn->connect_error . ")<br>";
    } else {
        echo "<span style='color:green'>SUCCESS</span>!<br>";
        
        $res = $conn->query("SHOW DATABASES");
        if ($res) {
            echo "Databases found:<br>";
            while ($row = $res->fetch_row()) {
                echo "- " . $row[0] . "<br>";
            }
        }
        $conn->close();
        break; 
    }
}
?>
