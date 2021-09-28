<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Orderitem;

class Order extends Model
{
    protected $table = 'customer_orders';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'amount',
        'address',
        'status',
        'transaction_id',
        'pay_mode',
        'tracking_id',

    ];

    public function orderitems(){
        return $this->hasMany(Orderitem::class,'order_id','id');
    }
}
