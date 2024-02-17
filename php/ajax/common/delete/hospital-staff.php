<?php
require(__DIR__ . '/../../../config.php');
if(isset($_GET['id'])){
$id = $_GET['id'];
if(isset($_SESSION['auth'])){
if(($_SESSION['role_id']===6) || ($_SESSION['role_id']===1)){ // Only Access Control Manager  And Admin is allowed to delete this
$find_user = mysqli_query($conn,"SELECT * FROM `users` WHERE id=$id");
if(mysqli_num_rows($find_user)>0){
    mysqli_query($conn, "DELETE FROM `users` WHERE id=$id");
    if(isset($_SERVER['HTTP_REFERER'])) { // Get prevoius location
        header('Location: ' . $_SERVER['HTTP_REFERER'].'?m=Deleted Successfully!');
    }
}
}
}
}
if(isset($_SERVER['HTTP_REFERER'])) { // Get prevoius location
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>