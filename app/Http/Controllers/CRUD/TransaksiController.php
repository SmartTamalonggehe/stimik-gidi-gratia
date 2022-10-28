<?php

namespace App\Http\Controllers\CRUD;

use Carbon\Carbon;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    // validation
    protected function spartaValidation($request, $id = "")
    {
        $required = "";
        if ($id == "") {
            $required = "required";
        }
        $rules = [
            'persembahan_id' => 'required',
            'tgl_transaksi' => 'required',
            'uraian' => 'required',
            'jumlah' => 'required',
            'jenis_transaksi' => 'required',
        ];

        $messages = [
            'persembahan_id.required' => 'Nama Persembahan harus diisi.',
            'tgl_transaksi.required' => 'Tgl. Transaksi harus diisi.',
            'jenis_transaksi.required' => 'Jenis transaksi harus diisi.',
            'uraian.required' => 'Uraian harus diisi.',
            'jumlah.required' => 'Jumlah harus diisi.',
        ];
        $validator = Validator::make($request, $rules, $messages);

        if ($validator->fails()) {
            $pesan = [
                'judul' => 'Gagal',
                'type' => 'error',
                'pesan' => $validator->errors()->all(),
            ];
            return response()->json($pesan);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Transaksi::with('persembahan')->where('jenis_transaksi', $request->jenis)->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($data) {
                    return '
                    <button type="button" class="btn-ubah btn btn-outline-warning btn-sm" data-id="' . $data->id . '">Ubah</button>
                    <button type="button" class="btn-hapus btn btn-outline-danger btn-sm" data-id="' . $data->id . '">Delete</button>';
                }
            )
            ->editColumn('tgl_transaksi', function ($data) {
                // return date('d-m-Y', strtotime($data->tgl_transaksi));
                return Carbon::createFromFormat('Y-m-d', $data->tgl_transaksi)->isoFormat('D MMM Y');
            })
            ->editColumn('jumlah', function ($data) {
                // return date('d-m-Y', strtotime($data->tgl_transaksi));
                return number_format($data->jumlah, 0, ",", ".");
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_req = $request->all();
        $data_req['jumlah'] = preg_replace('/[^0-9]/', '', $data_req['jumlah']);
        $validate = $this->spartaValidation($data_req);
        if ($validate) {
            return $validate;
        }
        Transaksi::create($data_req);
        $pesan = [
            'judul' => 'Berhasil',
            'type' => 'success',
            'pesan' => 'Data berhasil ditambahkan.',
        ];
        return response()->json($pesan);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Transaksi::findOrFail($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data_req = $request->all();
        $data_req['jumlah'] = preg_replace('/[^0-9]/', '', $data_req['jumlah']);
        // return $data_req;
        $validate = $this->spartaValidation($data_req, $id);
        if ($validate) {
            return $validate;
        }
        // find data by id
        $find_data = Transaksi::find($id);

        $find_data->update($data_req);
        $pesan = [
            'judul' => 'Berhasil',
            'type' => 'success',
            'pesan' => 'Data berhasil diperbaharui.',
        ];
        return response()->json($pesan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Transaksi::findOrFail($id);
        // delete data
        $data->delete();
        $pesan = [
            'judul' => 'Berhasil',
            'type' => 'success',
            'pesan' => 'Data berhasil dihapus.',
        ];
        return response()->json($pesan);
    }
}
