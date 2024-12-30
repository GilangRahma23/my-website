<?php
session_start();
include('../../koneksi.php');

// Mengatur zona waktu ke Indonesia (WIB)
date_default_timezone_set('Asia/Jakarta');

if (isset($_POST['presensi'])) {
    $nip = $_SESSION['nip'];
    $waktu = date('Y-m-d H:i:s'); // Format waktu dengan detik
    $sql = "INSERT INTO presensi(nip, waktu) VALUES ($nip, '$waktu')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION['pesan'] = "Anda telah presensi hari ini, Semangat Bekerja";
        header("Location: ../dashboard_staff.php");
        exit();
    }
}

if (isset($_POST['absen'])) {
    $nip = $_SESSION['nip'];
    $keterangan = $_POST['keterangan'];
    $alasan = $_POST['alasan'];
    $waktu = date('Y-m-d H:i:s'); // Format waktu dengan detik
    $file = $_FILES['foto']['name'];
    $extensi = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $namaFile = $nip . "_" . date('Ymd_His') . "." . $extensi; // Tambahkan format waktu untuk nama file unik
    $targetDirectory  = __DIR__ . '/../../asset/upload/';
    $targetFilePath = $targetDirectory . $namaFile;

    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFilePath)) {
        $sql = "INSERT INTO absen(nip, keterangan, alasan, bukti, waktu) VALUES ($nip, '$keterangan', '$alasan', '$namaFile', '$waktu')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $_SESSION['pesan'] = "Izin anda telah disampaikan...";
            header("Location: ../dashboard_staff.php");
            exit();
        }
    } else {
        echo "Maaf, terjadi kesalahan saat mengunggah file.";
    }
}
