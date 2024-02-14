<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shopproduct extends Model
{
    protected $fillable = ['name'];

    public function productimgs(){
        return $this->hasMany(ProductsImg::class);
    }
}
