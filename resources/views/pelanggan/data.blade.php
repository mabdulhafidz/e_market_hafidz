
<table id="tbl-pelanggan" class="table table-compact table-stripped">
    <thead>
        <tr class="text-center">
            <th>Id</th>
            <th>Nama Pelanggan</th>
            <th>Kode Pelanggan</th>
            <th>Alamat</th>
            <th>No telp</th>
            <th>Email</th>
            <th>Isi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pelanggan as $p)    
            <tr class="text-center">
                <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
                <td>{{$p->nama_pelanggan}}</td>
                <td>{{$p->kode_pelanggan}}</td>
                <td>{{$p->alamat}}</td>
                <td>{{$p->no_telp}}</td>
                <td>{{$p->email}}</td>
                <td>
                   
                    <button class="btn btn-primary btn-edit" data-toggle="modal" data-target="#formPelangganModal"
                    data-mode="edit"
                    data-id="{{$p->id}}"
                    data-nama_pelanggan="{{$p->nama_pelanggan}}"
                    data-kode_pelanggan="{{$p->kode_pelanggan}}"
                    data-alamat="{{$p->alamat}}"
                    data-no_telp="{{$p->no_telp}}"
                    data-email="{{$p->email}}"
                    >
                    <i class="fas fa-edit"></i>
                </button>
          
                <form action="{{ route('pelanggan.destroy', $p->id)}}" method="post" style="display: inline">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger btn-delete" data-nama_pelanggan=="{{$p->nama_pelanggan}}">
                <i class="fas fa-trash"></i>
                </button>
            </form> 
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

