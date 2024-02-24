<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user'])) {

    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HOME</title>
        <link rel="stylesheet" href="css/style.css">

    </head>

    <body>
        <h1>Hello,
            <?= $_SESSION['user']; ?>
        </h1>
        <a href="logout.php">logout</a>
    </body>

    </html>

<?php } else {
    header('location:index.php');
    exit();
}




