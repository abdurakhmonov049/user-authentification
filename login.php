<?php
session_start();
include('db_conn.php');
if (isset($_POST['name']) && isset($_POST['psw'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$user = validate($_POST['name']);
$pass = validate($_POST['psw']);
if (empty($user)) {
    header('Location: index.php?error=User Name is required!!!');
} else if (empty($pass)) {
    header('Location: index.php?error=Password is required!!!');
}

$sql = "SELECT * FROM users WHERE user='$user' AND psw='$pass'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if ($row['user'] == $user && $row['psw'] == $pass) {
        echo "Logged In";
        $_SESSION['user'] = $row['user'];
        $_SESSION['psw'] = $row['psw'];
        $_SESSION['id'] = $row['id'];
        header('location:home.php');
        exit();
    } else {
        header('location:index.php?error=User name or password Invalid');
        exit();
    }

} else {
    header('location:index.php');
    exit();
}

