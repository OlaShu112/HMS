<?php 
    require(__DIR__ . '/../../../config.php');
    if(!isset($_SESSION['user_id'])){
        $output .= '<div class="text">Please login again.</div>';
    }
    if(intval($_SESSION['role_id'])!==2 && intval($_SESSION['role_id'])!==3){
$appiontment_id = $_POST['id'];
$appiontment_data = mysqli_query($conn,"SELECT * FROM `appointment` WHERE `id`='$appiontment_id'");
$data = mysqli_fetch_assoc($appiontment_data);
$outgoing_id = $data['doctor_id'];
        $incoming_id = $data['patient_id'];
    }else{
        $outgoing_id = $_SESSION['user_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    }
        $output = "";
        $sql = "SELECT * FROM messages LEFT JOIN users ON users.id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        $recever_user = mysqli_query($conn,"SELECT * FROM `users` WHERE id='$incoming_id'");
        $recever_data = mysqli_fetch_assoc($recever_user);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }else{
                    if($recever_data['img']!==null){ $out_img = 'assets/data/'.$recever_data['img']; }else{ $out_img = 'assets/data/user_image.png'; }
                    $output .= '<div class="chat incoming">
                                <img src="'.$url.$out_img .'">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;

?>