<?php
$medical_records_id = $_GET['id'];
$user_data = mysqli_query($conn,"SELECT * FROM `medical_records` WHERE `id`=$medical_records_id AND `staff_id`=$_SESSION[user_id]");
if(mysqli_num_rows($user_data)===0){
exit('Medical Record Not Found!');
}
$data = mysqli_fetch_assoc($user_data);
?>
<section class=" ">
            <div class="max-w-4xl mx-auto">
                <h2 class="leading-7 text-gray-900 text-start text-xl md:text-3xl font-semibold mb-3">Update Medical Record</h2>
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
                      <input type="text" name="patient_id" id="patient_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?=$data['patient_id']?>" required>
                    </div>
                         </div>

                         <div class="col-span-full mb-4">
                    <label for="diagnosis" class="block text-sm font-medium leading-6 text-gray-900">Diagnosis</label>
                    <div class="mt-2">
                      <input type="text" name="diagnosis" id="diagnosis" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?=$data['diagnosis']?>" required>
                    </div>
                         </div>

                         <div class="col-span-full mb-4">
                    <label for="treatmentPlan" class="block text-sm font-medium leading-6 text-gray-900">Treatment Plan</label>
                    <div class="mt-2">
                      <input type="text" value="<?=$data['treatmentPlan']?>" name="treatmentPlan" id="treatmentPlan" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                    </div>
                         </div>

                         <div class="col-span-full mb-4">
                    <label for="VitalSigns" class="block text-sm font-medium leading-6 text-gray-900">Vital Signs</label>
                    <div class="mt-2">
                      <input type="text" value="<?=$data['VitalSigns']?>" name="VitalSigns" id="VitalSigns" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"  >
                    </div>
                         </div>

                         <div class="col-span-full mb-4">
                    <label for="MedicalHistory" class="block text-sm font-medium leading-6 text-gray-900">Medical History</label>
                    <div class="mt-2">
                      <input type="text" value="<?=$data['MedicalHistory']?>" name="MedicalHistory" id="MedicalHistory" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"  >
                    </div>
                         </div>

                          <div class="col-span-full mb-4">
                            <label for="ProgressNotes" class="block text-sm font-medium leading-6 text-gray-900">Progress Notes</label>
                            <div class="mt-2.5">
                              <textarea name="ProgressNotes"  id="ProgressNotes" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?=$data['ProgressNotes']?></textarea>
                            </div>
                          </div>

                          <div class="col-span-full mb-4">
                    <label for="ConsultationsAndReferrals" class="block text-sm font-medium leading-6 text-gray-900">Consultations And Referrals</label>
                    <div class="mt-2">
                      <input type="text" value="<?=$data['ConsultationsAndReferrals']?>" name="ConsultationsAndReferrals" id="ConsultationsAndReferrals" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"  >
                    </div>
                         </div>
         
            </div>
          </div>
         
          <div class="mt-3 flex items-center justify-end gap-x-6">
            <button type="submit" id="btn_add" class="rounded-md bg-indigo-600 px-5 py-2.5 text-base font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 action_btn">Update Medical Record</button>
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
      url: "<?=$url?>php/ajax/common/update-medical-record.php",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function (res) {
        $(".action_btn").attr('disabled', false);
        $(".action_btn").removeClass('cursor-not-allowed bg-blue-400');
        $(".action_btn").text('Update Medical Record');
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