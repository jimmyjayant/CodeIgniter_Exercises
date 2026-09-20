<!DOCTYPE html>
<html lang="en-IN">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Jimmy Jayant">
        <meta name="description" content="The Single File Upload web application demonstrates the file uploading feature using CodeIgniter v4.7.4 PHP Framework.">
        <title>Home Page</title>
        <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('css/index.css'); ?>">
    </head>
    <body>
        <?= view('header', ['header' => 'Home Page']); ?>

        <div class="main">
            <p>
                Welcome to the Register_Login CodeIgniter v4 PHP Framework exercise. 
                <br>
                This exercise demonstrates the register and login functionality.
                <br>
                If you are new user here, then click on the SignUp button below.
                <br>
                Else click on Login button below to login into your account.
                <br>
                <a href="<?= base_url('login'); ?>" target="_self" class="linkbutton">LogIn</a>
                <a href="<?= base_url('register'); ?>" target="_self" class="linkbutton">SignUp</a>
            </p>
        </div>

        <?= view('footer'); ?>
    </body>
</html>
