<?php
require(__DIR__ . '/../../config.php');
$id = $_POST['id'];
$query = mysqli_query($conn,"SELECT * FROM `system` WHERE `role_dashbaord`='$id'");
if(mysqli_num_rows($query)>0){
$data = mysqli_fetch_assoc($query);
$put=''; 
if(intval($data['status'])===1){ $put='selected'; }
echo '<option value="0">Open</option>
<option value="1" '.$put.'>Close</option>';
}
?>