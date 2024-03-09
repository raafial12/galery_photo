<?php
include('../config/koneksi.php');
session_start();
$userid = $_SESSION['userid'];
if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('anda belum login');
    location.href='../index.php';
    </script>";
}

?>
<style>
    .navbar-brand,
    .nav-link {
        font-family: 'Arial', sans-serif;
        /* Ganti dengan jenis font yang Anda sukai */
        font-size: 18px;
        /* Sesuaikan ukuran font sesuai keinginan */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        /* Tambahkan efek bayangan */
        transition: all 0.3s ease;
        /* Tambahkan efek transisi */
    }

    .navbar-brand:hover,
    .nav-link:hover {
        color: #fff;
        /* Ubah warna teks saat dihover */
        text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.7);
        /* Tingkatkan efek bayangan saat dihover */
    }



    /* Styling card */
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



    /* Styling tautan Download */
    a.download-link {
        text-decoration: none;
        /* Menghilangkan garis bawah */
        color: #007bff;
        /* Warna teks */
        font-weight: bold;
        /* Ketebalan teks */
    }

    a.download-link:hover {
        text-decoration: underline;
        /* Garis bawah saat dihover */
    }

    /* Keyframe animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Apply animation to specific elements */
    .masthead-avatar,
    .masthead-heading,
    .masthead-subheading,
    .divider-custom-icon {
        animation: fadeInUp 1s ease-out forwards;
    }

    .divider-custom-line {
        animation: fadeInUp 1s ease-out forwards;
        animation-delay: 0.5s;
        /* Delay for staggered effect */
    }
</style>
<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Website Galeri</title>
    <!-- Favicon-->
    <link rel="icon" type="image" href="assets/blue.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->

    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php" style="font-family: 'Arial', sans-serif; font-size: 24px; font-weight: bold; color: #fff; ">WebGal Photo</a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto justify-content-center">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-2 px-0 px-lg-2 rounded" href="home.php" style="color: #f5f5f5;">Home</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-2 px-0 px-lg-2 rounded" href="album.php" style="color: #f5f5f5;">Album</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-2 px-0 px-lg-2 rounded" href="foto.php" style="color: #f5f5f5;">Foto</a></li>
                </ul>
                <a href="../config/proses_logout.php" onclick="return confirm('Apakah Anda yakin ingin keluar?')" class="btn btn-danger m-1 text-white">
                    <i class="fas fa-sign-out-alt me-1"></i> Logout
                </a>
            </div>
        </div>
    </nav>


    <header class="masthead bg-primary text-white text-center bg-info" style="margin-top: 0;">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image-->
            <img class="masthead-avatar mb-0" src="../aset/img/avataaars.svg" alt="..." style="max-width: 80px; margin-top: 80px;" />
            <!-- Masthead Heading-->
            <h1 class="masthead-heading text-uppercase mb-0 mt-0">Welcome Back !</h1>
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




    <div class="container mt-2 mb-5 ">
        <div class="row">
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM foto INNER JOIN user ON foto
            .userid=user.userid INNER JOIN album ON foto.albumid=album.albumid  ");
            while ($data = mysqli_fetch_array($query)) {
            ?>
                <div class="col-md-3 mt-2">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid']  ?>">


                        <div class="card mb-2">
                            <img style="height:12rem;" src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>">
                            <div class="card-footer text-center">
                                <div class="card-footer text-center">

                                    <?php
                                    $fotoid = $data['fotoid'];
                                    $ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
                                    if (mysqli_num_rows($ceksuka) == 1) { ?>
                                        <a href="../config/proses_like2.php?fotoid=<?php echo $data['fotoid']  ?>" type="submit" name='batalsuka'><i class="fas fa-heart"></i></a>
                                    <?php } else { ?>
                                        <a href="../config/proses_like2.php?fotoid=<?php echo $data['fotoid']  ?>" type="submit" name='suka'><i class="far fa-heart"></i></a>

                                    <?php }
                                    $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                                    echo mysqli_num_rows($like) . ' Like';
                                    ?>
                                    &nbsp;&nbsp;
                                    <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>"><i class="far fa-comment"></i></a>

                                    <?php
                                    $jmlkomen = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE fotoid='$fotoid'");
                                    echo mysqli_num_rows($jmlkomen) . ' Comment ';
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
                                            <img src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="m-2">
                                                <div class="overflow-auto">
                                                    <div class="sticky-top">
                                                        <strong><?php echo $data['judulfoto'] ?></strong><br>
                                                        <span class="badge bg-secondary"><?php echo $data['namalengkap'] ?></span>
                                                        <span class="badge bg-secondary"><?php echo $data['tanggalunggah'] ?></span>
                                                        <span class="badge bg-primary"><?php echo $data['namaalbum'] ?></span>
                                                        <a href='../assets/img/<?php echo $data['lokasifile'] ?>' download class="download-link">
                                                            <i class="fas fa-download"></i> Download
                                                        </a>


                                                    </div>


                                                    <hr>
                                                    <span style="font-weight: bold; font-size: 1.2rem;">Description</span>
                                                    <p align="left"><?php echo $data['deskripsifoto'] ?></p>
                                                    <hr>

                                                    <!-- Tombol download -->

                                                    <div style="text-align: center;">
                                                        <span style="font-size: 16px;">

                                                            <i class="fas fa-star" style="font-size: 12px;"></i> Comment <i class="fas fa-star" style="font-size: 12px;"></i><br><br>
                                                        </span>
                                                    </div>

                                                    <?php
                                                    $fotoid = $data['fotoid'];
                                                    $komentar = mysqli_query($koneksi, "SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.userid=user.userid WHERE komentarfoto.fotoid='$fotoid'");
                                                    while ($row = mysqli_fetch_array($komentar)) { ?>

                                                        <p align="left">
                                                            <strong><?php echo $row['namalengkap'] ?> :</strong>
                                                            <?php echo $row['isikomentar'] ?>
                                                        </p>

                                                    <?php   }
                                                    ?>

                                                    <hr>
                                                    <div class="sticky-bottom">
                                                        <form action="../config/proses_komentar.php" method="POST">
                                                            <div class="input-group">
                                                                <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                                                                <input type="text" name="isikomentar" class="form-control" placeholder="Tambah komentar">
                                                                <button type="submit" name="kirimkometar" class="btn-outline-primary">Kirim</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <br>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            <?php      }   ?>
        </div>
    </div>


    <footer class="d-flex justify-content-center mt-3 bg-light fixed-bottom">
        <p > &copy; WebfiAL | Raafi Alfarizqi</p>
    </footer>



    <script type="text/javascript" src="../assets/js/bootstrap.min.js">
    </script>
    <script>
        async function downloadImage(imageSrc) {
            const image = await fetch(imageSrc)
            const imageBlog = await image.blob()
            const imageURL = URL.createObjectURL(imageBlog)

            const link = document.createElement('a')
            link.href = imageURL
            link.download = 'image file name here'
            document.body.appendChild(link)
            link.click()
            document.body.removeChild(link)
        }
    </script>
</body>

</html>