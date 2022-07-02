<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $fillable = ['type'];
    public function products(){
        return $this->hasMany(Product::class);
    }
    use HasFactory;

}
