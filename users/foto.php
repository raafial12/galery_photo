<?php

session_start();
include '../config/koneksi.php';
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

    /* CSS untuk tampilan desktop */
 

    /* CSS untuk tampilan mobile */
    @media screen and (max-width: 768px) {
        .table-responsive {
            overflow-x: scroll;
        }
    }
    

</style>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Website Galeri</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
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

    <nav class="navbar navbar-expand-lg bg-primary ">
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

    <div class="container mb-5 mt-3">
        <div class="row">
            <div class="col-md-4">
                <div class="card mt-2">
                    <div class="card-header">tambah Foto</div>
                    <div class="card-body">
                        <form action="../config/proses_foto.php" method="POST" enctype="multipart/form-data">
                            <label class="form-label">Judul Foto</label>
                            <input type="text" name="judulfoto" class="form-control" required>
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsifoto" class="form-control" required></textarea>
                            <label class="form-label">Album</label>
                            <select class="form-control" name="albumid" required>


                                <?php
                                $userid = $_SESSION['userid'];
                                $sql_album = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
                                while ($data_album = mysqli_fetch_array($sql_album)) { ?>
                                    <option value="<?php echo $data_album['albumid'] ?>">
                                        <?php echo $data_album['namaalbum'] ?></option>
                                <?php } ?>
                            </select>

                            <br> <label class="form-label">File</label>
                            <img id="previewImage" class="img-fluid">
                            <input class="form-control" type="file" name="lokasifile" required id="formFile" onchange="loadFile(event)">
                            <button type="submit" class="btn btn-primary mt-2" name="tambah">
                                tambah data</button>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header">Data Foto</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Foto</th>
                                        <th>Nama Foto</th>
                                        <th>Deskripsi</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- your previous code -->

                                    <?php
                                    $no = 1;
                                    $userid = $_SESSION['userid'];
                                    $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid' ORDER BY tanggalunggah DESC");
                                    while ($data = mysqli_fetch_array($sql)) {
                                    ?>

                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><img src="../assets/img/<?php echo $data['lokasifile'] ?>" width="100"></td>
                                            <td><?php echo $data['judulfoto'] ?></td>
                                            <td><?php echo $data['deskripsifoto'] ?></td>
                                            <td><?php echo $data['tanggalunggah'] ?></td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['fotoid'] ?>">
                                                    Edit
                                                </button>

                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="edit<?php echo $data['fotoid'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="../config/proses_foto.php" method="POST" enctype="multipart/form-data">
                                                                    <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                                                                    <label class="form-label">Judul foto</label>
                                                                    <input type="text" name="judulfoto" value="<?php echo $data['judulfoto'] ?>" class="form-control" required>
                                                                    <label class="form-label">Deskripsi</label>
                                                                    <textarea name="deskripsifoto" class="form-control" required><?php echo $data['deskripsifoto'] ?></textarea>

                                                                    <label class="form-label">Album</label>
                                                                    <select class="form-control" name="albumid">
                                                                        <?php

                                                                        $sql_album = mysqli_query($koneksi, "SELECT * FROM album  WHERE userid='$userid'");
                                                                        while ($data_album = mysqli_fetch_array($sql_album)) { ?>
                                                                            <option <?php if ($data_album['albumid'] == $data['albumid']) { ?> selected="selected" <?php } ?> value="<?php echo $data_album['albumid'] ?>">
                                                                                <?php echo $data_album['namaalbum'] ?></option>

                                                                        <?php } ?>
                                                                    </select>
                                                                    <label class="form-label">Foto</label>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <img src="../assets/img/<?php echo $data['lokasifile'] ?>" width="100">
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <label class="form-label">File</label>
                                                                            <input class="form-control" type="file" name="lokasifile" id="formFile" onchange="loadFile(event)">
                                                                        </div>
                                                                    </div>

                                                            </div>
                                                            <div class="modal-footer">


                                                                <button type="submit" name="edit" class="btn btn-primary">Edit Data</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Button trigger modal Hapus -->

                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['fotoid'] ?>">
                                                    Hapus
                                                </button>

                                                <!-- Modal Hapus -->
                                                <div class="modal fade" id="hapus<?php echo $data['fotoid'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">


                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="../config/proses_foto.php" method="POST">
                                                                    <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                                                                    Apakah anda yakin ingin menghapus data <strong><?php echo $data['judulfoto'] ?></strong>?
                                                            </div>
                                                            <div class="modal-footer">

                                                                <button type="submit" name="hapus" class="btn btn-danger">Hapus Data</button>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php } ?>

                                    <!-- your subsequent code -->

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>




    <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
        <p>&copy; WebfiAL | Raafi Alfarizqi</p>
    </footer>
    <script>
        const loadFile = function(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('previewImage');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>

    <script type="text/javascript" src="../assets/js/bootstrap.min.js">
    </script>
</body>

</html>