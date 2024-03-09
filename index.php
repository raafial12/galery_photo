<?php
include(__DIR__ . '/config/koneksi.php');
session_start();



?>
<style>
    .card {
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;

    }

    .card:hover {
        transform: scale(1.05);
        /* Memperbesar kartu dengan proporsi yang lebih kecil */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-img-top {
        object-fit: cover;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .navbar {
        transition: background-color 0.5s ease;
    }

    /* Animasi untuk Avatar */
    @keyframes avatarAnimation {
        0% {
            transform: translateY(-100px);
            opacity: 0;
        }

        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    /* Animasi untuk Masthead Heading */
    @keyframes headingAnimation {
        0% {
            transform: translateY(-50px);
            opacity: 0;
        }

        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    /* Animasi untuk Icon Divider */
    @keyframes dividerAnimation {
        0% {
            transform: translateY(50px);
            opacity: 0;
        }

        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    /* Animasi untuk Masthead Subheading */
    @keyframes subheadingAnimation {
        0% {
            transform: translateY(100px);
            opacity: 0;
        }

        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    /* Terapkan animasi ke elemen */
    .masthead-avatar {
        animation: avatarAnimation 1s ease forwards;
    }

    .masthead-heading {
        animation: headingAnimation 1s ease forwards;
    }

    .divider-custom-icon {
        animation: dividerAnimation 1s ease forwards;
    }

    .masthead-subheading {
        animation: subheadingAnimation 1s ease forwards;
    }
</style>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebGal Photo</title>
    <link rel="icon" type="image/x-icon" href="assets/blue.ico" />
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    

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
                <a href="login.php" class="btn btn-success m-1">
                    <i class="fas fa-sign-in-alt mr-1"></i>
                    Sign in
                </a>
            </div>
        </div>
    </nav>




    <!-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="index.php">WebGal Photo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mt-2" id="navbarSupportedContent">
            <div class="navbar-nav me-auto">

            </div>
            <a href="register.php" class="btn btn-outline-primary m-1">
                Daftar
            </a>
            <a href="login.php" class="btn btn-outline-success m-1">
                Masuk
            </a>
        </div>
    </div>
</nav> -->

    <header class="masthead bg-info text-white text-center " style="margin-top: 0;">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image-->
            <img class="masthead-avatar mb-0" src="aset/img/guest.svg" style="max-width: 80px; margin-top: 85px;" />
            <!-- Masthead Heading-->
            <h1 class="masthead-heading text-uppercase mb-0 mt-0">Welcome !</h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Subheading-->
            <p class="masthead-subheading font-weight-light mb-4">Galery - Photo</p>
        </div>
    </header>

    <div class="container mt-2 mb-5">
        <div class="row">
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM foto INNER JOIN user ON foto.userid=user.userid INNER JOIN album ON foto.albumid=album.albumid");
            while ($data = mysqli_fetch_array($query)) {
                $fotoid = $data['fotoid']; // Mendefinisikan $fotoid di sini
            ?>
                <div class="col-md-3 mt-2">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>">
                        <div class="card mb-2">
                            <img style="height:12rem;" src="assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>">
                            <div class="card-footer text-center">
                                <div class="card-footer text-center">
                                    <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>"><i class="far fa-comment"></i></a>
                                    <?php
                                    $jmlkomen = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE fotoid='$fotoid'");
                                    echo mysqli_num_rows($jmlkomen) . ' Comment';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="modal fade" id="komentar<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <!-- Tombol close di sebelah kanan atas modal -->
                                    <button type="button" class="btn-close position-absolute top-0 end-0 m-2" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <div class="row">
                                    <div class="col-md-8">
                                    <a href="assets/img/<?php echo $data['lokasifile'] ?>" data-fancybox="gallery" data-caption="<?php echo $data['judulfoto'] ?>">
                                        <img src="assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>">
                                    </a>
                                </div>

                                        <div class="col-md-4">
                                            <div class="m-2">
                                                <div class="overflow-auto">
                                                    <div class="sticky-top">
                                                        <strong><?php echo $data['judulfoto'] ?></strong><br>
                                                        <span class="badge bg-secondary"><?php echo $data['namalengkap'] ?></span>
                                                        <span class="badge bg-secondary"><?php echo $data['tanggalunggah'] ?></span>
                                                        <span class="badge bg-primary"><?php echo $data['namaalbum'] ?></span>
                                                       
                                                            <i class="fas fa-download"></i> Download


                                                    </div>

                                                    <hr>
                                                    <span style="font-weight: bold; font-size: 1.2rem;">Description</span>
                                                    <p align="left"><?php echo $data['deskripsifoto'] ?></p>
                                                    <hr>
                                                    <div style="text-align: center;">
                                                        <span style="font-size: 16px;">

                                                            <i class="fas fa-star" style="font-size: 12px;"></i> Comment <i class="fas fa-star" style="font-size: 12px;"></i><br><br>
                                                        </span>
                                                    </div>
                                                    <?php
                                                    $komentar = mysqli_query($koneksi, "SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.userid=user.userid WHERE komentarfoto.fotoid='$fotoid'");
                                                    while ($row = mysqli_fetch_array($komentar)) {
                                                    ?>
                                                        <p align="left">
                                                            <strong><?php echo $row['namalengkap'] ?> :</strong>
                                                            <?php echo $row['isikomentar'] ?>
                                                        </p>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <footer class="d-flex justify-content-center bg-light fixed-bottom ">
        <p> &copy; WebfiAL | Raafi Alfarizqi</p>
    </footer>



    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>

</html>