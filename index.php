<?php

$requestUri = $_SERVER['REQUEST_URI'];
$urlComponents = parse_url($requestUri);
$path = $urlComponents['path'];
$queryString = isset($urlComponents['query']) ? $urlComponents['query'] : '';
$request = $path;
// Assuming this script is located in the root directory of "hms" project
require(__DIR__ . '../php/config.php'); // Adjust the path as necessary

if ($request==='/') {
            $mainContent = __DIR__ . '/guest/home.php';
}elseif ($request==='/patient-login') {
    $mainContent = __DIR__ . '/guest/patient-login.php';
}
elseif ($request==='/recetionist-login') {
    $mainContent = __DIR__ . '/guest/recetionist-login.php';
}
elseif ($request==='/staff-login') {
    $mainContent = __DIR__ . '/guest/staff-login.php';
}
elseif ($request==='/register') {
    $mainContent = __DIR__ . '/guest/register.php';
}else{
    // Head data
    if (basename($request)==='/') {
        $head = "<title>Home</title>";
}elseif (basename($request)==='patient-login') {
    $head = "<title>Patient Login</title>";
}elseif (basename($request)==='about-us') {
    $head = "<title>About us</title>";
}
elseif (basename($request)==='contact-us') {
    $head = "<title>Contact us</title>";
}
elseif (basename($request)==='find-gp') {
    $head = "<title>Find a GP</title>";
}
elseif (basename($request)==='find-urgent-and-emergency-care') {
    $head = "<title>Find Urgent and Emergency Care Services</title>";
}
elseif (basename($request)==='recetionist-login') {
    $head = "<title>Recetionist Login</title>";
}
elseif (basename($request)==='staff-login') {
    $head = "<title>Staff Login</title>";
}
elseif (basename($request)==='register') {
    $head = "<title>Create Account</title>";
}
            $mainContent = __DIR__ . '/guest/' . basename($request) . '.php';
        if(!file_exists($mainContent)){
            $head = "<title>Home</title>";
            $request='home';
            $mainContent = __DIR__ . '/guest/' . basename($request) . '.php';
        }
}
include __DIR__ . '/layouts/guest/app.php'; // Use filesystem path
