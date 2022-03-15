<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salesreturn extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'date','ref_no', 'party_name', 'amount', 'payment_type', 'balance'
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
