# Home-Task #1 Challenge - Fullstack

This is a simple laravel challenge project based on custom made Product Information Management System (PIM).

#How to Setup the Project:

◦ Clone the source code from This Github Repository

◦ After cloning the source code navigate to the main source code directory using cd

◦ Run composer install or composer update to load and install the dependencies

◦ Run cp .env.example .env | another way you can is to rename .env.example file to .env

◦ for the DB_PORT in your .env file  please check your port as I changed my port to 3366

◦ Now open source code in a code editor and setup the database credentials in .env file

◦ Generate Application Key Using php artisan key:generate command

◦ if you want to access without migration upload the pim_db.sql and use these credintials to sign-in to dashboard 

◦ Login Credintials email: admin@gmail.com  password:admin!@#

◦ if you don't want to upload the db and instead you want to migrate - Run the database migrations php artisan migrate command

◦ Your Ready to go run php artisan serve

◦ For testing the application run php artisan test

