<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePemasokRequest;
use App\Http\Requests\UpdatePemasokRequest;
use App\Models\Pemasok;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

class PemasokController extends Controller
{

    /* Display a listing of the resource.
    */
   public function index()
   {
    try {
       $data['pemasok'] = Pemasok::orderBy('created_at', 'DESC')->get();
       
        // untuk merefresh ke halaman itu kembali untuk melihat hasil input
       return view('pemasok.index')->with($data);
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
   public function store(StorePemasokRequest $request)
   {
       try{
           DB::beginTransaction(); //memulai transaksi
           Pemasok::create($request->all()); // query input ke dalam tabel

           DB::commit(); // menyimpan data ke database

           // untuk merefresh ke halaman itu kembali untuk melihat hasil input
           return redirect('pemasok')->with('success', 'Input data berhasil');
       } catch (QueryException | Exception | PDOException $error) {
           DB::rollBack();  // undo perubahan query/table
           $this->failResponse($error->getMessage(), $error->getCode());
       }
   }

   /**
    * Display the specified resource.
    */
   public function show(Pemasok $pemasok)
   {
       //
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit($id)
   {
       
           $pemasok = Pemasok::find($id);
           return view('pemasok.edit')->with('pemasok', $pemasok);
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(UpdatePemasokRequest $request, $pemasok)
{
   try {
       DB::beginTransaction();
       $pemasok = Pemasok::findOrFail($pemasok);
       $validate = $request->validated();
       $pemasok->update($validate);
       DB::commit();
       return redirect()->back()->with('success', 'data berhasil di ubah');
   } catch (\Exception $e) {
       return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
   }

}

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(Pemasok $pemasok)
   {
       try {
           DB::beginTransaction();
           $pemasok->delete();
           DB::commit();
           return redirect('pemasok')->with('success', 'Data berhasil dihapus!');
       } catch (QueryException | Exception | PDOException $error) {
           DB::rollBack();
           return "terjadi kesalahan ".$error->getMessage();
       }
   }
    }

