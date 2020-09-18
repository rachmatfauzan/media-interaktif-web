<?php  
session_start();
// cek apakah adasession admin, jika tidak Getout
if (!isset($_SESSION["adm"])){
    header("Location: login.php");
}

// logic cek user nerobos!! admin
// if (isset($_SESSION["mhs"])){
//     header("Location: ../content.php");
// }

require 'functions.php';
$mahasiswa = query("SELECT * FROM tb_user");

// print_r($_SESSION);
// cek user nyelundup
// print_r($_SESSION['mhs']);

if (isset($_POST["cari"])){
    $mahasiswa = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminTFME</title>
    <link rel="stylesheet" href="css/style.css">
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

    <div class="container">
        <div class="sidebar">
            <a href="index.php" class="btn"><button class="current" disabled><i class="fa fa-address-book fa-sm" aria-hidden="true"></i>List of users</button></a>
            <a href="tambahAdmin.php" class="btn"><button class="klik"><i class="fa fa-plus" aria-hidden="true"></i>Added admin</button></a>
        </div>
        <div class="konten">
            <h4>List of users</h4>
            <form action="" method="post">
                <input type="text" name="keyword" size="40" placeholder="Search Name/Nim/Depart" autofocus autocomplete="off">
                <button type="submit" name="cari">Search</button>
            </form>
            <table>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Nim</th>
                    <th>Depart</th>
                    <th>E-mail</th>
                    <th>Action</th>
                </tr>
                <?php $i=1; ?>
                <?php foreach ($mahasiswa as $mhs) : ?>
                <tr>
                    <td><?= $i;?></td>
                    <td><?= ucwords($mhs["nama"]); ?></td>
                    <td><?= $mhs["nim"]; ?></td>
                    <td><?= $mhs["depart"]; ?></td>
                    <td><?= $mhs["email"]; ?></td>
                    <td style="text-align:center ;">
                        <a href="ubah.php?id=<?= $mhs["id"]?>">Update |</a>
                        <a href="hapus.php?id=<?= $mhs["id"]?>" onclick="return confirm('Do You Want to Delete ?');">Delete |</a>
                        <a href="detail.php?id=<?= $mhs["id"]; ?>">Detail</a>
                    </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    

</body>

</html>