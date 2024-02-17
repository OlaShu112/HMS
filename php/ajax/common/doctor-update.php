<?php
require(__DIR__ . '/../../config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['id'];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $phone = $_POST["phone"];
    $specialization = $_POST["specialization"];
    $password = $_POST["password"];
    $gender = $_POST["gender"];

    function validate($variable, $msg)
    {
        if (empty(trim($variable))) {
            exit(json_encode(array('status' => 'error', 'msg' => $msg)));
        }
    }
    // Validations
    validate($name, 'Please enter name!');
    validate($email, 'Please enter email!');
    validate($username, 'Please username!');
    validate($specialization, 'Please enter doctor specializations!');
    validate($phone, 'Please enter phone number!');
    // Extra Phone validation
    if (!is_numeric($phone)) {
        exit(json_encode(array('status' => 'error', 'msg' => 'Phone number should be integer!')));
    }
    $user_query = mysqli_query($conn, "SELECT * FROM `users` WHERE `id`=$user_id");
    $user = mysqli_fetch_assoc($user_query);
    // Validate Email - if already exits
    if ($user['email'] !== $email) {
        $val_email = mysqli_query($conn, "SELECT * FROM `users` WHERE `email`='$email'");
        if (mysqli_num_rows($val_email) > 0) {
            exit(json_encode(array('status' => 'error', 'msg' => 'Email already exists!')));
        } else {
            // Update Email
            mysqli_query($conn, "UPDATE `users` SET `email`='$email' WHERE `id`=$user_id");
        }
    }
        // Validate Username - if already exits
        if ($user['username'] !== $username) {
            $val_username = mysqli_query($conn, "SELECT * FROM `users` WHERE `username`='$username'");
            if (mysqli_num_rows($val_username) > 0) {
                exit(json_encode(array('status' => 'error', 'msg' => 'Username already exists!')));
            } else {
                // Update Username
                mysqli_query($conn, "UPDATE `users` SET `username`='$username' WHERE `id`=$user_id");
            }
        }
        // Update name and phone
        mysqli_query($conn, "UPDATE `users` SET `name`='$name', `phone`=$phone WHERE `id`=$user_id");
        //  Update Password
        if (!empty($password)) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            mysqli_query($conn, "UPDATE `users` SET `password`='$hash' WHERE `id`=$user_id");
        }
        // Update dob and address
        mysqli_query($conn, "UPDATE `doctor` SET `specialization`='$specialization', `gender`='$gender' WHERE `user_id`=$user_id");
        // Image process
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_NO_FILE) {
// Image not uploaded
        }else{
// Image received
$targetDir = __DIR__ . '/../../../assets/data/';
$imageFileType = strtolower(pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION));
$uniqueFileName = $username . $user_id . rand(111,999) . '.' . $imageFileType;
$targetFile = $targetDir . $uniqueFileName;
if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
    mysqli_query($conn, "UPDATE `users` SET `img`='$uniqueFileName' WHERE `id`=$user_id");
    exit(json_encode(array('status' => 'success', 'msg' => 'Doctor profile is updated!','img'=>$url.'assets/data/'.$uniqueFileName)));
}else{
    exit(json_encode(array('status' => 'error', 'msg' => 'Something went wrong during uploading image but all other data is updated!')));
}
}
exit(json_encode(array('status' => 'success', 'msg' => 'Doctor profile is updated!','img'=>'a')));

  
} else {
    exit(json_encode(array('status' => 'error', 'msg' => 'Something went wrong!')));
}
?>