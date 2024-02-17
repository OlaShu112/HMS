<link rel="stylesheet" href="<?=$url?>assets/css/custom.css">
<section class="bg-white ">
                <div class="py-8 px-4 mx-auto max-w-screen-xl text-start  lg:px-12">

                    <h1 class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-gray-900 md:text-3xl ">
                        System Settings</h1>
                    
                        <div class="mt-10 grid grid-cols-1">
      <form class="space-y-6" id="dataForm" enctype="multipart/form-data">
      <div class="col-span-full p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50  hidden error_alert alert_boxes" role="alert">
      </div>
      <div class="col-span-full p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50  hidden success_alert alert_boxes"
        role="alert">
      </div>
        <div>
            <label for="role_dashbaord" class="block text-sm font-medium leading-6 text-gray-900">Dashboard</label>
            <div class="mt-2">
            <select id="role_dashbaord" name="role_dashbaord" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600  sm:text-sm sm:leading-6 px-2">
              <option value="1">Admin</option>
              <option value="2">Patient</option>
              <option value="3">Doctor</option>
              <option value="4" >Receptionist</option>
              <option value="5">Nurse</option>
            </select>
          </div>
          </div>
    

            <div class="col-span-full mb-4">
          <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
          <div class="mt-2">
            <select id="status" name="status" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600  sm:text-sm sm:leading-6 px-2">
              <option value="0">Open</option>
              <option value="1" >Close</option>
            </select>
          </div>
          </div>
  
          <div class="mt-3 flex items-center justify-end gap-x-6">
            <button type="submit" class="rounded-md bg-indigo-600 px-5 py-2.5 text-base font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 action_btn" >Update</button>
          </div>
      </form>
                   

                </div>
            </section>

            <script>
                $(document).on('change','#role_dashbaord',function(e) {
                    e.preventDefault();
                    $("#status").html('<option>Loading</option>');
                    $(".action_btn").attr('disabled', true);
    $(".action_btn").addClass('cursor-not-allowed bg-blue-400');
                    $.ajax({
      method: "POST",
      url: "<?= $url ?>php/ajax/access-control/get_system.php",
      data: {id:$(this).val()},
      cache: false,
      success: function (res) {
        $(".action_btn").attr('disabled', false);
        $(".action_btn").removeClass('cursor-not-allowed bg-blue-400');
        $("#status").html(res);
      }
                })
                })
  $(document).on('submit', '#dataForm', function (e) {
    e.preventDefault();
    var formData = new FormData($("#dataForm")[0]);
    $(".action_btn").attr('disabled', true);
    $(".action_btn").text('Loading...');
    $(".action_btn").addClass('cursor-not-allowed bg-blue-400');
    $.ajax({
      method: "POST",
      url: "<?= $url ?>php/ajax/access-control/system.php",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function (res) {
        $(".action_btn").attr('disabled', false);
        $(".action_btn").removeClass('cursor-not-allowed bg-blue-400');
        $(".action_btn").text('Update');
        var data = JSON.parse(res);
        if (data.status === 'success') {
          $('.error_alert').addClass('hidden');
          $('.success_alert').removeClass('hidden');
          $('.success_alert').html(data.msg);
          setTimeout(() => {
            $('.success_alert').addClass('hidden');
          $('.error_alert').addClass('hidden');
          }, 2000);
        } else {
          $('.success_alert').addClass('hidden');
          $('.error_alert').removeClass('hidden');
          $('.error_alert').html(data.msg);
        }

      }
    });
  });
</script>