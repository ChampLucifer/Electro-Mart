<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Brand extends Model
{
    use HasFactory;
    protected $table='brands';
    protected $fillables=[
        'name',
        'slug',
        'status',
        'category_id',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
