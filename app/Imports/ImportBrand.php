<?php

namespace App\Imports;

use App\Models\BrandProductModel;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportBrand implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BrandProductModel([
            'meta_keywords' => $row[0], 
            'brand_name' => $row[1],
            'brand_desc' => $row[2],
            'brand_status' => $row[3],
        ]);
    }
}
