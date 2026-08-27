# Multiple_File_Upload_1 — CodeIgniter 4.7.4

This is the **Multiple_File_Upload_1** exercise for the **CodeIgniter 4.7.4** framework.

## About the Exercise

The **Multiple_File_Upload_1** exercise demonstrates how to upload multiple files to the `writable/uploads` folder in CodeIgniter 4.

The uploaded files are validated using the `$this->validate()` method along with validation rules for file size and file extensions.

### File Upload Validation Rules

The following validation rules are applied to uploaded files:

* **Allowed file extensions:**

  * `.jpg`
  * `.jpeg`
  * `.png`
  * `.pdf`
* **Maximum file size:** Below **10 MB**
* Uploaded files are stored in the:

```text
writable/uploads/
```

> **Important:** If you encounter an error while uploading a file, particularly a file-size-related error, check the `upload_max_filesize` setting in your `php.ini` file and increase it as required.

## Requirements

Before executing this exercise, make sure you have fulfilled all the requirements mentioned in the **main repository `README.md` file**.

## Instructions

Follow these steps to successfully execute the **Multiple_File_Upload_1** exercise.

### 1. Start XAMPP

Make sure **XAMPP** is installed and running on your **Windows 11** desktop or laptop.

### 2. Start Apache

Open the XAMPP Control Panel and make sure that **Apache** is running.

### 3. Install All Required Dependencies

Run the following command in terminal or git:

```bash
composer install
```

### 4. Configure the `.env` File

Navigate to the `Multiple_File_Upload_1` exercise folder.

Rename the copy of the `env` file to:

```text
.env
```

Open the `.env` file in a text editor.

### 5. Configure the Environment and Base URL

In the `.env` file, set the following values:

```dotenv
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost/the-location-to-your-Multiple_File_Upload_1-project-folder/public/'
```

Replace:

```text
the-location-to-your-Multiple_File_Upload_1-project-folder
```

with the actual location/path of your `Multiple_File_Upload_1` project folder.

For example:

```dotenv
app.baseURL = 'http://localhost/Multiple_File_Upload_1/public/'
```

### 6. Uncomment the Configuration

Make sure the `#` character is removed from the beginning of each of the above configuration lines.

For example:

```dotenv
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost/Multiple_File_Upload_1/public/'
```

Save the `.env` file after making these changes.

### 7. Check `upload_max_filesize`

If you encounter an error while uploading a file because of its size, open the PHP configuration file:

```text
php.ini
```

Locate the following setting:

```ini
upload_max_filesize
```

Make sure its value is sufficient for the exercise. For example:

```ini
upload_max_filesize = 10M
```

After modifying `php.ini`, restart Apache from the XAMPP Control Panel for the changes to take effect.

> **Note:** The application-level validation requires files to be **below 10 MB**. The PHP `upload_max_filesize` setting should be configured appropriately so that PHP does not reject the upload before CodeIgniter can validate it.

### 8. Open the Application

Copy the configured `app.baseURL` from the `.env` file and paste it into your web browser.

Press **Enter**.

### 9. View the Main Page

The **Main Page** of the **Multiple_File_Upload_1** exercise should now be displayed in your web browser.

You can then select and upload multiple files and test the file validation functionality.

## Upload Location

Successfully uploaded files are stored in:

```text
writable/uploads/
```

## Summary

This exercise demonstrates multiple-file uploading and validation in CodeIgniter 4.7.4 using:

* `$this->validate()`
* File extension validation
* File size validation
* Multiple-file uploading
* Storing uploaded files in `writable/uploads/`
* Handling file-upload validation errors
