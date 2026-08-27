<!DOCTYPE html>
<html lang="en-IN">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Jimmy Jayant">
        <meta name="description" content="This exercise aims to demonstrates to prevent the reuploading of same file to web server. It is built using CodeIgniter v4.7.4 PHP Framework.">
        <title>Prevent Reuploading of Same File Again</title>
        <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
    </head>
    <body>
        <header><h1>Prevent Reuploading of Same File</h1></header>
        
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

                    if(session()->getFlashdata('file_exist_error'))
                    {
                        echo esc(session()->getFlashdata('file_exist_error'));
                    }
                ?>
            </div>

            <div class="success">
                <?php
                    if(session()->getFlashdata('success'))
                    {
                        echo esc(session()->getFlashdata('success'));
                    }
                ?>
            </div>

            <form method="post" action="upload" enctype="multipart/form-data">
                <label for="file">Upload File</label>
                <br>
                <input type="file" name="file" id="file" required accept=".jpg, .jpeg, .png, .pdf">

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
