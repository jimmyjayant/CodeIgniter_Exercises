<!DOCTYPE html>
<html lang="en-IN">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Jimmy Jayant">
        <meta name="description" content="The Single File Upload web application demonstrates the file uploading feature using CodeIgniter v4.7.4 PHP Framework.">
        <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
        <title>Single File Upload</title>
    </head>
    <body>
        <header>
            <h1>Single File Upload</h1>
        </header>

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

            <h2>Upload Form</h2>
            <form method="post" action="upload" enctype="multipart/form-data">
                <label for="myfile">Upload File (.png, .pdf, .jpg, .jpeg)</label>
                <br>
                <input type="file" name="myfile" id="myfile" accept=".jpg, .jpeg, .pdf, .png" required>

                <br>
                <br>
                <input type="submit" value="Upload" class="form_btn">
                <input type="reset" value="Reset" class="form_btn">
                <?= csrf_field(); ?>
            </form>
        </div>

        <footer>
            Copyright &copy; <?= date('Y'); ?> Jimmy Jayant
        </footer>
    </body>
</html>
