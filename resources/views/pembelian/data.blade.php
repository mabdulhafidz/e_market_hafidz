<form method="POST" action="{{ route('pembelian.store') }}">
  @csrf 
<div class="row">
    <div class="col-md-12">
      <h3>Barang</h3>
      <table id="tblTransaksi" class="table table-stripped table-bordered bulk_action">
        <thead>
          <tr>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Total</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="6" style="text-align:center;font-style:italic">Belum ada data</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  {{-- bagian total, submit, data hidden --}} 
  <div class="row justify-content-end" style="text-align:right;">
    <label class="control-label col-md-2 col-sm-2 offset-md-7">Total Harga</label>
    <div class="col-md-3 mr-md-auto" style="padding:right: 10px;align-content:right;">
      <input class="form-control col-md-8 col-xs-12" style="margin-left:80px;" type="text" name="total" id="totalHarga"> 
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 col-sm-6 col-xs-12" style="text-align: right; margin-right:0;padding-right:0;margin-top:20px">
      <div class="col-md-12 col-sm-9 col-xs-12">
        <button type="submit" class="btn btn-success">Simpan Transaksi</button>
      </div>
    </div>
  </div>
</form>