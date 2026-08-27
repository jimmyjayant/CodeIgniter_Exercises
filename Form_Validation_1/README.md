# Form_Validation_1 — CodeIgniter 4.7.4

This is the **Form_Validation_1** exercise for the **CodeIgniter 4.7.4** framework.

## About the Exercise

The **Form_Validation_1** exercise demonstrates how to validate form input fields using validation rules defined in a controller.

The form input fields are validated using `$this->validate()`, which returns `false` when validation fails. The `$this->validator()` method provides access to the validation error messages.

When the form input is successfully validated, a **Login Success** page is displayed.

### Validation Rules

The exercise validates the following form fields:

* **Email**

  * Required
* **Password**

  * Required
  * Must be between **6 and 12 characters** long

## Requirements

Before executing this exercise, make sure you have fulfilled all the requirements mentioned in the **main repository `README.md` file**.

## Instructions

Follow these steps to successfully execute the **Form_Validation_1** exercise.

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

Navigate to the `Form_Validation_1` exercise folder.

Rename the copy of the `env` file to:

```text
.env
```

Open the `.env` file in a text editor.

### 5. Configure the Environment and Base URL

In the `.env` file, set the following values:

```dotenv
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost/the-location-to-your-Form_Validation_1-project-folder/public/'
```

Replace:

```text
the-location-to-your-Form_Validation_1-project-folder
```

with the actual location/path of your `Form_Validation_1` project folder.

For example:

```dotenv
app.baseURL = 'http://localhost/Form_Validation_1/public/'
```

### 6. Uncomment the Configuration

Make sure the `#` character is removed from the beginning of each of the above configuration lines.

For example:

```dotenv
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost/Form_Validation_1/public/'
```

Save the `.env` file after making these changes.

### 7. Open the Application

Copy the configured `app.baseURL` from the `.env` file and paste it into your web browser.

Press **Enter**.

### 8. View the Main Page

The **Main Page** of the **Form_Validation_1** exercise should now be displayed in your web browser.

You can then test the form validation functionality by entering different email and password values.

## Summary

This exercise demonstrates basic form validation in CodeIgniter 4.7.4 using:

* Controller-based validation rules
* `$this->validate()`
* `$this->validator()`
* Required field validation
* Password length validation
* Handling validation errors
* Displaying a successful login page after valid input

