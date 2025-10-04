<?php
require 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelola Paket Foto</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    table, th, td {
      border: 1px solid #ccc;
      padding: 8px;
    }
    th {
      background: #f0f0f0;
    }
    img {
      max-width: 120px;
      height: auto;
    }
    .btn {
      display: inline-block;
      padding: 6px 10px;
      background: #28a745;
      color: white;
      text-decoration: none;
      border-radius: 4px;
    }
    .btn-danger {
      background: #dc3545;
    }
  </style>
</head>
<body>
  <h1>Kelola Paket Foto</h1>
  <a href="tambahPaket.php" class="btn">+ Tambah Paket</a>
  <br><br>
  <h2>Fitur Paket</h2>
  <table>
    <thead>
      <tr>
        <th>Nama Paket</th>
        <th>Harga</th>
        <th>Deskripsi</th>
        <th>Foto</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Ambil data paket dari database
      $result = $koneksi->query("SELECT * FROM paket_foto ORDER BY id DESC");
      if ($result && $result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . htmlspecialchars($row['nama_paket']) . "</td>";
              echo "<td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>";
              echo "<td>" . nl2br(htmlspecialchars($row['deskripsi'])) . "</td>";
              echo "<td><img src='paket/" . htmlspecialchars($row['foto']) . "' alt='Foto Paket'></td>";
              echo "<td>
                      <a href='hapusPaket.php?id=" . $row['id'] . "' class='btn btn-danger' onclick=\"return confirm('Yakin hapus paket ini?')\">Hapus</a>
                    </td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='5'>Belum ada paket yang ditambahkan.</td></tr>";
      }
      ?>
    </tbody>
  </table>
</body>
</html>
