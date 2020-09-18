<?php  
session_start();
// tidak ada session
if (!isset($_SESSION["adm"])){
    header("Location: login.php");
}

// // logic cek user nerobos!! admin
// if (isset($_SESSION["mhs"])){
//     header("Location: ../content.php");
// }

require "functions.php";

// Logic tambah admin
if(isset($_POST["add"])){

    if (registrasi($_POST) > 0){
        header("Location: tambahAdmin.php");
    } 
    else{
        echo mysqli_error($conn);
    }
}

// tampilkan data admin yang telah terdaftar
$admin = query("SELECT * FROM admin");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminTFME</title>
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

    <h2>Added New Admin</h2>

    <div class="sidebar">
        <a href="index.php" class="btn active"><button><i class="fa fa-address-book fa-sm" aria-hidden="true"></i>List
                of users</button></a>
    </div>

    <div class="container">
        <form action="" method="post">
            <div class="row">
                <div class="col-25">
                    <label for="fname">Full Name</label>
                </div>
                <div class="col-75">
                    <input type="text" id="fname" name="fname" placeholder="ex..(Aji Pangestu)" required>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="uid">User ID</label>
                </div>
                <div class="col-75">
                    <input type="text" id="uid" name="uid" placeholder="ex..(aji)" maxlength="20" required>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="password">Password</label>
                </div>
                <div class="col-75">
                    <i class="fa fa-eye" id="eye"></i>
                    <input type="password" id="pwd" name="password" placeholder="Your password.." required>
                </div>
                <script>
                    var pwd = document.getElementById('pwd');
                    var eye = document.getElementById('eye');

                    eye.addEventListener('click', togglePass);

                    function togglePass() {
                        eye.classList.toggle('active');
                        (pwd.type == 'password') ? pwd.type = 'text':
                            pwd.type = 'password';
                    }
                </script>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="depart">Department</label>
                </div>
                <div class="col-75">
                    <select required style="width: 100%;" name="depart">
                        <option value="" disabled selected>-- Select Your Department --</option>
                        <optgroup label="Elektro">
                            <option value="Teknik Elektro Manufaktur">Teknik Elektro Manufaktur</option>
                            <option value="Teknik Elektronika">Teknik Elektronika</option>
                            <option value="Teknik Instrumentasi">Teknik Instrumentasi</option>
                            <option value="Teknik Mekatronika">Teknik Mekatronika</option>
                            <option value="Teknik Robotika">Teknik Robotika</option>
                            <option value="Teknik Teknologi Rekayasa Pembangkit Energi">Teknik Teknologi Rekayasa
                                Pembangkit Energi</option>
                        </optgroup>

                        <optgroup label="Informatika">
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Multimedia dan Jaringan">Teknik Multimedia dan Jaringan</option>
                            <option value="Teknik Geomatika">Teknik Geomatika</option>
                            <option value="Teknik Animasi">Teknik Animasi</option>
                            <option value="Teknik Rekayasa Keamanan Siber">Teknik Rekayasa Keamanan Siber</option>
                        </optgroup>

                        <optgroup label="Mesin">
                            <option value="Teknik Mesin">Teknik Mesin</option>
                            <option value="Teknik Perawatan Pesawat Udara">Teknik Perawatan Pesawat Udara</option>
                            <option value="Teknik Perancangan dan Konstruksi Kapal">Teknik Perancangan dan Konstruksi
                                Kapal</option>
                        </optgroup>

                        <optgroup label="Manajemen Bisnis">
                            <option value="Akuntansi">Akuntansi</option>
                            <option value="Akuntansi Manajerial">Akuntansi Manajerial</option>
                            <option value="Administrasi Bisnis Terapan">Administrasi Bisnis Terapan</option>
                            <option value="Logistik Perdagangan Internasional">Logistik Perdagangan Internasional
                            </option>
                        </optgroup>
                    </select> <br>
                </div>
            </div>
            <div class="row">
                <input type="submit" value="Add" name="add">
            </div>
        </form>
    </div>
    <hr>
    <h2>List of admin</h2>

    <table>
        <tr>
            <th>NO</th>
            <th>Full Name</th>
            <th>User ID</th>
            <th>Department</th>
        </tr>
        <?php $i=1; ?>
        <?php foreach ($admin as $adm) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $adm["username"]; ?></td>
            <td><?= $adm["uid"]; ?></td>
            <td><?= $adm["depart"]; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>

</body>

</html>