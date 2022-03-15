<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'emp_id','name', 'email', 'phone', 'document_type', 'document_id','dob','contact','address','designation','aadhar','blood_group','emergency_contact','doj','shift'
    ];

    public function sales()
    {
        return $this->hasMany('App\Sale');
    }
     public function employeesalary()
    {
       // return $this->belongsTo('App\Employee');
         return $this->belongsTo('App\EmployeeSalary', 'employee_id')->withTrashed();
    }
    // public function transactions()
    // {
    //     return $this->hasMany('App\Transaction');
    // }
}
