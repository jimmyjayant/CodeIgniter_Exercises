<!DOCTYPE html>
<html lang="en-IN">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Jimmy Jayant">
        <meta name="description" content="The Multiple File Upload web application demonstrates the multiple files uploading feature using CodeIgniter v4.7.4 PHP Framework.">
        <title>Multiple File Upload</title>
        <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
    </head>
    <body>
        <header>
            <h1>
                Multiple File Upload
            </h1>
        </header>

        <div class="main">

            <div class="error">
                <?php
                    if(session()->getFlashdata('error'))
                    {
                        foreach(session()->getFlashdata('error') as $error)
                        {
                            echo esc($error);
                        }
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

            <form method="post" action="upload" enctype="multipart/form-data">
                <label for="myfiles">Upload Multiple Files</label>
                <br>
                <input type="file" id="myfiles" name="myfiles[]" required multiple>

                <br>
                <br>

                <input type="submit" value="Submit" class="form_btn">
                <input type="reset" value="Reset" class="form_btn">
                <?= csrf_field(); ?>
            </form>
        </div>

        <footer>
            Copyright &copy; <?= date('Y'); ?> Jimmy Jayant
        </footer>
    </body>
</html>
