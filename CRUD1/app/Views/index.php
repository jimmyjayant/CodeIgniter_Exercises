<!DOCTYPE html>
<html lang="en-IN">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="This is a CRUD Project in CodeIgniter version 4.7.4 PHP framework.">
        <meta name="author" content="Jimmy Jayant">
        <title>CRUD</title>
        <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('css/index.css'); ?>">
    </head>
    <body>
        <header>
            <h1>
                CRUD Project
            </h1>
        </header>

        <div class="main">
            <?php
                if(empty($users))
                {
                    echo "<p class='no_user'>No Users Found! Please add new users.</p>";
                }
                else
                {
                    echo "<h2>List of Users</h2>";
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Name</th>";
                    echo "<th>Email</th>";
                    echo "<th>Action</th>";
                    echo "</tr>";

                    foreach($users as $user)
                    {
                        echo "<tr>";
                        echo "<td>{$user['id']}</td>";
                        echo "<td>{$user['name']}</td>";
                        echo "<td>{$user['email']}</td>";
                        echo "<td>";
                        echo "<a href='edit/{$user['id']}' target='_self'>Edit</a> | ";
                        echo "<a href='delete/{$user['id']}' target='_self'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                }
            ?>

            <div class="add_user">
                <a href="<?= base_url('create'); ?>" target="_self">Add New User</a>
            </div>
        </div>

        <footer>
            Copyright &copy; <?= date('Y'); ?> Jimmy Jayant
        </footer>
    </body>    
</html>
