<!DOCTYPE html>
<html lang="en-IN">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Jimmy Jayant">
        <meta name="description" content="This is a File Uploading to MySQL Database Project in CodeIgniter version 4.7.4 PHP framework.">
        <title>File Uploading to MySQL Database</title>
        <link rel="stylesheet" href="<?= base_url('css/index.css'); ?>">
    </head>
    <body>
        <header><h1>File Uploading to MySQL Database</h1></header>

        <div class="main">

            <div class="error">
                <?php
                    $error = session()->getFlashdata('error');
                    
                    if($error)
                    {
                        if(is_array($error))
                        {
                            foreach($error as $err)
                            {
                                echo esc($err);
                            }
                        }
                        else
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
                        echo esc(session()->getFlashdata('success'));
                    }
                ?>
            </div>

            <form method="post" action="upload" enctype="multipart/form-data">
                <label for="file">Select a file for upload</label>
                <br>
                <input type="file" id="file" name="file" required>

                <br>
                <br>
                <input type="submit" value="Upload" class="form_btn">
                <input type="reset" value="Reset" class="form_btn">
                <?= csrf_field(); ?>
            </form>
        </div>

        <footer>
            Copyright &copy; 2026 Jimmy Jayant
        </footer>
    </body>
</html>
