<?php

namespace App\Http\Controllers\LAP;

use Carbon\Carbon;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TransaksiLap extends Controller
{
    public function date(Request $request)
    {
        $tahun = $request->tahun;
        $bulan = $request->bulan;

        // mencari saldo terakhir ?
        // cari minimal tahun dan minimal bulan
        $date = Transaksi::orderBy('tgl_transaksi', 'asc')->first();
        $minTahun = Carbon::parse($date->tgl_transaksi)->format('Y');
        $minBulan = Carbon::parse($date->tgl_transaksi)->format('m');
        $minBulan -= 1;

        $dateMin = Carbon::create($minTahun, $minBulan)->startOfMonth()->format('Y-m-d');
        $dateMax = Carbon::create($tahun, $bulan - 1)->lastOfMonth()->format('Y-m-d');

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

        $data = DB::table('transaksi')
            ->join('persembahan', 'transaksi.persembahan_id', 'persembahan.id')
            ->whereMonth('tgl_transaksi', $bulan)
            ->whereYear('tgl_transaksi', $tahun)
            ->orderBy('persembahan.nm_persembahan')
            ->get();

        // pisahkan antara pemasukan dan pengeluaran
        // jumlahkan pemasukan
        // jumlahkan pengeluaran
        // hitung saldo terakhir (pemasukan - pengeluaran)
        return $data;

        // return view('diaken.lap.transaksi_pdf', [
        //     'pemasukan_sebelumnya' => $pemasukan_sebelumnya,
        //     'pengeluaran_sebelumnya' => $pengeluaran_sebelumnya,
        //     'data' => $data
        // ]);


    }

    public function pdf(Request $request)
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

        $data = DB::table('transaksi')
            ->join('persembahan', 'transaksi.persembahan_id', 'persembahan.id')
            ->whereMonth('tgl_transaksi', $bulan)
            ->whereYear('tgl_transaksi', $tahun)
            ->orderBy('persembahan.nm_persembahan')
            ->get();
        $pdf = Pdf::loadView('diaken.lap.transaksi_pdf', [
            'pemasukan_sebelumnya' => $pemasukan_sebelumnya,
            'pengeluaran_sebelumnya' => $pengeluaran_sebelumnya,
            'data' => $data
        ]);;
        return $pdf->stream("Laporan Keuangan $dateMin.pdf");
    }
}
