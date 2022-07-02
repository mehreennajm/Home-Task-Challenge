<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name','address','phone_number','postal_code','company_logo'];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
