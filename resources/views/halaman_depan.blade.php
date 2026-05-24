<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Clean Laundry - Bersih, Wangi, Kilat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
        
        html {
            scroll-behavior: smooth;
        }
        body { 
            background-color: #f8fafc; 
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #334155;
            overflow-x: hidden;
        }

        /* BACKGROUND DECORATION */
        .bg-decoration {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 650px;
            background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
            z-index: -1;
            border-bottom-left-radius: 60px;
            border-bottom-right-radius: 60px;
        }

        /* AREA LINK KASIR */
        .btn-kasir {
            color: #64748b;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s;
        }
        .btn-kasir:hover {
            color: #2563eb;
        }

        /* HERO AREA */
        .hero-section {
            padding-top: 60px;
            padding-bottom: 100px;
        }
        .hero-title {
            font-weight: 800;
            color: #0f172a;
            line-height: 1.2;
        }
        .hero-title span {
            color: #2563eb;
        }

        /* SEARCH CARD PREMIUM */
        .search-card {
            border: none;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.06);
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.7);
        }
        
        .input-nota {
            border: 2px solid #e2e8f0;
            border-radius: 14px;
            padding: 14px 20px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s;
            background-color: #f8fafc;
        }
        .input-nota:focus {
            border-color: #3b82f6;
            background-color: #fff;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        .btn-search {
            border-radius: 14px;
            padding: 14px 28px;
            font-weight: 700;
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            border: none;
            transition: all 0.3s ease;
        }
        .btn-search:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 99, 219, 0.3);
        }

        /* FEATURE CARD */
        .feature-box {
            background-color: #ffffff;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
            border: 1px solid #f1f5f9;
            transition: all 0.3s;
        }
        .feature-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.05);
        }
        .feature-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-bottom: 15px;
        }

        /* SECTION UTILITY */
        .section-padding {
            padding: 80px 0;
        }
        .section-title {
            font-weight: 800;
            color: #0f172a;
            position: relative;
            margin-bottom: 15px;
        }
        
        /* PRICE TAG UI */
        .price-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s;
        }
        .price-card:hover {
            border-color: #3b82f6;
            box-shadow: 0 15px 30px rgba(59, 130, 246, 0.08);
            transform: translateY(-5px);
        }

        /* NAVIGATION TAB TERMS & CONDITIONS */
        .nav-terms .nav-link {
            color: #64748b;
            background-color: #f1f5f9;
            border: 1px solid #e2e8f0;
            border-radius: 50px;
            padding: 12px 28px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        .nav-terms .nav-link.active {
            color: #ffffff !important;
            background: #0ea5e9 !important;
            border-color: #0ea5e9 !important;
            box-shadow: 0 8px 20px rgba(14, 165, 233, 0.25);
        }
        .terms-list li {
            position: relative;
            padding-left: 28px;
            margin-bottom: 14px;
            font-size: 15px;
            color: #475569;
            line-height: 1.6;
        }
        .terms-list li::before {
            content: "\f058";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            position: absolute;
            left: 0;
            top: 2px;
            color: #0ea5e9;
        }

        /* SECTION ORDER & PICKUP (STYLE TOSKA) */
        .order-section {
            background: linear-gradient(rgba(14, 165, 233, 0.85), rgba(14, 165, 233, 0.85)), url('https://images.unsplash.com/photo-1545173168-9f1947e80175?q=80&w=1000') no-repeat center center;
            background-size: cover;
            color: #ffffff;
            padding: 80px 0;
        }
        .order-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 35px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            border: none;
        }
        .order-card .form-control, .order-card .form-select {
            border: 1px solid #cbd5e1;
            padding: 12px 16px;
            border-radius: 8px;
            color: #334155;
        }
        .order-card .form-control:focus, .order-card .form-select:focus {
            border-color: #0ea5e9;
            box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.15);
        }
        .btn-pickup {
            background-color: #0ea5e9;
            color: white;
            border: none;
            padding: 14px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 16px;
            transition: all 0.3s;
        }
        .btn-pickup:hover {
            background-color: #0284c7;
            color: white;
            box-shadow: 0 5px 15px rgba(14, 165, 233, 0.4);
        }

        /* FLOATING WHATSAPP BUTTON */
        .whatsapp-floating {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #25d366;
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            z-index: 9999;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        .whatsapp-floating:hover {
            transform: scale(1.1);
            color: white;
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.4);
        }

        /* TESTIMONIAL CARD UI */
        .review-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 25px;
            transition: all 0.3s ease;
        }
        .review-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(15, 23, 42, 0.04);
            border-color: #3b82f6;
        }
        .avatar-review {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background-color: #eff6ff;
            color: #2563eb;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* MAPS CONTAINER */
        .map-responsive {
            overflow: hidden;
            border-radius: 24px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.05);
            border: 1px solid #e2e8f0;
        }

        /* PREMIUM UPGRADED FOOTER UI (REFERENSI GAMBAR CHINGU) */
        .main-footer {
            background-color: #e9ecef; /* Abu-abu terang sesuai gambar */
            padding: 60px 0 40px 0;
            color: #475569;
        }
        .footer-brand {
            font-size: 26px;
            font-weight: 800;
            color: #0ea5e9; /* Toska premium */
            text-decoration: none;
        }
        .footer-sub-brand {
            font-size: 18px;
            font-weight: 700;
            color: #475569;
            font-style: italic;
            margin-top: -5px;
        }
        .footer-title {
            font-size: 16px;
            font-weight: 700;
            color: #0ea5e9;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .footer-links li {
            margin-bottom: 12px;
        }
        .footer-links a {
            color: #475569;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .footer-links a:hover {
            color: #0ea5e9;
            padding-left: 5px;
        }
        .footer-contact-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
            font-weight: 600;
            color: #475569;
        }
        .footer-contact-item i {
            color: #0ea5e9;
            font-size: 18px;
        }
        .social-container {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }
        .social-icon-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #0ea5e9; /* Warna bulat toska */
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        .social-icon-btn:hover {
            transform: translateY(-3px);
            background-color: #0284c7;
            color: white;
            box-shadow: 0 5px 12px rgba(14, 165, 233, 0.3);
        }
        .copyright-bar {
            background-color: #0a8496; /* Gelap toska sesuai bagian bawah gambar */
            color: white;
            padding: 15px 0;
            font-size: 14px;
            font-weight: 500;
        }
    </style>
