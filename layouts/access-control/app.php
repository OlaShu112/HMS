<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="<?=$url?>assets/css/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?=$url?>assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="<?=$url?>assets/css/sweetalert2.min.css" rel="stylesheet">
    <script src="<?=$url?>assets/js/sweetalert2.all.min.js"></script>
    <script src="<?=$url?>assets/js/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<?php
 if (isset($head)){
echo $head;
 }
    ?>
</head>
<body class="flex flex-col min-h-screen">

    <div class="antialiased bg-gray-50 ">
        <nav class="bg-white border-b border-gray-200 px-4 py-2.5  fixed left-0 right-0 top-0 z-50">
          <div class="flex flex-wrap justify-between items-center">
            <div class="flex justify-start items-center">
              <button
                data-drawer-target="drawer-navigation"
                data-drawer-toggle="drawer-navigation"
                aria-controls="drawer-navigation"
                class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 "
              >
                <svg
                  aria-hidden="true"
                  class="w-6 h-6"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"
                  ></path>
                </svg>
                <svg
                  aria-hidden="true"
                  class="hidden w-6 h-6"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  ></path>
                </svg>
                <span class="sr-only">Toggle sidebar</span>
              </button>
              <a href="<?=$url?>access-control/" class="flex items-center justify-between mr-4">
                <img
                  src="<?=$url?>assets/images/logo.jpeg"
                  class="mr-3 h-8"
                  alt="HMS Logo"
                />
              </a>
          
            </div>
            <div class="flex items-center lg:order-2">

              <button
                type="button"
                class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="user-menu-button"
                aria-expanded="false"
                data-dropdown-toggle="dropdown"
              >
                <span class="sr-only">Open user menu</span>
                <img
                  class="w-8 h-8 rounded-full image_div"
                  src="<?=$url?><?php if($_SESSION['img']!==null){ echo 'assets/data/'.$_SESSION['img']; }else{ echo 'assets/data/user_image.png'; } ?>"
                  alt="user photo"
                />
              </button>
              <!-- Dropdown menu -->
              <div
                class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 rounded-xl"
                id="dropdown"
              >
                <div class="py-3 px-4">
                  <span
                    class="block text-sm font-semibold text-gray-900 "
                    ><?=$_SESSION['name']?></span
                  >
                  <span
                    class="block text-sm text-gray-900 truncate "
                    ><?=$_SESSION['email']?></span
                  >
                </div>
                <ul
                  class="py-1 text-gray-700 dark:text-gray-300"
                  aria-labelledby="dropdown"
                >
                  <li>
                    <a
                      href="<?=$url?>access-control/profile"
                      class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600  dark:hover:text-white"
                      >My profile</a
                    >
                  </li>
                  <!-- <li>
                    <a
                      href="#"
                      class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600  dark:hover:text-white"
                      >Account settings</a
                    >
                  </li> -->
                </ul>
        
                <ul
                  class="py-1 text-gray-700 dark:text-gray-300"
                  aria-labelledby="dropdown"
                >
                  <li>
                    <a
                      href="<?=$url?>php/logout.php"
                      class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                      >Sign out</a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
    
        <!-- Sidebar -->
    
        <aside
          class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
          aria-label="Sidenav"
          id="drawer-navigation"
        >
          <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
       
            <ul class="space-y-2">
              <li>
                <a
                  href="<?=$url?>access-control/"
                  class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  hover:bg-gray-100 group"
                >
                  <svg
                    aria-hidden="true"
                    class="w-6 h-6 text-gray-500 transition duration-75  group-hover:text-gray-900 "
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                  </svg>
                  <span class="ml-3">Dashboard</span>
                </a>
              </li>


              <li>
            <button
              type="button"
              class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100"
              aria-controls="dropdown-pagesas"
              data-collapse-toggle="dropdown-pagesas"
            >
  <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
    <path d="M22 11.5a.5.5 0 0 0-1 0 1.4 1.4 0 0 1-1.4 1 1.5 1.5 0 0 1-1.4-1 .5.5 0 0 0-1 0 1.5 1.5 0 0 1-2.7 0v-2h2.2a2.6 2.6 0 0 0 2.7-2.7 2.7 2.7 0 0 0-2.7-2.6h-.5l-.1-.3a2.6 2.6 0 0 0-3.8-1.4l-.3.1-.3-.1a2.6 2.6 0 0 0-2.8 0c-.4.4-.8.8-1 1.4V4h-.6a2.7 2.7 0 0 0-2.7 2.6 2.6 2.6 0 0 0 2.7 2.7h2.3v2a1.3 1.3 0 0 1-1.3 1 1.6 1.6 0 0 1-1.5-1 .5.5 0 0 0-1 0 1.5 1.5 0 0 1-1.4 1 1.4 1.4 0 0 1-1.4-1 .5.5 0 0 0-.5-.4.5.5 0 0 0-.5.6v.4a10 10 0 1 0 20 0v-.5ZM8.3 15.7a1 1 0 1 1 2.1 0 1 1 0 0 1-2 0Zm1.6 3.7a2.1 2.1 0 0 1 4.2 0H10Zm4.7-2.7a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
  </svg>
  
              <span class="flex-1 ml-3 text-left whitespace-nowrap"
                >Admins</span
              >
              <svg
                aria-hidden="true"
                class="w-6 h-6"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </button>
            <ul id="dropdown-pagesas" class="<?php if(basename($request)==='manage-admins' || basename($request)==='add-admin'){  }else{ echo 'hidden'; } ?> py-2 space-y-2">
              <li>
                <a
                  href="<?=$url?>access-control/manage-admins"
                  class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100"
                  >list</a
                >
              </li>
              <li>
                <a
                  href="<?=$url?>access-control/add-admin"
                  class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100"
                  >Add</a
                >
              </li>
            </ul>
          </li>


             <li>
            <button
              type="button"
              class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100"
              aria-controls="dropdown-pages"
              data-collapse-toggle="dropdown-pages"
            >
            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M16 19h4c.6 0 1-.4 1-1v-1a3 3 0 0 0-3-3h-2m-2.2-4A3 3 0 0 0 19 8a3 3 0 0 0-5.2-2M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
  </svg>
              <span class="flex-1 ml-3 text-left whitespace-nowrap"
                >Patients</span
              >
              <svg
                aria-hidden="true"
                class="w-6 h-6"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </button>
            <ul id="dropdown-pages" class="<?php if(basename($request)==='manage-patients' || basename($request)==='add-patient'){  }else{ echo 'hidden'; } ?> py-2 space-y-2">
              <li>
                <a
                  href="<?=$url?>access-control/manage-patients"
                  class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100"
                  >list</a
                >
              </li>
              <li>
                <a
                  href="<?=$url?>access-control/add-patient"
                  class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100"
                  >Add</a
                >
              </li>
            </ul>
          </li>


          <li>
            <button
              type="button"
              class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100"
              aria-controls="dropdown-pages-b"
              data-collapse-toggle="dropdown-pages-b"
            >
  <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
    <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4c0 1.1.9 2 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.8-3.1a5.5 5.5 0 0 0-2.8-6.3c.6-.4 1.3-.6 2-.6a3.5 3.5 0 0 1 .8 6.9Zm2.2 7.1h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1l-.5.8c1.9 1 3.1 3 3.1 5.2ZM4 7.5a3.5 3.5 0 0 1 5.5-2.9A5.5 5.5 0 0 0 6.7 11 3.5 3.5 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4c0 1.1.9 2 2 2h.5a6 6 0 0 1 3-5.2l-.4-.8Z" clip-rule="evenodd"/>
  </svg>
  
              <span class="flex-1 ml-3 text-left whitespace-nowrap"
                >Doctors</span
              >
              <svg
                aria-hidden="true"
                class="w-6 h-6"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </button>
            <ul id="dropdown-pages-b" class="<?php if(basename($request)==='manage-doctors' || basename($request)==='add-doctor'){  }else{ echo 'hidden'; } ?> py-2 space-y-2">
              <li>
                <a
                  href="<?=$url?>access-control/manage-doctors"
                  class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100"
                  >list</a
                >
              </li>
              <li>
                <a
                  href="<?=$url?>access-control/add-doctor"
                  class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100"
                  >Add</a
                >
              </li>
            </ul>
          </li>

          <li>
            <button
              type="button"
              class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100"
              aria-controls="dropdown-pages-f"
              data-collapse-toggle="dropdown-pages-f"
            >
  <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
    <path fill-rule="evenodd" d="M4 4a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm10 5c0-.6.4-1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3c0-.6.4-1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3c0-.6.4-1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-8-5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm2 4a3 3 0 0 0-3 2v.2c0 .1-.1.2 0 .2v.2c.3.2.6.4.9.4h6c.3 0 .6-.2.8-.4l.2-.2v-.2l-.1-.1A3 3 0 0 0 10 14H7.9Z" clip-rule="evenodd"/>
  </svg>
  
  
              <span class="flex-1 ml-3 text-left whitespace-nowrap"
                >Nurses</span
              >
              <svg
                aria-hidden="true"
                class="w-6 h-6"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </button>
            <ul id="dropdown-pages-f" class="<?php if(basename($request)==='manage-nurses' || basename($request)==='add-nurses'){  }else{ echo 'hidden'; } ?> py-2 space-y-2">
              <li>
                <a
                  href="<?=$url?>access-control/manage-nurses"
                  class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100"
                  >list</a
                >
              </li>
              <li>
                <a
                  href="<?=$url?>access-control/add-nurse"
                  class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100"
                  >Add</a
                >
              </li>
            </ul>
          </li>


          <li>
            <button
              type="button"
              class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100"
              aria-controls="dropdown-pages-fa"
              data-collapse-toggle="dropdown-pages-fa"
            >
  <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
    <path fill-rule="evenodd" d="M8 3c0-.6.4-1 1-1h6c.6 0 1 .4 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-3 8c0-.6.4-1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2 1 1 0 1 0 0-2Zm2 5c0-.6.4-1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2 1 1 0 1 0 0-2Z" clip-rule="evenodd"/>
  </svg>
  
  
  
              <span class="flex-1 ml-3 text-left whitespace-nowrap"
                >Hospital Staff</span
              >
              <svg
                aria-hidden="true"
                class="w-6 h-6"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </button>
            <ul id="dropdown-pages-fa" class="<?php if(basename($request)==='manage-hospital-staff' || basename($request)==='add-hospital-staff'){  }else{ echo 'hidden'; } ?> py-2 space-y-2">
              <li>
                <a
                  href="<?=$url?>access-control/manage-hospital-staff"
                  class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100"
                  >list</a
                >
              </li>
              <li>
                <a
                  href="<?=$url?>access-control/add-hospital-staff"
                  class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100"
                  >Add</a
                >
              </li>
            </ul>
          </li>


          <li>
            <button
              type="button"
              class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100"
              aria-controls="dropdown-pages-c"
              data-collapse-toggle="dropdown-pages-c"
            >
  <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 6H5m2 3H5m2 3H5m2 3H5m2 3H5m11-1a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2M7 3h11c.6 0 1 .4 1 1v16c0 .6-.4 1-1 1H7a1 1 0 0 1-1-1V4c0-.6.4-1 1-1Zm8 7a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
  </svg>
              <span class="flex-1 ml-3 text-left whitespace-nowrap"
                >Receptionists</span
              >
              <svg
                aria-hidden="true"
                class="w-6 h-6"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </button>
            <ul id="dropdown-pages-c" class="<?php if(basename($request)==='manage-receptionists' || basename($request)==='add-receptionist'){  }else{ echo 'hidden'; } ?> py-2 space-y-2">
              <li>
                <a
                  href="<?=$url?>access-control/manage-receptionists"
                  class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100"
                  >list</a
                >
              </li>
              <li>
                <a
                  href="<?=$url?>access-control/add-receptionist"
                  class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100"
                  >Add</a
                >
              </li>
            </ul>
          </li>


             <li>
            <button
              type="button"
              class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100"
              aria-controls="dropdown-pages-a"
              data-collapse-toggle="dropdown-pages-a"
            >
            <svg class="w-6 h-6 text-gray-500 transition duration-75  group-hover:text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 11.5h13m-13 0V18c0 .6.4 1 1 1h11c.6 0 1-.4 1-1v-6.5m-13 0V9c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v2.5M9 5h11c.6 0 1 .4 1 1v9c0 .6-.4 1-1 1h-1"/>
                  </svg>
              <span class="flex-1 ml-3 text-left whitespace-nowrap"
                >Appointments</span
              >
              <svg
                aria-hidden="true"
                class="w-6 h-6"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </button>
            <ul id="dropdown-pages-a" class="<?php if(basename($request)==='appointment' || basename($request)==='book-appointment'){  }else{ echo 'hidden'; } ?> py-2 space-y-2">
              <li>
                <a
                  href="<?=$url?>access-control/appointment"
                  class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100"
                  >list</a
                >
              </li>
              <li>
                <a
                  href="<?=$url?>access-control/book-appointment"
                  class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100"
                  >Add</a
                >
              </li>
            </ul>
          </li>
          <li>
                <a href="<?=$url?>access-control/settings" class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100 group">
                   <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12c.1 3-.2 6-1 9M7.1 4.4a9 9 0 0 1 13 3.7M3 15v-3a9 9 0 0 1 1.7-5.3m12.9 3c.3.8.4 1.5.4 2.3 0 2 0 4.2-.5 6.2M6 12a6 6 0 0 1 9.4-5M4 21a6 6 0 0 1 1-3.3 5 5 0 0 0 .8-2m8.7 2.5a14 14 0 0 1-1 2.7m-6-1.6C9 17.1 9 14.8 9 12a3 3 0 1 1 6 0v2.3M12 12c0 3 0 6-2 9"/>
  </svg>
                   <span class="flex-1 ml-3 whitespace-nowrap">System Settings</span>
                </a>
             </li>

              <li>
                <a href="<?=$url?>access-control/profile" class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100 group">
                   <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                      <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                   </svg>
                   <span class="flex-1 ml-3 whitespace-nowrap">My Profile</span>
                </a>
             </li>
  
             <li>
                <a href="<?=$url?>php/logout.php" class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100 group">
                   <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                   </svg>
                   <span class="flex-1 ml-3 whitespace-nowrap">Logout</span>
                </a>
             </li>
            </ul>
      
          </div>
        
        </aside>
    
        <main class="p-4 md:ml-64 h-auto pt-20">
        <?php
        // Main content goes here. You can use a variable to dynamically include content.
        if (isset($mainContent) && file_exists($mainContent)) {
            include $mainContent;
        }
        ?>
        </main>
      </div>
      <script src="<?=$url?>assets/js/flowbite.min.js"></script>
    </body>
    </html>