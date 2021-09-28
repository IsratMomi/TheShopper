<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class requestRestocks extends Model
{
    protected $table ='request_restocks';
    protected $fillable = ['product_id','product_code','name','email','contact'];

}
