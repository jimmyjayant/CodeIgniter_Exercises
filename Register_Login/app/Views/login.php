<!DOCTYPE html>
<html lang="en-IN">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Jimmy Jayant">
        <meta name="description" content="The Register Login web application demonstrates the sign up and login feature using CodeIgniter v4.7.4 PHP Framework.">
        <title>Login Page</title>
        <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('css/login.css'); ?>">
    </head>
    <body>
        <?= view('header', ['header' => 'Login Page']); ?>

        <div class="main">
            <div class="error">
                <?=
                esc(session()->getFlashdata('error') ?? '');
                    // if(session()->getFlashdata('error'))
                    // {
                    //     echo session()->getFlashdata('error');
                    // }
                ?>
            </div>
            

            <div class="success">
                <?=
                esc(session()->getFlashdata('success') ?? '');
                    // if(session()->getFlashdata('success'))
                    // {
                    //     echo session()->getFlashdata('success');
                    // }
                ?>
            </div>

            <h2>Login Page</h2>

            <form method="post" action="login" id="login_form">
                <?= csrf_field(); ?>
                <label for="email">Email:- </label>
                <br>
                <input type="email" id="email" name="email" value="<?= old('email'); ?>" required 
                placeholder="Enter your email address">
                <br>
                <?php
                    echo "<div class='error'>";
                    echo validation_show_error('email');
                    echo "</div>";
                ?>

                <br>
                <br>

                <label for="password">Password:- </label>
                <br>
                <input type="password" id="password" name="password" required placeholder="Enter your password">
                <br>
                <?php
                    echo "<div class='error'>";
                    echo validation_show_error('password');
                    echo "</div>";
                ?>

                <br>
                <br>

                <input type="submit" value="Submit" class="form_btn">
                <input type="reset" value="Reset" class="form_btn" form="login_form">
            </form>

            <h3>OR</h3>

            <div>
                <p>
                    Not registered?
                    <br>
                    <a href="register" target="_self">SignUp</a>
                </p>
            </div>
        </div>

        <?= view('footer'); ?>
    </body>
</html>
