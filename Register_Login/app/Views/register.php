<!DOCTYPE html>
<html lang="en-IN">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Jimmy Jayant">
        <meta name="description" content="The Single File Upload web application demonstrates the file uploading feature using CodeIgniter v4.7.4 PHP Framework.">
        <title>Register Page</title>
        <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('css/register.css'); ?>">
    </head>
    <body>
        <?= view('header', ['header' => 'Register Page']); ?>

        <div class="main">
            <div class="error">
                <?php
                    if(session()->getFlashdata('error'))
                    {
                        echo session()->getFlashdata('error');
                    }

                    // if(session()->getFlashdata('validationError'))
                    // {
                    //     $validationError = session()->getFlashdata('validationError');
                    // }

                    
                    // helper('form');
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

            <h2>Register Page</h2>

            <form method="post" action="register" id="register_form">
                <?= csrf_field(); ?>
                <label for="firstname">First Name:- </label>
                <br>
                <input type="text" id="firstname" name="firstname" value="<?= old('firstname'); ?>" 
                placeholder="Enter your first name" minlength="3" maxlength="100" required>
                <br>
                <?php
                    // if(isset($validationError) && ($validationError->hasError('firstname')))
                    // {
                    //     echo "<div class='error'>";
                    //     echo $validationError->getError('firstname');
                    //     echo "</div>";
                    // }
                    echo "<div class='error'>";
                    echo validation_show_error('firstname');
                    echo "</div>";
                ?>

                <br>
                <br>

                <label for="middlename">Middle Name:- </label>
                <br>
                <input type="text" id="middlename" name="middlename" value="<?= old('middlename'); ?>" 
                placeholder="Enter your middle name" minlength="3" maxlength="100">
                <br>
                <?php
                    // if(isset($validationError) && ($validationError->hasError('middlename')))
                    // {
                    //     echo "<div class='error'>";
                    //     echo $validationError->getError('middlename');
                    //     echo "</div>";
                    // }
                    // if(isset($validationError) && ($validationError->hasError('middlename')))
                    // {
                    //     echo "<div class='error'>";
                    //     echo $validationError->getError('middlename');
                    //     echo "</div>";
                    // }

                    echo "<div class='error'>";
                    echo validation_show_error('middlename');
                    echo "</div>";
                ?>

                <br>
                <br>

                <label for="lastname">Last Name:- </label>
                <br>
                <input type="text" id="lastname" name="lastname" value="<?= old('lastname'); ?>" 
                placeholder="Enter your last name" minlength="3" maxlength="100">
                <br>
                <?php
                    // if(isset($validationError) && ($validationError->hasError('lastname')))
                    // {
                    //     echo "<div class='error'>";
                    //     echo $validationError->getError('lastname');
                    //     echo "</div>";
                    // }
                    // if(isset($validationError) && ($validationError->hasError('lastname')))
                    // {
                    //     echo "<div class='error'>";
                    //     echo $validationError->getError('lastname');
                    //     echo "</div>";
                    // }

                    echo "<div class='error'>";
                    echo validation_show_error('lastname');
                    echo "</div>";
                ?>

                <br>
                <br>

                <label>Gender:- </label>
                <br>
                <input type="radio" id="male" name="gender" value="male">Male
                <br>
                <input type="radio" id="female" name="gender" value="female">Female
                <br>
                <?php
                    // if(isset($validationError) && ($validationError->hasError('gender')))
                    // {
                    //     echo "<div class='error'>";
                    //     echo $validationError->getError('gender');
                    //     echo "</div>";
                    // }
                    // if(isset($validationError) && ($validationError->hasError('gender')))
                    // {
                    //     echo "<div class='error'>";
                    //     echo $validationError->getError('gender');
                    //     echo "</div>";
                    // }

                    echo "<div class='error'>";
                    echo validation_show_error('gender');
                    echo "</div>";
                ?>

                <br>
                <br>

                <label for="mobilenumber">Mobile Number:- </label>
                <br>
                <input type="tel" id="mobilenumber" name="mobilenumber" placeholder="Enter your mobile number"
                pattern="[0-9]{10}" value="<?= old('mobilenumber'); ?>" minlength="10" maxlength="10" required>
                <br>
                <?php
                    // if(isset($validationError) && ($validationError->hasError('mobilenumber')))
                    // {
                    //     echo "<div class='error'>";
                    //     echo $validationError->getError('mobilenumber');
                    //     echo "</div>";
                    // }
                    // if(isset($validationError) && ($validationError->hasError('mobilenumber')))
                    // {
                    //     echo "<div class='error'>";
                    //     echo $validationError->getError('mobilenumber');
                    //     echo "</div>";
                    // }

                    echo "<div class='error'>";
                    echo validation_show_error('mobilenumber');
                    echo "</div>";
                ?>

                <br>
                <br>

                <label for="address">Address:- </label>
                <br>
                <input type="text" id="address" name="address" value="<?= old('address'); ?>"
                placeholder="Enter your address" minlength="10" maxlength="500" required>
                <br>
                <?php
                    // if(isset($validationError) && ($validationError->hasError('address')))
                    // {
                    //     echo "<div class='error'>";
                    //     echo $validationError->getError('address');
                    //     echo "</div>";
                    // }
                    // if(isset($validationError) && ($validationError->hasError('address')))
                    // {
                    //     echo "<div class='error'>";
                    //     echo $validationError->getError('address');
                    //     echo "</div>";
                    // }

                    echo "<div class='error'>";
                    echo validation_show_error('address');
                    echo "</div>";
                ?>

                <br>
                <br>

                <label for="email">Email:- </label>
                <br>
                <input type="email" id="email" name="email" value="<?= old('email'); ?>"
                placeholder="Enter your email address" required>
                <br>
                <?php
                    // if(isset($validationError) && ($validationError->hasError('email')))
                    // {
                    //     echo "<div class='error'>";
                    //     echo $validationError->getError('email');
                    //     echo "</div>";
                    // }
                    // if(isset($validationError) && ($validationError->hasError('email')))
                    // {
                    //     echo "<div class='error'>";
                    //     echo $validationError->getError('email');
                    //     echo "</div>";
                    // }

                    echo "<div class='error'>";
                    echo validation_show_error('email');
                    echo "</div>";
                ?>

                <br>
                <br>

                <label for="password">Password:- </label>
                <br>
                <input type="password" id="password" name="password" min="6" max="12" required
                placeholder="Enter your password">
                <br>
                <?php
                    // if(isset($validationError) && ($validationError->hasError('password')))
                    // {
                    //     echo "<div class='error'>";
                    //     echo $validationError->getError('password');
                    //     echo "</div>";
                    // }
                    // if(isset($validationError) && ($validationError->hasError('password')))
                    // {
                    //     echo "<div class='error'>";
                    //     echo $validationError->getError('password');
                    //     echo "</div>";
                    // }

                    echo "<div class='error'>";
                    echo validation_show_error('password');
                    echo "</div>";
                ?>

                <br>
                <br>

                <input type="submit" value="Submit" class="form_btn">
                <input type="reset" value="Reset" class="form_btn" form="register_form">
            </form>

            <h3>OR</h3>

            <div>
                <p>
                    Already registered?
                    <br>
                    <a href="login" target="_self">LogIn</a>
                </p>
            </div>
        </div>

        <?= view('footer'); ?>
    </body>
</html>
