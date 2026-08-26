This is the readme file of Form_Validation_1 exercise in CodeIgniter version 4.7.4 framework.

The Form_Validation_1 exercise is all about validation of form input fields using validation rules defined in a controller.
The form input fields are validated using $this->validate which returns false on failure and $this->validator() contains the error messages.
On successful validation of form input fields like email and password, login success page is shown.
Both email and password fields are required and password must be between 6-12 characters long.


Please read the below instructions to successfully execute the exercise.
After fulfilling the requirements mentioned in the main repository readme.md file.

Instructions:-
1. Make sure that XAMPP is running in windows 11 OS in either your desktop or laptop.
2. In XAMPP, make sure that Apache is running.
3. In the Form_Validation_1 folder, rename the copy of the env file to .env. And open the .env file.
4. In the .env file, set
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost/the location to your Form_Validation_1 project folder/public/' 
5. Also, remove # from the beginning of each above lines in .env file to uncomment them before saving.
6. Now, copy and paste the app.baseURL in web browser and press Enter.
7. And you will see the Main page of the Form_Validation_1 exercise.
