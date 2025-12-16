<?php
// Serve games_data.json as JSON for the frontend.
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-cache, must-revalidate, max-age=0');
$projectRoot = dirname(__DIR__);
$gamesFile = $projectRoot . '/games_data.json';
if (!file_exists($gamesFile)) {
    echo json_encode([]);
    exit;
}
// Read and output file contents directly (safe since path is fixed)
$contents = file_get_contents($gamesFile);
if ($contents === false) {
    echo json_encode([]);
    exit;
}
// Ensure valid JSON; if not, return empty array
json_decode($contents);
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode([]);
    exit;
}
echo $contents;
exit;
