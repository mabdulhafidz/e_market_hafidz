<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDetailPembelianRequest;
use App\Http\Requests\StorePembelianRequest;
use App\Http\Requests\UpdatePembelianRequest;
use App\Models\Barang;
use App\Models\DetailPembelian;
use App\Models\Pemasok;
use App\Models\Pembelian;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
           $lastId = Pembelian::select('kode_masuk')->orderBy('created_at', 'desc')->first();
           $data['kode'] = ($lastId== null?'00000001' :sprintf('%08d', substr($lastId->kode_masuk,1)+1));
           $data['pemasok'] = Pemasok::get();
           $data['barang'] = Barang::get();
         
           return view('pembelian/index')->with($data);
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
    public function store(StorePembelianRequest $request)
    {
        
        // try {
        //     DB::beginTransaction(); // Memulai transaksi
        //     // Input pembelian
        //     $data = [
        //         'kode_masuk' => $request['kode_masuk'],
        //         'tanggal_masuk' => $request['tanggal_masuk'],
        //         'total' => $request['total'],
        //         'pemasok_id' => $request['pemasok_id'],
        //         'user_id' => 1,
        //     ];
    
        //     $input_pembelian = Pembelian::create($data);
    
        //     // Input detail pembelian
        //     $barang_id = $request->barang_id;
        //     $harga_beli = $request->harga_beli;
        //     $jumlah = $request->jumlah;
        //     $sub_total = $request->sub_total;
    
        //     foreach ($barang_id as $i => $v) {
        //         $data2 = [
        //             'pembelian_id' => $input_pembelian->id,
        //             'barang_id' => $barang_id[$i],
        //             'harga_beli' => $harga_beli[$i],
        //             'jumlah' => $jumlah[$i],
        //             'sub_total' => $sub_total[$i],
        //         ];
    
        //         DetailPembelian::create($data2);
        //     }
    
        //     DB::commit(); // Menyimpan data ke database
    
        //     // Untuk merefresh ke halaman itu kembali untuk melihat hasil input
        //     return redirect('pembelian')->with('success', 'Input data berhasil');
        // } catch (QueryException | Exception | PDOException $error) {
        //     // DB::rollBack(); // Undo perubahan query/table
        //     // $this->failResponse($error->getMessage(), $error->getCode());
        //     // dd($error->getMessage());
        // }

        $data['kode_masuk'] = $request['kode_masuk'];
        $data['tanggal_masuk'] = $request['tanggal_masuk'];
        $data['total'] = $request['total'];
        $data['pemasok_id'] = $request['pemasok_id'];
        $data['user_id'] = 1;

        $input_pembelian = Pembelian::create($data);

        $barang_id = $request->barang_id ?? []; 
        $harga_beli = $request->harga_beli ?? [];
        $jumlah = $request->jumlah ?? [];
        $sub_total = $request->sub_total ?? [];

        $data3 = [];

        foreach($barang_id as $i => $v){
            $data2['pembelian_id'] = $input_pembelian->id;
            $data2['barang_id'] = $barang_id[$i];
            $data2['harga_beli'] = $harga_beli[$i];
            $data2['jumlah'] = $jumlah[$i];
            $data2['sub_total'] = $sub_total[$i];
            $input_detail_pembelian = DetailPembelian::create($data2);
            $data3[] = $data2;
        }
        return $this->invoiceCreate($data, $data3);
    }

    public function invoiceCreate($data, $dat3)
    {
        $dataId = $data['kode_masuk'];

        $pembelian = Pembelian::with('pemasok', 'detailPembelian')->where('kode_masuk', '$dataId')->first();
        
        return view('pembelian.invoice', compact('pembelian'));
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembelian $pembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePembelianRequest $request, Pembelian $pembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembelian $pembelian)
    {
        //
    }
}
