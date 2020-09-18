<?php 
// menghubungkan ke DBMS
$conn = mysqli_connect("localhost", "root", "", "interactive");

// Insert data registrasi ke dalam database
function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["name"]));
    $password = mysqli_escape_string($conn, $data["psw"]);
    $password2 = mysqli_escape_string($conn ,$data["psw2"]);
    $depart = $data["depart"];
    $email = $data["email"];
    $nim = $data["nim"];

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT nim FROM tb_user WHERE nim = '$nim'");

    if (mysqli_fetch_assoc($result)){
        echo "
            <script>
                alert ('NIM has been registered');
            </script>";
            return false;
            die;
    }

    // cek konfirmasi password
    if ($password != $password2) {
        echo "
            <script>
                alert ('Password tidak sesuai');
            </script>";
            return false;
    }

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO tb_user VALUES ('','$username', '$password', '$depart', '$email', '$nim', '', '')");

    return mysqli_affected_rows($conn);
}

?>