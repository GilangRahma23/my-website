<?php
session_start();
include('../koneksi.php');

if (isset($_GET['bulan']) && isset($_GET['nip'])) {
    $nip = intval($_GET['nip']);
    $bulan = $_GET['bulan'];
    $bpjs = 0;
    $kehadiran = 0;

    // Ambil nilai potongan dari database
    $potongan = "SELECT * FROM potongan";
    $result = mysqli_query($conn, $potongan);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $bpjs = $data['potongan_bpjs'];
        $kehadiran = $data['potongan_kehadiran'];
    }

    // Query untuk mengambil data gaji staf berdasarkan bulan dan NIP
    $sql = "SELECT s.nip, s.nm_staf, o.id_golongan, o.gapok, e.bulan, SUM(e.total_masuk) as total_masuk 
            
            FROM staf s 
            INNER JOIN golongan o ON s.id_golongan = o.id_golongan 
            INNER JOIN (
                SELECT p.nip, MONTH(p.waktu) as bulan, COUNT(*) as total_masuk, s.nm_staf as nama 
                FROM presensi p 
                INNER JOIN staf s ON p.nip = s.nip 
                WHERE YEAR(p.waktu) = YEAR(CURRENT_DATE) 
                GROUP BY p.nip, MONTH(p.waktu)
            ) as e ON s.nip = e.nip
            WHERE s.nip = ? AND e.bulan = ?
            GROUP BY s.nip, s.nm_staf, o.id_golongan, o.gapok, e.bulan
            ORDER BY s.nip, e.bulan";

    // Persiapan statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $nip, $bulan); // Bind parameter nip dan bulan sebagai integer dan string
    $stmt->execute();

    // Ambil hasil query
    $query = $stmt->get_result();

    if ($query->num_rows > 0) {
        $row = $query->fetch_assoc();

        // Hitung total hari dalam bulan untuk pengurangan kehadiran
        $totalMinggu = hitungTotalHari($bulan, date('Y'));
        $gajiBersih = $row['gapok'] - (($row['gapok'] - $bpjs) / $totalMinggu * ($totalMinggu - $row['total_masuk'])) - $bpjs;

        // Keluarkan hasil dalam format JSON
        echo json_encode(array(
            'gajiKotor' => $row['gapok'],
            'gajiBersih' => round($gajiBersih, -3),
        ));
    } else {
        // Jika tidak ada hasil dari query, kembalikan nilai default
        echo json_encode(['gajiKotor' => 0, 'gajiBersih' => 0]);
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
}

function hitungTotalHari($bulan, $tahun)
{
    // Menghitung jumlah hari dalam bulan dan tahun yang diberikan
    $jumlah_hari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

    $total_hari = 0;

    // Iterasi setiap hari dalam bulan
    for ($i = 1; $i <= $jumlah_hari; $i++) {
        $tanggal = strtotime("$tahun-$bulan-$i");

        // Memeriksa apakah hari tersebut adalah Minggu (nilai 7 untuk Minggu dalam date('N'))
        if (date('N', $tanggal) != 7) {
            $total_hari++;
        }
    }

    return $total_hari;
}


if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nip']);
    $bulan = mysqli_real_escape_string($conn, $_POST['bulan']);
    $tgl = mysqli_real_escape_string($conn, $_POST['tgl_gaji']);
    $gajiKotor = mysqli_real_escape_string($conn, $_POST['gaji_kotor_modal']);
    $gajiBersih = mysqli_real_escape_string($conn, $_POST['gaji_bersih_modal']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // Check if all required fields are filled
    if (!empty($nama) && !empty($bulan) && !empty($tgl) && !empty($gajiKotor) && !empty($gajiBersih) && !empty($status)) {
        $sql = "INSERT INTO gaji (nip, tgl_gaji, bulan, gaji_kotor, gaji_bersih, status) VALUES ('$nama', '$tgl', '$bulan', '$gajiKotor', '$gajiBersih', '$status')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            header("Location: ../input_gaji.php");
            exit;
        } else {
            echo "gagal: " . mysqli_error($conn);
        }
    } else {
        echo "Harap isi semua field yang diperlukan.";
    }
}
