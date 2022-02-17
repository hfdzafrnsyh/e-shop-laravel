<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            //
            'name' => $row[1],
            'price' => $row[2],
            'description' => $row[3],
            'image' => $row[4],
            'rating' => $row[5],
            'stock' => $row[6],
            'category_id' => $row[7]
        ]);
    }
}
