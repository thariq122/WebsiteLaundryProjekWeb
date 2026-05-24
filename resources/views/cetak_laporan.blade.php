<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap_Laporan_Laundry_{{ date('d_m_Y') }}</title>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: #333; font-size: 13px; line-height: 1.4; margin: 30px; }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .header { margin-bottom: 30px; border-bottom: 2px solid #333; padding-bottom: 10px; }
        .header h2 { margin: 0 0 5px 0; letter-spacing: 1px; }
        .header p { margin: 0; color: #666; font-size: 12px; }
        .table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        .table th, .table td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        .table th { background-color: #f8f9fa; font-weight: bold; color: #555; }
        .total-row { background-color: #f1f5f9; font-weight: bold; font-size: 14px; }
        @media print { .no-print { display: none; } }
    </style>
</head>
<body>

    <div class="no-print" style="text-align: center; margin-bottom: 30px;">
        <a href="/admin/dashboard" style="padding: 8px 20px; background: #1e293b; color: white; text-decoration: none; border-radius: 20px; font-size: 12px; font-weight: bold;">← Kembali ke Dashboard</a>
        <button onclick="window.print()" style="padding: 8px 20px; background: #10b981; color: white; border: none; border-radius: 20px; font-size: 12px; font-weight: bold; cursor: pointer; margin-left: 5px;"><i class="fas fa-print"></i> Cetak Laporan</button>
    </div>

    <div class="header text-center">
        <h2>ALL CLEAN LAUNDRY</h2>
        <p>Laporan Rekapitulasi Pendapatan dan Transaksi Masuk</p>
        <p style="margin-top: 5px; font-weight: bold; color: #000;">Tanggal Cetak: {{ date('d F Y') }}</p>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>No. Nota</th>
                <th>Nama Pelanggan</th>
                <th>No. HP</th>
                <th>Berat (Kg)</th>
                <th>Status</th>
                <th class="text-right">Total Bayar</th>
            </tr>
        </thead>
        <tbody>
            @forelse($laporan as $index => $data)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td style="font-weight: bold; color: #2563eb;">{{ $data->nomor_nota }}</td>
                <td>{{ $data->nama_pelanggan }}</td>
                <td>{{ $data->nomor_hp ?? '-' }}</td>
                <td>{{ $data->berat_kg ?? 0 }} Kg</td>
                <td style="text-transform: uppercase; font-size: 11px; font-weight: bold;">{{ $data->status }}</td>
                <td class="text-right">Rp {{ number_format($data->total_harga ?? 0, 0, ',', '.') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center" style="padding: 30px; color: #999;">Belum ada data transaksi yang tersimpan.</td>
            </tr>
            @endforelse
            
            <tr class="total-row">
                <td colspan="6" class="text-right">TOTAL OMZET KESELURUHAN :</td>
                <td class="text-right" style="color: #10b981;">Rp {{ number_format($total_omzet ?? 0, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <div style="margin-top: 50px; float: right; text-align: center; width: 200px;">
        <p>Cisarua, {{ date('d M Y') }}</p>
        <p style="margin-top: 60px; font-weight: bold; border-bottom: 1px solid #333; display: inline-block; padding: 0 20px;">{{ session('kasir_username') }}</p>
        <p style="margin: 0; font-size: 11px; color: #666;">Kasir Operasional</p>
    </div>

    <script>
        window.onload = function() { window.print(); }
    </script>
</body>
</html>