<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Production extends Model
{
    use SoftDeletes;
    protected $table = 'productions';
    protected $fillable = ['date','product_id','product_category_id','item_code','item_name','item_quantity','no_of_hours','item_per_hour'];

     public function category()
    {
        return $this->belongsTo('App\ProductCategory', 'product_category_id')->withTrashed();
    }
    public function products() {
        return $this->belongsTo('App\Product','product_id')->withTrashed();;
    }
    public function production() {
        return $this->hasMany('App\Production');
    }
}
