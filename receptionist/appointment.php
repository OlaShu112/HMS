<style>
#myDataTable_length label select{
padding-right: 21px !important;
}
.dataTables_wrapper{
    position: unset !important;
}
<?php
$data = mysqli_query($conn,"SELECT * FROM `appointment` order by id desc");
?>
</style>

<section class="bg-white ">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-start lg:py-16 lg:px-12">
        
                <h1 class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-gray-900 md:text-3xl ">Appiontments</h1>
                <div class="flex flex-col mt-5">
                    <div class="-m-1.5 overflow-x-auto">
                      <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                          <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="myDataTable">
                            <thead>
                              <tr>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">#</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Apppiotment ID</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Patient ID</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Title</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Doctor ID</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Status</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Apppiotment Time</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Booked At</th>
                                <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Action</th>
                              </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <?php
if(mysqli_num_rows($data)>0){
  $sno=0;
  $currentDateTime = date('Y-m-d H:i:s');
  while($row = mysqli_fetch_assoc($data)){
    $appointmentTime = strtotime($row['time']);
    $currentTime = strtotime($currentDateTime);
if($appointmentTime > $currentTime && intval($row['status']) === 1){
mysqli_query($conn,"UPDATE `appointment` SET `status`=2 WHERE id='$row[id]' and `status`=1");
}
  $sno++;
?>
                              <tr class="hover:bg-gray-100 ">
                              <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$sno?></td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$row['id']?></td>
  <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$row['patient_id']?></td>
                                <td class="text-start px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 "><?=$row['title']?></td>
                                <td class="text-start px-6 py-4 whitespace-nowrap text-sm text-gray-800 "><?=$row['doctor_id']?></td>
                                <td class="text-start px-6 py-4 whitespace-nowrap text-sm text-gray-800 "><?php if(intval($row['status'])===1){ echo 'Upcoming'; }elseif(intval($row['status'])===2){ echo 'Active'; }else{ echo 'Past'; } ?> </td>
                                <td class="text-start px-6 py-4 whitespace-nowrap text-sm text-gray-800 "><?=date('d M, Y h:i A', strtotime($row['time']))?></td>
                                <td class="text-start px-6 py-4 whitespace-nowrap text-sm text-gray-800 "><?=date('d M, Y h:i A', strtotime($row['created_at']))?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                  <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots<?=$sno?>" class="inline-flex items-center p-2 text-sm font-medium text-end text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none  focus:ring-gray-50 " type="button">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                    <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                    </svg>
                                    </button>

                                    <div id="dropdownDots<?=$sno?>" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow  ">
                                        <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownMenuIconButton">
                                        <li>
                                            <a href="<?=$url?>receptionist/appointment-details?id=<?=$row['id']?>" class="block px-4 py-2 hover:bg-gray-100 ">View</a>
                                          </li>
                                          <li>
                                            <a href="<?=$url?>receptionist/appointment-edit?id=<?=$row['id']?>" class="block px-4 py-2 hover:bg-gray-100 ">Edit</a>
                                          </li>
                                          <li>
                                            <a href="<?=$url?>php/ajax/common/delete/appointment.php?id=<?=$row['id']?>" class="block px-4 py-2 hover:bg-gray-100  ">Delete</a>
                                          </li>
                                        </ul>
                                    </div>
                                </td>
                              </tr>
                              <?php
}
}
                              ?>
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
            $('#myDataTable').DataTable();
    });
    </script>