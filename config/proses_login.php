<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Mendapatkan data pengguna berdasarkan username
$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
$cek = mysqli_num_rows($sql);

if($cek > 0){
    $data = mysqli_fetch_array($sql);

    // Memverifikasi kata sandi yang dimasukkan dengan hash yang tersimpan di database
    if(password_verify($password, $data['password'])) {
        $_SESSION['username'] = $data['username'];
        $_SESSION['userid'] = $data['userid'];    
        $_SESSION['status'] = 'login';
        echo "<script>
        alert('Login berhasil');
        location.href='../users/index.php';
        </script>";
    } else {
        echo "<script>
        alert('Username atau password salah!');
        location.href='../login.php';
        </script>";
    }
} else {
    echo "<script>
    alert('Username atau password salah!');
    location.href='../login.php';
    </script>";
}
?>
