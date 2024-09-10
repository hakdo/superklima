<?php
// API endpoint to get server stats
// This endpoint is vulnerable to command injection because the 
// strpos arguments are switched around (also not good to use strpos here)

$cmds = ['whoami', 'hostname'];
if (!isset($_GET['apikey'])) {
    echo "401 Unauthenticated: access denied.";
    header('HTTP/1.1 401 Forbidden');
    exit();
} else {
    $apikey = $_GET['apikey'];
}
$cmd = $_GET['check'];

$comparekey = file_get_contents('../apikeys.txt');

if ($apikey==$comparekey) {
    foreach ($cmds as $allowed) {
        if (strpos($cmd, $allowed) !== false) {
            echo $cmd . "<br>";
            $out = shell_exec($cmd);
            echo $out;
            exit();
        }
    }
    echo "404 Not found.";
    header('HTTP/1.1 404 Not Found');
}
echo "403 Forbidden: access denied.";
header('HTTP/1.1 403 Forbidden');

