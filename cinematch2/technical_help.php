<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technical Help - TixCinema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
        body { 
            background-color: #141414; 
            color: #ccc; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .help-box {
            background-color: #1c1c1c;
            border: 1px solid #2d2d2d;
            border-top: 4px solid #E50914; /* Garis merah khas TixCinema */
            border-radius: 8px;
            padding: 30px;
        }
        .accordion-item {
            background-color: #1c1c1c;
            border: 1px solid #2d2d2d;
        }
        .accordion-button {
            background-color: #222;
            color: #fff;
        }
        .accordion-button:not(.collapsed) {
            background-color: #2b2b2b;
            color: #E50914;
            box-shadow: none;
        }
        .accordion-button::after {
            filter: invert(1); /* Mengubah panah accordion menjadi putih */
        }
        .accordion-body {
            color: #bbb;
            background-color: #181818;
        }
    </style>
</head>
<body>

    <div class="container my-5" style="max-w-width: 800px;">
        <div class="help-box text-center shadow-lg mb-5">
            <h2 class="text-white fw-bold mb-3">
                <i class="fas fa-tools text-danger me-2"></i>Technical Help & Support
            </h2>
            <p class="text-muted">Mengalami kendala dengan sistem pencocokan film atau error database? Tim teknis TixCinema siap membantu kamu.</p>
            
            <div class="mt-4">
                <a href="https://wa.me/628123456789" class="btn btn-success btn-lg px-4 py-2 fw-bold shadow-sm" target="_blank">
                    <i class="fab fa-whatsapp me-2 fs-4 align-middle"></i> Hubungi Admin via WhatsApp
                </a>
            </div>
        </div>

        <h4 class="text-white fw-bold mb-3"><i class="fas fa-question-circle text-danger me-2"></i>Pertanyaan yang Sering Diajukan (FAQ)</h4>
        <div class="accordion shadow" id="faqAccordion">
            
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                        Kenapa fitur Watchlist saya tidak tersimpan?
                    </button>
                </h2>
                <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Pastikan browser kamu mengizinkan penggunaan <strong>PHP Session</strong>. Jika data masih hilang, kamu bisa mencoba menekan tombol paksa hapus memori/clear session yang berada di halaman streaming list untuk menyegarkan sistem penampung data.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                        Bagaimana cara kerja kecocokan skor genre di TixCinema?
                    </button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Sistem kami menggunakan algoritma pencocokan berbasis PHP untuk membandingkan karakteristik genre film pilihanmu dengan database film yang tersedia, menghasilkan akurasi rekomendasi yang dipersonalisasi.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                        Muncul error "Database Connection Failed", apa solusinya?
                    </button>
                </h2>
                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Pastikan aplikasi <strong>XAMPP</strong> (Apache dan MySQL) kamu sudah di-start. Pastikan juga kamu sudah meng-import file <code>cinematch_db.sql</code> terbaru ke dalam phpMyAdmin lokal kamu.
                    </div>
                </div>
            </div>

        </div>

        <div class="text-center mt-5">
            <a href="index.php" class="btn btn-outline-danger px-4 btn-md fw-semibold">
                <i class="fas fa-arrow-left me-2"></i>Kembali ke Beranda
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>