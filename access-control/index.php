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
    case '/appointment':
        $mainContent = __DIR__ . '/appointment.php';
        break;
    case '/add-patient':
        $mainContent = __DIR__ . '/add-patient.php';
        break;
    case '/patient-details':
        $mainContent = __DIR__ . '/patient-details.php';
        break;
    case '/patient-edit':
        $mainContent = __DIR__ . '/patient-edit.php';
        break;
    case '/manage-doctors':
        $mainContent = __DIR__ . '/manage-doctors.php';
        break;
    case '/add-doctor':
        $mainContent = __DIR__ . '/add-doctor.php';
        break;
    case '/doctor-details':
        $mainContent = __DIR__ . '/doctor-details.php';
        break;
    case '/doctor-edit':
        $mainContent = __DIR__ . '/doctor-edit.php';
        break;
    case '/manage-nurses':
        $mainContent = __DIR__ . '/manage-nurses.php';
        break;
    case '/add-nurse':
        $mainContent = __DIR__ . '/add-nurse.php';
        break;
    case '/nurse-details':
        $mainContent = __DIR__ . '/nurse-details.php';
        break;
    case '/nurse-edit':
        $mainContent = __DIR__ . '/nurse-edit.php';
        break;
    case '/manage-receptionists':
        $mainContent = __DIR__ . '/manage-receptionists.php';
        break;
    case '/add-receptionist':
        $mainContent = __DIR__ . '/add-receptionist.php';
        break;
    case '/receptionist-details':
        $mainContent = __DIR__ . '/receptionist-details.php';
        break;
    case '/receptionist-edit':
        $mainContent = __DIR__ . '/receptionist-edit.php';
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
        }
        elseif (basename($request) === 'settings') {
            $head = "<title>System Settings</title>";
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
        }elseif(basename($request) === 'manage-doctors'){
            $head = "<title>Manage Doctors</title>";
        }
        elseif(basename($request) === 'add-doctor'){
            $head = "<title>Add Doctor</title>";
        }
        elseif(basename($request) === 'doctor-details'){
            $head = "<title>Doctor Details</title>";
        }
        elseif(basename($request) === 'doctor-edit'){
            $head = "<title>Edit Doctor</title>";
        }elseif(basename($request) === 'manage-receptionists'){
            $head = "<title>Manage Receptionists</title>";
        }
        elseif(basename($request) === 'add-receptionists'){
            $head = "<title>Add Receptionist</title>";
        }
        elseif(basename($request) === 'receptionist-details'){
            $head = "<title>Receptionist Details</title>";
        }
        elseif(basename($request) === 'receptionist-edit'){
            $head = "<title>Edit Receptionist</title>";
        }
    elseif(basename($request) === 'manage-admins'){
        $head = "<title>Manage Admins</title>";
    }
    elseif(basename($request) === 'add-admin'){
        $head = "<title>Add Admin</title>";
    }
    elseif(basename($request) === 'admin-details'){
        $head = "<title>Admin Details</title>";
    }
    elseif(basename($request) === 'admin-edit'){
        $head = "<title>Admin Receptionist</title>";
    }
        elseif(basename($request) === 'manage-nurses'){
            $head = "<title>Manage Nurses</title>";
        }
        elseif(basename($request) === 'add-nurse'){
            $head = "<title>Add Nurse</title>";
        }
        elseif(basename($request) === 'nurse-details'){
            $head = "<title>Nurse Details</title>";
        }
        elseif(basename($request) === 'nurse-edit'){
            $head = "<title>Edit Nurse</title>";
        }
        elseif(basename($request) === 'manage-hospital-staff'){
            $head = "<title>Manage Hospital Staff</title>";
        }
        elseif(basename($request) === 'add-hospital-staff'){
            $head = "<title>Add Hospital Staff</title>";
        }
        elseif(basename($request) === 'hospital-staff-details'){
            $head = "<title>Hospital Staff Details</title>";
        }
        elseif(basename($request) === 'hospital-staff-edit'){
            $head = "<title>Edit Hospital Staff</title>";
        }
        elseif(basename($request) === 'system-status'){
            $head = "<title>System Status</title>";

}else {
    $head = "<title>Dashboard | Access Control Manager</title>";
     $request = 'home';
     $mainContent = __DIR__ . '/' . basename($request) . '.php';
 }
 
 $cleanedUrl = str_replace('/hms/', '/', $requestUri);
 $cleanedUrl = str_replace('/access-control/', '/', $cleanedUrl);
 
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
 include __DIR__ . '/../layouts/access-control/app.php';
 