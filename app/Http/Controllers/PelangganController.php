<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;
use App\Models\Pelanggan;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     try {
        $data['pelanggan'] = Pelanggan::orderBy('created_at', 'DESC')->get();
        
         // untuk merefresh ke halaman itu kembali untuk melihat hasil input
        return view('pelanggan.index')->with($data);
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
    public function store(StorePelangganRequest $request)
    {
        // dd($request->all());
        try {
            DB::beginTransaction(); // Memulai transaksi
            
            Pelanggan::create($request->all()); // Query untuk menyimpan data pelanggan
            
            DB::commit(); // Menyimpan data ke dalam database
            
            return redirect('pelanggan')->with('success', 'Data pelanggan berhasil disimpan');
        } catch (Exception $error) {
            DB::rollBack(); // Membatalkan perubahan pada transaksi
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
            $pelanggan = Pelanggan::find($id);
            return view('pelanggan.edit')->with('pelanggan', $pelanggan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePelangganRequest $request, $pelanggan)
{
    try {
        DB::beginTransaction();
        // $pelanggan = Pelanggan::findOrFail($pelanggan);
        $validate = $request->validated();
        DB::table('pelanggan')->where('id', $pelanggan)->update($validate);
        DB::commit();
        return redirect()->back()->with('success', 'data berhasil di ubah');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
    }

}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        try {
            DB::beginTransaction();
            $pelanggan->delete();
            DB::commit();
            return redirect('pelanggan')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            return "terjadi kesalahan ".$error->getMessage();
        }
    }
}