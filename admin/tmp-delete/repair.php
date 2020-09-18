<?php  
session_start();
// cek kondisi sesion pada login
if ( isset($_SESSION["mhs"])){
    header("Location: content.php");
    exit;
}

require 'functions.php';

// Logic Registrasi
if(isset($_POST["register"])){

    if (registrasi($_POST) > 0) {
        echo "
            <script>
                alert ('Register Completed');
            </script>";
    }
    else {
       echo mysqli_error($conn);
    }
}

// Logic Login
if (isset($_POST["login"])){

    $nim = $_POST["nim"];
    $password = $_POST["psw"];
    $depart = $_POST["depart"];

    // cek nim
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE nim ='$nim' AND depart='$depart' AND psw= '$password'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        // cek session
        $_SESSION["login"] = true;
        $_SESSION["mhs"] = $row; 
        header("Location: content.php");   
        exit;
    } else {
        echo "
            <script>
            alert ('Please Check Your Depart/Password');
            </script>";
    } 
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
    </title>
</head>

<body style="height: 5000px; overflow:hidden;">
    <div class="BG">
        <img src="images/labor.jpeg" alt="">
    </div>
    <div class="overlay">
        <div class="gambar">
            <img src="images/TFME.jpg" alt="TFME logo" class="tfme">
            <img src="images/poltek.png" alt="Poltek Logo" width="150px" class="polibatam">
        </div>
        <div class="tombol">
            <button onclick="document.getElementById('id02').style.display='block'" class="signup" id="signup">Sign Up</button>
            <button onclick="document.getElementById('id01').style.display='block'" class="login">Login</button>
        </div>
    </div>
    <div class="modal" id="id01">
        <form action="" class="modal-content animate" method="post">
            <div class="login">
                <span onclick="document.getElementById('id01').style.display='none'" class="close"
                    title="Login Popup">&times;</span>
            </div>
            <div class="container">
                <h3>TFME Interactive Learning Media</h3>
                <label for="prog"><b>Study Program</b></label><br>
                <select required style="width: 100%;" name="depart">
                <option value="" disabled selected>-- Select Your Departement --</option>
                    <optgroup label="Elektro">
                            <option value="Teknik Elektro Manufaktur">Teknik Elektro Manufaktur</option>
                            <option value="Teknik Elektronika">Teknik Elektronika</option>
                            <option value="Teknik Instrumentasi">Teknik Instrumentasi</option>
                            <option value="Teknik Mekatronika">Teknik Mekatronika</option>
                            <option value="Teknik Robotika">Teknik Robotika</option>
                            <option value="Teknik Teknologi Rekayasa Pembangkit Energi">Teknik Teknologi Rekayasa Pembangkit Energi</option>
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
                            <option value="Teknik Perancangan dan Konstruksi Kapal">Teknik Perancangan dan Konstruksi Kapal</option>
                    </optgroup>
                    
                    <optgroup label="Manajemen Bisnis">
                            <option value="Akuntansi">Akuntansi</option>
                            <option value="Akuntansi Manajerial">Akuntansi Manajerial</option>
                            <option value="Administrasi Bisnis Terapan">Administrasi Bisnis Terapan</option>
                            <option value="Logistik Perdagangan Internasional">Logistik Perdagangan Internasional</option>
                    </optgroup> 
                </select> <br>
                <label for="nim"><b>NIM</b></label>
                <input type="text" placeholder="Enter Your NIM" name="nim" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                <button type="submit" name="login">Login</button>
            </div>
            <div class="container" style="background-color: #f1f1f1;">
                <center>"You must <b>sign up first</b>, If yout don't have an account"</center>
                <div class="clear"></div>
            </div>
        </form>
    </div>
    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhre outside of the modal, close it 
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>
    <div class="modal" id="id02">
        <form action="" class="modal-content animate" method="post">
            <div class="container">
                <div class="signup">
                    <span onclick="document.getElementById('id02').style.display='none'" class="close"
                        title="Login Popup">&times;</span>
                </div>
                <h3>Sign Up Here</h3>
                <label for="name"><b>Full Name</b></label>
                <input type="text" placeholder="Enter Username" name="name" required>

                <label for="nim"><b>NIM</b></label>
                <input type="text" placeholder="Enter Your NIM" name="nim" mbaxlength="10" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" min="8" max="30" name="psw" required>

                <label for="psw2"><b>Re-Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw2" required>

                <label for="depart"><b>Department</b></label>
                <select required style="width: 100%;" name="depart">
                <option value="" disabled selected>-- Select Your Departement --</option>
                    <optgroup label="Elektro">
                            <option value="Teknik Elektro Manufaktur">Teknik Elektro Manufaktur</option>
                            <option value="Teknik Elektronika">Teknik Elektronika</option>
                            <option value="Teknik Instrumentasi">Teknik Instrumentasi</option>
                            <option value="Teknik Mekatronika">Teknik Mekatronika</option>
                            <option value="Teknik Robotika">Teknik Robotika</option>
                            <option value="Teknik Teknologi Rekayasa Pembangkit Energi">Teknik Teknologi Rekayasa Pembangkit Energi</option>
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
                            <option value="Teknik Perancangan dan Konstruksi Kapal">Teknik Perancangan dan Konstruksi Kapal</option>
                    </optgroup>
                    
                    <optgroup label="Manajemen Bisnis">
                            <option value="Akuntansi">Akuntansi</option>
                            <option value="Akuntansi Manajerial">Akuntansi Manajerial</option>
                            <option value="Administrasi Bisnis Terapan">Administrasi Bisnis Terapan</option>
                            <option value="Logistik Perdagangan Internasional">Logistik Perdagangan Internasional</option>
                    </optgroup> 
                </select> <br>
                <label for="email"><b>E-Mail</b></label>
                <input type="email" placeholder="Enter Your E-Mail" name="email" required>
                
                <button type="submit" name="register">Register</button>
            </div>
        </form>
    </div>
    <script>
        // Get the modal
        var modal = document.getElementById('id02');

        // When the user clicks anywhre outside of the modal, close it 
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>




</body>

</html>