<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;
use App\Models\Slider;
class Category extends Model
{
    use HasFactory;
    protected $table='category';
    protected $fillables =[
        'name',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status'
    ];
    public function products()
    {
        return $this->hasMany(Product::class,'category_id','id');
    }
    public function brands()
    {
        return $this->hasMany(Brand::class,'category_id','id')->where('status','0');
    }
    public function sliders()
    {
        return $this->hasMany(Slider::class,'category_id','id');
    }
    
}
