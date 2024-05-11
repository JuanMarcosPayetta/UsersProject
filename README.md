**User Data Importer**


This project automatically retrieves user data from an API and displays the created and updated users. The task repeats automatically every 5 minutes.

**System Requirements**

PHP: 7.3 or higher.
Laravel Framework: 8.83.27
---------------------------------------------------------------------------------------------------------------------------------------------------

**-Project Setup**

1-Clone this repository to your local machine.

2-Install project dependencies using Composer:

*composer install*

3-Configure the .env environment file with your database configuration and other necessary environment variables.



**-Running the Project**

To run the project, follow these steps:

1-Start the Laravel development server:

*php artisan serve*

2-Open your web browser and navigate to http://localhost:8000 to see the application in action.



**-Scheduled Tasks**

This project includes a scheduled task that runs every 5 minutes to import user data. To configure this task, follow these steps:

1-Open a Linux terminal and navigate to the project directory.

2-If needed execute this command to give permission:

*chmod +x configure-task.sh*

3-Run the task configuration script:

*./scripts/configure-task.sh*

3-Verify that the task has been configured correctly by running the following command:

*crontab -l*



