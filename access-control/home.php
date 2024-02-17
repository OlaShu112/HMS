<section class="bg-white ">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
        
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl">Access Control Manager Dashboard</h1>
                <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Manage Everything
                </p>
                <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
        
                    <a href="<?=$url?>access-control/appointment" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        <b class="mr-2"><?php echo mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `appointment`"));  ?> - </b>Appointments
                    </a>  
                    <a href="<?=$url?>access-control/manage-admins" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        <b class="mr-2"><?php echo mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `users` Where role_id=1"));  ?> - </b>Admins
                    </a>
                    <a href="<?=$url?>access-control/manage-patients" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        <b class="mr-2"><?php echo mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `users` Where role_id=2"));  ?> - </b>Patients
                    </a>  
                    <a href="<?=$url?>access-control/manage-doctors" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        <b class="mr-2"><?php echo mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `users` Where role_id=3"));  ?> - </b>Doctors
                    </a>
                    <a href="<?=$url?>access-control/manage-receptionists" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        <b class="mr-2"><?php echo mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `users` Where role_id=4"));  ?> - </b>Receptionists
                    </a>  
                    <a href="<?=$url?>access-control/manage-nurses" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        <b class="mr-2"><?php echo mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `users` Where role_id=5"));  ?> - </b>Nurses
                    </a>  
                </div>
           
            </div>
        </section>