<link rel="stylesheet" href="<?=$url?>assets/css/custom.css">
<section class="bg-white ">
                <div class="py-8 px-4 mx-auto max-w-screen-xl text-start  lg:px-12">

                    <h1 class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-gray-900 md:text-3xl ">
                        Add Patient</h1>
                        <div class="mt-10 grid grid-cols-1">
      <form class="space-y-6" id="dataForm" enctype="multipart/form-data">
      <div class="col-span-full p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50  hidden error_alert alert_boxes" role="alert">
      </div>
      <div class="col-span-full p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50  hidden success_alert alert_boxes"
        role="alert">
      </div>
        <div>
            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Full Name</label>
            <div class="mt-2">
              <input id="name" name="name" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
    
        <div>
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
            <div class="mt-2">
              <input id="email" name="email" type="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
    
        <div>
          <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
          <div class="mt-2">
            <input id="username" name="username" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
            <div>
              <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone</label>
              <div class="mt-2.5">
                <input type="text" name="phone" id="phone" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>
            <div class="sm:ms-2">
              <label for="dob" class="block text-sm font-medium leading-6 text-gray-900">Date of birth</label>
              <div class="mt-2.5">
                <input type="date" name="dob" id="dob" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>
        </div>
        <div class="col-span-full mb-4">
        <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
        <div class="mt-2">
          <input type="text" name="address" id="address"
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
        <div>
          <div class="flex items-center justify-between">
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
    
          </div>
          <div class="mt-2">
            <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
  
          <div class="mt-3 flex items-center justify-end gap-x-6">
            <button type="submit" class="rounded-md bg-indigo-600 px-5 py-2.5 text-base font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 action_btn" >Add</button>
          </div>
      </form>
                   

                </div>
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
      url: "<?= $url ?>php/ajax/common/add/patient.php",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function (res) {
        $(".action_btn").attr('disabled', false);
        $(".action_btn").removeClass('cursor-not-allowed bg-blue-400');
        $(".action_btn").text('Add');
        var data = JSON.parse(res);
        if (data.status === 'success') {
          $('.error_alert').addClass('hidden');
          $('.success_alert').removeClass('hidden');
          $('.success_alert').html(data.msg);
          $('#dataForm').find('input').val('');
        } else {
          $('.success_alert').addClass('hidden');
          $('.error_alert').removeClass('hidden');
          $('.error_alert').html(data.msg);
        }

      }
    });
  });
</script>