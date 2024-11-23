<?php
function logToFile($filename, $data, $append): void
{
    $log = date('Y-m-d H:i:s') . " - " . print_r($data, true) . "\n";
    file_put_contents($filename, $log, $append ? FILE_APPEND : 0);
}
?>