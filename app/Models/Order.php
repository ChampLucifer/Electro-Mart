<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\OrderItem;
class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $fillable =[
        'user_id',
        'tracking_no',
        'first_name',
        'last_name',
        'email',
        'address',
        'city',
        'state',
        'pincode',
        'phone',
        'order_notes',
        'status_message',
        'payment_mode',
        'payment_id'
    ];
  
    public function order_items(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }
}
