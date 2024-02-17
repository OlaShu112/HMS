<?php
require(__DIR__ . '/../../config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(intval($_SESSION['role_id'])===2){
        $patient_id = $_SESSION['user_id'];
    }else{
        $patient_id = $_POST["patient_id"];
    }
    $title = $_POST["title"];
    $description = $_POST["description"];
    $gender = $_POST["gender"];
    $time = $_POST["time"];
    function validate($variable, $msg)
    {
        if (empty(trim($variable))) {
            exit(json_encode(array('status' => 'error', 'msg' => $msg)));
        }
    }
    // Validations
    validate($patient_id, 'Please enter patient id!');
    validate($title, 'Please enter title!');
    validate($description, 'Please enter description!');
    validate($gender, 'Please select doctor gender!');
    validate($time, 'Please enter Appointment Date & Time!');
    if (!is_numeric($patient_id)) {
        exit(json_encode(array('status' => 'error', 'msg' => 'Patient ID should be integer!')));
    }
    $result = mysqli_query($conn, "Select * from users where id=$patient_id AND role_id=2"); // Role_id will make sure that it is patient id
    $num = mysqli_num_rows($result);

    if ($num > 0) {
        $patient_details = mysqli_fetch_assoc($result);  
        if ($gender !== 'anyone') {
            $find_doctor = mysqli_query($conn, "SELECT * FROM `doctor` WHERE `gender`='$gender' ORDER BY RAND() LIMIT 1");
            $gender_input = $gender;
        } else {
            $find_doctor = mysqli_query($conn, "SELECT * FROM `doctor` ORDER BY RAND() LIMIT 1");
            $gender_input = '';
        }
        if(mysqli_num_rows($find_doctor)===0){
            exit(json_encode(array('status' => 'error', 'msg' => 'No '.$gender_input.' doctor is available currently!')));
        }else{
            $found_doctor_details = mysqli_fetch_assoc($find_doctor);
            $found_doctor_id = $found_doctor_details['user_id'];
            $doctor_details = mysqli_query($conn,"SELECT * FROM `users` WHERE `id`=$found_doctor_id");
            if(mysqli_num_rows($doctor_details)>0){
                $doctor = mysqli_fetch_assoc($doctor_details);
                $doctor_name = $doctor['name'];
                // book appointment
                $created_by = $_SESSION['user_id'];
                mysqli_query($conn,"INSERT INTO `appointment`(`patient_id`, `booked_by`, `title`, `description`, `doctor_id`, `time`, `status`, `created_at`) VALUES ($patient_id,$created_by,'$title','$description',$found_doctor_id,'$time',1, current_timestamp())");
                exit(json_encode(array('status' => 'success', 'msg' => "Appiontment booked with doctor ($doctor_name)!")));
            }else{
                exit(json_encode(array('status' => 'error', 'msg' => 'Please try again, looks like we are facing any issue with finding doctor!')));
            }
        }

    } else {
        exit(json_encode(array('status' => 'error', 'msg' => 'Patient not found!')));
    }
} else {
    exit(json_encode(array('status' => 'error', 'msg' => 'Something went wrong!')));
}
?>