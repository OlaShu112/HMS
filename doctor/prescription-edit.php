<?php
$prescription_id = $_GET['id'];
$prescription_data = mysqli_query($conn,"SELECT * FROM `prescription` WHERE `id`=$prescription_id");
if(mysqli_num_rows($prescription_data)===0){
exit('Prescription Not Found!');
}
$data = mysqli_fetch_assoc($prescription_data);
$patient_id = $data['patient_id'];
$patient_data = mysqli_query($conn,"SELECT * FROM `users` WHERE `id`=$patient_id");
$row_data = mysqli_fetch_assoc($patient_data);
?>
<section class=" ">
            <div class="max-w-4xl mx-auto">
                <h2 class="leading-7 text-gray-900 text-start text-xl md:text-3xl font-semibold mb-3">Edit Prescription</h2>
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
                    <label for="patient_id" class="block text-sm font-medium leading-6 text-gray-900">Patient ID</label>
                    <div class="mt-2">
                      <input type="text" name="patient_id" id="patient_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?=$data['patient_id']?>">
                    </div>
                         </div>

                         <div class="col-span-full mb-4">
                            <label for="medication" class="block text-sm font-medium leading-6 text-gray-900">Medication</label>
                            <div class="mt-2.5">
                              <textarea name="medication" id="medication" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?=$data['medication']?></textarea>
                            </div>
                          </div>

                          <div class="col-span-full mb-4">
                            <label for="dosage" class="block text-sm font-medium leading-6 text-gray-900">Dosage</label>
                            <div class="mt-2.5">
                              <textarea name="dosage" id="dosage" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?=$data['dosage']?></textarea>
                            </div>
                          </div>

                          <div class="col-span-full mb-4">
                            <label for="instruction" class="block text-sm font-medium leading-6 text-gray-900">Instruction</label>
                            <div class="mt-2.5">
                              <textarea name="instruction" id="instruction" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?=$data['instruction']?></textarea>
                            </div>
                          </div>
         
            </div>
          </div>
         
          <div class="mt-3 flex items-center justify-end gap-x-6">
            <button type="submit" id="btn_add" class="rounded-md bg-indigo-600 px-5 py-2.5 text-base font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 action_btn">Update Prescription</button>
          </div>
         

         
         </form>
        </section>

        <script>
          // To disable past dates
            document.addEventListener('DOMContentLoaded', function() {
    var input = document.getElementById('time');
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
    var hours = ("0" + now.getHours()).slice(-2);
    var minutes = ("0" + now.getMinutes()).slice(-2);
    input.min = today + "T" + hours + ":" + minutes;
  });

  $(document).on('submit', '#dataForm', function (e) {
    e.preventDefault();
    var formData = new FormData($("#dataForm")[0]);
    $(".action_btn").attr('disabled', true);
    $(".action_btn").text('Loading...');
    $(".action_btn").addClass('cursor-not-allowed bg-blue-400');
    $.ajax({
      method: "POST",
      url: "<?=$url?>php/ajax/doctor/update-prescription.php",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function (res) {
        $(".action_btn").attr('disabled', false);
        $(".action_btn").removeClass('cursor-not-allowed bg-blue-400');
        $(".action_btn").text('Update Prescription');
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