<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            padding: 8px;
            border: 1px solid black
        }

        td {
            padding: 5px;
            border: 1px solid black
        }
    </style>
</head>

<body>
    @foreach ($data->keyBy('persembahan_id') as $key => $item)
        {{-- hitung saldo terakhir --}}
        @php
            $jumlah_pemasukan_akhir = 0;
            $jumlah_pengeluaran_akhir = 0;

            foreach ($pemasukan_sebelumnya as $pmsksb) {
                if ($item->nm_persembahan == $pmsksb->nm_persembahan) {
                    $jumlah_pemasukan_akhir = $pmsksb->jmlh;
                }
            }
            foreach ($pengeluaran_sebelumnya as $pklrsb) {
                if ($item->nm_persembahan == $pklrsb->nm_persembahan) {
                    $jumlah_pengeluaran_akhir = $pklrsb->jmlh;
                }
            }
            $jumlah_saldo_akhir = $jumlah_pemasukan_akhir - $jumlah_pengeluaran_akhir;
        @endphp
        <h2>{{ $item->nm_persembahan }}</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Uraian</th>
                    <th>Penerimaan</th>
                    <th>Pengeluaran</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td colspan="2">Saldo Terakhir</td>
                    <td colspan="2">{{ $jumlah_saldo_akhir }}</td>
                </tr>
                @php
                    $no = 0;
                    $sisa_saldo = 0;
                    $pemasukan = 0;
                    $pengeluaran = 0;
                @endphp
                @foreach ($data as $row)
                    @if ($row->persembahan_id == $item->persembahan_id)
                        @php
                            $no++;
                        @endphp
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $row->tgl_transaksi }}</td>
                            <td>{{ $row->uraian }}</td>
                            @if ($row->jenis_transaksi == 'pemasukan')
                                @php
                                    $pemasukan += $row->jumlah;
                                @endphp
                                <td>{{ $row->jumlah }}</td>
                                <td>-</td>
                            @endif
                            @if ($row->jenis_transaksi == 'pengeluaran')
                                @php
                                    $pengeluaran += $row->jumlah;
                                @endphp
                                <td>-</td>
                                <td>{{ $row->jumlah }}</td>
                            @endif
                        </tr>
                    @endif
                @endforeach
                <tr>
                    @php
                        $pemasukan_bulan = $pemasukan + $jumlah_saldo_akhir;
                    @endphp
                    <td colspan="3" rowspan="2">
                        TOTAL
                    </td>
                    <td>
                        {{ $pemasukan_bulan }}
                    </td>
                    <td>
                        {{ $pengeluaran }}
                    </td>
                </tr>
                <tr>
                    <td colspan="5">{{ $pemasukan_bulan - $pengeluaran }}</td>
                </tr>

            </tbody>
        </table>
    @endforeach
</body>

</html>
