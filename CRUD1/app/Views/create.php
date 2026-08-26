<!DOCTYPE html>
<html lang="en-IN">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="This is a CRUD Project in CodeIgniter version 4.7.4 PHP framework.">
        <meta name="author" content="Jimmy Jayant">
        <title>CRUD - Add New User</title>
        <link rel="stylesheet" href="<?= base_url('css/create.css'); ?>">
    </head>
    <body>
        <header>
            <h1>
                CRUD Project
            </h1>
        </header>

        <div class="main">
            <h2>Add New User</h2>

            <form method="post" action="store">
                <label for="name">Enter Name:- </label>
                <br>
                <input type="text" id="name" name="name" value="<?= old('name'); ?>" minlength="3" maxlength="100" required>

                <br>
                <br>

                <label for="email">Enter Email:- </label>
                <br>
                <input type="email" id="email" name="email" value="<?= old('email'); ?>" required>

                <br>
                <br>
                
                <input type="submit" value="Submit">
            </form>
        </div>

        <footer>
            Copyright &copy; <?= date('Y'); ?> Jimmy Jayant
        </footer>
    </body>    
</html>
