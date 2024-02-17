<?php
require(__DIR__ . '/../../config.php');
$role_dashbaord = $_POST['role_dashbaord'];
$status = $_POST['status'];
mysqli_query($conn,"UPDATE `system` SET `status`='$status' WHERE `role_dashbaord`='$role_dashbaord'");
exit(json_encode(array('status' => 'success', 'msg' => 'System Configuration updated!')));
?>