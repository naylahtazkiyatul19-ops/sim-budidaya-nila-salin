<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIM Budidaya Nila Salin - Desa Wanantara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Ganti ke Font Awesome 5 yang lebih stabil -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #0a0e1a;
            color: #e2e8f0;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Animated Background */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(ellipse at 20% 50%, rgba(0, 212, 255, 0.05) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 50%, rgba(139, 92, 246, 0.05) 0%, transparent 50%),
                radial-gradient(ellipse at 50% 100%, rgba(0, 212, 255, 0.03) 0%, transparent 50%);
            z-index: -1;
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            position: relative;
        }

        .hero-container {
            max-width: 1200px;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .hero-content {
            animation: fadeInUp 1s ease-out;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .badge {
            display: inline-block;
            background: rgba(0, 212, 255, 0.1);
            border: 1px solid rgba(0, 212, 255, 0.2);
            color: #00d4ff;
            padding: 8px 22px;
            border-radius: 50px;
            font-size: 15px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 24px;
        }

        .badge i {
            margin-right: 10px;
        }

        .hero-title {
            font-size: 56px;
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 20px;
        }

        .hero-title .highlight {
            background: linear-gradient(135deg, #00d4ff, #0891b2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: none;
        }

        .hero-title .highlight-glow {
            color: #00d4ff;
            text-shadow: 0 0 40px rgba(0, 212, 255, 0.15);
        }

        .hero-subtitle {
            font-size: 24px;
            color: #94a3b8;
            font-weight: 400;
            margin-bottom: 8px;
        }

        .hero-subtitle-small {
            font-size: 18px;
            color: #64748b;
            margin-bottom: 16px;
        }

        .hero-description {
            color: #94a3b8;
            font-size: 18px;
            line-height: 1.8;
            max-width: 500px;
            margin: 20px 0 30px;
        }

        .hero-description i {
            color: #00d4ff;
            margin-right: 8px;
        }

        .location {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #94a3b8;
            font-size: 16px;
            margin-bottom: 30px;
        }

        .location i {
            color: #00d4ff;
            font-size: 18px;
        }

        .btn-group {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 16px 42px;
            background: linear-gradient(135deg, #00d4ff, #0891b2);
            color: #0a0e1a;
            font-weight: 700;
            font-size: 18px;
            border: none;
            border-radius: 14px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 0 30px rgba(0, 212, 255, 0.15);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 40px rgba(0, 212, 255, 0.3);
            color: #0a0e1a;
        }

        .btn-outline {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 16px 42px;
            background: transparent;
            color: #00d4ff;
            font-weight: 600;
            font-size: 18px;
            border: 2px solid rgba(0, 212, 255, 0.3);
            border-radius: 14px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-outline:hover {
            background: rgba(0, 212, 255, 0.05);
            border-color: #00d4ff;
            transform: translateY(-3px);
            box-shadow: 0 8px 40px rgba(0, 212, 255, 0.1);
        }

        /* Right Illustration */
        .hero-illustration {
            display: flex;
            justify-content: center;
            align-items: center;
            animation: fadeInUp 1s ease-out 0.3s both;
        }

        .illustration-box {
            width: 100%;
            max-width: 450px;
            aspect-ratio: 1;
            background: radial-gradient(circle at center, rgba(0, 212, 255, 0.05) 0%, transparent 70%);
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(0, 212, 255, 0.05);
            position: relative;
        }

        .illustration-box .fish-icon {
            font-size: 160px;
            color: rgba(0, 212, 255, 0.12);
            position: relative;
            z-index: 1;
        }

        .floating-cards {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
        }

        .floating-card {
            position: absolute;
            background: rgba(17, 24, 39, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(0, 212, 255, 0.1);
            border-radius: 14px;
            padding: 14px 22px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 15px;
            color: #94a3b8;
            animation: float 6s ease-in-out infinite;
        }

        .floating-card i {
            color: #00d4ff;
            font-size: 18px;
        }

        .floating-card:nth-child(1) {
            top: 5%;
            right: -15%;
            animation-delay: 0s;
        }

        .floating-card:nth-child(2) {
            bottom: 15%;
            left: -20%;
            animation-delay: 2s;
        }

        .floating-card:nth-child(3) {
            top: 45%;
            right: -25%;
            animation-delay: 4s;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-12px); }
            100% { transform: translateY(0px); }
        }

        /* Features Section */
        .features {
            padding: 80px 20px;
            background: rgba(17, 24, 39, 0.5);
            border-top: 1px solid rgba(0, 212, 255, 0.05);
        }

        .features-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-header h2 {
            font-size: 40px;
            font-weight: 800;
            background: linear-gradient(135deg, #00d4ff, #0891b2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .section-header p {
            color: #94a3b8;
            font-size: 20px;
            margin-top: 10px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .feature-card {
            background: rgba(17, 24, 39, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(0, 212, 255, 0.05);
            border-radius: 18px;
            padding: 35px 25px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            border-color: rgba(0, 212, 255, 0.2);
            transform: translateY(-5px);
            box-shadow: 0 8px 40px rgba(0, 212, 255, 0.05);
        }

        .feature-card .icon {
            width: 70px;
            height: 70px;
            background: rgba(0, 212, 255, 0.05);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 18px;
            font-size: 32px;
            color: #00d4ff;
        }

        .feature-card h4 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #e2e8f0;
        }

        .feature-card p {
            color: #94a3b8;
            font-size: 16px;
            line-height: 1.7;
        }

        /* Footer */
        .footer {
            padding: 40px 20px;
            border-top: 1px solid rgba(0, 212, 255, 0.05);
            text-align: center;
        }

        .footer p {
            color: #475569;
            font-size: 16px;
            line-height: 1.8;
        }

        .footer .brand {
            color: #00d4ff;
            font-weight: 600;
            font-size: 18px;
        }

        .footer .brand i {
            margin-right: 8px;
        }

        .text-cyan {
            color: #00d4ff;
        }
        .text-secondary {
            color: #94a3b8 !important;
        }
        .text-muted {
            color: #475569 !important;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .hero-container {
                grid-template-columns: 1fr;
                text-align: center;
            }
            .hero-title {
                font-size: 40px;
            }
            .hero-description {
                margin-left: auto;
                margin-right: auto;
            }
            .btn-group {
                justify-content: center;
            }
            .location {
                justify-content: center;
            }
            .illustration-box {
                max-width: 320px;
            }
            .illustration-box .fish-icon {
                font-size: 120px;
            }
            .floating-card {
                display: none;
            }
            .features-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 600px) {
            .hero-title {
                font-size: 32px;
            }
            .hero-subtitle {
                font-size: 20px;
            }
            .hero-subtitle-small {
                font-size: 16px;
            }
            .hero-description {
                font-size: 16px;
            }
            .features-grid {
                grid-template-columns: 1fr;
            }
            .btn-primary, .btn-outline {
                padding: 14px 28px;
                font-size: 16px;
                width: 100%;
                justify-content: center;
            }
            .btn-group {
                flex-direction: column;
                width: 100%;
            }
            .section-header h2 {
                font-size: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="bg-animation"></div>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-container">
            <!-- Left Content -->
            <div class="hero-content">
                <div class="badge">
                    <i class="fas fa-fish"></i> Sistem Informasi Manajemen
                </div>

                <h1 class="hero-title">
                    <span class="highlight">Pengelolaan Budidaya</span><br>
                    <span class="highlight-glow">Ikan Nila Salin</span>
                </h1>

                <p class="hero-subtitle">di Desa Wanantara, Kecamatan Sindang</p>
                <p class="hero-subtitle-small">Kabupaten Indramayu, Jawa Barat</p>

                <p class="hero-description">
                    <i class="fas fa-check-circle"></i> Digitalisasi pengelolaan budidaya ikan nila salin untuk mendukung pengelolaan data budidaya dan promosi hasil panen secara langsung kepada masyarakat.
                </p>

                <div class="location">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Desa Wanantara, Kec. Sindang, Kab. Indramayu, Jawa Barat</span>
                </div>

                <div class="btn-group">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn-primary">
                            <i class="fas fa-th-large"></i> Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn-primary">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                        <a href="#features" class="btn-outline">
                            <i class="fas fa-info-circle"></i> Tentang Sistem
                        </a>
                    @endauth
                </div>
            </div>

            <!-- Right Illustration -->
            <div class="hero-illustration">
                <div class="illustration-box">
                    <i class="fas fa-fish fish-icon"></i>
                    <div class="floating-cards">
                        <div class="floating-card">
                            <i class="fas fa-database"></i> Manajemen Data
                        </div>
                        <div class="floating-card">
                            <i class="fas fa-bullhorn"></i> Promosi Panen
                        </div>
                        <div class="floating-card">
                            <i class="fas fa-chart-line"></i> Laporan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="features-container">
            <div class="section-header">
                <h2>Fitur Unggulan</h2>
                <p>Kelola budidaya ikan nila salin dengan lebih mudah dan profesional</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="icon"><i class="fas fa-users"></i></div>
                    <h4>Manajemen Pembudidaya</h4>
                    <p>Kelola data pembudidaya dan anggota Pokdakan secara terpusat.</p>
                </div>
                <div class="feature-card">
                    <div class="icon"><i class="fas fa-tint"></i></div>
                    <h4>Manajemen Kolam</h4>
                    <p>Catat data kolam, luas, lokasi, dan status budidaya.</p>
                </div>
                <div class="feature-card">
                    <div class="icon"><i class="fas fa-leaf"></i></div>
                    <h4>Manajemen Benih</h4>
                    <p>Kelola data penebaran benih dan sumber benih ikan nila salin.</p>
                </div>
                <div class="feature-card">
                    <div class="icon"><i class="fas fa-box-open"></i></div>
                    <h4>Manajemen Pakan</h4>
                    <p>Kelola stok pakan dan riwayat pemberian pakan harian.</p>
                </div>
                <div class="feature-card">
                    <div class="icon"><i class="fas fa-hand-holding-heart"></i></div>
                    <h4>Manajemen Panen</h4>
                    <p>Catat hasil panen dan kelola data penjualan ikan nila salin.</p>
                </div>
                <div class="feature-card">
                    <div class="icon"><i class="fas fa-bullhorn"></i></div>
                    <h4>Promosi Hasil Panen</h4>
                    <p>Promosikan hasil panen langsung ke pembeli tanpa distributor.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>
            <span class="brand"><i class="fas fa-fish"></i> SIM Budidaya Nila Salin</span> &copy; {{ date('Y') }}
            <br>
            <span style="color:#475569; font-size:14px;">Kuliah Kerja Mahasiswa UMC 2026 - Desa Wanantara, Indramayu</span>
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>