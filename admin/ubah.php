<?php  

session_start();
// cek apakah adasession admin, jika tidak Getout
if (!isset($_SESSION["adm"])){
    header("Location: login.php");
}

require "functions.php";
// ambil id dari URL
$id = $_GET["id"];
// query mahasiswa berdasarkan id 
$mhs = query("SELECT* FROM tb_user WHERE id = $id")[0];
// cek apakah tombol submit telah ditekan
if ( isset($_POST['submit'])){
    // cek apakah data berhasil diubah atau tidak
    if ( ubah($_POST) > 0) {
        echo "
        <script>
            alert ('data berhasil diubah');
            document.location.href = 'index.php';
        </script>
        ";
    }
    else {
        echo "
        <script>
            alert ('Tidak ada data yang berubah');
        </script>        
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminTFME</title>
    <link rel="stylesheet" href="css/ubah.css">
    <link rel="stylesheet" href="css/tambah-admin.css">
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

    <div class="sidebar">
        <a href="index.php" class="btn active"><button><i class="fa fa-address-book fa-sm" aria-hidden="true"></i>Daftar
                Pengguna</button></a>
        <a href="tambahAdmin.php" class="btn"><button><i class="fa fa-plus" aria-hidden="true"></i> Tambah
                Admin</button></a>
    </div>
    <section>
        <div class="container box">
            <h4>
                <center>Update User Account</center>
            </h4>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Username</label>
                    </div>
                    <div class="col-75" >
                        <input type="text" style="text-transform: capitalize;" id="fname" name="firstname" value="<?= $mhs["nama"]; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="nim">Nim</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="nim" name="nim" value="<?= $mhs["nim"]; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="password">Password</label>
                    </div>
                    <div class="col-75">
                        <i class="fa fa-eye" id="eye"></i>
                        <input type="password" id="pwd" name="password" value="<?= $mhs["psw"]; ?>">
                    </div>
                    <!-- Start script show Eye -->
                    <script>
                        var pwd = document.getElementById('pwd');
                        var eye = document.getElementById('eye');

                        eye.addEventListener('click', togglePass);
                        function togglePass(){
                            eye.classList.toggle('active');
                            (pwd.type == 'password') ? pwd.type = 'text' :
                            pwd.type = 'password'; 
                        }
                    </script>
                    <!-- End cript show eye -->
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="text">Email</label>
                    </div>
                    <div class="col-75">
                        <input type="email" id="text" name="email" value="<?= $mhs["email"]; ?>">
                    </div>
                </div>
                <div class="row">
                    <input type="submit" value="Update" name="submit">
                </div>
            </form>
        </div>
    </section>

</body>

</html>