<?php  

session_start();
// cek apakah adasession admin, jika tidak Getout
if (!isset($_SESSION["adm"])){
    header("Location: login.php");
}

require 'functions.php';
$id = $_GET["id"];

if (hapus($id) > 0 ) {
    echo "
    <script>
         alert('Data Berhasil di Hapus !');
         document.location.href = 'index.php';
    </script>";
} else {
    echo "
    <script>
         alert('Data gagal di Hapus !');
         document.location.href = 'index.php';
    </script>";
}


?>
