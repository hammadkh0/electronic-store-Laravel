<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'brand',
        'name',
        'quantity',
        'price',
        'image',
        'description',
    ];

    public function isBoughtBy(){
        return $this->belongsToMany(User::class);
    }
}
