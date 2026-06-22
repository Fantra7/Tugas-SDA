<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy - TixCinema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
        body { 
            background-color: #141414; 
            color: #ccc; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .legal-box {
            background-color: #1c1c1c;
            border: 1px solid #2d2d2d;
            border-top: 4px solid #E50914; /* Aksen merah khas TixCinema */
            border-radius: 8px;
            padding: 40px;
        }
        .policy-section {
            border-bottom: 1px solid #2d2d2d;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
        .policy-section:last-child {
            border-bottom: none;
            padding-bottom: 0;
            margin-bottom: 0;
        }
        .policy-title {
            color: #fff;
            font-weight: 600;
            font-size: 1.15rem;
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>

    <div class="container my-5" style="max-width: 850px;">
        <div class="legal-box shadow-lg">
            
            <div class="text-center mb-5">
                <h2 class="text-white fw-bold mb-2">
                    <i class="fas fa-user-shield text-danger me-2"></i>Kebijakan Privasi
                </h2>
                <p class="text-muted small">Terakhir Diperbarui: 28 Mei 2026</p>
                <hr class="border-secondary mt-4">
            </div>

            <div class="legal-content">
                
                <div class="policy-section">
                    <h5 class="policy-title mb-3">
                        <i class="fas fa-database text-danger me-2"></i>1. Informasi yang Kami Kumpulkan
                    </h5>
                    <p class="small text-secondary" style="line-height: 1.7;">
                        TixCinema hanya mengumpulkan data yang diperlukan untuk menjalankan fitur simulasi web, meliputi:
                    </p>
                    <ul class="small text-secondary ps-3" style="line-height: 1.7;">
                        <li>Data akun dasar saat Anda melakukan registrasi/login (seperti Username dan Password).</li>
                        <li>Data preferensi film yang Anda masukkan ke dalam daftar tontonan (<em>Watchlist Session</em>).</li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h5 class="policy-title mb-3">
                        <i class="fas fa-eye text-danger me-2"></i>2. Penggunaan Informasi Anda
                    </h5>
                    <p class="small text-secondary" style="line-height: 1.7;">
                        Semua data yang tersimpan di database lokal <code>cinematch_db</code> digunakan murni untuk kebutuhan performa fitur aplikasi, seperti:
                    </p>
                    <ul class="small text-secondary ps-3" style="line-height: 1.7;">
                        <li>Menampilkan daftar film secara dinamis berdasarkan preferensi genre.</li>
                        <li>Mengamankan sesi login Anda agar tidak mudah diakses oleh pengguna lain.</li>
                        <li>Meningkatkan akurasi algoritma kecocokan skor pada sistem engine kami.</li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h5 class="policy-title mb-3">
                        <i class="fas fa-lock text-danger me-2"></i>3. Perlindungan & Keamanan Data
                    </h5>
                    <p class="small text-secondary" style="line-height: 1.7;">
                        Kami berkomitmen untuk menjaga keamanan informasi Anda. Data password dienkripsi secara aman di dalam database sistem. Kami <strong>tidak akan pernah</strong> menjual, menyewakan, atau membagikan data personal Anda kepada pihak ketiga mana pun tanpa persetujuan eksplisit dari Anda.
                    </p>
                </div>

                <div class="policy-section">
                    <h5 class="policy-title mb-3">
                        <i class="fas fa-cookie-bite text-danger me-2"></i>4. Penyimpanan Kuki & Sesi (Session)
                    </h5>
                    <p class="small text-secondary" style="line-height: 1.7;">
                        Platform ini menggunakan PHP Session untuk mengingat status login dan daftar <em>Watchlist</em> Anda saat menjelajahi halaman web. Anda memiliki kendali penuh untuk menghapus data sesi ini kapan saja melalui fitur hapus memori yang tersedia di halaman daftar *streaming*.
                    </p>
                </div>

            </div>

            <div class="text-center mt-5 pt-3 border-top border-secondary">
                <a href="index.php" class="btn btn-outline-danger px-4 fw-semibold">
                    <i class="fas fa-arrow-left me-2"></i>Kembali ke Beranda
                </a>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>