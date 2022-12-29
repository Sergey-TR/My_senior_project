<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shops';
    protected $guarded = false;

    public function catalog() {
        return $this->belongsTo(Catalog::class);
    }

    public function products() {
        return $this->hasMany(Product::class);
    }
}
