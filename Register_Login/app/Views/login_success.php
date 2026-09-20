<!DOCTYPE html>
<html lang="en-IN">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Jimmy Jayant">
        <meta name="description" content="The Register Login web application demonstrates the sign up and login feature using CodeIgniter v4.7.4 PHP Framework.">
        <title>Login Success Page</title>
        <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('css/login_success.css'); ?>">
    </head>
    <body>
        <?= view('header', ['header' => 'Login Success Page']); ?>

        <div class="main">
            <div class="error">
                <?php
                    if(session()->getFlashdata('error'))
                    {
                        echo session()->getFlashdata('error');
                    }
                ?>
            </div>

            <div class="success">
                <?php
                    if(session()->getFlashdata('success'))
                    {
                        echo session()->getFlashdata('success');
                    }
                ?>
            </div>

            <div id="login_status">
                <p>
                    Login Successful!
                    <br>
                    Hello! <span><?= esc($user ?? ''); ?></span>
                </p>
            </div>

            <div id="logout">
                <p>
                    Want to logout? 
                    <br>
                    Click on the below button to logout.
                    <br>
                    <a href="logout" target="_self">Logout</a>
                </p>
            </div>

            
        </div>

        <?= view('footer'); ?>
    </body>
</html>
