<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Models\Barang;
use App\Models\Produk;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
           $barang = Barang::with(['user', 'produk'])->latest()->get();
           $produk = Produk::pluck('nama_produk', 'id');
           $users = User::pluck('name', 'id');
           return view('barang.index', compact('barang', 'produk', 'users'));
        } catch (QueryException | Exception | PDOException $error) {
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
    public function store(StoreBarangRequest $request)
    {
        try {
            DB::beginTransaction();
            Barang::create($request->all());
            DB::commit();
            return redirect()->back()->with('success', 'Input data berhasil');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    protected function failResponse($message, $code)
    {
        // Handle error response logic here
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
            $barang = Barang::find($id);
            return view('barang.edit')->with('barang', $barang);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBarangRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $barang = Barang::findOrFail($id);
            $validatedData = $request->validated();
            $barang->update($validatedData);
            DB::commit();
            return redirect()->back()->with('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => 'Terjadi kesalahan']);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        try {
            DB::beginTransaction();
            $barang->delete();
            DB::commit();
            return redirect('barang')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            return "terjadi kesalahan ".$error->getMessage();
        }
    }
}
