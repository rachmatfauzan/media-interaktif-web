<?php  
$conn = mysqli_connect("localhost", "root", "", "interactive");


// Ambil data mahasiswa
function query($query){
    global $conn;
    $result = mysqli_query($conn, $query); // mengambil lemari
    $rows = []; // mengambil isi lemari
    while ( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
    var_dump($rows);
}

function registrasi($data){
    global $conn;

    $fullname = ucwords(stripslashes($data["fname"]));
    $uid = strtolower(stripslashes($data["uid"]));
    $password = mysqli_escape_string($conn, $data["password"]);
    $depart = $data["depart"];

    // cek user ID sudah digunakan atau belum 
    $result = mysqli_query($conn, "SELECT uid FROM admin where uid = '$uid' ");
    
    if (mysqli_fetch_assoc($result)){
        echo "
            <script>
                alert ('ID telah dipakai Ganti ID lain');
            </script>";
         return false;
    }
    // Masukan data kedalam database 
    mysqli_query($conn, "INSERT INTO admin VALUES (
        '',
        '$fullname',
        '$uid',
        '$password',
        '$depart'
         )");

    return mysqli_affected_rows($conn);
}

function cari ($keyword){
    $query = "SELECT * FROM tb_user WHERE 
            nim LIKE '%$keyword%'OR
            depart LIKE '%$keyword%' OR
            nama LIKE '%$keyword%'
            ";

    return query($query);
}

function hapus ($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_user where id = '$id'");

    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    // ambil data dari tiap-tiap elemen dalam form
    $id = $data["id"];
    $username = strtolower(htmlspecialchars($data["firstname"]));
    $nim = $data["nim"];
    $password = htmlspecialchars($data["password"]);
    $email = htmlspecialchars($data['email']);

    // querry Update data 
    $query = "UPDATE tb_user SET
                nama = '$username',
                psw = '$password',
                email = '$email',
                nim = '$nim'
                WHERE id = $id
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

?>