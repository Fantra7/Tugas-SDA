<?php 
session_start();
// Pastikan ini ada di paling atas streaming_list.php
if (isset($_POST['tambah_watchlist'])) {
    if (!isset($_SESSION['watchlist'])) {
        $_SESSION['watchlist'] = [];
    }
    $judul = $_POST['id_film'];
    // Hindari duplikasi
    if (!in_array($judul, $_SESSION['watchlist'])) {
        $_SESSION['watchlist'][] = $judul;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Streaming List - TixCinema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>body { background-color: #141414; color: white; }</style>
</head>
<body>
    <div class="container my-5">
        <h2 class="text-danger fw-bold">My Streaming List</h2>
        <div class="row mt-4">
            <?php if (!empty($_SESSION['watchlist'])): ?>
                <?php foreach ($_SESSION['watchlist'] as $judul): ?>
                    <div class="col-md-3 mb-3">
                        <div class="card bg-dark text-white p-3">
                            <h5><?= $judul; ?></h5>
                            <span class="badge bg-success">Ready to Watch</span>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-secondary">Daftar tontonanmu masih kosong. Silakan klik "Watch Now" di halaman Home!</p>
            <?php endif; ?>
        </div>
        <a href="index.php" class="btn btn-outline-light mt-4">Kembali ke Home</a>
    </div>
</body>
</html>