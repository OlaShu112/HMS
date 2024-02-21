<section class=" ">
            <div class="max-w-4xl mx-auto">
                <h2 class="leading-7 text-gray-900 text-start text-xl md:text-3xl font-semibold mb-3">Add Medical Record</h2>
                                                              <div id="add_alertm"></div>
             </div>
         <form class="max-w-4xl mx-auto" id="dataForm" >
           <div class=" mt-4">
            <div class="col-span-full p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50  hidden error_alert alert_boxes" role="alert">
         </div>
         <div class="col-span-full p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50  hidden success_alert alert_boxes"
           role="alert"></div>
            
         
            <div class="mt-3 grid grid-cols-1 gap-x-6 sm:grid-cols-6">
            <div class="col-span-full mb-4">
                    <label for="patient_id" class="block text-sm font-medium leading-6 text-gray-900">Patient ID</label>
                    <div class="mt-2">
                      <input type="text" name="patient_id" id="patient_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                    </div>
                         </div>

                         <div class="col-span-full mb-4">
                    <label for="diagnosis" class="block text-sm font-medium leading-6 text-gray-900">Diagnosis</label>
                    <div class="mt-2">
                      <input type="text" name="diagnosis" id="diagnosis" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                    </div>
                         </div>

                         <div class="col-span-full mb-4">
                    <label for="treatmentPlan" class="block text-sm font-medium leading-6 text-gray-900">Treatment Plan</label>
                    <div class="mt-2">
                      <input type="text" name="treatmentPlan" id="treatmentPlan" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                    </div>
                         </div>

                         <div class="col-span-full mb-4">
                    <label for="VitalSigns" class="block text-sm font-medium leading-6 text-gray-900">Vital Signs</label>
                    <div class="mt-2">
                      <input type="text" name="VitalSigns" id="VitalSigns" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >
                    </div>
                         </div>

                         <div class="col-span-full mb-4">
                    <label for="MedicalHistory" class="block text-sm font-medium leading-6 text-gray-900">Medical History</label>
                    <div class="mt-2">
                      <input type="text" name="MedicalHistory" id="MedicalHistory" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >
                    </div>
                         </div>

                          <div class="col-span-full mb-4">
                            <label for="ProgressNotes" class="block text-sm font-medium leading-6 text-gray-900">Progress Notes</label>
                            <div class="mt-2.5">
                              <textarea name="ProgressNotes" id="ProgressNotes" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                            </div>
                          </div>

                          <div class="col-span-full mb-4">
                    <label for="ConsultationsAndReferrals" class="block text-sm font-medium leading-6 text-gray-900">Consultations And Referrals</label>
                    <div class="mt-2">
                      <input type="text" name="ConsultationsAndReferrals" id="ConsultationsAndReferrals" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >
                    </div>
                         </div>
         
            </div>
          </div>
         
          <div class="mt-3 flex items-center justify-end gap-x-6">
            <button type="submit" id="btn_add" class="rounded-md bg-indigo-600 px-5 py-2.5 text-base font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 action_btn">Add Medical Record</button>
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
      url: "<?=$url?>php/ajax/common/add/medical-record.php",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function (res) {
        $(".action_btn").attr('disabled', false);
        $(".action_btn").removeClass('cursor-not-allowed bg-blue-400');
        $(".action_btn").text('Add Medical Record');
        var data = JSON.parse(res);
        if (data.status === 'success') {
          $('.error_alert').addClass('hidden');
          $('.success_alert').removeClass('hidden');
          $('.success_alert').html(data.msg);
          $('#dataForm').find('input').val('');
          $('#dataForm').find('textarea').val('');
        } else {
          $('.success_alert').addClass('hidden');
          $('.error_alert').removeClass('hidden');
          $('.error_alert').html(data.msg);
        }

      }
    });
  });
</script>