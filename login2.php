<!DOCTYPE html>
<style>
    /* CSS */

/* Body */
body {
    margin: 0;
    padding: 0;
    background-color: #3e004d; /* Warna latar belakang */
    overflow: hidden;
    font-family: 'Open Sans', sans-serif; /* Gunakan Open Sans sebagai font */
}

/* Navbar */
.navbar {
    background-color: #343a40; /* Warna latar belakang navbar */
}

.navbar-brand {
    color: #fff; /* Warna teks merek navbar */
    font-weight: bold;
}

.navbar-toggler-icon {
    color: #fff; /* Warna ikon toggler navbar */
}

.navbar-nav .nav-link {
    color: #fff; /* Warna teks tautan navbar */
}

/* Card */
.card {
    background-color: #fff; /* Warna latar belakang card */
    border-radius: 15px; /* Radius sudut card */
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1); /* Efek bayangan card */
}

.card-body {
    padding: 30px; /* Padding dalam card body */
}

.card-body h5 {
    margin-bottom: 20px; /* Jarak bawah antara judul dan elemen berikutnya */
}

.form-label {
    font-weight: bold; /* Ketebalan teks label form */
}

/* Button */
.btn-primary {
    background-color: #007bff; /* Warna latar belakang tombol utama */
    border-color: #007bff; /* Warna border tombol utama */
}

.btn-primary:hover {
    background-color: #0056b3; /* Warna latar belakang tombol utama saat hover */
    border-color: #0056b3; /* Warna border tombol utama saat hover */
}

.btn-outline-primary {
    color: #007bff; /* Warna teks pada tombol outline utama */
    border-color: #007bff; /* Warna border pada tombol outline utama */
}

.btn-outline-primary:hover {
    background-color: #007bff; /* Warna latar belakang tombol outline utama saat hover */
    color: #fff; /* Warna teks pada tombol outline utama saat hover */
}

/* Footer */

</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebGal Photo</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>

<body>

<nav class="navbar navbar-expand-lg bg-primary fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php" style="font-family: 'Arial', sans-serif; font-size: 24px; font-weight: bold; color: #fff;">WebGal Photo</a>
        <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarResponsive">
            <a href="register.php" class="btn btn-info m-1 text-white"> <!-- Menambahkan kelas text-white -->
                <i class="fas fa-user-plus mr-1"></i>
                Daftar
            </a>
            <a href="login.php" class="btn btn-success m-1">
                <i class="fas fa-sign-in-alt mr-1"></i> 
                Masuk
            </a>
        </div>
    </div>
</nav>



<div class="container py-5 mt-5">
    <di class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body bg-light">
                    <div class="text-center">
                        <h5>Login Galery</h5>
                    </div>
                    <form action="config/proses_login.php" method="post">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" required>
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                        <div class="d-grid mt-2">
                            <button class="btn btn-primary" type="submit">Masuk</button>
                        </div>
                    </form>
                    <hr>
                    <p>belum punya akun? <a href="register.php">Buat Akun</a></p>
                </div>
            </div>
        </div>
    </di>
</div>


<footer class="d-flex justify-content-center mt-2 bg-light fixed-bottom">
        <p style="margin-top: 15px;"> &copy; WebfiAL | Raafi Alfarizqi</p>
    </footer>


   

    <script type="text/javascript" src="assets/js/bootstrap.min.js">
    </script>
</body>

</html>