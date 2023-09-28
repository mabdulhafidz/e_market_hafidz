<?php

namespace App\Http\Controllers;

use App\Exports\ProdukExport as ExportsProduk;
use App\Exports\ProdukExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Imports\Produk as ImportsProduk;
use App\Models\Produk;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;
use PDF;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     try {
        $data['produk'] = Produk::orderBy('created_at', 'DESC')->get();
        
         // untuk merefresh ke halaman itu kembali untuk melihat hasil input
        return view('produk.index')->with($data);
     } catch (QueryException | Exception | PDOException $error){
        $this->failResponse($error->getMessage(), $error->getCode());
     }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdukRequest $request)
    {
        try{
            DB::beginTransaction(); //memulai transaksi
            Produk::create($request->all()); // query input ke dalam tabel

            DB::commit(); // menyimpan data ke database

            // untuk merefresh ke halaman itu kembali untuk melihat hasil input
            return redirect('produk')->with('success', 'Input data berhasil');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();  // undo perubahan query/table
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
            $produk = Produk::find($id);
            return view('produk.edit')->with('produk', $produk);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdukRequest $request, $produk)
{
    try {
        DB::beginTransaction();
        $produk = Produk::findOrFail($produk);
        $validate = $request->validated();
        $produk->update($validate);
        DB::commit();
        return redirect()->back()->with('success', 'data berhasil di ubah');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
    }

}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        try {
            DB::beginTransaction();
            $produk->delete();
            DB::commit();
            return redirect('produk')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            return "terjadi kesalahan ".$error->getMessage();
        }
    }

    public function download() {
            $data = date('YMd').'_produk.xlsx';
          return Excel::download(new ProdukExport, $data);
    }

    // public function exportData() 
    // {
    //     $data = date('YMd').'_produk.xlsx';
    //     return Excel::download(new ExportsProduk, $data);
    // }

    public function import() 
    {
        Excel::import(new ImportsProduk, 'produk.xlsx');
        
        return redirect('/')->with('success', 'All good!');
    }
}

   