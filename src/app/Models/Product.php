<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /*protected $fillable = [
        'name',
        'price',
        'image',
        'description',
    ];*/
    use HasFactory;

    public function seasons()
    {
        return $this->belongsToMany(Season::class, 'product_season'); // 中間テーブルを指定
    }

    public function checkSeason($seasonId)
    {
        return $this->seasons()->where('season_id', $seasonId)->exists();
    }
}
