  <section class=" mt-[68px] sm:mt-0">
        <div class="relative flex flex-col items-center justify-center px-6 py-8 mx-auto sm:h-[80vh]  lg:py-0 mt-10">
            <img src="<?=$url?>assets/images/staff_bg.jpg" class="absolute inset-0 w-full h-full object-cover opacity-20" alt="Background">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 ">
                <img class="mx-auto h-10 w-auto" src="<?=$url?>assets/images/logo.jpeg" alt="logo">
            </a>
            <div class="w-full bg-white z-50 rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 ">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                        Sign in to your account
                    </h1>
                    <form class="space-y-4 md:space-y-6" id="loginForm">
                    <div class="p-4  text-sm text-red-800 rounded-lg bg-red-50  hidden error_alert alert_boxes" role="alert">
</div>
<div class="p-4  text-sm text-green-800 rounded-lg bg-green-50  hidden success_alert alert_boxes" role="alert">
</div>
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 ">Username</label>
                            <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 0" placeholder="Username" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 0" required="">
                        </div>

                        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center action_btn">Sign in</button>
            
                    </form>
                </div>
            </div>
        </div>
      </section>

      <script>
$(document).on('submit','#loginForm',function(e){
    e.preventDefault();
    $(".action_btn").attr('disabled',true);
    $(".action_btn").text('Loading...');
    $(".action_btn").addClass('cursor-not-allowed bg-blue-400');
    $.ajax({
    method:"POST",
    url: "<?=$url?>php/ajax/login.php",
    data:$(this).serialize(),
    success: function(res){
      $(".action_btn").attr('disabled',false);
      $(".action_btn").removeClass('cursor-not-allowed bg-blue-400');
      $(".action_btn").text('Sign in');
      var data = JSON.parse(res);
      if(data.status === 'success') {
        $('.error_alert').addClass('hidden');
        $('#loginForm').find('input').val('');
      $('.success_alert').removeClass('hidden');
      $('.success_alert').html(data.msg);
      window.location.href=data.url;
    } else {
      $('.success_alert').addClass('hidden');
      $('.error_alert').removeClass('hidden');
      $('.error_alert').html(data.msg);
    }
     
}});
});
  </script>