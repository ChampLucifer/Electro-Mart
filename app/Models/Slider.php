<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Slider extends Model
{
    use HasFactory;
    protected $table='sliders';
    protected $fillable =[
        'title',
        'description',
        'image',
        'category_id',
        'product_id',
        'status'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}

