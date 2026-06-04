<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LaundryController extends Controller
{
    // 1. TAMPILAN HALAMAN DEPAN
    public function halamanDepan()
    {
        return view('halaman_depan');
    }

    // 2. PROSES CEK STATUS PESANAN UNTUK PELANGGAN
    public function cekStatus(Request $request)
    {
        $nota = $request->input('nota');
        // Join ke tabel layanans agar pelanggan tahu mereka mengambil paket apa
        $pesanan = DB::table('pesanan')
            ->join('layanans', 'pesanan.layanan_id', '=', 'layanans.id')
            ->select('pesanan.*', 'layanans.nama_layanan', 'layanans.jenis_satuan')
            ->where('pesanan.nomor_nota', $nota)
            ->first();

        return view('status_pelanggan', compact('pesanan', 'nota'));
    }

   // 3. TAMPILAN HALAMAN LOGIN KASIR
    public function halamanLogin()
    {
        if (Session::has('kasir_logged_in')) {
            return redirect('/admin/dashboard');
        }
        
        return view('login_kasir');
    }

   // 4. PROSES LOGIN KASIR
    public function prosesLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if ($username === 'admin' && $password === 'admin') {
            Session::put('kasir_logged_in', true);
            Session::put('kasir_username', $username);
            return redirect('/admin/dashboard')->with('success', 'Selamat Datang Kembali, Admin!');
        }

        return redirect('/login')->with('error', 'Username atau Password salah!');
    }

    // 5. HALAMAN DASHBOARD KASIR
    public function dashboardAdmin()
    {
        if (!Session::has('kasir_logged_in')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu!');
        }

        $total_pendapatan = DB::table('pesanan')->sum('total_harga');
        $jumlah_baru       = DB::table('pesanan')->where('status', 'Baru')->count();
        $jumlah_proses     = DB::table('pesanan')->where('status', 'Proses')->count();
        $jumlah_selesai    = DB::table('pesanan')->where('status', 'Selesai')->count();
        
        // Ambil semua pesanan dan join dengan data layanan pendukungnya
        $semua_pesanan     = DB::table('pesanan')
            ->join('layanans', 'pesanan.layanan_id', '=', 'layanans.id')
            ->select('pesanan.*', 'layanans.nama_layanan', 'layanans.jenis_satuan')
            ->orderBy('pesanan.id', 'desc')
            ->get();

        // AMBIL MASTER DATA LAYANAN UNTUK DROPDOWN MODAL TAMBAH PESANAN
        $daftarLayanan     = DB::table('layanans')->orderBy('kategori', 'asc')->get();

        return view('dashboard_kasir', compact('semua_pesanan', 'total_pendapatan', 'jumlah_baru', 'jumlah_proses', 'jumlah_selesai', 'daftarLayanan'));
    }

    // 6. TAMBAH PESANAN LAUNDRY BARU (DINAMIS DENGAN KATEGORI DATA ALL CLEAN)
    public function simpanPesanan(Request $request)
    {
        if (!Session::has('kasir_logged_in')) { return redirect('/login'); }

        $nama       = $request->input('nama_pelanggan');
        $hp         = $request->input('nomor_hp');
        $layanan_id = $request->input('layanan_id');
        $jumlah     = $request->input('jumlah'); // Bisa Kg / Pcs / Set
        
        // 1. Cari info harga berdasarkan layanan yang dipilih kasir
        $layanan = DB::table('layanans')->where('id', $layanan_id)->first();
        if (!$layanan) {
            return redirect()->back()->with('error', 'Layanan laundry tidak valid!');
        }

        $nomor_nota = 'LND-' . rand(1000, 9999);
        
        // 2. Kalkulasi harga dinamis berdasarkan harga master di database
        $harga_normal = $jumlah * $layanan->harga;

        // 3. Cek riwayat untuk diskon otomatis member 10%
        $cek_member = DB::table('pesanan')->where('nomor_hp', $hp)->exists();

        if ($cek_member) {
            $diskon = $harga_normal * 0.10;
            $total_harga = $harga_normal - $diskon;
            $pesan_sukses = 'Pesanan baru ' . $nomor_nota . ' berhasil! 🎉 No. HP terdeteksi Member Setia & dapat Diskon 10% (Potongan Rp ' . number_format($diskon, 0, ',', '.') . ')';
        } else {
            $total_harga = $harga_normal;
            $pesan_sukses = 'Pesanan baru dengan Nota ' . $nomor_nota . ' berhasil ditambahkan!';
        }

        // 4. Insert data menggunakan kolom relasi baru yang sudah dimodifikasi
        DB::table('pesanan')->insert([
            'nomor_nota'     => $nomor_nota,
            'nama_pelanggan' => $nama,
            'nomor_hp'       => $hp,
            'layanan_id'     => $layanan_id ?? 0, // Mengisi ID layanan agar relasi tidak kosong (0)
            'jumlah'         => $jumlah,          // Mengisi kolom jumlah (Wajib di database)
            'berat_kg'       => $jumlah,          // Mengisi kolom berat_kg (Wajib di database)
            'total_harga'    => $total_harga,
            'status'         => 'Baru',
        ]);

        return redirect('/admin/dashboard')->with('success', $pesan_sukses);
    }

    // 7. UPDATE STATUS PROGRES LAUNDRY
    public function updateStatus(Request $request, $id)
    {
        if (!Session::has('kasir_logged_in')) { return redirect('/login'); }
        $status_baru = $request->input('status');

        DB::table('pesanan')->where('id', $id)->update([
            'status' => $status_baru,
        ]);

        return redirect('/admin/dashboard')->with('success', 'Status progres transaksi berhasil diperbarui!');
    }

    // 8. CETAK NOTA STRUK KASIR
    public function cetakNota($id)
    {
        if (!Session::has('kasir_logged_in')) { return redirect('/login'); }
        
        $pesanan = DB::table('pesanan')
            ->join('layanans', 'pesanan.layanan_id', '=', 'layanans.id')
            ->select('pesanan.*', 'layanans.nama_layanan', 'layanans.harga', 'layanans.jenis_satuan', 'layanans.kategori')
            ->where('pesanan.id', $id)
            ->first();

        if (!$pesanan) { return redirect('/admin/dashboard')->with('error', 'Data nota tidak ditemukan!'); }
        return view('cetak_nota', compact('pesanan'));
    }

    // 9. CETAK REKAP LAPORAN BULANAN
    public function cetakLaporan()
    {
        if (!Session::has('kasir_logged_in')) { return redirect('/login'); }
        
        $laporan = DB::table('pesanan')
            ->join('layanans', 'pesanan.layanan_id', '=', 'layanans.id')
            ->select('pesanan.*', 'layanans.nama_layanan', 'layanans.jenis_satuan')
            ->orderBy('pesanan.id', 'asc')
            ->get();

        $total_omzet = DB::table('pesanan')->sum('total_harga');
        return view('cetak_laporan', compact('laporan', 'total_omzet'));
    }

    // 10. HAPUS DATA TRANSAKSI
    public function hapusPesanan($id)
    {
        if (!Session::has('kasir_logged_in')) { return redirect('/login'); }
        DB::table('pesanan')->where('id', $id)->delete();
        return redirect('/admin/dashboard')->with('success', 'Data transaksi berhasil dihapus dari sistem!');
    }

    // 11. PROSES LOGOUT
    public function logout()
    {
        Session::forget('kasir_logged_in');
        Session::forget('kasir_username');
        return redirect('/')->with('success', 'Anda berhasil keluar dari sistem kasir.');
    }
}