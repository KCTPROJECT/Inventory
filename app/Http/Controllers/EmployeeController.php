<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Transaction;
use App\PaymentMethod;
use App\EmployeeSalary;
use App\EmployeeAttendance;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(25);

        return view('employees.index', compact('employees'));
    }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function salary()
    {
        
        //$employees = Employee::paginate(25);
        $employees = Employee::paginate(25);
        $employeesalary = EmployeeSalary::whereMonth('created_at', date('m'))->get();;
        $employeeList = DB::table("employees")->leftjoin("employee_salaries","employees.id","=","employee_salaries.employee_id")
         ->orderBy('employee_salaries.id', 'desc')
            ->get(array('employees.id','employees.emp_id','employees.name','employees.email','employee_salaries.month','employee_salaries.year','employee_salaries.status'));
       // print_r($employeeList);
        return view('employees.salary',compact('employees','employeesalary','employeeList'));
    }

     public function attendance()
    {
        
        // $employees = Employee::paginate(25);
        // return view('employees.attendance',compact('employees'));
        $employees = Employee::paginate(25);
        //$employeeAttendance = EmployeeAttendance::get();
       // $date = today()->format('Y-m-d');

         $employeeAttendance = EmployeeAttendance::whereDate('created_at', date('Y-m-d'))->get();
        // print_r($employeeAttendance);

        $employeeList = DB::table("employees")->leftjoin("employee_attendances","employees.id","=","employee_attendances.employee_id")
        ->orderBy('employee_attendances.date', 'desc')
            ->get(array('employees.id','employees.emp_id','employees.name','employees.email','employee_attendances.date','employee_attendances.month','employee_attendances.year','employee_attendances.status'));
       // print_r($employeeList);
        return view('employees.attendance',compact('employees','employeeAttendance','employeeList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Request\EmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Employee $employee)
    {
        $employee->create($request->all());

        // echo ">>>> inside store ";
        // print_r($request);
        // echo ">>> emp";
        // print_r($employee);
        return redirect()->route('employees.index')->withStatus('Successfully Registered Employee.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }
           
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Request\EmployeeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->all());

        return redirect()
            ->route('employees.index')
            ->withStatus('Successfully modified customer.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()
            ->route('employees.index')
            ->withStatus('Employee successfully removed.');
    }
     
   public function updateSalaryStatus(Request $request, EmployeeSalary $employeesalary)
    {
         $t1=$request;
            $t1["month"]=date('M');
            $t1["year"]=date('Y');
            $t1["status"]='Paid';
            //$employeesalary->create($request);
            EmployeeSalary::create($request->all());
        return response()->json($request->all()); 
    }
     public function updateAttendanceStatus(Request $request, EmployeeAttendance $employeeattendance)
    {
         $t1=$request;
            $t1["month"]=date('M');
            $t1["year"]=date('Y');
            $t1["date"]=date('Y-m-d');
            $t1["status"]='Present';
            //$employeesalary->create($request);
            EmployeeAttendance::create($request->all());
        return response()->json($request->all()); 
    }
     public function salary_old(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->all());

        return redirect()
            ->route('employees.index')
            ->withStatus('Successfully Updated Employee.');
    }

     public function attendance_old(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->all());

        return redirect()
            ->route('employees.index')
            ->withStatus('Successfully Updated Employee.');
    }

    // public function addtransaction(Employee $Employee)
    // {
    //     $payment_methods = PaymentMethod::all();

    //     return view('employees.transactions.add', compact('Employee','payment_methods'));
    // }

}
