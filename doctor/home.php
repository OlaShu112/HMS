<section class="bg-white ">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
        
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Doctor Dashboard</h1>
                <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Manage Appiotments - Patients and more
                </p>
                <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
        
                    <a href="<?=$url?>doctor/appointment" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        <b class="mr-2"><?php echo mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `appointment` Where doctor_id='$_SESSION[user_id]'"));  ?> - </b>Appointments
                    </a>  
                    <a href="<?=$url?>doctor/manage-patients" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        <b class="mr-2"><?php echo mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `users` Where role_id=2 and created_by='$_SESSION[user_id]'"));  ?> - </b>Patients
                    </a>  
                </div>
           
            </div>
        </section>