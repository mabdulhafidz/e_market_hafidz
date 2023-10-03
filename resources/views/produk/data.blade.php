
    <table id="tbl-produk" class="table table-compact table-stripped">
        <thead>
            <tr class="bg-dark">
                <th>Id</th>
                <th>Nama Produk</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Isi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produk as $p)    
                <tr class="bg-secondary">
                    <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
                    <td>{{$p->nama_produk}}</td>
                    <td>{{$p->created_at}}</td>
                    <td>{{$p->updated_at}}</td>
                    <td>
                       
                        <button class="btn btn-primary btn-edit" data-toggle="modal" data-target="#formProdukModal"
                        data-mode="edit"
                        data-id="{{$p->id}}"
                        data-nama_produk="{{$p->nama_produk}}"
                        data-created_at="{{$p->created_at}}"
                        data-updated_at="{{$p->updated_at}}"
                        >
                        <i class="fas fa-edit"></i>
                    </button>
              
                    <form action="{{ route('produk.destroy', $p->id)}}" method="post" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger btn-delete" data-nama_produk="{{$p->nama_produk}}">
                    <i class="fas fa-trash"></i>
                    </button>
                </form> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

