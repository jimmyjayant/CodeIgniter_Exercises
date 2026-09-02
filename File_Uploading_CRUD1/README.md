# File_Uploading_CRUD1 Exercise – CodeIgniter 4.7.4

This README provides the steps required to successfully execute the **File_Uploading_CRUD1 exercise** using the **CodeIgniter 4.7.4** framework on Windows 11 with XAMPP.

> **Prerequisite:** First complete all the requirements mentioned in the main repository `README.md` file.

## Requirements

Before starting the exercise, make sure the following are installed and configured:

* Windows 11
* XAMPP
* PHP 8.0+
* MySQL
* A web browser
* Terminal/Command Prompt

## Setup Instructions

### 1. Start XAMPP

Make sure **XAMPP** is running on your Windows 11 desktop or laptop.

In the XAMPP Control Panel, start the following services:

* **Apache**
* **MySQL**

Both services should show as **Running**.

### 2. Open the File_Uploading_CRUD1 Project Folder

Open a Terminal or Command Prompt and navigate to the **File_Uploading_CRUD1** project folder.

For example:

```bash
cd path/to/File_Uploading_CRUD1
```

### 3. Install All Required Dependencies

Run the following command in terminal or git:

```bash
composer install
```

### 4. Create the `.env` File

Inside the **File_Uploading_CRUD1** project folder, locate the copy of the `env` file.

Rename the copied file from:

```text
env
```

to:

```text
.env
```

Open the `.env` file in a text editor.

### 5. Configure the CodeIgniter Environment

In the `.env` file, set the following:

```dotenv
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost/the location to your File_Uploading_CRUD1 project folder/public/'
```

Replace:

```text
the location to your File_Uploading_CRUD1 project folder
```

with the actual location of your File_Uploading_CRUD1 project.

For example:

```dotenv
app.baseURL = 'http://localhost/File_Uploading_CRUD1/public/'
```

Use the appropriate path according to where your project is located inside the XAMPP web directory.

### 6. Configure the Database Connection

In the `.env` file, configure the database settings as follows:

```dotenv
database.default.hostname = localhost
database.default.database = ci4_file_upload_crud
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306
```

If you are using a different MySQL username or password, replace the corresponding values with your own credentials.

For a default XAMPP MySQL installation, the username is commonly:

```text
root
```

and the password is commonly blank.

### 7. Uncomment the Configuration Lines

Make sure the `#` character is removed from the beginning of each database configuration line in the `.env` file.

For example, change:

```dotenv
# database.default.hostname = localhost
```

to:

```dotenv
database.default.hostname = localhost
```

Do this for all of the configuration lines listed in the previous step.

Save the `.env` file after making the changes.

### 8. Create the MySQL Database

Run the following command in the terminal:

```bash
php spark db:create ci4_file_upload_crud
```

Here, `ci4_file_upload_crud` is the name of the MySQL database.

> **Important:** Make sure that a database named `ci4_file_upload_crud` does **not** already exist before running this command.

After successful execution, a new database named **ci4_file_upload_crud** should be created.

You can verify the database by opening **phpMyAdmin** in your web browser:

```text
http://localhost/phpmyadmin
```

You should see the `ci4_file_upload_crud` database listed in phpMyAdmin.

### 9. Create the Migration

Make sure the Terminal is still open in the **File_Uploading_CRUD1** project folder.

Run:

```bash
php spark migrate --name FileCrud
```

Press **Enter** to execute the command.

CodeIgniter will specified pending migration in the project's migration directory.

### 10. Open the File_Uploading_CRUD1 Application

Copy the `app.baseURL` configured in your `.env` file.

For example:

```text
http://localhost/File_Uploading_CRUD1/public/
```

Paste the URL into your web browser and press **Enter**.

The **main page of the File_Uploading_CRUD1 exercise** should now be displayed.

## Quick Command Reference

The main commands used during setup are:

```bash
php spark db:create ci4_file_upload_crud
```

and:

```bash
php spark migrate --name FileCrud
```

## Troubleshooting

If the application does not open correctly, verify the following:

* Apache is running in XAMPP.
* MySQL is running in XAMPP.
* The `ci4_file_upload_crud` database exists in phpMyAdmin.
* The `.env` file is located in the root of the File_Uploading_CRUD1 project.
* `CI_ENVIRONMENT` is set to `development`.
* `app.baseURL` points to the correct project `public` directory.
* Database credentials in `.env` are correct.
* The required `.env` configuration lines are uncommented.
* The Terminal is opened in the correct **File_Uploading_CRUD1** project directory.

After completing all the steps above, the **File_Uploading_CRUD1 CodeIgniter 4.7.4 exercise** should be ready to run.
