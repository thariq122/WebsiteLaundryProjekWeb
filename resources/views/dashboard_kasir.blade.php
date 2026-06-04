<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kasir - All Clean Laundry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');
        
        body { 
            background-color: #f8fafc; 
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #334155;
        }
        .navbar-admin { 
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%); 
        }
        .main-card { 
            border: none; 
            border-radius: 16px; 
            box-shadow: 0 4px 25px rgba(15, 23, 42, 0.04); 
        }
        
        /* UI PREMIUM GRADIENT FOR WIDGETS */
        .stat-card { 
            border: none; 
            border-radius: 16px; 
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.02); 
            transition: all 0.3s ease;
            color: white;
        }
        .stat-card:hover { 
            transform: translateY(-5px); 
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.08);
        }
        .bg-grad-success { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
        .bg-grad-primary { background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); }
        .bg-grad-warning { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); }
        .bg-grad-info { background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%); }
        
        .icon-box {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(5px);
            padding: 12px;
            border-radius: 12px;
        }

        /* TABEL UI STYLE */
        .table-responsive { border-radius: 12px; overflow: hidden; }
        .table thead { background-color: #f1f5f9; }
        .table tbody tr { transition: all 0.2s; }
        .table tbody tr:hover { background-color: #f8fafc; }
        
        /* HOVER EFFECTS FOR BUTTONS */
        .btn-action {
            transition: all 0.2s;
        }
        .btn-action:hover {
            transform: scale(1.08);
        }

        .brand-logo {
            width: 36px;
            height: 36px;
            object-fit: contain;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-admin shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="#">
                <img src="{{ asset('images/logo.png') }}" alt="All Clean Laundry" class="brand-logo me-2">
                ALL CLEAN <span class="text-info">SaaS</span>
            </a>
            <div class="d-flex align-items-center">
                <span class="text-white small me-3 opacity-90 fw-medium">
                    <i class="fas fa-user-circle me-1 text-info"></i> Kasir: {{ session('kasir_username') }}
                </span>
                <a href="/logout" class="btn btn-danger btn-sm rounded-pill px-3 fw-semibold border-0 shadow-sm" style="background-color: #ef4444;" onclick="return confirm('Apakah Anda yakin ingin keluar?')">
                    <i class="fas fa-sign-out-alt me-1"></i> Keluar
                </a>
            </div>
        </div>
    </nav>

    <main class="container my-5">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
            <div>
                <h3 class="fw-bold text-dark m-0">Manajemen Transaksi</h3>
                <p class="text-muted small m-0">Pantau perputaran omzet dan status operasional laundry secara real-time.</p>
            </div>
            <div class="d-flex gap-2 w-100 w-md-auto">
                <a href="/admin/laporan" target="_blank" class="btn btn-outline-success rounded-pill px-3 shadow-sm fw-semibold d-flex align-items-center gap-1">
                    <i class="fas fa-file-invoice-dollar"></i> Cetak Rekap Laporan
                </a>
                <button class="btn btn-primary rounded-pill px-4 shadow-sm fw-semibold d-flex align-items-center gap-1" style="background-color: #2563eb;" data-bs-toggle="modal" data-bs-target="#tambahModal">
                    <i class="fas fa-plus-circle"></i> Tambah Order
                </button>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show small border-0 shadow-sm rounded-3" role="alert">
                <i class="fas fa-check-circle me-1"></i> {!! session('success') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show small border-0 shadow-sm rounded-3" role="alert">
                <i class="fas fa-exclamation-circle me-1"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-3 mb-4">
            <div class="col-6 col-md-3">
                <div class="card stat-card p-3 bg-grad-success">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-white-50 small fw-bold text-uppercase tracking-wider" style="font-size: 11px;">Total Omzet</span>
                            <h4 class="fw-bold mt-1 mb-0 fs-5 fs-md-4">Rp {{ number_format($total_pendapatan ?? 0, 0, ',', '.') }}</h4>
                        </div>
                        <div class="icon-box d-none d-sm-block">
                            <i class="fas fa-wallet fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card stat-card p-3 bg-grad-primary">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-white-50 small fw-bold text-uppercase tracking-wider" style="font-size: 11px;">Antrean Baru</span>
                            <h4 class="fw-bold mt-1 mb-0 fs-5 fs-md-4">{{ $jumlah_baru ?? 0 }} Order</h4>
                        </div>
                        <div class="icon-box d-none d-sm-block">
                            <i class="fas fa-receipt fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card stat-card p-3 bg-grad-warning">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-white-50 small fw-bold text-uppercase tracking-wider" style="font-size: 11px;">Sedang Dicuci</span>
                            <h4 class="fw-bold mt-1 mb-0 fs-5 fs-md-4">{{ $jumlah_proses ?? 0 }} Cucian</h4>
                        </div>
                        <div class="icon-box d-none d-sm-block">
                            <i class="fas fa-soap fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card stat-card p-3 bg-grad-info">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-white-50 small fw-bold text-uppercase tracking-wider" style="font-size: 11px;">Siap Ambil</span>
                            <h4 class="fw-bold mt-1 mb-0 fs-5 fs-md-4">{{ $jumlah_selesai ?? 0 }} Selesai</h4>
                        </div>
                        <div class="icon-box d-none d-sm-block">
                            <i class="fas fa-check-double fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card main-card p-4 bg-white">
            <div class="table-responsive">
                <table class="table table-hover align-middle m-0">
                    <thead class="text-secondary small fw-bold border-bottom">
                        <tr>
                            <th width="5%">No</th>
                            <th>No. Nota</th>
                            <th>Nama Pelanggan</th>
                            <th>No. HP</th>
                            <th>Jenis Layanan</th>
                            <th>Jumlah Vol</th>
                            <th>Total Bayar</th>
                            <th class="text-center">Status Progres</th>
                            <th class="text-center" width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="small text-dark">
                        @forelse ($semua_pesanan as $index => $pesanan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="fw-bold text-primary">{{ $pesanan->nomor_nota }}</td>
                            <td class="fw-semibold">{{ $pesanan->nama_pelanggan }}</td>
                            <td class="text-muted"><i class="fab fa-whatsapp text-success me-1"></i>{{ $pesanan->nomor_hp ?? '-' }}</td>
                            <td class="fw-medium text-secondary">{{ $pesanan->nama_layanan ?? 'Reguler' }}</td>
                            <td class="fw-medium">{{ $pesanan->berat_kg ?? '0' }} {{ $pesanan->jenis_satuan ?? 'Kg' }}</td>
                            <td class="fw-bold text-success">Rp {{ number_format($pesanan->total_harga ?? 0, 0, ',', '.') }}</td>
                            <td class="text-center">
                                @if(($pesanan->status ?? '') == 'Baru')
                                    <span class="badge bg-secondary-subtle text-secondary rounded-pill px-3 py-2 fw-semibold">
                                        <i class="fas fa-clock me-1"></i>Baru Masuk
                                    </span>
                                @elseif(($pesanan->status ?? '') == 'Proses')
                                    <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill px-3 py-2 fw-semibold">
                                        <i class="fas fa-spinner fa-spin me-1"></i>Sedang Dicuci
                                    </span>
                                @elseif(($pesanan->status ?? '') == 'Selesai')
                                    <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2 fw-semibold">
                                        <i class="fas fa-check-circle me-1"></i>Siap Ambil
                                    </span>
                                @else
                                    <span class="badge bg-light text-dark border rounded-pill px-3 py-2">{{ $pesanan->status ?? 'Menunggu' }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group gap-1">
                                    <a href="/admin/cetak/{{ $pesanan->id }}" target="_blank" class="btn btn-light text-primary btn-sm rounded-2 border btn-action" title="Cetak Struk Nota">
                                        <i class="fas fa-print"></i>
                                    </a>
                                    <button class="btn btn-light text-warning btn-sm rounded-2 border btn-action" data-bs-toggle="modal" data-bs-target="#editModal{{ $pesanan->id }}" title="Edit Status">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <a href="/admin/hapus/{{ $pesanan->id }}" class="btn btn-light text-danger btn-sm rounded-2 border btn-action" onclick="return confirm('Yakin ingin menghapus nota {{ $pesanan->nomor_nota }}?')" title="Hapus Transaksi">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <div class="modal fade" id="editModal{{ $pesanan->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content" style="border-radius: 16px; border: none;">
                                    <div class="modal-header border-0 pb-0">
                                        <h5 class="fw-bold text-dark"><i class="fas fa-edit text-warning me-2"></i>Ubah Status Progres</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="/admin/update-status/{{ $pesanan->id }}" method="POST">
                                        @csrf
                                        <div class="modal-body py-4">
                                            <p class="text-muted small mb-3">Pilih status pengerjaan terbaru untuk nota <strong class="text-primary">{{ $pesanan->nomor_nota }}</strong>.</p>
                                            <div class="mb-2">
                                                <label class="form-label small fw-semibold text-muted">Status Saat Ini</label>
                                                <select name="status" class="form-select bg-light" style="border-radius: 10px; padding: 10px;">
                                                    <option value="Baru" {{ $pesanan->status == 'Baru' ? 'selected' : '' }}>Baru Masuk</option>
                                                    <option value="Proses" {{ $pesanan->status == 'Proses' ? 'selected' : '' }}>Sedang Dicuci (Proses)</option>
                                                    <option value="Selesai" {{ $pesanan->status == 'Selesai' ? 'selected' : '' }}>Selesai (Siap Ambil)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0 pt-0">
                                            <button type="button" class="btn btn-light rounded-pill px-3 small" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary rounded-pill px-4 small fw-semibold" style="background-color: #2563eb;">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center py-5 text-muted">
                                <i class="fas fa-folder-open fa-3x mb-3 opacity-25"></i>
                                <p class="m-0">Belum ada data transaksi di database laundry kamu.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 16px; border: none;">
                <div class="modal-header border-0 pb-0">
                    <h5 class="fw-bold text-dark"><i class="fas fa-plus-circle text-primary me-2"></i>Tambah Transaksi Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/admin/tambah-pesanan" method="POST">
                    @csrf
                    <div class="modal-body py-3">
                        <p class="text-muted small mb-3">Isi data di bawah untuk mencatat order baru. Nota & Total bayar akan dihitung otomatis oleh sistem.</p>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Nama Pelanggan</label>
                            <input type="text" name="nama_pelanggan" class="form-control bg-light" style="border-radius: 10px; padding: 10px;" placeholder="Contoh: Budi Santoso" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Nomor HP Pelanggan</label>
                            <input type="text" id="inputNoHP" name="nomor_hp" class="form-control bg-light" style="border-radius: 10px; padding: 10px;" placeholder="Contoh: 081234567xxx" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Pilih Layanan Laundry</label>
                            <select name="layanan_id" id="selectLayanan" class="form-select bg-light" style="border-radius: 10px; padding: 10px;" required>
                                <option value="">-- Pilih Paket Layanan --</option>
                                @if(isset($daftarLayanan) && count($daftarLayanan) > 0)
                                    @foreach ($daftarLayanan as $layanan)
                                        <option value="{{ $layanan->id }}" data-harga="{{ $layanan->harga }}" data-satuan="{{ $layanan->jenis_satuan }}">
                                            [{{ $layanan->kategori ?? 'Paket' }}] {{ $layanan->nama_layanan }} - Rp {{ number_format($layanan->harga, 0, ',', '.') }}/{{ $layanan->jenis_satuan }}
                                        </option>
                                    @endforeach
                                @else
                                    <option value="" data-harga="7000" data-satuan="Kg">Cuci Kering Seterika Reguler (Default) - Rp 7.000/Kg</option>
                                @endif
                            </select>
                        </div>

                        <div class="mb-3">
                            <label id="labelVolume" class="form-label small fw-semibold text-muted">Berat Cucian (Kg)</label>
                            <input type="number" step="0.1" id="inputVolume" name="jumlah" class="form-control bg-light" style="border-radius: 10px; padding: 10px;" placeholder="Contoh: 3.5" required>
                        </div>

                        <div class="p-3 bg-light rounded-3 border border-dashed mb-1" style="border-radius: 12px;">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="small fw-semibold text-secondary">Estimasi Total Bayar :</span>
                                <span class="h4 fw-bold text-success m-0" id="liveHarga">Rp 0</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-2 pt-2 border-top">
                                <small class="text-muted text-xs" id="textTarifInfo">*Tarif flat Rp 7.000 / Kg</small>
                                <small class="text-primary fw-bold text-xs"><i class="fas fa-percentage me-1"></i>Diskon 10% Otomatis Khusus Member</small>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-light rounded-pill px-3 small" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4 small fw-semibold" style="background-color: #2563eb;">Proses & Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectLayanan = document.getElementById('selectLayanan');
            const inputVolume = document.getElementById('inputVolume');
            const labelVolume = document.getElementById('labelVolume');
            const liveHarga = document.getElementById('liveHarga');
            const textTarifInfo = document.getElementById('textTarifInfo');
            const inputNoHP = document.getElementById('inputNoHP');
            let tarifPerUnit = 7000;

            function hitungUlang() {
                const vol = parseFloat(inputVolume.value);
                if (!isNaN(vol) && vol > 0) {
                    const total = vol * tarifPerUnit;
                    liveHarga.innerText = 'Rp ' + total.toLocaleString('id-ID');
                } else {
                    liveHarga.innerText = 'Rp 0';
                }
            }

            selectLayanan.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                if (this.value !== "") {
                    tarifPerUnit = parseFloat(selectedOption.getAttribute('data-harga')) || 7000;
                    const satuan = selectedOption.getAttribute('data-satuan') || 'Kg';
                    
                    labelVolume.innerText = "Jumlah Cucian (" + satuan + ")";
                    inputVolume.placeholder = "Contoh: " + (satuan === 'Kg' ? '3.5' : '2');
                    textTarifInfo.innerText = "*Tarif: Rp " + tarifPerUnit.toLocaleString('id-ID') + " / " + satuan;
                } else {
                    tarifPerUnit = 7000;
                    labelVolume.innerText = "Berat Cucian (Kg)";
                    inputVolume.placeholder = "Contoh: 3.5";
                    textTarifInfo.innerText = "*Tarif flat Rp 7.000 / Kg";
                }
                hitungUlang();
            });

            inputVolume.addEventListener('input', hitungUlang);

            inputNoHP.addEventListener('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
                if (this.value.length > 13) {
                    this.value = this.value.slice(0, 13);
                }
            });
        });
    </script>
</body>
</html>