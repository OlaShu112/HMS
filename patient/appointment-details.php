<?php
$appiontment_id = $_GET['id'];
$appiontment_data = mysqli_query($conn,"SELECT * FROM `appointment` WHERE `id`='$appiontment_id' AND `patient_id`='$_SESSION[user_id]'");
if(mysqli_num_rows($appiontment_data)===0){
exit('Appiontment Not Found!');
}
$data = mysqli_fetch_assoc($appiontment_data);
$patient_id= $data['patient_id'];
$doctor_id= $data['doctor_id'];
$patient_query = mysqli_query($conn,"SELECT * FROM `users` WHERE `id`=$patient_id");
if(mysqli_num_rows($patient_query)>0){
    $patient_data = mysqli_fetch_assoc($patient_query);
$patient_name = $patient_data['name'];
$patient_id = $patient_data['id'];
}else{
    $patient_name = 'Not Found';
    $patient_id = 'Not Found';
}

$doctor_query = mysqli_query($conn,"SELECT * FROM `users` WHERE `id`=$doctor_id");
if(mysqli_num_rows($doctor_query)>0){
    $doctor_data = mysqli_fetch_assoc($doctor_query);
$doctor_name = $doctor_data['name'];
$doctor_id = $doctor_data['id'];
}else{
    $doctor_name = 'Not Found';
    $doctor_id = 'Not Found';
}
?>
<link rel="stylesheet" href="<?=$url?>assets/css/custom.css">
<section class="bg-white ">
                <div class="py-8 px-4 mx-auto max-w-screen-2xl text-start  lg:px-12">

                    <h1 class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-gray-900 md:text-3xl ">
                        Appiontment Details</h1>
                    <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-x-10">
                        <div class="">
                            <div class="col-span-full mb-4">
                                <label for="message"
                                    class="block text-sm font-medium leading-6 text-gray-900">Important Notes by Doctor</label>
                                <div class="mt-2.5">
                                    <textarea name="message" id="message" rows="4"
                                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" readonly disabled><?=$data['notes']?></textarea>
                                </div>
                            </div>
                            <hr>
                            <h1 class="mb-3 mt-2 text-2xl font-semibold tracking-tight leading-none text-gray-900 ">
                                More</h1>
                            <div class="col-span-full mb-4">
                                <label for="txtDate" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
                                <div class="mt-2">
                                  <input type="text" name="date" id="txtDate" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?php if(intval($data['status'])===1){ echo 'Upcoming'; }elseif(intval($row['status'])===2){ echo 'Active'; }else{ echo 'Past'; } ?>" readonly disabled>
                                </div>
                                     </div>
                            <div class="col-span-full mb-4">
                                <label for="txtDate"
                                    class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                                <div class="mt-2">
                                    <input type="text" name="date" id="txtDate" value="<?=$data['title']?>"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        readonly disabled>
                                </div>
                            </div>
                            <div class="col-span-full mb-4">
                                <label for="message"

                                    class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                                <div class="mt-2.5">
                                    <textarea name="message" id="message" rows="4"
                                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" readonly disabled><?=$data['description']?></textarea>
                                </div>
                            </div>
                          
                            <div class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2 mb-4">
                                <div class="">
                                    <label for="txtDate"
                                        class="block text-sm font-medium leading-6 text-gray-900">Doctor ID</label>
                                    <div class="mt-2">
                                        <input type="text" name="date" id="txtDate" value="<?=$doctor_id?>"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            readonly disabled>
                                    </div>
                                </div>

                                <div class="">
                                    <label for="txtDate"
                                        class="block text-sm font-medium leading-6 text-gray-900">Doctor Name</label>
                                    <div class="mt-2">
                                        <input type="text" name="date" id="txtDate" value="<?=$doctor_name?>"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            readonly disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-full mb-4">
                                <label for="txtDate" class="block text-sm font-medium leading-6 text-gray-900">Appointment Time</label>
                                <div class="mt-2">
                                  <input type="text" name="date" id="txtDate" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?=date('d M, Y h:i A', strtotime($data['time']))?>" disabled readonly>
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


                        <div>

                            <div class="wrapper">
                                <section class="chat-area">
<header>
    <img src="<?=$url?><?php if($doctor_data['img']!==null){ echo 'assets/data/'.$doctor_data['img']; }else{ echo 'assets/data/user_image.png'; } ?>" alt="">
    <div class="details">
      <span><?=$doctor_data['name']?></span>
      <!-- <p>Online</p> -->
    </div>
  </header>
</header>
                                    <div class="chat-box">
                                    Loading...
                                    </div>
                                <?php
            //  if(intval($doctor_id)===intval($_SESSION['user_id'])){
?>
    <form action="#" class="typing-area">
                                      <input type="text" class="incoming_id" name="incoming_id" value="<?=$doctor_id?>" hidden>
                                      <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
                                      <button><i class="bi bi-send"></i></button>
                                    </form>
<?php
                            // }  
                              ?>
                                </section>
                            </div>
                             
                         
                        </div>
                    </div>

                </div>
            </section>

            <script>
                const form = document.querySelector(".typing-area"),
incoming_id = form.querySelector(".incoming_id").value,
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault();
}

inputField.focus();
inputField.onkeyup = ()=>{
    if(inputField.value != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}

sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "<?= $url ?>php/ajax/common/chat/insert-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              inputField.value = "";
              scrollToBottom();
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "<?= $url ?>php/ajax/common/chat/get-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            chatBox.innerHTML = data;
            if(!chatBox.classList.contains("active")){
                scrollToBottom();
              }
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("incoming_id="+incoming_id);
}, 500);

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
  }
  
            </script>