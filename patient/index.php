<?php

// $request = $_SERVER['REQUEST_URI'];
$requestUri = $_SERVER['REQUEST_URI'];
$urlComponents = parse_url($requestUri);
$path = $urlComponents['path'];
$queryString = isset($urlComponents['query']) ? $urlComponents['query'] : '';
$request = $path;

// Assuming this script is located in the root directory of "hms" project
require(__DIR__ . '/../php/config.php'); // Adjust the path as necessary
require(__DIR__ . '/auth.php');
switch ($request) {
    case '/':
        $title = "Dashboard";
        $mainContent = __DIR__ . '/home.php'; // Use filesystem path
        break;
    case '/appointment':
        $mainContent = __DIR__ . '/appointment.php'; // Use filesystem path
        break;
        case '/appointment-details':
            $mainContent = __DIR__ . '/appointment-details.php'; // Use filesystem path
            break;
            case '/appointment-edit':
                $mainContent = __DIR__ . '/appointment-edit.php'; // Use filesystem path
                break;
    case '/book-appointment':
        $mainContent = __DIR__ . '/book-appointment.php'; // Use filesystem path
        break;
    case '/profile':
        $mainContent = __DIR__ . '/profile.php'; // Use filesystem path
        break;
    // Add more cases as needed for your application.
    default:
    if (basename($request)==='/') {
        $head = "<title>Dashboard</title>";
}elseif (basename($request)==='appointment') {
    $head = "<title>Appointment</title>";
}
elseif (basename($request)==='appointment-details') {
    $head = "<title>Appointment Details</title>";
}
elseif (basename($request)==='appointment-edit') {
    $head = "<title>Appointment Edit</title>";
}
elseif (basename($request)==='book-appointment') {
    $head = "<title>Book Appointment</title>";
}
elseif (basename($request)==='profile') {
    $head = "<title>Profile</title>";
} elseif (basename($request) === 'prescription') {
    $head = "<title>Prescription</title>";
}
elseif (basename($request)==='prescription-details') {
    $head = "<title>Prescription Details</title>";
}else {
   $head = "<title>Dashboard | Patient</title>";
    $request = 'home';
    $mainContent = __DIR__ . '/' . basename($request) . '.php';
}

$cleanedUrl = str_replace('/hms/', '/', $requestUri);
$cleanedUrl = str_replace('/patient/', '/', $cleanedUrl);


$segments = explode('/', $path);
$lastSegment = end($segments);
$filePath = __DIR__ .'/'. $lastSegment.'.php';
if (file_exists($filePath)) {
$mainContent = __DIR__ . '/' . basename($request) . '.php';
} else {
http_response_code(404);
}

break;
}
include __DIR__ . '/../layouts/patient/app.php';
