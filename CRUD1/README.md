This is the readme file of CRUD1 exercise in CodeIgniter version 4.7.4 framework.
Please read the below instructions to successfully execute the exercise.
After fulfilling the requirements mentioned in the main repository readme.md file.

Instructions:-
1. Make sure that XAMPP is running in windows 11 OS in either your desktop or laptop.
2. In XAMPP, make sure that Apache and MySQL is running.
3. Open Terminal in the CRUD1 folder.
4. Type the following in the terminal:- 
    php spark db:create crud1
    where 'crud1' is the name of the mysql database and make sure that crud1 database does not already exist.
5. After successful execution of the above database creation command, you will see a new database 'crud1' in localhost/phpmyadmin in web browser.
6. In the CRUD1 folder, rename the copy of the env file to .env. And open the .env file.
7. In the .env file, set
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost/the location to your CRUD1 project folder/public/'
8. To setup database credentials, set the following in .env file:- 
database.default.hostname = localhost
database.default.database = crud1
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306
9. But you can setup your own username and password. 
10. Also, remove # from the beginning of each above lines in .env file to uncomment them before saving.
11. In the opened terminal in CRUD1 folder, type:- 
php spark make:migration users
where users is the name of the table and press Enter.
12. Now, copy and paste the app.baseURL in web browser and press Enter.
And you will see the Main page of the CRUD1 exercise.
