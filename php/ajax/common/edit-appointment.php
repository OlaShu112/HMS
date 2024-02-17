<?php
require(__DIR__ . '/../../config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `appointment` WHERE id='$id'"))===0){
        exit(json_encode(array('status' => 'error', 'msg' => 'Something went wrong!')));
    }
    $title = $_POST["title"];
    $description = $_POST["description"];
    $time = $_POST["time"];

    if(intval($_SESSION['role_id'])===3){
        $notes = $_POST["notes"];
    }
    function validate($variable, $msg)
    {
        if (empty(trim($variable))) {
            exit(json_encode(array('status' => 'error', 'msg' => $msg)));
        }
    }
    // Validations
    validate($title, 'Please enter title!');
    validate($description, 'Please enter description!');
    validate($time, 'Please enter Appointment Date & Time!');
    // update records
    if(intval($_SESSION['role_id'])===3){
    mysqli_query($conn,"UPDATE `appointment` SET `title`='$title',`description`='$description',`notes`='$notes',`time`='$time',`updated_at`=current_timestamp() WHERE id='$id'");
    }else{
        mysqli_query($conn,"UPDATE `appointment` SET `title`='$title',`description`='$description',`time`='$time',`updated_at`=current_timestamp() WHERE id='$id'");
    }
    exit(json_encode(array('status' => 'success', 'msg' => 'Appointment details updated!')));
} else {
    exit(json_encode(array('status' => 'error', 'msg' => 'Something went wrong!')));
}
?>