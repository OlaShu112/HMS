<?php
require(__DIR__ . '/config.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $base = $_POST["base"];
    $path = $_POST["path"];
    function validate($variable,$msg){
        if(empty(trim($variable))){
            exit(json_encode(array('status'=>'error','msg'=>$msg)));
        }
    }
    $start_time = microtime(true);
    // Validations
    validate($base,'Please enter base!');
    validate($path,'Please enter path!');
    $full_path = $url.$base.'/'.$path;
    $ch = curl_init($full_path);
    
    // Set options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_NOBODY, false);

// Start timing the request


// Execute cURL session
$response = curl_exec($ch);

// Calculate the response time
$end_time = microtime(true);

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
$response_time = ($end_time - $start_time) * 1000; // Convert to milliseconds
  
if($status_code===200){
    $status_code='Working';
    $class="status_working";
}else{
   $class="status_failed";
  $status_code='Not Found';
}
$output =
'
<form class="mt-5 mx-auto flex">
<div class="" style="width: 210px;">
    <label for="url" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
    <input type="text" id="url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 '.$class.'" value="'.$status_code.'" readonly required />
  </div>
<div class="" style="width: 260px;">
    <label for="path" class="block mb-2 text-sm font-medium text-gray-900">Size</label>
    <input type="text" name="path" id="path" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="'.round($size_kb, 2). ' KB" readonly required />
  </div>
  <div class="" style="width: 260px;">
    <label for="path" class="block mb-2 text-sm font-medium text-gray-900">Time</label>
    <input type="text" name="path" id="path" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="'.round($response_time). ' ms" readonly required />
  </div>
  <div>
</form>
';
exit(json_encode(array('status'=>'success','html'=>$output)));
}else{
    exit(json_encode(array('status'=>'error','msg'=>'Something went wrong!')));
}
?>