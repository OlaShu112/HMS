<?php
require(__DIR__ . '/../../config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `medical_records` WHERE id='$id'"))===0){
        exit(json_encode(array('status' => 'error', 'msg' => 'Something went wrong!')));
    }
    $patient_id = $_POST["patient_id"];
    $diagnosis = $_POST["diagnosis"];
    $treatmentPlan = $_POST["treatmentPlan"];
    $VitalSigns = $_POST["VitalSigns"];
    $MedicalHistory = $_POST["MedicalHistory"];
    $ProgressNotes = $_POST["ProgressNotes"];
    $ConsultationsAndReferrals = $_POST["ConsultationsAndReferrals"];
    function validate($variable, $msg)
    {
        if (empty(trim($variable))) {
            exit(json_encode(array('status' => 'error', 'msg' => $msg)));
        }
    }
    // Validations
    validate($patient_id, 'Please enter patient id!');
    validate($diagnosis, 'Please enter diagnosis!');
    validate($treatmentPlan, 'Please enter treatmentPlan!');
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
                mysqli_query($conn,"UPDATE `medical_records` SET `patient_id`='$patient_id',`staff_id`='$created_by',`diagnosis`='$diagnosis',`treatmentPlan`='$treatmentPlan',`VitalSigns`='$VitalSigns',`MedicalHistory`='$MedicalHistory',`ProgressNotes`='$ProgressNotes',`ConsultationsAndReferrals`='$ConsultationsAndReferrals',`updated_at`=current_timestamp() WHERE `id`=$id");
                exit(json_encode(array('status' => 'success', 'msg' => "Medical Record is updated successfully!")));
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