@extends('diaken.layouts.default')
@section('title', 'Dashboard')
@section('judul', 'Selamat Datang')

@php
    use Carbon\Carbon;
    $now = Carbon::now();
    $year_now = $now->year;
@endphp

@section('content')
    <div class="row">
        <div class="col-md-12 mb-md-4 mb-3">
            <div class="card card-border mb-0 h-100">
                <div class="card-header card-header-action">
                    <h6>Grafik Persembahan</h6>
                    <div class="card-action-wrap">
                        <div class="col-12 col-md-6">
                            <select name="" id="pilih-tahun" class="form-control">
                                <option value="">Pilih Tahun</option>
                                @for ($i = $year_now; $i >= 2020; $i--)
                                    <option value={{ $i }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <select name="" id="pilih-bulan" class="form-control">
                                <option value="">Pilih Bulan</option>
                                <option value=1>Januari</option>
                                <option value=2>Februari</option>
                                <option value=3>Maret</option>
                                <option value=4>April</option>
                                <option value=5>Mei</option>
                                <option value=6>Juni</option>
                                <option value=7>Juli</option>
                                <option value=8>Agustus</option>
                                <option value=9>September</option>
                                <option value=10>Oktober</option>
                                <option value=11>November</option>
                                <option value=12>Desember</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div id="chartTransaksi"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ mix('js/grafik.js') }}"></script>
@endsection
