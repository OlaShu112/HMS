<?php
require(__DIR__ . '/../../config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $patient_id = $_POST["patient_id"];
    $medication = $_POST["medication"];
    $dosage = $_POST["dosage"];
    $instruction = $_POST["instruction"];
    function validate($variable, $msg)
    {
        if (empty(trim($variable))) {
            exit(json_encode(array('status' => 'error', 'msg' => $msg)));
        }
    }
    // Validations
    validate($patient_id, 'Please enter patient id!');
    validate($medication, 'Please enter medication!');
    validate($dosage, 'Please enter dosage!');
    validate($instruction, 'Please enter instructions!');
    if (!is_numeric($patient_id)) {
        exit(json_encode(array('status' => 'error', 'msg' => 'Patient ID should be integer!')));
    }
    $result = mysqli_query($conn, "Select * from users where id=$patient_id AND role_id=2"); // Role_id will make sure that it is patient id
    $num = mysqli_num_rows($result);

    if (intval($num) > 0) {
        $patient_details = mysqli_fetch_assoc($result);  

            $find_doctor = mysqli_query($conn, "SELECT * FROM `doctor` WHERE user_id='$_SESSION[user_id]'");

            $found_doctor_details = mysqli_fetch_assoc($find_doctor);
            $found_doctor_id = $found_doctor_details['user_id'];
            $doctor_details = mysqli_query($conn,"SELECT * FROM `users` WHERE `id`=$found_doctor_id");
            if(mysqli_num_rows($doctor_details)>0){
                $doctor = mysqli_fetch_assoc($doctor_details);
                $doctor_name = $doctor['name'];
                $created_by = $_SESSION['user_id'];
                mysqli_query($conn,"INSERT INTO `prescription`(`patient_id`, `staff_id`, `medication`, `dosage`, `instruction`, `created_at`) VALUES ($patient_id,$created_by,'$medication','$dosage','$instruction', current_timestamp())");
                exit(json_encode(array('status' => 'success', 'msg' => "Prescription added successfully!")));
            }else{
                exit(json_encode(array('status' => 'error', 'msg' => 'Please try again, looks like we are facing any issue!')));
            }

    } else {
        exit(json_encode(array('status' => 'error', 'msg' => 'Patient not found!')));
    }
} else {
    exit(json_encode(array('status' => 'error', 'msg' => 'Something went wrong!')));
}
?>