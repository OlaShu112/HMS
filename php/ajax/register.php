<?php
require(__DIR__ . '/../config.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];
    $password = $_POST["password"]; 
    $cpassword = $_POST["cpassword"]; 
    function validate($variable,$msg){
        if(empty(trim($variable))){
            exit(json_encode(array('status'=>'error','msg'=>$msg)));
        }
    }
    // Validations
    validate($name,'Please enter your name!');
    validate($email,'Please enter your email!');
    validate($username,'Please enter username!');
    validate($phone,'Please enter your phone number!');
    validate($dob,'Please enter your date of birth!');
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
            // Password should be same as confirm password
            if($password!==$cpassword){
                exit(json_encode(array('status'=>'error','msg'=>'Confirm Password should be matched to password!')));
            }
            // Store information
$hash = password_hash($password, PASSWORD_DEFAULT);
$create_user = mysqli_query($conn, "INSERT INTO `users` ( `name`,`role_id`, `email`,`phone`, `username`, `password`, `created_at`) VALUES ('$name', 2,'$email',$phone,'$username', '$hash', current_timestamp())");
$data = mysqli_fetch_assoc(mysqli_query($conn,"Select * from users where email='$email'"));
$user_id = $data['id'];
$create_patient = mysqli_query($conn, "INSERT INTO `patient` ( `user_id`,`dob`) VALUES ($user_id,'$dob')");

$user_roleid = $data['role_id'];
            $role_info = mysqli_query($conn, "Select * from roles where id='$user_roleid'");
            $role_data = mysqli_fetch_assoc($role_info);
            $_SESSION[$role_data['url']] = true;
            $_SESSION['user_id'] = $data['id'];
            $_SESSION['img'] = $data['img'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['name'] = $data['name'];
            $_SESSION['role_id'] = $user_roleid;
            $_SESSION['role'] = $role_data['title'];
            $_SESSION['url'] = $role_data['url'];
            $_SESSION['auth'] = true;
            exit(json_encode(array('status' => 'success', 'msg' => 'Your account is successfully created! Redirecting...', 'url' => $url . $role_data['url'])));
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