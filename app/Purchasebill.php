<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchasebill extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'date','invoice_no', 'party_name', 'amount', 'payment_type', 'balance'
    ];

    public function sales()
    {
        return $this->hasMany('App\Sale');
    }

    // public function transactions()
    // {
    //     return $this->hasMany('App\Transaction');
    // }
}
