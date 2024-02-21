<?php
$medical_records_id = $_GET['id'];
$user_data = mysqli_query($conn,"SELECT * FROM `medical_records` WHERE `id`=$medical_records_id AND `patient_id`=$_SESSION[user_id]");
if(mysqli_num_rows($user_data)===0){
exit('Medical Record Not Found!');
}
$data = mysqli_fetch_assoc($user_data);
?>
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
                      <input type="text" name="patient_id" id="patient_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?=$data['patient_id']?>" readonly disabled>
                    </div>
                         </div>

                         <div class="col-span-full mb-4">
                    <label for="diagnosis" class="block text-sm font-medium leading-6 text-gray-900">Diagnosis</label>
                    <div class="mt-2">
                      <input type="text" name="diagnosis" id="diagnosis" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?=$data['diagnosis']?>" readonly disabled>
                    </div>
                         </div>

                         <div class="col-span-full mb-4">
                    <label for="treatmentPlan" class="block text-sm font-medium leading-6 text-gray-900">Treatment Plan</label>
                    <div class="mt-2">
                      <input type="text" value="<?=$data['treatmentPlan']?>" name="treatmentPlan" id="treatmentPlan" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" readonly disabled>
                    </div>
                         </div>

                         <div class="col-span-full mb-4">
                    <label for="VitalSigns" class="block text-sm font-medium leading-6 text-gray-900">Vital Signs</label>
                    <div class="mt-2">
                      <input type="text" value="<?=$data['VitalSigns']?>" name="VitalSigns" id="VitalSigns" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"  readonly disabled>
                    </div>
                         </div>

                         <div class="col-span-full mb-4">
                    <label for="MedicalHistory" class="block text-sm font-medium leading-6 text-gray-900">Medical History</label>
                    <div class="mt-2">
                      <input type="text" value="<?=$data['MedicalHistory']?>" name="MedicalHistory" id="MedicalHistory" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"  readonly disabled>
                    </div>
                         </div>

                          <div class="col-span-full mb-4">
                            <label for="ProgressNotes" class="block text-sm font-medium leading-6 text-gray-900">Progress Notes</label>
                            <div class="mt-2.5">
                              <textarea name="ProgressNotes" readonly disabled id="ProgressNotes" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?=$data['ProgressNotes']?></textarea>
                            </div>
                          </div>

                          <div class="col-span-full mb-4">
                    <label for="ConsultationsAndReferrals" class="block text-sm font-medium leading-6 text-gray-900">Consultations And Referrals</label>
                    <div class="mt-2">
                      <input type="text" value="<?=$data['ConsultationsAndReferrals']?>" name="ConsultationsAndReferrals" id="ConsultationsAndReferrals" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"  readonly disabled>
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
         

         
         </form>
        </section>