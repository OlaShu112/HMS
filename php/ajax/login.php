<?php
require(__DIR__ . '/../config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if (empty(trim($username))) {
        exit(json_encode(array('status' => 'error', 'msg' => 'Please enter a username.')));
    }
    if (empty(trim($password))) {
        exit(json_encode(array('status' => 'error', 'msg' => 'Please enter password.')));
    }
    $result = mysqli_query($conn, "Select * from users where username='$username'");
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $data = mysqli_fetch_assoc($result);
        if (password_verify($password, $data['password'])) {
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
            exit(json_encode(array('status' => 'success', 'msg' => 'You are successfully logged! Redirecting...', 'url' => $url . $role_data['url'])));
        } else {
            exit(json_encode(array('status' => 'error', 'msg' => 'Password is wrong!')));
        }
    } else {
        exit(json_encode(array('status' => 'error', 'msg' => 'login details are not valid!')));
    }
} else {
    exit(json_encode(array('status' => 'error', 'msg' => 'Something went wrong!')));
}
?>