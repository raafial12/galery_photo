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
    /* Styling navbar */
    .navbar {
        background-color: #f8f9fa;
        /* Background color */
    }

    .navbar-brand {
        font-size: 1.5rem;
        /* Ukuran teks */
        font-weight: bold;
        /* Ketebalan teks */
    }

    .navbar-nav .nav-link {
        font-size: 1.2rem;
        /* Ukuran teks */
        margin-right: 10px;
        /* Margin kanan */
    }

    /* Styling button */
    .btn {
        font-size: 1rem;
        /* Ukuran teks */
        margin-right: 5px;
        /* Margin kanan */
    }

    /* Styling card */
    .card {
        border: 1px solid #ccc;
        /* Border */

        border-radius: 10px;
        /* Membuat sudut kartu menjadi bulat */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Menambahkan bayangan kartu */
        transition: transform 0.3s ease;
        /* Efek transisi saat kartu diperbesar */
    }

    .card-img-top {
        object-fit: cover;
        /* Ukuran gambar */
        border-top-left-radius: 8px;
        /* Radius sudut */
        border-top-right-radius: 8px;
        /* Radius sudut */
    }

    .card-footer {
        background-color: #f8f9fa;
        /* Background color */
        border-top: 1px solid #ccc;
        /* Border atas */
        border-bottom-left-radius: 8px;
        /* Radius sudut */
        border-bottom-right-radius: 8px;
        /* Radius sudut */
        padding: 5px 10px;
        /* Padding */
    }

    /* Styling modal */
    .modal-content {
        border-radius: 8px;
        /* Radius sudut */
    }

    .modal-dialog {
        max-width: 90%;
        /* Lebar maksimum */
    }

    .modal-body {
        padding: 20px;
        /* Padding */
    }

    /* Styling footer */
    .footer {
        background-color: #f8f9fa;
        /* Background color */
        padding: 10px 0;
        /* Padding */
        text-align: center;
        /* Posisi teks */
    }

    /* Optional: Styling scrollbar */
    .overflow-auto::-webkit-scrollbar {
        width: 10px;
        /* Lebar scrollbar */
    }

    .overflow-auto::-webkit-scrollbar-thumb {
        background-color: #888;
        /* Warna latar */
        border-radius: 5px;
        /* Radius sudut */
    }



    .card:hover {
        transform: scale(1.05);
        /* Memperbesar kartu saat dihover */
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

    /* Styling ikon unduhan */
    i.fas.fa-download {
        margin-right: 5px;
        /* Jarak antara ikon dan teks */
        color: #007bff;
        /* Warna ikon */
    }
</style>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebGal Photo</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary  ">
        <div class="container">
            <a class="navbar-brand" href="index.php">WebGal Photo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-2" id="navbarNav fixed-top">
                <div class="navbar-nav me-auto ">
                    <a href="home.php" class="nav-link">Home</a>
                    <a href="album.php" class="nav-link">Album</a>
                    <a href="foto.php" class="nav-link">Foto</a>
                </div>
                <a href="edit.php" class="btn btn-outline-success m-1">
                    Edit
                </a>
                <a href="../config/proses_logout.php" onclick="return confirm('Apakah Anda yakin ingin keluar?')" class="btn btn-outline-danger m-1">keluar</a>

            </div>
        </div>
    </nav>

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
                                    echo mysqli_num_rows($like) . 'suka';
                                    ?>
                                    <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid']  ?>"><i class="fa fa-comment"></i></a>
                                    <?php
                                    $jmlkomen = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE fotoid='$fotoid'");
                                    echo mysqli_num_rows($jmlkomen) . ' komentar';
                                    ?>
                                </div>

                            </div>
                        </div>

                    </a>
                    <div class="modal fade" id="komentar<?php echo $data['fotoid']  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-body">
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
                                                    <span style="font-weight: bold; font-size: 1.2rem;">Deskripsi</span>
                                                    <p align="left"><?php echo $data['deskripsifoto'] ?></p>
                                                    <hr>

                                                    <!-- Tombol download -->


                                                    <?php
                                                    $fotoid = $data['fotoid'];
                                                    $komentar = mysqli_query($koneksi, "SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.userid=user.userid WHERE komentarfoto.fotoid='$fotoid'");
                                                    while ($row = mysqli_fetch_array($komentar)) { ?>

                                                        <p align="left">
                                                            <strong><?php echo $row['namalengkap'] ?></strong>
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


    <footer class="d-flex justify-content-center border-top mt-2 bg-light fixed-bottom ">
        <p>&copy; WebfiAL | Raafi Alfarizqi</p>
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