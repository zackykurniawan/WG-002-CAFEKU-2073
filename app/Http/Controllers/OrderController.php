<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // menampilkan halaman dashboard
        return view('order.tampil');
    }
    public function order(Request $request)
    {
        // deklarasi variabel
        $nama = $request->nama;
        $status = $request->status;
        
        $pesanan = explode(',', $request->pesanan);
        $jumlahpesanan = count($pesanan);
        $totalpesanan = $jumlahpesanan * 50000;

        $pesan = new Pembayaran;
        $bayar = $pesan->bayar($status, $totalpesanan);

        $data = [
            'nama' => $nama,
            'jumlahpesanan' => $jumlahpesanan,
            'totalpesanan' => $totalpesanan,
            'status' => $status,
            'diskon' => $pesan->diskon($status, $totalpesanan),
            'totalpembayaran' => $bayar
        ];

        return view('order.tampil', compact('data'));
    }
}

// membuat interface Pesanan
interface Pesanan
{
    public function diskon($status, $total_pesanan);
}

// implements Diskon dari Pesanan
class Diskon implements Pesanan
{

    // Menghitung Diskon
    public function diskon($status, $totalpesanan)
    {
        if ($status == 'member' && $totalpesanan >= 100000) {
            // diskon 20%
            return $totalpesanan * (20 / 100);
        } elseif ($status == 'member' && $totalpesanan < 100000) {
            // diskon 10%
            return $totalpesanan * (10 / 100);
        } else {
            // tidak ada diskon
            return $totalpesanan * (0 / 100);
        }
    }
}

// inheritance Pembayaran dari class Diskon
class Pembayaran extends Diskon
{
    // Hasil Total Pembayaran yang didapat dari totalpesanan - diskon
    public function bayar($status, $totalpesanan)
    {
        return (int)$totalpesanan - (int)$this->diskon($status, $totalpesanan);
    }
}