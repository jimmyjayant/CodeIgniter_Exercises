This is the readme file of Single_File_Upload_1 exercise in CodeIgniter version 4.7.4 framework.

The Single_File_Upload_1 exercise is all about uploading of file to writable/uploads folder.
The uploaded file is validated using $this->validate() method and several validation rules like file size, and file extensions.
Allowed file extensions are .jpg, .jpeg, .png, .pdf.
File size must be below 10MB.
If there is an error uploading file such as file size error, please update the upload_max_filesize in php.ini file.

Please read the below instructions to successfully execute the exercise.
After fulfilling the requirements mentioned in the main repository readme.md file.

Instructions:-
1. Make sure that XAMPP is running in windows 11 OS in either your desktop or laptop.
2. In XAMPP, make sure that Apache is running.
3. In the Single_File_Upload_1 folder, rename the copy of the env file to .env. And open the .env file.
4. In the .env file, set
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost/the location to your Single_File_Upload_1 project folder/public/' 
5. Also, remove # from the beginning of each above lines in .env file to uncomment them before saving.
6. Now, copy and paste the app.baseURL in web browser and press Enter.
7. And you will see the Main page of the Single_File_Upload_1 exercise.