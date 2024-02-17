<section class=" ">
            <div class="max-w-4xl mx-auto">
                <h2 class="leading-7 text-gray-900 text-start text-xl md:text-3xl font-semibold mb-3">Book an Appointment</h2>
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
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                    <div class="mt-2">
                      <input type="text" name="title" id="title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                    </div>
                         </div>
                         <div class="col-span-full mb-4">
                            <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                            <div class="mt-2.5">
                              <textarea name="description" id="description" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                            </div>
                          </div>
             <div class="col-span-full mb-4">
                 <label for="gender" class="block text-sm font-medium leading-6 text-gray-900">Select Doctor</label>
                 <div class="mt-2">
                   <select style="    min-width: 100%;" id="gender" name="gender"  class="block w-full rounded-md px-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6" required>
                     <option value="Male">Male</option>
                     <option value="Female">Female</option>
                     <option value="anyone">Anyone</option>
                   </select>
                 </div>
                       </div>
              <div class="col-span-full mb-4">
                <label for="time" class="block text-sm font-medium leading-6 text-gray-900">Appointment Date & Time</label>
                <div class="mt-2">
                  <input type="datetime-local" name="time" id="time" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                </div>
                     </div>
         
         
            </div>
          </div>
         
          <div class="mt-3 flex items-center justify-end gap-x-6">
            <button type="submit" id="btn_add" class="rounded-md bg-indigo-600 px-5 py-2.5 text-base font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 action_btn">Book Appointment</button>
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
      url: "<?= $url ?>php/ajax/common/book-appointment.php",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function (res) {
        $(".action_btn").attr('disabled', false);
        $(".action_btn").removeClass('cursor-not-allowed bg-blue-400');
        $(".action_btn").text('Book Appointment');
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