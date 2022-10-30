@extends('admin.layouts.default')
@section('title', 'Persembahan')
@section('judul', 'Persembahan')

@php
    $folder = 'persembahan';
@endphp

@section('add-button')
    <button class="btn btn-primary" id="tambah">Tambah Data</button>
    <div id="route" style="display: none"><?= $folder ?></div>
@endsection

@section('content')
    <div class="col-12">
        <div class="card card-border mb-0 h-100">
            <div class="card-body">
                <table id="my_table" class="table w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis</th>
                            <th>Nama Persembahan</th>
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
        $(document).ready(function() {
            $('#my_table').DataTable({
                scrollX: true,
                processing: true,
                serverSide: true,
                order: [
                    [1, 'asc']
                ],
                ajax: `/crud/${route}`,
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'jenis.nm_jenis',
                    },
                    {
                        data: 'nm_persembahan',
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
