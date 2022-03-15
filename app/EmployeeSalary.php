<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeSalary extends Model
{
    protected $fillable = [
        'employee_id','emp_id','name','email' ,'month', 'year', 'status'
    ];
    
    public function employee()
    {
       // return $this->belongsTo('App\Employee');
         return $this->belongsTo('App\Employee', 'id')->withTrashed();
    }
    public function sale()
    {
        return $this->belongsTo('App\Sale');
    }
}
