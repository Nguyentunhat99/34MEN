<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandProductModel extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'meta_keywords', 'brand_name','brand_desc','brand_status'
    ];
    protected $primaryKey = 'brand_id';
 	protected $table = 'tbl_brand';
}
