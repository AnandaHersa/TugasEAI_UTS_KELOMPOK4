<?php
header('Content-Type: application/json');

// Cek request method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["status" => "error", "message" => "Metode harus POST"]);
    exit;
}

// Tangkap data dari Form
$nama = $_POST['nama'] ?? '';
$gejala = $_POST['gejala'] ?? '';
$diagnosa = $_POST['diagnosa'] ?? '';
$resep = $_POST['resep'] ?? '';

// Validasi data kosong
if (empty($nama) || empty($gejala) || empty($diagnosa) || empty($resep)) {
    echo json_encode(["status" => "error", "message" => "Semua field harus diisi!"]);
    exit;
}

// Simulasi penyimpanan data JSON
$dataBaru = [
    "nama" => $nama,
    "gejala" => $gejala,
    "diagnosa" => $diagnosa,
    "resep" => $resep
];

// Lokasi file data JSON
$file = 'data.json';

// Ambil data lama
if (file_exists($file)) {
    $dataLama = json_decode(file_get_contents($file), true);
} else {
    $dataLama = [];
}

// Tambahkan data baru
$dataLama[] = $dataBaru;

// Simpan kembali ke file
file_put_contents($file, json_encode($dataLama, JSON_PRETTY_PRINT));

// Balikkan respon sukses
echo json_encode(["status" => "success", "message" => "✅ Data berhasil disimpan!"]);
?>