</head>
<body>

    <a href="https://wa.me/6281234567890?text=Halo%20All%20Clean%20Laundry,%20saya%20ingin%20tanya%20mengenai%20layanan%20laundry." class="whatsapp-floating" target="_blank" title="Hubungi Kami via WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <div class="bg-decoration"></div>

    <nav class="navbar navbar-expand-lg pt-4 bg-transparent" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <a class="navbar-brand text-dark fs-4 fw-bold" href="/">
                <i class="fas fa-soap text-primary me-2"></i>ALL CLEAN LAUNDRY
            </a>
            <div class="d-flex gap-3 align-items-center">
                <a href="#tentang" class="btn-kasir small d-none d-sm-inline">Tentang Kami</a>
                <a href="#harga" class="btn-kasir small d-none d-sm-inline">Daftar Harga</a>
                <a href="#order" class="btn-kasir small d-none d-sm-inline">Pesan Pickup</a>
                <a href="#syarat-ketentuan" class="btn-kasir small d-none d-sm-inline">Syarat & Ketentuan</a>
                <a href="#ulasan" class="btn-kasir small d-none d-sm-inline">Ulasan</a>
                <a href="/login" class="btn btn-light rounded-pill px-4 shadow-sm fw-semibold btn-kasir border">
                    <i class="fas fa-lock me-1 small"></i> Area Kasir
                </a>
            </div>
        </div>
    </nav>

    <section class="container hero-section">
        <div class="row justify-content-center align-items-center g-5">
            <div class="col-lg-6 text-center text-lg-start" data-aos="fade-right" data-aos-duration="1200">
                <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2 fw-bold mb-3">
                    <i class="fas fa-star me-1 text-warning"></i> LAUNDRY PREMIUM & KILAT
                </span>
                <h1 class="hero-title display-4 mb-3">
                    Cek Status Cucian Anda <br class="d-none d-md-block">Secara <span>Real-Time</span>
                </h1>
                <p class="text-muted fs-5 mb-5">
                    Gak perlu repot bolak-balik ke outlet. Cukup masukkan nomor nota Anda di bawah untuk melihat perkembangan pakaian Anda.
                </p>

                <div class="card search-card p-4">
                    <form action="/status" method="GET" class="m-0">
                        <div class="d-flex flex-column flex-sm-row gap-3">
                            <div class="flex-grow-1 position-relative">
                                <input type="text" name="nota" class="form-control input-nota ps-4" placeholder="Masukkan Nomor Nota (Contoh: LND-3829)" required autocomplete="off">
                            </div>
                            <button type="submit" class="btn btn-primary btn-search shadow-sm text-nowrap">
                                <i class="fas fa-search me-1"></i> Periksa Status
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-5 offset-lg-1" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="feature-box d-flex align-items-start gap-3">
                            <div class="feature-icon bg-primary-subtle text-primary">
                                <i class="fas fa-bolt"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">Super Kilat</h6>
                                <p class="text-muted small mb-0">Cucian selesai tepat waktu, tersedia juga layanan ekspres 6 jam langsung rapi.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="feature-box d-flex align-items-start gap-3">
                            <div class="feature-icon bg-success-subtle text-success">
                                <i class="fas fa-magic"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">Pewangi Premium Gred A</h6>
                                <p class="text-muted small mb-0">Menggunakan parfum laundry khusus import yang wanginya awet tahan berhari-hari.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="feature-box d-flex align-items-start gap-3">
                            <div class="feature-icon bg-warning-subtle text-warning">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">Garansi Higienis</h6>
                                <p class="text-muted small mb-0">1 mesin cuci hanya khusus untuk 1 pelanggan, tidak dicampur dengan pakaian orang lain.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="tentang" class="bg-white section-padding border-top border-bottom">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1000">
                    <span class="text-primary fw-bold small text-uppercase tracking-wider">Tentang Kami</span>
                    <h2 class="section-title display-6 mt-1">Solusi Cuci Bersih Tanpa Ribet</h2>
                    <p class="text-muted mb-4 lead">All Clean Laundry hadir untuk memberikan efisiensi waktu bagi Anda yang sibuk. Dengan teknologi modern dan detergen ramah lingkungan, kami memastikan setiap helai pakaian Anda kembali bersih cemerlang, higienis, dan wangi segar tahan lama.</p>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="border-start border-primary border-4 ps-3">
                                <h4 class="fw-bold m-0 text-dark">100%</h4>
                                <small class="text-muted">Garansi Kepuasan</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="border-start border-success border-4 ps-3">
                                <h4 class="fw-bold m-0 text-dark">6 Jam</h4>
                                <small class="text-muted">Layanan Tercepat</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200">
                    <div class="p-4 bg-light rounded-4 border border-dashed d-flex align-items-center justify-content-center" style="min-height: 250px;">
                        <div class="text-center">
                            <i class="fas fa-store-alt text-primary fa-4x mb-3 opacity-50"></i>
                            <h5 class="fw-bold text-dark">Outlet Operasional</h5>
                            <p class="text-muted small m-0">Buka Setiap Hari: 07.00 - 21.00 WIB</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="harga" class="section-padding">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up" data-aos-duration="1000">
                <span class="text-primary fw-bold small text-uppercase tracking-wider">Daftar Layanan</span>
                <h2 class="section-title display-6 mt-1">Tarif Laundry Terjangkau</h2>
                <p class="text-muted small mx-auto" style="max-width: 500px;">Harga transparan, hasil pengerjaan maksimal, pas di kantong mahasiswa maupun keluarga.</p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                    <div class="price-card">
                        <div class="text-primary mb-3"><i class="fas fa-tshirt fa-2x"></i></div>
                        <h5 class="fw-bold text-dark">Cuci Lipat Reguler</h5>
                        <p class="text-muted small mb-4">Estimasi selesai 2 hari kerja</p>
                        <h3 class="fw-bold text-success mb-0">Rp 7.000<span class="fs-6 text-muted fw-normal"> / Kg</span></h3>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                    <div class="price-card" style="border-color: #3b82f6; background: linear-gradient(180deg, #ffffff 0%, #f0fdf4 100%);">
                        <div class="text-success mb-3"><i class="fas fa-shipping-fast fa-2x"></i></div>
                        <h5 class="fw-bold text-dark">Cuci Setrika Kilat</h5>
                        <p class="text-muted small mb-4">Estimasi selesai 24 jam</p>
                        <h3 class="fw-bold text-success mb-0">Rp 12.000<span class="fs-6 text-muted fw-normal"> / Kg</span></h3>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                    <div class="price-card">
                        <div class="text-warning mb-3"><i class="fas fa-bed fa-2x"></i></div>
                        <h5 class="fw-bold text-dark">Cuci Bed Cover</h5>
                        <p class="text-muted small mb-4">Estimasi selesai 2-3 hari</p>
                        <h3 class="fw-bold text-success mb-0">Rp 35.000<span class="fs-6 text-muted fw-normal"> / Pcs</span></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="order" class="order-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-5 text-center text-lg-start" data-aos="fade-right" data-aos-duration="1000">
                    <h2 class="fw-bold display-5 mb-3 text-white">Cucian di rumah sudah numpuk?</h2>
                    <p class="text-white-50 fs-5 mb-4">Jangan ragu untuk menghubungi kami. Komunikasikan kebutuhan laundry Anda, kurir kami siap menjemput pakaian kotor Anda ke rumah!</p>
                    <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-outline-light rounded-pill px-4 py-2 fw-semibold">
                        <i class="fab fa-whatsapp me-2"></i>Hubungi Kami via Chat
                    </a>
                </div>
                <div class="col-lg-7" data-aos="zoom-in-up" data-aos-duration="1200">
                    <div class="card order-card text-dark">
                        <h4 class="fw-bold text-center mb-4 text-dark"><i class="fas fa-truck-pickup text-info me-2"></i>FORM REQUEST PICKUP NOW</h4>
                        
                        <form action="https://wa.me/6281234567890" method="GET" target="_blank">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold text-secondary">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Anda" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold text-secondary">No. WhatsApp</label>
                                    <input type="tel" name="phone" class="form-control" placeholder="Contoh: 081234567xx" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-bold text-secondary">Alamat Penjemputan</label>
                                    <input type="text" name="alamat" class="form-control" placeholder="Tulis alamat rumah lengkap" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label small fw-bold text-secondary">Pilih Layanan</label>
                                    <select name="layanan" class="form-select" required>
                                        <option value="Daily Kiloan">Daily Kiloan</option>
                                        <option value="Cuci Setrika Kilat">Cuci Setrika Kilat</option>
                                        <option value="Special Satuan / Bedcover">Special Satuan / Bedcover</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label small fw-bold text-secondary">Tanggal Jemput</label>
                                    <input type="date" name="tanggal" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label small fw-bold text-secondary">Jam Jemput</label>
                                    <input type="time" name="jam" class="form-control" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-bold text-secondary">Pesan / Catatan Khusus</label>
                                    <textarea name="pesan" class="form-control" rows="3" placeholder="Contoh: Baju putih mohon dipisah..."></textarea>
                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-pickup w-100 shadow-sm text-uppercase">
                                        Pickup Now <i class="fas fa-truck ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="syarat-ketentuan" class="section-padding border-top bg-light">
        <div class="container" data-aos="fade-up" data-aos-duration="1000">
            <div class="text-center mb-5">
                <span class="text-primary fw-bold small text-uppercase tracking-wider">Informasi Layanan</span>
                <h2 class="section-title display-6 mt-1">Syarat &amp; Ketentuan</h2>
                <p class="text-muted small mx-auto" style="max-width: 500px;">Harap dibaca demi kenyamanan dan keamanan bersama dalam bertransaksi.</p>
            </div>

            <ul class="nav nav-terms justify-content-center gap-3 mb-5" id="termsTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="order-tab" data-bs-toggle="tab" data-bs-target="#order-panel" type="button" role="tab" aria-controls="order-panel" aria-selected="true">
                        <i class="fas fa-file-invoice me-2"></i>Syarat &amp; Ketentuan : Order
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="kiloan-tab" data-bs-toggle="tab" data-bs-target="#kiloan-panel" type="button" role="tab" aria-controls="kiloan-panel" aria-selected="false">
                        <i class="fas fa-weight-hanging me-2"></i>Syarat &amp; Ketentuan : Laundry Kiloan
                    </button>
                </li>
            </ul>

            <div class="tab-content row justify-content-center" id="termsTabContent">
                <div class="tab-pane fade show active col-lg-9" id="order-panel" role="tabpanel" aria-labelledby="order-tab">
                    <div class="bg-white p-4 p-md-5 rounded-4 border shadow-sm">
                        <ul class="list-unstyled terms-list m-0">
                            <li>Pelayanan dan transaksi dilakukan berdasarkan sistem antrean reguler dan cucian akan diproses apabila kasir sudah menerbitkan nota pesanan resmi.</li>
                            <li>Laundry akan dikerjakan sesuai paket yang dipilih (Reguler / Kilat). Untuk pemesanan layanan express di atas pukul 13.00 WIB, pengerjaan berpotensi selesai pada esok hari.</li>
                            <li>Barang atau pakaian yang tidak diambil setelah 1 minggu semenjak status pengerjaan dinyatakan "Selesai", di luar tanggung jawab manajemen workshop.</li>
                            <li>Pembatalan transaksi order hanya bisa diajukan jika pakaian belum masuk ke dalam proses mesin cuci atau tahap penanganan awal oleh operator laundry.</li>
                        </ul>
                    </div>
                </div>
                
                <div class="tab-pane fade col-lg-9" id="kiloan-panel" role="tabpanel" aria-labelledby="kiloan-tab">
                    <div class="bg-white p-4 p-md-5 rounded-4 border shadow-sm">
                        <ul class="list-unstyled terms-list m-0">
                            <li>Minimal berat untuk cucian paket kiloan adalah 3 Kg per nota transaksi. Berat cucian di bawah batas tersebut akan dihitung otomatis sebagai batas minimum.</li>
                            <li>Garansi Higienis: Kami menjamin cucian pelanggan <strong>TIDAK DICAMPUR</strong> alias 1 mesin cuci hanya didedikasikan khusus untuk 1 customer saja.</li>
                            <li>Kerusakan pakaian akibat kondisi awal bahan barang yang rapuh (sobek bawaan, kancing longgar, atau kualitas kain lapuk) bukan merupakan tanggung jawab pihak All Clean.</li>
                            <li>Jika terjadi selisih jumlah pakaian, komplain wajib disertakan bukti nota fisik maksimal dalam waktu 1x24 jam setelah proses drop-off atau pengambilan selesai dilakukan.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="ulasan" class="bg-white section-padding border-top border-bottom">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up" data-aos-duration="1000">
                <span class="text-primary fw-bold small text-uppercase tracking-wider">Testimoni</span>
                <h2 class="section-title display-6 mt-1">Apa Kata Mereka?</h2>
                <p class="text-muted small mx-auto" style="max-width: 500px;">Ulasan jujur langsung dari pelanggan setia All Clean Laundry.</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                    <div class="review-card">
                        <div class="text-warning mb-3 small">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="text-secondary small italic mb-4">"Nyetrikanya rapi banget gila, terus baunya beneran awet seminggu di lemari. Fitur live tracking resinya ngebantu banget jadi gak usah nanya-nanya via WA lagi."</p>
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar-review">R</div>
                            <div>
                                <h6 class="fw-bold text-dark small m-0">Rian Hidayat</h6>
                                <small class="text-muted" style="font-size: 11px;">Pelanggan Reguler</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                    <div class="review-card">
                        <div class="text-warning mb-3 small">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="text-secondary small italic mb-4">"Terbantu banget sama paket kilatnya! Kebaya buat wisuda besoknya selesai dalam 6 jam aja dan beneran bersih higienis gak dicampur baju orang lain."</p>
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar-review" style="background-color: #f0fdf4; color: #16a34a;">A</div>
                            <div>
                                <h6 class="fw-bold text-dark small m-0">Amalia Putri</h6>
                                <small class="text-muted" style="font-size: 11px;">Member Setia</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                    <div class="review-card">
                        <div class="text-warning mb-3 small">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                        </div>
                        <p class="text-secondary small italic mb-4">"Harganya bersahabat buat kantong mahasiswa, dapet diskon member 10% pula kalau sering cuci di sini. Tempatnya bersih dan pelayanannya ramah."</p>
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar-review" style="background-color: #fef3c7; color: #d97706;">B</div>
                            <div>
                                <h6 class="fw-bold text-dark small m-0">Bagas Adi</h6>
                                <small class="text-muted" style="font-size: 11px;">Mahasiswa</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container mb-5 pb-5">
        <div class="text-center mb-4">
            <span class="text-primary fw-bold small text-uppercase tracking-wider">Lokasi Outlet</span>
            <h3 class="fw-bold text-dark mt-1">Kunjungi Toko Fisik Kami</h3>
        </div>
        <div class="map-responsive">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d294.3717545887723!2d107.72599999381467!3d-6.940877394108454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68c37c038b4b27%3A0xf073bde96bf57dcd!2sALL%20CLEAN%20LAUNDRY!5e0!3m2!1sen!2sid!4v1779526148920!5m2!1sen!2sid" 
                width="100%" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </section>

    <footer class="main-footer border-top" data-aos="fade-up" data-aos-duration="1000">
        <div class="container">
            <div class="row g-4 justify-content-between">
                <div class="col-lg-5">
                    <a href="/" class="footer-brand">ALL CLEAN LAUNDRY</a>
                    <div class="footer-sub-brand">Laundry Express</div>
                    <p class="text-muted small mt-3" style="max-width: 400px; line-height: 1.6;">
                        All Clean Laundry Express adalah layanan laundry kiloan dan satuan. Kami adalah tim profesional yang selalu mengutamakan kualitas cucian &amp; pelayanan dengan prinsip bersih, rapi, wangi, higienis &amp; tepat waktu.
                    </p>
                    <div class="social-container">
                        <a href="#" class="social-icon-btn"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon-btn"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon-btn"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="social-icon-btn"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-6 ps-lg-5">
                    <h5 class="footer-title">Menu</h5>
                    <ul class="footer-links">
                        <li><a href="#">Beranda</a></li>
                        <li><a href="#tentang">Outlet</a></li>
                        <li><a href="#harga">Kemitraan</a></li>
                        <li><a href="#">Cek Status Cucianmu</a></li>
                        <li><a href="#syarat-ketentuan">Syarat &amp; Ketentuan</a></li>
                    </ul>
                </div>

                <div class="col-md-4 col-6">
                    <h5 class="footer-title">Kontak</h5>
                    <div class="footer-contact-item">
                        <i class="fab fa-whatsapp"></i>
                        <span>0811-2008-1012</span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="fab fa-whatsapp"></i>
                        <span>0811-2008-1012</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="copyright-bar text-center">
        <div class="container">
            <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-1 gap-md-3">
                <span>Copyright © All Clean Laundry {{ date('Y') }}</span>
                <span class="d-none d-md-inline">|</span>
                <span>Managed by : <i class="fas fa-desktop ms-1 small"></i>ALL CLEAN LAUNDRY</span>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true, 
            offset: 100
        });
    </script>
</body>
</html>