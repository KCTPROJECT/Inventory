<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',  'phone', 'address','email','gst','products_purchased'
    ];

    public function sales()
    {
        return $this->hasMany('App\Sale');
    }

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
}