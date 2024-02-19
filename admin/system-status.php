<style>
#myDataTable_length label select{
padding-right: 21px !important;
}
.dataTables_wrapper{
    position: unset !important;
}
.status_working{
    color: #25a92d !important;
}
.status_failed{
    color: #a92551 !important;
}
</style>
<?php
function getApiDetails($url,$path) {
    // Initialize cURL session
    $url = $url.$path;
    $ch = curl_init($url);
    
    // Set options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_NOBODY, false);
    
    // Start timing the request
    $start_time = microtime(true);
    
    // Execute cURL session
    $response = curl_exec($ch);
    
    // Calculate the response time
    $end_time = microtime(true);
    $response_time = ($end_time - $start_time) * 1000; // Convert to milliseconds
    
    // Get the header size and content
    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header = substr($response, 0, $header_size);
    $body = substr($response, $header_size);
    
    // Calculate the size of the response
    $size = strlen($body);
    
    // Size in KB
    $size_kb = $size / 1024;
    
    // Get the HTTP status code
    $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    // Close cURL session
    curl_close($ch);
    
    // Return the details
    if($status_code===200){
        $status_code='<span class="status_working">Working</span>';
    }else{
      $status_code='<span class="status_failed">Problem</span>';
    }
    return [
        'status' => $status_code,
        'size_kb' => round($size_kb, 2),
        'response_time_ms' => round($response_time)
    ];
}
?>
<section class="bg-white ">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-start lg:py-16 lg:px-12">
        
                <h1 class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-gray-900 md:text-3xl ">System Status</h1>
                <div class="flex flex-col mt-5">
                    <div class="-m-1.5 overflow-x-auto">
                      <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                          <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="myDataTable">
                            <thead>
                              <tr>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Title</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">URL</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Status</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Size</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Time</th>
                              </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
<?php  $api1 = getApiDetails($url,'admin/manage-patients'); ?>
<tr class="hover:bg-gray-100 ">
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">Patients Data</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">admin/manage-patients</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api1['status'] ?></td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api1['size_kb'] ?>KB</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api1['response_time_ms'] ?>ms</td>
</tr>
<?php  $api2 = getApiDetails($url,'admin/patient-details'); ?>
<tr class="hover:bg-gray-100 ">
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">Patient Details</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">admin/patient-details</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api2['status'] ?></td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api2['size_kb'] ?>KB</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api2['response_time_ms'] ?>ms</td>
</tr>
<?php  $api3 = getApiDetails($url,'admin/patient-edit'); ?>
<tr class="hover:bg-gray-100 ">
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">Patient Edit View</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">admin/patient-edit</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api3['status'] ?></td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api3['size_kb'] ?>KB</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api3['response_time_ms'] ?>ms</td>
</tr>
<?php  $api4 = getApiDetails($url,'php/ajax/common/patient-update.php'); ?>
<tr class="hover:bg-gray-100 ">
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">Patient Update</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">php/ajax/common/patient-update.php</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api4['status'] ?></td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api4['size_kb'] ?>KB</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api4['response_time_ms'] ?>ms</td>
</tr>
<?php  $api5 = getApiDetails($url,'admin/add-patient'); ?>
<tr class="hover:bg-gray-100 ">
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">Patient Add Page View</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">admin/add-patient</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api5['status'] ?></td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api5['size_kb'] ?>KB</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api5['response_time_ms'] ?>ms</td>
</tr>
<?php  $api6 = getApiDetails($url,'php/ajax/common/add/patient.php'); ?>
<tr class="hover:bg-gray-100 ">
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">Patient Add</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">php/ajax/common/add/patient.php</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api6['status'] ?></td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api6['size_kb'] ?>KB</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api6['response_time_ms'] ?>ms</td>
</tr>

<!-- Hospital Staff -->
<?php  $api11 = getApiDetails($url,'admin/manage-hospital-staff'); ?>
<tr class="hover:bg-gray-100 ">
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">Hospital Staff Data</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">admin/manage-hospital-staff</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api11['status'] ?></td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api11['size_kb'] ?>KB</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api11['response_time_ms'] ?>ms</td>
</tr>
<?php  $api12 = getApiDetails($url,'admin/hospital-staff-details'); ?>
<tr class="hover:bg-gray-100 ">
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">Hospital Staff member Details</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">admin/hospital-staff-details</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api12['status'] ?></td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api12['size_kb'] ?>KB</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api12['response_time_ms'] ?>ms</td>
</tr>
<?php  $api13 = getApiDetails($url,'admin/hospital-staff-edit'); ?>
<tr class="hover:bg-gray-100 ">
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">Hospital Staff Edit View</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">admin/hospital-staff-edit</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api13['status'] ?></td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api13['size_kb'] ?>KB</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api13['response_time_ms'] ?>ms</td>
</tr>
<?php  $api14 = getApiDetails($url,'php/ajax/common/hospital-staff-update.php'); ?>
<tr class="hover:bg-gray-100 ">
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">Hospital Staff Update</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">php/ajax/common/hospital-staff-update.php</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api14['status'] ?></td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api14['size_kb'] ?>KB</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api14['response_time_ms'] ?>ms</td>
</tr>
<?php  $api15 = getApiDetails($url,'admin/add-hospital-staff'); ?>
<tr class="hover:bg-gray-100 ">
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">Hospital Staff Add Page View</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">admin/add-hospital-staff</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api15['status'] ?></td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api15['size_kb'] ?>KB</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api15['response_time_ms'] ?>ms</td>
</tr>
<?php  $api16 = getApiDetails($url,'php/ajax/common/add/hospital-staff.php'); ?>
<tr class="hover:bg-gray-100 ">
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">Hospital Staff Add</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">php/ajax/common/add/hospital-staff.php</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api16['status'] ?></td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api16['size_kb'] ?>KB</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api16['response_time_ms'] ?>ms</td>
</tr>

