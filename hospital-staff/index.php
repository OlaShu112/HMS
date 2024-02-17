<?php

$requestUri = $_SERVER['REQUEST_URI'];
$urlComponents = parse_url($requestUri);
$path = $urlComponents['path'];
$queryString = isset($urlComponents['query']) ? $urlComponents['query'] : '';
$request = $path;


require(__DIR__ . '/../php/config.php');
require(__DIR__ . '/auth.php');
switch ($request) {
    case '/':
        $title = "Dashboard";
        $mainContent = __DIR__ . '/home.php';
        break;

    case '/manage-patients':
        $mainContent = __DIR__ . '/manage-patients.php';
        break;
    case '/add-patient':
        $mainContent = __DIR__ . '/add-patient.php';
        break;
    case '/appointment':
        $mainContent = __DIR__ . '/appointment.php';
        break;
    case '/patient-details':
        $mainContent = __DIR__ . '/patient-details.php';
        break;
    case '/patient-edit':
        $mainContent = __DIR__ . '/patient-edit.php';
        break;
    case '/appointment-details':
        $mainContent = __DIR__ . '/appointment-details.php';
        break;
    case '/appointment-edit':
        $mainContent = __DIR__ . '/appointment-edit.php';
        break;
    case '/book-appointment':
        $mainContent = __DIR__ . '/book-appointment.php';
        break;
    case '/profile':
        $mainContent = __DIR__ . '/profile.php';
        break;
    // Add more cases as needed for your application.
    default:
        if (basename($request) === 'manage-patients') {
            $head = "<title>Manage Patients</title>";
        } elseif (basename($request) === 'add-patient') {
            $head = "<title>Add Patient</title>";
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
        } elseif (basename($request) === 'patient-details') {
            $head = "<title>Patient Details</title>";
        } elseif (basename($request) === 'patient-edit') {
            $head = "<title>Patient Edit</title>";
        } elseif (basename($request) === 'profile') {
            $head = "<title>Profile</title>";
        }
        $mainContent = __DIR__ . '/' . basename($request) . '.php';
        if (!file_exists($mainContent)) {
            $head = "<title>Dashboard | Hospital Staff</title>";
            $request = 'home';
            $mainContent = __DIR__ . '/' . basename($request) . '.php';
        }
        break;
}
include __DIR__ . '/../layouts/hospital-staff/app.php';
