<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'product_name','category_id','brand_id','product_desc','product_content','product_price','product_image','product_status','meta_keywords','product_quantity','product_tag','product_views','product_cost'
    ];
    protected $primaryKey = 'product_id';
 	protected $table = 'tbl_product';
// 1 sp sẽ có nhiều cmt
    public function comment(){
        return $this->hasMany('App\Models\Comment');
    }
    public function category(){
        return $this->belongsTo('App\Models\CategoryProductModel','category_id');
    }

}
