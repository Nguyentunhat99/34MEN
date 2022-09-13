<?php

namespace App\Exports;

use App\Models\BrandProductModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportBrand implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BrandProductModel::all();
    }
}
