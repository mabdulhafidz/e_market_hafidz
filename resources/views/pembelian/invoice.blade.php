<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            max-width: 100%;
            max-height: 100%;
        }
        body {
            padding: 5px;
            position: relative;
            width: 100%;
            height: 100%;
        }
        table th,
        table td {
            padding: .625em;
            text-align: center;
        }
        table .kop:before {
            content: ': ';
        }
        .left {
            text-align: left;
        }
        table #caption {
            font-size: 1.5em;
            margin: .5em 0 .75em;
        }
        table.border {
            width: 100%;
            border-collapse: collapse;
        }

        table.border tbody th,
        table.border tbody td {
            border: thin solid #000;
            padding: 2px;
        }
        .ttd td,
        .ttd th {
            padding-bottom: 4em;
        }
    </style>
</head>
<body>
    <div id="printable" class="container">
        <table border="0" cellpadding="0" cellspacing="0" width="485" class="border" style="overflow-x:auto;">
            <thead>
                <tr>
                    <td colspan="6" width="485" id="caption">FidzMart</td>
                </tr>
                @if ($pembelian && $pembelian->pemasok)
                <tr>
                    <td colspan="2">Nama Pemasok</td>
                    <td class="left kop">{{$pembelian->pemasok->nama_pemasok}}</td>
                    <td></td>
                    <td>Tanggal</td>
                    <td class="left kop">{{Carbon\Carbon::parse($pembelian->kode_masuk)->format('d F Y')}}</td>
                </tr>
                @else
                <tr>
                    <td colspan="2">Nama Pemasok</td>
                    <td class="left kop">Tidak Ada Data Pemasok</td>
                    <td></td>
                    <td>Tanggal</td>
                    <td class="left kop">Tidak Ada Data Tanggal</td>
                </tr>
                @endif
            </thead>
            @if ($pembelian)
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>No</th>
                    <th colspan="2">BARANG</th>
                    <th>HARGA BARANG</th>
                    <th>QTY</th>
                    <th>SUBTOTAL</th>
                </tr>
                @if ($pembelian->detailPembelian->count() > 0)
                @foreach ($pembelian->detailPembelian as $detail)
                <tr>
                    <td align="right">1</td>
                    <td colspan="2">{{$detail->barang->nama_barang}}</td>
                    <td>Rp. {{$detail->barang->harga_jual}}</td>
                    <td align="right">{{$detail->jumlah}}</td>
                    <td>Rp. {{$detail->sub_total}}</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6">Belum ada detail pembelian.</td>
                </tr>
                @endif
                <tr>
                    <th colspan="5">TOTAL</th>
                    <td>Rp. {{$pembelian->total}}</td>
                </tr>
            </tbody>
            @else
            <tbody>
                <tr>
                    <td colspan="6">Data pembelian tidak ditemukan.</td>
                </tr>
            </tbody>
            @endif
        </table>
    </div>
</body>
</html>
