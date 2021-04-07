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
    <!-- awal bagian header -->
    <div class="logo">
        <div class="container">
            <img src="images/TFME.jpg" alt="">
        </div>
        <div class="profile">
            <p style="cursor: none;"><?= $_SESSION["mhs"]["nama"]; ?></p> 
            <form action="" method="post">
                <a href="contact.php" class="contact">Contact us</a>
                <a onclick="return confirm('Are You Sure to Logout ?')"><button name="logout">Logout</button></a>
            </form>
        </div>
    </div>
    <!-- akhir bagian header -->
    <div class="media">
        <param name="quality" value="high">
        <param name="wmode" value="transparent">
        <embed src="swf/2.swf" quality="high" wmode="transparent" width="100%" height="100%">
        <!-- <iframe src="https://polnebat-my.sharepoint.com/personal/rachmat3311801036_students_polibatam_ac_id/_layouts/15/Doc.aspx?sourcedoc={151318bb-aa24-49e4-bd0a-f5b9acd87026}&amp;action=embedview&amp;wdAr=1.7777777777777777" width="350px" height="221px" frameborder="0">Ini adalah Presentasi <a target="_blank" href="https://office.com">Microsoft Office</a> yang disematkan, didukung oleh <a target="_blank" href="https://office.com/webapps">Office</a>.</iframe> -->
    </div>
    <div class="notice">
        <center><p>Notice! You can learn by clicking the content menu</p></center> 
    </div>

    <div class="error d-none">
            <h1>Open with PC!</h1>
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
               <a href="https://drive.google.com/drive/folders/1PrMkFPZXzGRHs7SkGOthFlfUh_DMvIaD?usp=sharing" style="margin-top:3px;"  target="_blank"><i class="fa fa-wrench" aria-hidden="true" style="font-size: 12px; margin-right:5px; display: inline;"></i>Repair Plug-in</a>
            </div>
            <div class="copyright">
                <p>&copy; 2020 TFME Polibatam  &bull; All Reserved</p>
            </div>
            
        </div>
        
    </footer>
</body>

</html>