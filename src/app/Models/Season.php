<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $fillable = ['name']; // 必要なカラムを指定

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_season'); // 中間テーブルを指定
    }
}
