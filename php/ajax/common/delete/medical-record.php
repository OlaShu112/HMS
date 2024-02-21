<?php
require(__DIR__ . '/../../../config.php');
if(isset($_GET['id'])){
$id = $_GET['id'];
if(isset($_SESSION['auth'])){
$find_user = mysqli_query($conn,"SELECT * FROM `medical_records` WHERE id=$id AND `staff_id`=$_SESSION[user_id]");
if(mysqli_num_rows($find_user)>0){
    mysqli_query($conn, "DELETE FROM `medical_records` WHERE id=$id");
    if(isset($_SERVER['HTTP_REFERER'])) { // Get prevoius location
        header('Location: ' . $_SERVER['HTTP_REFERER'].'?m=Deleted Successfully!');
    }
}
}
}
if(isset($_SERVER['HTTP_REFERER'])) { // Get prevoius location
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>