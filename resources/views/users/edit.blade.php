<div class="modal fade" id="formUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="" class="form-edit"> 
                    @csrf
                    @method('put')
                    <input type="hidden" name="user_id" id="user_id">
                    <div class="form-group">
                        <label for="nama_user_edit">Nama User</label>
                        <input type="text" class="form-control" id="nama_user_edit" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email_edit">Email</label>
                        <input type="email" class="form-control" id="email_edit" name="email">
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <input type="level" class="form-control" id="level_edit" name="level">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
          
        </div>
    </div>
</div>
