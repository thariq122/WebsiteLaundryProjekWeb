<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota_{{ $pesanan->nomor_nota }}</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            width: 300px;
            margin: 0 auto;
            padding: 10px;
            font-size: 14px;
            color: #000;
        }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .line { border-top: 1px dashed #000; margin: 10px 0; }
        .table { width: 100%; margin-bottom: 10px; }
        .table td { padding: 3px 0; vertical-align: top; }
        .fw-bold { font-weight: bold; }
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>

    <div class="no-print" style="margin-bottom: 20px; text-align: center;">
        <a href="/admin/dashboard" style="padding: 5px 15px; background: #1e293b; color: white; text-decoration: none; border-radius: 5px; font-size: 12px;">← Kembali ke Dashboard</a>
        <button onclick="window.print()" style="padding: 5px 15px; background: #0d6efd; color: white; border: none; border-radius: 5px; font-size: 12px; cursor: pointer; margin-left: 5px;">Print Lagi</button>
    </div>

    <div class="text-center">
        <h3 style="margin: 0 0 5px 0;">ALL CLEAN LAUNDRY</h3>
        <p style="margin: 0; font-size: 12px;">Jl. Raya Laundry No. 123, Cisarua</p>
        <p style="margin: 0; font-size: 12px;">Telp: 081234567890</p>
    </div>

    <div class="line"></div>

    <table class="table">
        <tr>
            <td>Nota: {{ $pesanan->nomor_nota }}</td>
            <td class="text-right">{{ date('d/m/Y H:i') }}</td>
        </tr>
        <tr>
            <td colspan="2">Pelanggan: {{ $pesanan->nama_pelanggan }}</td>
        </tr>
        <tr>
            <td colspan="2">No. HP   : {{ $pesanan->nomor_hp ?? '-' }}</td>
        </tr>
    </table>

    <div class="line"></div>

    <table class="table">
        <thead class="fw-bold">
            <tr>
                <td>Layanan</td>
                <td class="text-center">Qty</td>
                <td class="text-right">Total</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Cuci Kiloan Reguler<br><small style="font-size: 11px;">@Rp 7.000 / Kg</small></td>
                <td class="text-center">{{ $pesanan->berat_kg ?? 0 }} Kg</td>
                <td class="text-right">Rp {{ number_format($pesanan->total_harga ?? 0, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="line"></div>

    <table class="table fw-bold">
        <tr>
            <td>TOTAL BAYAR</td>
            <td class="text-right">Rp {{ number_format($pesanan->total_harga ?? 0, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td>STATUS</td>
            <td class="text-right" style="text-transform: uppercase;">[{{ $pesanan->status }}]</td>
        </tr>
    </table>

    <div class="line"></div>

    <div class="text-center" style="font-size: 12px; margin-top: 15px;">
        <p style="margin: 0 0 5px 0;">Terima Kasih Atas Kunjungan Anda</p>
        <p style="margin: 0;">Pakaian wangi, hati pun senang!</p>
    </div>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>