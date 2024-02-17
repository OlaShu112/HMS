<?php
if(!isset($_SESSION['nurse'])){
?>
<script>
    window.location.href = "<?=$url?>staff-login?m=un-athorized access";
</script>
<?php
}
$system = mysqli_query($conn,"SELECT * FROM `system` WHERE `role_dashbaord`=5");
$system_data = mysqli_fetch_assoc($system);
if(intval($system_data['status'])===1){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?=$url?>assets/css/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?=$url?>assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Dashboard Closed</title>
</head>
<body>
<div class="min-h-screen bg-gray-900 flex flex-col items-center justify-center">
    <h1 class="text-5xl text-white font-bold mb-8 animate-pulse">
        Dashboard Closed
    </h1>
   <div>
   <a href="<?=$url?>php/logout.php" type="button" class="<?php if(!isset($_SESSION['url'])){ echo 'hidden'; }?> focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 me-2"><i class="bi bi-box-arrow-in-left me-2"></i>Logout</a>
   </div>
</div>
</body>
</html>
<?php
exit;
}
?>
