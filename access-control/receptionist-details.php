<?php
$user_id = $_GET['id'];
$user_data = mysqli_query($conn,"SELECT * FROM `users` WHERE `id`=$user_id");
if(mysqli_num_rows($user_data)===0){
exit('Receptionist Not Found!');
}
$data = mysqli_fetch_assoc($user_data);
?>
<div class="max-w-4xl mx-auto">
  <h2 class="leading-7 text-gray-900 text-start text-xl md:text-3xl font-semibold mb-3">Profile</h2>
</div>
<form class="max-w-4xl mx-auto" id="dataForm" enctype="multipart/form-data">
  <div class="space-y-12">
    <div class="">
      <div class="col-span-full">
        <div class="mt-2 flex items-center gap-x-3">
          <img class="h-16 mr-3 rounded-full image_div" src="<?=$url?><?php if($data['img']!==null){ echo 'assets/data/'.$data['img']; }else{ echo 'assets/data/user_image.png'; } ?>" alt="Avatar">
       
        </div>
      </div>


    </div>
  </div>

  <div class=" mt-4">

    <div class="mt-3 grid grid-cols-1 gap-x-6 sm:grid-cols-6">
      <div class="col-span-full p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50  hidden error_alert alert_boxes" role="alert">
      </div>
      <div class="col-span-full p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50  hidden success_alert alert_boxes"
        role="alert">
      </div>
      <div class="col-span-full mb-4">
        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Full name</label>
        <div class="mt-2">
          <input type="text" name="name" id="name"
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            value="<?=$data['name']?>" required disabled readonly>
        </div>
      </div>
      <div class="col-span-full mb-4">
        <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone number</label>
        <div class="mt-2">
          <input type="tel" name="phone" id="phone"
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            value="<?=$data['phone']?>" disabled readonly>
        </div>
      </div>

      <div class="col-span-full mb-4">
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
        <div class="mt-2">
          <input id="email" name="email" type="email"  
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            value="<?=$data['email']?>" required disabled readonly>
        </div>
      </div>

      <div class="col-span-full mb-4">
        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
        <div class="mt-2">
          <input type="text" name="username" id="username"
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            value="<?=$data['username']?>" disabled readonly>
        </div>
      </div>
     
      <div class="col-span-full mb-4">
        <label class="block text-sm font-medium leading-6 text-gray-900">Created At</label>
        <div class="mt-2">
          <input type="text"
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            value="<?=date('d M, Y h:i A', strtotime($data['created_at']))?>" disabled readonly>
        </div>
      </div>
      <?php
if($data['updated_at']!==NULL){
?>
      <div class="col-span-full mb-4">
        <label class="block text-sm font-medium leading-6 text-gray-900">Last Updated At</label>
        <div class="mt-2">
          <input type="text"
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            value="<?=date('d M, Y h:i A', strtotime($data['updated_at']))?>" disabled readonly>
        </div>
      </div>
<?php
}
      ?>





    </div>
  </div>

  <div class="mt-3 flex items-center justify-end gap-x-6">
    <a href="<?=$url?>access-control/manage-receptionists"
      class="rounded-md bg-indigo-600 px-5 py-2.5 text-base font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 action_btn">Back</a>
  </div>

  <!-- </div>
        </div> -->

</form>
