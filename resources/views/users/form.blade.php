<!-- Modal -->
<div class="modal fade" id="modalFormUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="users">
                @csrf
                <div class="form-group row">
                  <label for="name" class="col-sm-4 col-form-label">Nama User</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" value="" name="name">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email" class="col-sm-4 col-form-label">Email</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="email" value="" name="email">
                  </div>
                </div>
                  <div class="form-group row">
                    <label for="level" class="col-sm-4 col-form-label">Level</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="level" value="" name="level">
                    </div>
                </div>
                <div class="form-group row">
                  <label for="password" class="col-sm-4 col-form-label">Password</label>
                  <div class="col-sm-8">
                      <input type="password" class="form-control" id="password" name="password">
                  </div>
              </div>
              
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>