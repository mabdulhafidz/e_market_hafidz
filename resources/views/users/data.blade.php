
<table id="tbl-user" class="table table-compact table-stripped">
    <thead>
        <tr class="bg-dark">
            <th>Id</th>
            <th>Nama User</th>
            <th>Email</th>
            <th>Level</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Isi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $u)    
            <tr class="bg-secondary">
                <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
                <td>{{$u->name}}</td>
                <td>{{$u->email}}</td>
                <td>{{$u->level}}</td>
                <td>{{$u->created_at}}</td>
                <td>{{$u->updated_at}}</td>
                <td>
                   
                    <button class="btn btn-primary btn-edit" data-toggle="modal" data-target="#formUserModal"
                    data-mode="edit"
                    data-id="{{$u->id}}"
                    data-name="{{$u->name}}"
                    data-email="{{$u->email}}"
                    data-level="{{$u->level}}"
                    data-created_at="{{$u->created_at}}"
                    data-updated_at="{{$u->updated_at}}"
                    >
                    <i class="fas fa-edit"></i>
                </button>
          
                <form action="{{ route('users.destroy', $u->id)}}" method="post" style="display: inline">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger btn-delete" data-name="{{$u->name}}">
                <i class="fas fa-trash"></i>
                </button>
            </form> 
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

