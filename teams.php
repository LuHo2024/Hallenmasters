<?php
// Serve teams.json as JSON for the frontend.
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-cache, must-revalidate, max-age=0');
$projectRoot = dirname(__DIR__);
$teamsFile = $projectRoot . '/teams.json';
if (!file_exists($teamsFile)) {
    echo json_encode([]);
    exit;
}
$contents = file_get_contents($teamsFile);
if ($contents === false) {
    echo json_encode([]);
    exit;
}
json_decode($contents);
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode([]);
    exit;
}
echo $contents;
exit;
