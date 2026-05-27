<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pesanan {{ $nota }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; }
        .status-card { border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .step-icon { width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 16px; }
    </style>
</head>
<body>

    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                
                <div class="mb-4">
                    <a href="/" class="btn btn-light rounded-pill btn-sm text-muted px-3 shadow-sm">
                        <i class="fas fa-arrow-left me-1"></i> Kembali ke Beranda
                    </a>
                </div>

                <div class="card status-card p-4 bg-white">
                    @if($pesanan)
                        <div class="text-center mb-4">
                            <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2 mb-2">Nota: {{ $pesanan->nomor_nota }}</span>
                            <h4 class="fw-bold text-dark m-0">Halo, {{ $pesanan->nama_pelanggan }}!</h4>
                            <p class="text-muted small">Berikut adalah detail status pengerjaan pakaian Anda.</p>
                        </div>

                        <div class="row text-center mb-5 mt-4 g-2">
                            <div class="col-4">
                                <div class="step-icon mx-auto {{ in_array($pesanan->status, ['Baru', 'Proses', 'Selesai']) ? 'bg-secondary text-white' : 'bg-light text-muted' }}">
                                    <i class="fas fa-receipt"></i>
                                </div>
                                <span class="small d-block mt-2 fw-semibold">Diterima</span>
                            </div>
                            <div class="col-4">
                                <div class="step-icon mx-auto {{ in_array($pesanan->status, ['Proses', 'Selesai']) ? 'bg-warning text-dark fw-bold' : 'bg-light text-muted' }}">
                                    @if($pesanan->status == 'Proses')
                                        <i class="fas fa-spinner fa-spin"></i>
                                    @else
                                        <i class="fas fa-soap"></i>
                                    @endif
                                </div>
                                <span class="small d-block mt-2 fw-semibold">Dicuci</span>
                            </div>
                            <div class="col-4">
                                <div class="step-icon mx-auto {{ $pesanan->status == 'Selesai' ? 'bg-success text-white' : 'bg-light text-muted' }}">
                                    <i class="fas fa-check-double"></i>
                                </div>
                                <span class="small d-block mt-2 fw-semibold">Siap Ambil</span>
                            </div>
                        </div>

                        <hr class="opacity-50">

                        <div class="p-3 bg-light rounded-3 mt-4">
                            <h6 class="fw-bold mb-3 text-secondary small text-uppercase tracking-wider">Rincian Transaksi</h6>
                            
                            <div class="d-flex justify-content-between mb-2 small">
                                <span class="text-muted">Jenis Layanan</span>
                                <span class="fw-semibold text-dark">{{ $pesanan->nama_layanan ?? 'Layanan Umum' }}</span>
                            </div>

                            <div class="d-flex justify-content-between mb-2 small">
                                <span class="text-muted">Berat / Jumlah</span>
                                <span class="fw-semibold text-dark">
                                    @if(($pesanan->berat_kg ?? 0) > 0)
                                        {{ $pesanan->berat_kg }} Kg
                                    @else
                                        {{ $pesanan->jumlah ?? 0 }} Pcs
                                    @endif
                                </span>
                            </div>
                            <div class="d-flex justify-content-between mb-2 small">
                                <span class="text-muted">Total Tagihan</span>
                                <span class="fw-semibold text-success">Rp {{ number_format($pesanan->total_harga ?? 0, 0, ',', '.') }}</span>
                            </div>
                            <div class="d-flex justify-content-between small">
                                <span class="text-muted">Status Pembayaran</span>
                                <span class="badge bg-success-subtle text-success rounded-1">Lunas</span>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            @if($pesanan->status == 'Baru')
                                <p class="text-muted small m-0">Cucian Anda sudah masuk antrean dan akan segera diproses oleh tim kami. 😊</p>
                            @elseif($pesanan->status == 'Proses')
                                <p class="text-muted small m-0">Pakaian Anda sedang dicuci & disetrika agar wangi maksimal. Harap tunggu ya! 🧼✨</p>
                            @elseif($pesanan->status == 'Selesai')
                                <div class="alert alert-success d-inline-block small m-0 py-2 px-3 rounded-pill">
                                    <i class="fas fa-bell me-1"></i> Hore! Cucian sudah rapi dan siap dijemput di outlet.
                                </div>
                            @endif
                        </div>

                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-folder-open text-danger fa-3x mb-3 opacity-50"></i>
                            <h5 class="fw-bold text-dark">Nota Tidak Ditemukan</h5>
                            <p class="text-muted small px-4">Maaf, nomor nota <strong class="text-danger">"{{ $nota }}"</strong> tidak terdaftar dalam sistem kami. Silakan cek kembali salah ketik pada huruf besar/kecilnya.</p>
                            <a href="/" class="btn btn-primary btn-sm rounded-pill px-4 mt-2 shadow-sm">Coba Cari Lagi</a>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>