<?php
include_once 'database.php';

// Cek status login user
$showLoginAlert = false;
if (!isset($_SESSION['user'])) {
    $showLoginAlert = true;
}

// Logika Filter Rekomendasi Pintar
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action_suka'])) {
    $filmDipilih = $_POST['film_disukai'];
    $_SESSION['rekomendasi'] = [];

    $genreDipilih = "";
    foreach ($_SESSION['daftar_film'] as $f) {
        if ($f['judul'] === $filmDipilih) {
            $genreDipilih = $f['genre'];
            break;
        }
    }

    foreach ($_SESSION['daftar_film'] as $film) {
        if ($film['genre'] === $genreDipilih && $film['judul'] !== $filmDipilih) {
            $_SESSION['rekomendasi'][] = $film;
        }
        if (count($_SESSION['rekomendasi']) >= 4) {
            break;
        }
    }
} else {
    $filmDipilih = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TixCinema Portal - Stream Smart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #141414; color: white; font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; }
        .navbar-custom { background-color: #000000; border-bottom: 2px solid #E50914; }
        
        /* FIX UKURAN POSTER: Memaksa card & gambar berbentuk portrait sempurna */
        .card-movie { 
            transition: transform 0.3s ease, box-shadow 0.3s ease; 
            border: none; 
            border-radius: 6px; 
            overflow: hidden; 
            background-color: #181818;
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        .card-movie:hover { transform: scale(1.04); box-shadow: 0 10px 20px rgba(229, 9, 20, 0.4); }
        
        /* Wrapper gambar untuk memastikan tidak ada border hitam kosong */
        .movie-img-container {
            width: 100%;
            overflow: hidden;
            position: relative;
        }
        .img-recommendation { height: 260px; }
        .img-catalog { height: 340px; }
        
        .card-movie img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important; /* Memotong gambar secara proporsional agar full */
            display: block;
        }

        .btn-danger-netflix { background-color: #E50914; border: none; font-weight: bold; }
        .btn-danger-netflix:hover { background-color: #b20710; }
        
        /* FOOTER MODERN Style */
        footer { background-color: #0c0c0c; border-top: 1px solid #222; padding: 50px 0 30px 0; font-size: 0.85rem; color: #757575; }
        footer a { color: #757575; text-decoration: none; transition: color 0.2s; }
        footer a:hover { color: #fff; }
        .footer-brand { color: #E50914; font-weight: 900; letter-spacing: 1px; font-size: 1.4rem; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom py-3">
        <div class="container">
            <a class="navbar-brand text-danger fw-bolder fs-3" href="index.php" style="letter-spacing: 1px;">TIXCINEMA</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-3">
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="#rekomendasi-section">Recommendations</a>
                </li>

<?php if (isset($_SESSION['role']) && strtolower($_SESSION['role']) === 'admin'): ?>
    <li class="nav-item">
        <a class="nav-link text-warning fw-bold" href="admin.php">
            <i class="fa-solid fa-user-shield me-1"></i> Panel Admin
        </a>
    </li>
<?php endif; ?>
</ul>
                <div class="d-flex align-items-center gap-3">
                    <?php if (isset($_SESSION['user'])): ?>
                        <span class="text-white small fw-bold"><i class="fa-solid fa-circle-user text-danger me-1.5"></i><?= ucfirst($_SESSION['user']); ?></span>
                        <a href="logout.php" class="btn btn-outline-light btn-sm fw-bold px-3">Logout</a>
                    <?php else: ?>
                        <a href="login.php" class="btn btn-danger-netflix btn-sm px-4">Sign In</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <div class="container my-5">

        <?php if ($showLoginAlert): ?>
            <div class="alert alert-danger alert-dismissible fade show text-center py-3 shadow border-start border-danger border-4" role="alert">
                <i class="fa-solid fa-circle-exclamation fs-5 me-2 align-middle"></i>
                Please <strong><a href="login.php" class="alert-link text-decoration-underline">Sign In</a></strong> first to unlock our Smart Recommendation features.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="row justify-content-center mb-5">
            <div class="col-md-8 bg-dark p-4 rounded shadow border border-secondary">
                <h4 class="mb-3 text-danger fw-bold"><i class="fa-solid fa-wand-magic-sparkles me-2"></i>Smart Recommendation</h4>
                <form method="POST" action="">
                    <input type="hidden" name="action_suka" value="1">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-8">
                            <select class="form-select bg-secondary text-white border-0 py-2.5 fw-semibold" name="film_disukai" required>
                                <option value="" disabled selected>Select a movie you like...</option>
                                <?php foreach ($_SESSION['daftar_film'] as $f): ?>
                                    <option value="<?= $f['judul']; ?>" <?= ($filmDipilih == $f['judul']) ? 'selected' : ''; ?>>
                                        <?= $f['judul']; ?> [<?= $f['genre']; ?>]
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-danger-netflix w-100 py-2.5 shadow"><i class="fa-solid fa-magnifying-glass me-2"></i>Find Matches</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php if (isset($_SESSION['user']) && !empty($_SESSION['rekomendasi'])): ?>
            <section id="rekomendasi-section" class="mb-5 bg-black p-4 rounded border border-danger shadow-lg">
                <h3 class="fw-bold text-danger mb-4"><i class="fa-solid fa-star me-2"></i>Recommended For You</h3>
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    <?php foreach ($_SESSION['rekomendasi'] as $movie): ?>
                        <div class="col">
                            <div class="card card-movie shadow-sm position-relative">
                                <span class="position-absolute top-0 end-0 m-2 badge bg-danger fw-bold shadow" style="z-index: 10; font-size: 0.8rem;">
                                    <?= isset($movie['usia']) ? $movie['usia'] : 'SU'; ?>
                                </span>
                                <div class="movie-img-container img-recommendation">
                                    <img src="<?= $movie['poster']; ?>" alt="poster">
                                </div>
                                <div class="card-body p-3">
                                    <span class="text-danger small fw-bold text-uppercase d-block mb-1" style="font-size: 0.75rem;"><?= $movie['genre']; ?></span>
                                    <h6 class="text-white fw-bold m-0 text-truncate" style="font-size: 1.05rem;"><?= $movie['judul']; ?></h6>
                                    <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top border-secondary">
                                        <span class="text-secondary small">Year: <?= $movie['tahun']; ?></span>
                                        <span class="text-warning fw-bold small"><i class="fa-solid fa-star me-1"></i><?= $movie['rating']; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>

        <section class="my-4">
            <h3 class="fw-bold text-white mb-4"><i class="fa-solid fa-film text-danger me-2"></i>Explore Movies</h3>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <?php foreach ($_SESSION['daftar_film'] as $movie): ?>
                    <div class="col">
                        <div class="card card-movie shadow-sm position-relative">
                            <span class="position-absolute top-0 end-0 m-2 badge bg-danger fw-bold shadow" style="z-index: 10; font-size: 0.8rem; padding: 5px 8px;">
                                <?= isset($movie['usia']) ? $movie['usia'] : 'SU'; ?>
                            </span>
                            <div class="movie-img-container img-catalog">
                                <img src="<?= $movie['poster']; ?>" alt="poster">
                            </div>
                            <div class="card-body p-3">
                                <span class="text-danger small fw-bold text-uppercase d-block mb-2" style="font-size: 0.8rem; letter-spacing: 0.5px;">
                                    <?= $movie['genre']; ?>
                                </span>
                                <h6 class="text-white fw-bold m-0 text-truncate" style="font-size: 1.05rem;">
                                    <?= $movie['judul']; ?>
                                </h6>
                                <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top border-secondary">
                                    <span class="text-light" style="font-size: 0.85rem;">Year: <?= $movie['tahun']; ?></span>
                                    <span class="text-warning fw-bold" style="font-size: 0.9rem;">
                                        <i class="fa-solid fa-star me-1"></i><?= $movie['rating']; ?>
                                    </span>
                                </div>
                                <form method="POST" action="streaming_list.php">
                                    <input type="hidden" name="id_film" value="<?= $movie['judul']; ?>">
                                    <button type="submit" name="tambah_watchlist" class="btn btn-danger-netflix btn-sm w-100 fw-bold mt-3 py-1.5">
                                        <i class="fa-solid fa-play me-1.5 small"></i>Watch Now
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

    </div>

    <footer>
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-4 mb-3 mb-md-0">
                    <span class="footer-brand">TIXCINEMA</span>
                    <p class="mt-2 text-secondary small" style="max-width: 300px;">
                        A global movie match platform built for movie lovers. Discover your taste, find similarities, and track your watchlists seamlessly.
                    </p>
                </div>
                <div class="col-6 col-md-3">
                    <h6 class="text-white fw-bold small mb-3">NAVIGATION</h6>
                    <ul class="list-unstyled d-flex flex-column gap-2 small">
                        <li><a href="#">Home Base</a></li>
                        <li><a href="#">Smart Search</a></li>
                        <li><a href="#">Streaming List</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3">
                    <h6 class="text-white fw-bold small mb-3">HELP & LEGAL</h6>
                        <ul class="list-unstyled d-flex flex-column gap-2 small">
                            <li><a href="privacy_policy.php">Privacy Policy</a></li>
                            <li><a href="terms_of_use.php">Terms of Use</a></li>
                            <li><a href="technical_help.php">Technical Help</a></li>
                        </ul>
                </div>
                <div class="col-md-2">
                    <h6 class="text-white fw-bold small mb-3">CONNECT</h6>
                    <div class="d-flex gap-3 fs-5">
                        <a href="https://wa.me/628123456789"><i class="fa-brands fa-whatsapp text-success"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-github"></i></a>
                    </div>
                </div>
            </div>
            <hr class="border-secondary opacity-25 my-4">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center gap-2 small">
                <span>&copy; 2026 CineMatch Engine Pro. All rights reserved.</span>
                <span class="text-secondary">System Server: <strong class="text-success"><i class="fa-solid fa-circle-check me-1"></i>Operational</strong></span>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>