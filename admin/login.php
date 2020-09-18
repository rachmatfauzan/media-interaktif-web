<?php  
session_start();
if ( isset($_SESSION["login"])){
    header("Location: index.php");
}

require 'functions.php';

if (isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE uid = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1){
        // cekpassword 
        $row = mysqli_fetch_assoc($result);
        if ($password == $row["password"]){
            // set session
            $_SESSION["login"] = true;
            $_SESSION["adm"] = $row;
            header('Location: index.php');
            exit;
        }
    } else {
        echo "GAGAl !!";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="icon" href="../images/TFME.jpg">
    <link rel="stylesheet" href="css/login-style.css">
</head>

<body>
    <form action="" method="post">
        <div class="bungkus">
            <div class="container">
                <div class="logo">
                    <img src="../images/TFME.jpg" alt="">
                </div>
                <div class="btn">
                    <label for="username">Your ID</label>
                    <input type="text" name="username" id="username" placeholder="Your ID" autofocus>

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password">

                    <button name="login">Login</button>
                </div>
            </div>
        </div>
    </form>
</body>

</html>