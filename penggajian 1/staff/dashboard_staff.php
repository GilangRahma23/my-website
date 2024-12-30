<?php
session_start();
include('../koneksi.php');
?>

<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="icon" href="../logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../styles.css">
    <title>Dashboard Staf</title>

    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--<title>Dashboard Sidebar Menu</title>-->
</head>

<body class="bg-primary bg-opacity-25"> 
    <?php include('sidebar_staff.php') ?>
    <?php
    $nip = $_SESSION['nip'];
    $tanggal = date('l, d-m-Y H-i-s A');
    $sql = "SELECT * FROM staf WHERE nip  = $nip";
    $query = mysqli_query($conn, $sql);
    if ($query->num_rows > 0) {
        $data = $query->fetch_assoc();
    ?>

        <!-- Main Content -->
        <section class="home bg-light bg-opacity-25">
            <?php
            if (isset($_SESSION['pesan'])) {
            ?>
                <div class="alert alert-primary alert-dismissible fade show ms-5 me-5 mt-2" role="alert">
                    <strong>Holy guacamole!</strong> <?php echo $_SESSION['pesan'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                unset($_SESSION['pesan']);
            }
            ?>
            <label for="" class="fs-2 fw-semibold ms-5 mb-3 mt-2">Selamat Datang <?php echo $data['nm_staf'] ?></label>
            <div class="card ms-5 me-5">
                <div class="card-body">
                    <form action="action/presensi.php" method="post">
                        <div class="row g-3 align-items-center ps-4 pt-4 pe-4">
                            <div class="col-3">
                                <label for="" class="col-form-label">NIP</label>
                            </div>
                            <div class="col-9">
                                <input type="text" id="" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $data['nip'] ?>" disabled>
                            </div>
                        </div>
                        <div class="row g-3 align-items-center ps-4 pt-4 pe-4">
                            <div class="col-3">
                                <label for="" class="col-form-label">Nama</label>
                            </div>
                            <div class="col-9">
                                <input type="text" id="" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $data['nm_staf'] ?>" disabled>
                            </div>
                        </div>
                        <div class="row g-3 align-items-center ps-4 pt-4 pe-4">
                            <div class="col-3">
                                <label for="" class="col-form-label">Wakttu</label>
                            </div>
                            <div class="col-9">
                                <input type="text" id="" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $tanggal ?>" disabled>
                            </div>
                        </div>
                        <div class="align-items-center ps-4 pt-4 pe-4">

                            <hr class="ps-4 pe-4">
                        </div>
                        <div class="align-items-center ps-4 pt-4 pe-4">
                            <?php
                            $waktu = date('Y-m-d');
                            $nip = $_SESSION['nip'];
                            $sql = "SELECT * FROM presensi WHERE nip = $nip AND waktu LIKE '%$waktu%'";
                            if (mysqli_query($conn, $sql)->num_rows > 0) {
                            ?>
                                <button type="submit" class="btn btn-primary disabled" name="presensi">Presensi</button>
                            <?php
                            } else {
                            ?>
                                <button type="submit" class="btn btn-primary" name="presensi">Presensi</button>
                            <?php
                            }
                            $cariAbsen = "SELECT * FROM absen WHERE nip = $nip AND waktu LIKE '%$waktu%'";
                            if (mysqli_query($conn, $cariAbsen)->num_rows > 0) {
                            ?>
                                <button type="button" class="btn btn-warning disabled" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Absen</button>
                            <?php
                            } else {
                            ?>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Absen</button>
                            <?php
                            }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    <?php
    }
    ?>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="action/presensi.php" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Absen</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row g-3 align-items-center pt-2 pb-2">
                            <div class="col-3">
                                <label for="" class="col-form-label">NIP</label>
                            </div>
                            <div class="col-9">
                                <input type="text" id="" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $data['nip'] ?>" name="nip" disabled>
                            </div>
                        </div>
                        <div class="row g-3 align-items-center pt-2 pb-2">
                            <div class="col-3">
                                <label for="" class="col-form-label">Nama</label>
                            </div>
                            <div class="col-9">
                                <input type="text" id="" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $data['nm_staf'] ?>" disabled>
                            </div>
                        </div>
                        <div class="row g-3 align-items-center pt-2 pb-2">
                            <div class="col-3">
                                <label for="" class="col-form-label">Keterangan</label>
                            </div>
                            <div class="col-9">
                                <select class="form-select" aria-label="Default select example" name="keterangan">
                                    <option selected>Pilih Salah Satu</option>
                                    <option value="S">Sakit</option>
                                    <option value="I">Ijin</option>
                                </select>
                            </div>
                        </div>
                        <div class="row g-3 align-items-center pt-2 pb-2">
                            <div class="col-3">
                                <label for="" class="col-form-label">Alasan</label>
                            </div>
                            <div class="col-9">
                                <textarea name="alasan" class="form-control" id=""></textarea>
                            </div>
                        </div>
                        <div class="row g-3 align-items-center pt-2 pb-2">
                            <div class="col-3">
                                <label for="" class="col-form-label">Waktu</label>
                            </div>
                            <div class="col-9">
                                <input type="text" id="" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $tanggal ?>" name="waktu" disabled>
                            </div>
                        </div>
                        <div class="row g-3 align-items-center pt-2 pb-2">
                            <div class="col-3">
                                <label for="" class="col-form-label">Bukti</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="file" id="formFile" name="foto">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="absen">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
        const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            searchBtn = body.querySelector(".search-box"),
            modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");


        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        })

        searchBtn.addEventListener("click", () => {
            sidebar.classList.remove("close");
        })

        modeSwitch.addEventListener("click", () => {
            body.classList.toggle("dark");

            if (body.classList.contains("dark")) {
                modeText.innerText = "Light mode";
            } else {
                modeText.innerText = "Dark mode";

            }
        });
        </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    </script>

</body>

</html>