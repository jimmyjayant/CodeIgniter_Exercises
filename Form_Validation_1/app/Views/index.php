<!DOCTYPE html>
<html lang="en-IN">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Validation</title>
        <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
    </head>
    <body>
        <header>
            <h1>Form Validation</h1>
        </header>

        <div class="main">
            <div class="error">
                <?php
                    if(isset($validation))
                    {
                        echo $validation->listErrors();

                        //unset($validation);
                    }
                ?>
            </div>
            
            <form method="post" action="login">
                <label for="email">Email</label>
                <br>
                <input type="email" id="email" name="email" title="Email is required"
                placeholder="Enter you email here">

                <br>
                <br>

                <label for="pass">Password</label>
                <br>
                <input type="password" id="pass" name="pass" title="Must be 6-12 characters long"
                placeholder="Enter you password here">

                <br>
                <br>

                <input type="submit" class="form_btn" value="Submit">
                <input type="reset" class="form_btn" value="Reset">
            </form>
        </div>

        <footer>
            Copyright &copy; <?= date('Y'); ?> Jimmy Jayant
        </footer>
    </body>
</html>
