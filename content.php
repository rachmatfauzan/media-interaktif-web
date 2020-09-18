<?php  
session_start();

if ( !isset($_SESSION["mhs"])){
    echo "
    <script>
        alert ('Register Completed');
    </script>";
    header("Location: index.php");
}
require "functions.php";

// cek data dari user login
// print_r($_SESSION["mhs"]);

if (isset($_POST['logout'])){

    $logout = "UPDATE tb_user set logout =now() WHERE id=".$_SESSION['user_id'];
    mysqli_query($conn, $logout);
    
    echo "
        <script>
            alert ('Date Time Recorded');
        </script>";

    header('Location: logout.php');

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TFME Polibatam</title>
    <link rel="icon" href="images/TFME.jpg">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="fa/css/all.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="logo">
        <div class="container">
            <img src="images/TFME.jpg" alt="">
        </div>
        <div class="profile">
            <p style="cursor: none;"><?= $_SESSION["mhs"]["nama"]; ?></p> 
            <form action="" method="post">
                <a onclick="return confirm('Are You Sure to Logout ?')"><button name="logout">Logout</button></a>
            </form>
        </div>
    </div>

    <embed src="swf/Acs3.swf" type="" width="100%" height="800px">
    <div class="notice">
        <center><p>Notice! You can learn by clicking the content menu</p></center> 
    </div>

    <footer>
        <div class="isi">
            <div class="container">
                <img src="images/TFME.jpg" alt="logo TFME" width="120px" height="60px">
            </div>
            <div class="alamat">
                <ul>
                    <li>Jl. Ahmad Yani Batam Kota. Kota Batam. kepulauan Riau. Indonesia</li>
                    <li>Phone : +62-778-469859 Ext.2204</li>
                    <li>Fax Polibatam : +62-778-463620</li>
                    <li>Email : info@polibatam.ac.id</li>
                </ul>
            </div>
            <div class="sosmed">
                <a href="https://www.instagram.com/tfme_polibatam/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
               <a href="https://www.instagram.com/tfme_polibatam/"target="_blank">Instagram</a>
            </div>
            <div class="copyright">
                <p>&copy; 2020 TFME Polibatam  &bull; All Reserved</p>
            </div>
            
        </div>
        
    </footer>
</body>

</html>