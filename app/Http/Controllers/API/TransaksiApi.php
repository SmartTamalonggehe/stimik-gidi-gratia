<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TransaksiApi extends Controller
{
    public function index()
    {
        $data = Transaksi::all();
        return response()->json($data);
    }
    public function date(Request $request)
    {
        $tahun = $request->tahun;
        $bulan = $request->bulan;

        $dateMin = "";
        $dateMax = "";

        // mencari saldo terakhir ?
        // cari minimal tahun dan minimal bulan
        $date = Transaksi::orderBy('tgl_transaksi', 'asc')->first();
        if ($date) {
            $minTahun = Carbon::parse($date->tgl_transaksi)->format('Y');
            $minBulan = Carbon::parse($date->tgl_transaksi)->format('m');
            $minBulan -= 1;

            $dateMin = Carbon::create($minTahun, $minBulan)->startOfMonth()->format('Y-m-d');
            $dateMax = Carbon::create($tahun, $bulan - 1)->lastOfMonth()->format('Y-m-d');
        }

        // parameter dari tahun req ke tahun minimal dan parameter dari bulan req dan bulan minimal
        // hitung pemasukan sebelumnya
        $pemasukan_sebelumnya = DB::table('transaksi')
            ->join('persembahan', 'transaksi.persembahan_id', 'persembahan.id')
            ->where('jenis_transaksi', 'pemasukan')
            ->whereBetween('tgl_transaksi', [$dateMin, $dateMax])
            ->select(DB::raw('sum(jumlah) as jmlh, persembahan.nm_persembahan'))
            ->orderBy('persembahan.nm_persembahan')
            ->groupBy('persembahan.nm_persembahan')
            ->get();
        // hitung pengeluaran sebelumnya
        $pengeluaran_sebelumnya = DB::table('transaksi')
            ->join('persembahan', 'transaksi.persembahan_id', 'persembahan.id')
            ->where('jenis_transaksi', 'pengeluaran')
            ->whereBetween('tgl_transaksi', [$dateMin, $dateMax])
            ->select(DB::raw('sum(jumlah) as jmlh, persembahan.nm_persembahan'))
            ->groupBy('persembahan.nm_persembahan')
            ->orderBy('persembahan.nm_persembahan')
            ->get();

        $data = Transaksi::with('persembahan')
            ->orderBy('tgl_transaksi')
            ->whereMonth('tgl_transaksi', $bulan)
            ->whereYear('tgl_transaksi', $tahun)
            ->get();
        // pisahkan antara pemasukan dan pengeluaran
        // jumlahkan pemasukan
        // jumlahkan pengeluaran
        // hitung saldo terakhir (pemasukan - pengeluaran)

        $array = [
            'pemasukan_sebelumnya' => $pemasukan_sebelumnya,
            'pengeluaran_sebelumnya' => $pengeluaran_sebelumnya,
            'data_diminta' => $data,
        ];

        return response()->json($array);
    }
}
