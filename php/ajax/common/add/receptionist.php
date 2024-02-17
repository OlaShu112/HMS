<?php
require(__DIR__ . '/../../../config.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $phone = $_POST["phone"];
    $password = $_POST["password"]; 
    function validate($variable,$msg){
        if(empty(trim($variable))){
            exit(json_encode(array('status'=>'error','msg'=>$msg)));
        }
    }
    // Validations
    validate($name,'Please enter name!');
    validate($email,'Please enter email!');
    validate($username,'Please enter username!');
    validate($phone,'Please enter phone number!');
    validate($password,'Please enter password!');
    // Extra Phone validation
    if(!is_numeric($phone)){
        exit(json_encode(array('status'=>'error','msg'=>'Phone number should be integer!')));
    }
    $result = mysqli_query($conn,"Select * from users where email='$email'");
    $num = mysqli_num_rows($result);
    // Validate email
    if ($num === 0){
        $val_usernmae = mysqli_query($conn,"Select * from users where username='$username'");
        $num_username = mysqli_num_rows($val_usernmae);
        // Validate Username
        if ($num_username === 0){
            // Store information
$hash = password_hash($password, PASSWORD_DEFAULT);
$create_user = mysqli_query($conn, "INSERT INTO `users` ( `name`,`role_id`, `email`,`phone`, `username`, `password`, `created_at`) VALUES ('$name', 4,'$email',$phone,'$username', '$hash', current_timestamp())");
$data = mysqli_fetch_assoc(mysqli_query($conn,"Select * from users where email='$email'"));
$user_id = $data['id'];
            exit(json_encode(array('status' => 'success', 'msg' => 'Receptionist is successfully created!')));
        }else{
            exit(json_encode(array('status'=>'error','msg'=>'Username Already exists!')));
                }
    }else{
exit(json_encode(array('status'=>'error','msg'=>'Email Already exists!')));
    }
}else{
    exit(json_encode(array('status'=>'error','msg'=>'Something went wrong!')));
}
?>