<!-- Prescription -->
<?php  $api21 = getApiDetails($url,'doctor/prescription'); ?>
<tr class="hover:bg-gray-100 ">
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">Prescriptions Data</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">doctor/prescription</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api21['status'] ?></td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api21['size_kb'] ?>KB</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api21['response_time_ms'] ?>ms</td>
</tr>
<?php  $api22 = getApiDetails($url,'doctor/prescription-details'); ?>
<tr class="hover:bg-gray-100 ">
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">Prescription Details</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">doctor/prescription-details</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api22['status'] ?></td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api22['size_kb'] ?>KB</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api22['response_time_ms'] ?>ms</td>
</tr>
<?php  $api23 = getApiDetails($url,'doctor/prescription-edit'); ?>
<tr class="hover:bg-gray-100 ">
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">Prescription Edit View</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">doctor/prescription-edit</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api23['status'] ?></td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api23['size_kb'] ?>KB</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api23['response_time_ms'] ?>ms</td>
</tr>
<?php  $api24 = getApiDetails($url,'php/ajax/doctor/update-prescription.php'); ?>
<tr class="hover:bg-gray-100 ">
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">Prescription Update</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">php/ajax/doctor/update-prescription.php</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api24['status'] ?></td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api24['size_kb'] ?>KB</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api24['response_time_ms'] ?>ms</td>
</tr>
<?php  $api25 = getApiDetails($url,'doctor/add-prescription'); ?>
<tr class="hover:bg-gray-100 ">
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">Prescription Add Page View</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">doctor/add-prescription</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api25['status'] ?></td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api25['size_kb'] ?>KB</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api25['response_time_ms'] ?>ms</td>
</tr>
<?php  $api26 = getApiDetails($url,'php/ajax/doctor/add-prescription.php'); ?>
<tr class="hover:bg-gray-100 ">
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">Prescription Add</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">php/ajax/doctor/add-prescription.php</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api26['status'] ?></td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api26['size_kb'] ?>KB</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api26['response_time_ms'] ?>ms</td>
</tr>

<!-- Appiontments -->
<?php  $api31 = getApiDetails($url,'admin/appointment'); ?>
<tr class="hover:bg-gray-100 ">
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">Appiontments Data</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">admin/appointment</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api31['status'] ?></td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api31['size_kb'] ?>KB</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api31['response_time_ms'] ?>ms</td>
</tr>
<?php  $api32 = getApiDetails($url,'admin/appointment-details'); ?>
<tr class="hover:bg-gray-100 ">
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">Appiontment Details</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">admin/appointment-details</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api22['status'] ?></td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api22['size_kb'] ?>KB</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api22['response_time_ms'] ?>ms</td>
</tr>
<?php  $api33 = getApiDetails($url,'admin/appointment-edit'); ?>
<tr class="hover:bg-gray-100 ">
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">Appiontment Edit View</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">admin/appointment-edit</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api33['status'] ?></td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api33['size_kb'] ?>KB</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api33['response_time_ms'] ?>ms</td>
</tr>
<?php  $api34 = getApiDetails($url,'php/ajax/common/edit-appointment.php'); ?>
<tr class="hover:bg-gray-100 ">
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">Appiontment Update</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">php/ajax/common/edit-appointment.php</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api34['status'] ?></td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api34['size_kb'] ?>KB</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api34['response_time_ms'] ?>ms</td>
</tr>
<?php  $api35 = getApiDetails($url,'admin/book-appointment'); ?>
<tr class="hover:bg-gray-100 ">
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">Appiontment Add Page View</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">admin/book-appointment</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api35['status'] ?></td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api35['size_kb'] ?>KB</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api35['response_time_ms'] ?>ms</td>
</tr>
<?php  $api36 = getApiDetails($url,'php/ajax/common/book-appointment.php'); ?>
<tr class="hover:bg-gray-100 ">
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">Appiontment Add</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">php/ajax/common/book-appointment.php</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api36['status'] ?></td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api36['size_kb'] ?>KB</td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$api36['response_time_ms'] ?>ms</td>
</tr>

                  
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
           
            </div>
        </section>

    <script>
        $(document).ready(function() {
            $('#myDataTable').DataTable({
                order:false,
            });
    });
    </script>