<table class="table table-condensed table-striped" id="data-barang">
    <thead>
        <tr class="text-center bg-dark">
            <th>No.</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Nama Produk</th>
            <th>Satuan</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th>Ditarik</th>
            <th>UserName</th>
            <th>Tools</th>
        </tr>
    </thead>
    <tbody>
        @foreach($barang as $b)
        <tr class="text-center">
            <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
            <td>{{ $b->kode_barang}}</td>
            <td>{{ $b->nama_barang}}</td>
            <td>{{ $b->produk->nama_produk}}</td>
            <td>{{ $b->satuan}}</td>
            <td>{{ $b->harga_jual}}</td>
            <td>{{ $b->stok_barang}}</td>
            <td>{{ $b->ditarik}}</td>
            <td>{{ $b->user->name}}</td>
            <td>
                <button class="btn btn-primary" data-toggle="modal" data-target="#formBarangModal"
                    data-mode = "edit"
                    data-id = "{{ $b->id}}"
                    data-kode_barang="{{ $b->kode_barang}}"
                    data-nama_barang="{{ $b->nama_barang}}"
                    data-satuan="{{ $b->satuan}}"
                    data-harga_jual="{{ $b->harga_jual}}"
                    data-stok_barang="{{ $b->stok_barang}}"
                    data-ditarik="{{ $b->ditarik}}"
                    data-user_id="{{ $b->user_id}}"
                    >
                    <i class="fas fa-edit"></i>
                </button>
                <form action="{{ route('barang.destroy', $b->id) }}" method="post" style="display: inline">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-delete btn-danger " data-nama_barang="{{ $b->nama_barang}}"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
