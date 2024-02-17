<?php
$appiontment_id = $_GET['id'];
$appiontment_data = mysqli_query($conn,"SELECT * FROM `appointment` WHERE `id`='$appiontment_id'");
if(mysqli_num_rows($appiontment_data)===0){
exit('Appiontment Not Found!');
}
$data = mysqli_fetch_assoc($appiontment_data);
$patient_id= $data['patient_id'];
$doctor_id= $data['doctor_id'];
$patient_query = mysqli_query($conn,"SELECT * FROM `users` WHERE `id`=$patient_id");
if(mysqli_num_rows($patient_query)>0){
    $patient_data = mysqli_fetch_assoc($patient_query);
$patient_name = $patient_data['name'];
$patient_id = $patient_data['id'];
}else{
    $patient_name = 'Not Found';
    $patient_id = 'Not Found';
}

$doctor_query = mysqli_query($conn,"SELECT * FROM `users` WHERE `id`=$doctor_id");
if(mysqli_num_rows($doctor_query)>0){
    $doctor_data = mysqli_fetch_assoc($doctor_query);
$doctor_name = $doctor_data['name'];
$doctor_id = $doctor_data['id'];
}else{
    $doctor_name = 'Not Found';
    $doctor_id = 'Not Found';
}
?>
<section class=" ">
            <div class="max-w-4xl mx-auto">
                <h2 class="leading-7 text-gray-900 text-start text-xl md:text-3xl font-semibold mb-3">Edit Appointment</h2>
                                                              <div id="add_alertm"></div>
             </div>
         <form class="max-w-4xl mx-auto" id="dataForm" >
           <div class=" mt-4">
            <div class="col-span-full p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50  hidden error_alert alert_boxes" role="alert">
         </div>
         <div class="col-span-full p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50  hidden success_alert alert_boxes"
           role="alert"></div>
            
         <input type="hidden" name="id" value="<?=$data['id']?>">
            <div class="mt-3 grid grid-cols-1 gap-x-6 sm:grid-cols-6">
                <div class="col-span-full mb-4">
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                    <div class="mt-2">
                      <input type="text" name="title" id="title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?=$data['title']?>" required>
                    </div>
                         </div>
                         <div class="col-span-full mb-4">
                            <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                            <div class="mt-2.5">
                              <textarea name="description" id="description" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?=$data['description']?></textarea>
                            </div>
                          </div>
 
              <div class="col-span-full mb-4">
                <label for="time" class="block text-sm font-medium leading-6 text-gray-900">Appointment Date & Time</label>
                <div class="mt-2">
                  <input type="datetime-local" name="time" id="time" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?=$data['time']?>" required>
                </div>
                     </div>
         
         
            </div>
          </div>
         
          <div class="mt-3 flex items-center justify-end gap-x-6">
            <button type="submit" class="rounded-md bg-indigo-600 px-5 py-2.5 text-base font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 action_btn">Update Appointment</button>
          </div>
         

         
         </form>
        </section>

        <script>


  $(document).on('submit', '#dataForm', function (e) {
    e.preventDefault();
    var formData = new FormData($("#dataForm")[0]);
    $(".action_btn").attr('disabled', true);
    $(".action_btn").text('Loading...');
    $(".action_btn").addClass('cursor-not-allowed bg-blue-400');
    $.ajax({
      method: "POST",
      url: "<?= $url ?>php/ajax/common/edit-appointment.php",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function (res) {
        $(".action_btn").attr('disabled', false);
        $(".action_btn").removeClass('cursor-not-allowed bg-blue-400');
        $(".action_btn").text('Update Appointment');
        var data = JSON.parse(res);
        if (data.status === 'success') {
          $('.error_alert').addClass('hidden');
          $('.success_alert').removeClass('hidden');
          $('.success_alert').html(data.msg);
        } else {
          $('.success_alert').addClass('hidden');
          $('.error_alert').removeClass('hidden');
          $('.error_alert').html(data.msg);
        }

      }
    });
  });
</script>