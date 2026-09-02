<!DOCTYPE html>
<html lang="en-IN">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Jimmy Jayant">
        <meta name="description" content="The File Uploading CRUD1 exercise demonstrates crud operations related to file uploading to mysql database. It is built using PHP Framework CodeIgniter v4.7.4.">
        <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('css/create.css'); ?>">
        <title>Upload File</title>
    </head>
    <body>
        <header><h1>Upload File</h1></header>

        <div class="main">
            <div class="error">
                <?php
                    $error = session()->getFlashdata('error');
                    if(isset($error))
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
                            echo esc($err);
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

            <form method="post" action="save" enctype="multipart/form-data">
                <label for="file">Upload File</label>
                <br>
                <input type="file" id="file" name="file" required>
                <br>
                <br>

                <input type="submit" value="Upload" class="form_btn">
                <input type="reset" value="Reset" class="form_btn">
                <?= csrf_field(); ?>
            </form>

            <div>
                <h3>OR</h3>
                <p>
                    <a href="<?= base_url('index'); ?>" target="_self">See Uploaded Files</a>
                </p>
            </div>
        </div>

        <footer>
            Copyright &copy; 2026 Jimmy Jayant
        </footer>
    </body>
</html>
