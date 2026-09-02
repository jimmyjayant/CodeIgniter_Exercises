<!DOCTYPE html>
<html lang="en-IN">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Jimmy Jayant">
        <meta name="description" content="The File Uploading CRUD1 exercise demonstrates crud operations related to file uploading to mysql database. It is built using PHP Framework CodeIgniter v4.7.4.">
        <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('css/index.css'); ?>">
        <title>File Upload CRUD Homepage</title>
    </head>
    <body>
        <header><h1>File Upload CRUD</h1></header>

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

            <?php
                if(!empty($files))
                {
                    echo "<table>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<td>ID</td>";
                    echo "<td>File Name</td>";
                    echo "<td>File Size</td>";
                    echo "<td>File Type</td>";
                    echo "<td>Action</td>";
                    echo "</tr>";
                    echo "</thead>";

                    echo "<tbody>";
                    foreach($files as $file)
                    {
                        echo "<tr>";
                        echo "<td>{$file['id']}</td>";
                        echo "<td>{$file['file_name']}</td>";

                        $i = 1;
                        $unit = "";

                        while($file['file_size'] > 1000)
                        {
                            $file['file_size'] /=  1000;
                            if($i == 1)
                            {
                                $unit = "KB";
                            }
                            else
                            {
                                $unit = "MB";
                            }

                            $i++;
                        }

                        echo "<td>{$file['file_size']}{$unit}</td>";
                        echo "<td>{$file['file_type']}</td>";
                        echo "<td>";
                        echo "<a href='view/{$file['id']}' target='_blank'>View</a> | ";
                        echo "<a href='download/{$file['id']}' target='_blank'>Download</a> | ";
                        echo "<a href='edit/{$file['id']}'>Edit</a> | ";
                        echo "<a href='delete/{$file['id']}'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                }
                else
                {
                    echo "<div class='error'>No Files Uploaded!</div>";
                }
            ?>

            <div class="pager">
                <?php
                    if(!empty($pager))
                    {
                        echo $pager->links();
                    }
                ?>
            </div>

            <div class="newRecord">
                <a href="<?= base_url('create'); ?>" target="_self">Upload File</a>
            </div>
        </div>

        <footer>
            Copyright &copy; 2026 Jimmy Jayant
        </footer>
    </body>
</html>
