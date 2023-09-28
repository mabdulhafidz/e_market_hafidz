<?php

namespace App\Imports;

use App\Models\Produk as ModelsProduk;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class Produk implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        return new ModelsProduk([
            'nama_produk'
         ]);
    }
}
