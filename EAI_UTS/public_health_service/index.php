<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Laporan Kesehatan</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f5f7fa;
      margin: 0;
      padding: 40px;
    }

    h1 {
      text-align: center;
      color: #0077b6;
      margin-bottom: 40px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: #ffffff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    }

    th, td {
      padding: 16px;
      text-align: left;
      border-bottom: 1px solid #eee;
    }

    th {
      background-color: #0077b6;
      color: #ffffff;
      font-weight: 600;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    .empty {
      text-align: center;
      color: #777;
      margin-top: 20px;
    }
  </style>
</head>
<body>

<h1>Data Laporan Kesehatan</h1>

<?php
// Path file JSON-nya harus benar
$file_path = '../telemedicine_service/data.json'; 

if (file_exists($file_path)) {
    $data = json_decode(file_get_contents($file_path), true);

    if (!empty($data)) {
        echo "<table>";
        echo "<thead>
                <tr>
                  <th>Nama Pasien</th>
                  <th>Gejala</th>
                  <th>Diagnosa</th>
                  <th>Resep</th>
                </tr>
              </thead>
              <tbody>";

        foreach ($data as $laporan) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($laporan['nama']) . "</td>";
            echo "<td>" . htmlspecialchars($laporan['gejala']) . "</td>";
            echo "<td>" . htmlspecialchars($laporan['diagnosa']) . "</td>";
            echo "<td>" . htmlspecialchars($laporan['resep']) . "</td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "<p class='empty'>Belum ada laporan kesehatan yang masuk.</p>";
    }
} else {
    echo "<p class='empty'>File data.json belum tersedia. Pastikan sudah mengisi form.</p>";
}
?>

</body>
</html>
