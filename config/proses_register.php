<?php

include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$namalengkap = $_POST['namalengkap'];
$alamat = $_POST['alamat'];

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Check if the username already exists
$check_query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
if(mysqli_num_rows($check_query) > 0) {
    echo "<script>
    alert('Username sudah ada. Silakan pilih username lain.');
    location.href='../register.php'; // Redirect back to registration page
    </script>";
    exit; // Stop further execution
}

// If username is not already taken, proceed with registration
$sql = mysqli_query($koneksi, "INSERT INTO user VALUES('', '$username', '$hashed_password', '$email', '$namalengkap', '$alamat')");

if($sql){
    echo "<script>
    alert('Berhasil Registrasi');
    location.href='../login.php';
    </script>";
} else {
    echo "<script>
    alert('Registration failed. Please try again.');
    location.href='../register.php'; // Redirect back to registration page
    </script>";
}

?>
