<?php
session_start();
// Mengambil judul dari URL
$judul = isset($_GET['judul']) ? htmlspecialchars($_GET['judul']) : "Film Tidak Ditemukan";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Menonton: <?= $judul ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #000; color: white; }
        .player-container { max-width: 900px; margin: 50px auto; }
        .btn-netflix { background-color: #E50914; color: white; }
    </style>
</head>
<body>
    <div class="container player-container">
        <h2 class="fw-bold mb-3">Sedang Memutar: <span class="text-danger"><?= $judul ?></span></h2>
        
        <div class="ratio ratio-16x9 shadow-lg rounded">
            <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Player" allowfullscreen></iframe>
        </div>

        <div class="mt-4">
            <a href="streaming_list.php" class="btn btn-secondary px-4">Kembali ke Daftar</a>
        </div>
    </div>
</body>
</html>