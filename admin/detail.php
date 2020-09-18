<?php  
session_start();
if (!isset($_SESSION["adm"])){
    header("Location: login.php");
}

require 'functions.php';

// ambil dari URL = id
$id = $_GET["id"];
// query mahassiwa berdasarkan id
$mhs = query("SELECT* FROM tb_user WHERE id = $id")[0];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminTFME</title>
    <link rel="stylesheet" href="css/tambah-admin.css">
    <link rel="stylesheet" href="css/detail.css">
    <link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
    <!-- CDN Fontawesome 4.7 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Link Font -->
    <link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
    <link rel="icon" href="../images/TFME.jpg">
</head>

<body>
    <nav>
        <div class="kiri">
            <h2>AdminTFME</h2>
        </div>
        <div class="title">
            <p>Welcome Admin, <?= $_SESSION["adm"]["username"] ?></p>
        </div>
        <div class="kanan">
            <a href="logout.php">Logout</a>
        </div>
    </nav>
    <h2 class="text">Detail User</h2>
    <div class="sidebar">
        <a href="index.php" class="btn active"><button><i class="fa fa-address-book fa-sm" aria-hidden="true"></i>Daftar
                Pengguna</button></a>
        <a href="tambahAdmin.php" class="btn"><button><i class="fa fa-plus" aria-hidden="true"></i> Tambah
                Admin</button></a>
    </div>
    <div class="konten">
        <div class="left">
            <h4>Nama User</h4>
            <h4>NIM</h4>
            <h4>Jurusan</h4>
            <h4>Email</h4>
        </div>
        <div class="right">
            <h4 style="text-transform:capitalize;"><?= $mhs["nama"]; ?></h4>
            <h4><?= $mhs["nim"]; ?></h4>
            <h4><?= $mhs["depart"]; ?></h4>
            <h4><?= $mhs["email"]; ?></h4>
        </div>
    </div>
    <div class="container" style="overflow-x: auto;">
        <table>
            <tr>
                <th>Login</th>
                <th>Logout</th>
            </tr>
            <tr>
                <td>
                    <!-- start Logik - Get lastactivity from database -->
                    <?php  
                        $date = date_create($mhs['lastactivity']);
                    ?>
                    <!-- End Logik - Get lastactivity from database -->
                    <?= date_format($date, 'l, j F Y g:ia'); ?>
                </td>
                <td style="text-align: center;">
                
                    <!-- start Logik - Get lastactivity from database -->
                    <?php  
                        $date = date_create($mhs['logout']);
                    ?>
                    <!-- End Logik - Get lastactivity from database -->
                    <?= date_format($date, 'l, j F Y g:ia'); ?>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>