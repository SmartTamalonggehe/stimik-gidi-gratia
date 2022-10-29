@extends('admin.layouts.default')
@section('title', 'Keuangan')
@section('judul', "$jenis")

@php
    $folder = 'transaksi';
@endphp

@section('add-button')
    <button class="btn btn-primary" id="tambah">Tambah Data</button>
    <div id="route" style="display: none"><?= $folder ?></div>
@endsection

@section('content')
    <div class="col-12">
        <div class="card card-border mb-0 h-100">
            <div class="card-body">
                {{ $jenis }}
                <table id="my_table" class="table w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Persembahan</th>
                            <th>Uraian</th>
                            <th>Tgl. {{ $jenis }}</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@include("admin.$folder.form")

@section('scripts')
    <script src="{{ mix('js/my-crud.js') }}"></script>
    <script>
        const jenis = document.getElementById('jenis_transaksi').value
        $(document).ready(function() {
            $('#my_table').DataTable({
                scrollX: true,
                processing: true,
                serverSide: true,
                ajax: `/crud/${route}?jenis=${jenis}`,
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'persembahan.nm_persembahan',
                    },
                    {
                        data: 'uraian',
                    },
                    {
                        data: 'tgl_transaksi',
                    },
                    {
                        data: 'jumlah',
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endsection
