<?php

$requestUri = $_SERVER['REQUEST_URI'];
$urlComponents = parse_url($requestUri);
$path = $urlComponents['path'];
$queryString = isset($urlComponents['query']) ? $urlComponents['query'] : '';
$request = $path;
// Assuming this script is located in the root directory of "hms" project
$url = $_SERVER['REQUEST_URI'];
$cleanedUrl = str_replace('/hms/', '/', $path);
$cleanedUrl = str_replace('/php/', '/', $cleanedUrl);

$filePath = __DIR__ . $cleanedUrl;

if (file_exists($filePath)) {
    require $filePath;
} else {
    http_response_code(404);
}
