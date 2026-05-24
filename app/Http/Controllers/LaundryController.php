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
        $pesanan = DB::table('pesanan')->where('nomor_nota', $nota)->first();
        return view('status_pelanggan', compact('pesanan', 'nota'));
    }

   // 3. TAMPILAN HALAMAN LOGIN KASIR
    public function halamanLogin()
    {
        if (Session::has('kasir_logged_in')) {
            return redirect('/admin/dashboard');
        }
        
        // Kita ganti di sini jadi 'login_kasir' sesuai nama file kamu!
        return view('login_kasir');
    }

   // 4. PROSES LOGIN KASIR (SUDAH DIGANTI JADI ADMIN - ADMIN)
    public function prosesLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Sekarang password-nya sudah diganti dari 'admin123' jadi 'admin'
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
        $semua_pesanan     = DB::table('pesanan')->orderBy('id', 'desc')->get();

        return view('dashboard_kasir', compact('semua_pesanan', 'total_pendapatan', 'jumlah_baru', 'jumlah_proses', 'jumlah_selesai'));
    }

    // 6. TAMBAH PESANAN LAUNDRY BARU (GANTI NAMA JADI simpanPesanan BIAR SINKRON)
    public function simpanPesanan(Request $request)
    {
        if (!Session::has('kasir_logged_in')) { return redirect('/login'); }

        $nama  = $request->input('nama_pelanggan');
        $hp    = $request->input('nomor_hp');
        $berat = $request->input('berat');
        
        $nomor_nota = 'LND-' . rand(1000, 9999);
        $harga_normal = $berat * 7000;

        $cek_member = DB::table('pesanan')->where('nomor_hp', $hp)->exists();

        if ($cek_member) {
            $diskon = $harga_normal * 0.10;
            $total_harga = $harga_normal - $diskon;
            $pesan_sukses = 'Pesanan baru ' . $nomor_nota . ' berhasil! 🎉 Selamat, No. HP ini terdeteksi sebagai Member Setia & mendapatkan Diskon 10% (Potongan Rp ' . number_format($diskon, 0, ',', '.') . ')';
        } else {
            $total_harga = $harga_normal;
            $pesan_sukses = 'Pesanan baru dengan Nota ' . $nomor_nota . ' berhasil ditambahkan!';
        }

        DB::table('pesanan')->insert([
            'nomor_nota'     => $nomor_nota,
            'nama_pelanggan' => $nama,
            'nomor_hp'       => $hp,
            'berat_kg'       => $berat,
            'total_harga'    => $total_harga,
            'status'         => 'Baru',
        ]);

        return redirect('/admin/dashboard')->with('success', $pesan_sukses);
    }

    // 7. UPDATE STATUS PROGRES LAUNDRY (SUDAH DI-FIX ANTI ERROR COLUMN NOT FOUND)
    public function updateStatus(Request $request, $id)
    {
        if (!Session::has('kasir_logged_in')) { return redirect('/login'); }
        $status_baru = $request->input('status');

        // Kita hapus updated_at nya karena kolomnya tidak ada di database kamu
        DB::table('pesanan')->where('id', $id)->update([
            'status' => $status_baru,
        ]);

        return redirect('/admin/dashboard')->with('success', 'Status progres transaksi berhasil diperbarui!');
    }

    // 8. CETAK NOTA STRUK KASIR
    public function cetakNota($id)
    {
        if (!Session::has('kasir_logged_in')) { return redirect('/login'); }
        $pesanan = DB::table('pesanan')->where('id', $id)->first();
        if (!$pesanan) { return redirect('/admin/dashboard')->with('error', 'Data nota tidak ditemukan!'); }
        return view('cetak_nota', compact('pesanan'));
    }

    // 9. CETAK REKAP LAPORAN BULANAN
    public function cetakLaporan()
    {
        if (!Session::has('kasir_logged_in')) { return redirect('/login'); }
        $laporan = DB::table('pesanan')->orderBy('id', 'asc')->get();
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