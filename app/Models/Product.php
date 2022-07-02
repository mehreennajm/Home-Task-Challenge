<?php

namespace App\Models;
use App\Models\ProductType;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_name','produced_date','expire_date','product_warranty','product_price','supplier_id','product_type_id','product_desc','product_image'];
    public function productType(){
        return  $this->belongsTo(ProductType::class);
    }
    public function supplier(){
        return  $this->belongsTo(Supplier::class);
         }
    use HasFactory;
}
