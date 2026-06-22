<?php
// Cek session tanpa memicu notice
if (session_status() === PHP_SESSION_NONE) { session_start(); }
include_once 'database.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') { header("Location: index.php"); exit(); }

// Ambil data berdasarkan judul
$data = null;
if (isset($_GET['judul'])) {
    $judul_lama = mysqli_real_escape_string($conn, urldecode($_GET['judul']));
    $query = "SELECT * FROM daftar_film WHERE judul = '$judul_lama'";
    $data = mysqli_fetch_assoc(mysqli_query($conn, $query));
}

// Proses Update
if (isset($_POST['update_film'])) {
    $judul_lama = mysqli_real_escape_string($conn, $_POST['judul_lama']);
    $judul_baru = mysqli_real_escape_string($conn, $_POST['judul']);
    $genre = mysqli_real_escape_string($conn, $_POST['genre']);
    $tahun = intval($_POST['tahun']);
    $rating = floatval($_POST['rating']);
    $usia = mysqli_real_escape_string($conn, $_POST['usia']); // Tangkap data usia baru
    $poster = mysqli_real_escape_string($conn, $_POST['poster']);

    // Update kolom usia dimasukkan ke dalam query SQL
    $sql = "UPDATE daftar_film SET judul='$judul_baru', genre='$genre', tahun=$tahun, rating=$rating, usia='$usia', poster='$poster' WHERE judul='$judul_lama'";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: admin.php?status=updated");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Film - TixCinema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #141414; color: white; }
        .admin-card { background-color: #1c1c1c; border: 1px solid #2d2d2d; border-radius: 8px; }
    </style>
</head>
<body>
<div class="container my-5">
    <div class="admin-card p-4 col-md-6 mx-auto">
        <h4 class="text-warning mb-4">Edit Film: <?= htmlspecialchars($data['judul']) ?></h4>
        <form method="POST">
            <input type="hidden" name="judul_lama" value="<?= htmlspecialchars($data['judul']); ?>">
            <div class="mb-3">
                <label class="mb-1">Judul Film</label>
                <input type="text" name="judul" class="form-control bg-dark text-white border-secondary" value="<?= htmlspecialchars($data['judul']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="mb-1">Genre</label>
                <input type="text" name="genre" class="form-control bg-dark text-white border-secondary" value="<?= htmlspecialchars($data['genre']); ?>">
            </div>
            
            <div class="row mb-3 g-2">
                <div class="col-md-4">
                    <label class="mb-1">Tahun</label>
                    <input type="number" name="tahun" class="form-control bg-dark text-white border-secondary" value="<?= htmlspecialchars($data['tahun']); ?>">
                </div>
                <div class="col-md-4">
                    <label class="mb-1">Rating</label>
                    <input type="number" step="0.1" name="rating" class="form-control bg-dark text-white border-secondary" value="<?= htmlspecialchars($data['rating']); ?>">
                </div>
                <div class="col-md-4">
                    <label class="mb-1">Rating Usia</label>
                    <select name="usia" class="form-select bg-dark text-white border-secondary" required>
                        <option value="SU" <?= $data['usia'] == 'SU' ? 'selected' : ''; ?>>SU (Semua Umur)</option>
                        <option value="13+" <?= $data['usia'] == '13+' ? 'selected' : ''; ?>>13+ (Remaja)</option>
                        <option value="17+" <?= $data['usia'] == '17+' ? 'selected' : ''; ?>>17+ (Dewasa)</option>
                        <option value="R" <?= $data['usia'] == 'R' ? 'selected' : ''; ?>>R (Restricted)</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label class="mb-1">Link Poster</label>
                <input type="url" name="poster" class="form-control bg-dark text-white border-secondary" value="<?= htmlspecialchars($data['poster']); ?>">
            </div>
            <button type="submit" name="update_film" class="btn btn-danger w-100">Simpan Perubahan</button>
            <a href="admin.php" class="btn btn-secondary w-100 mt-2">Batal</a>
        </form>
    </div>
</div>
</body>
</html>