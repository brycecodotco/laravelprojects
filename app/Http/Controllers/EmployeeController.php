<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index',['employees'=>$employees]);

    }

    public function insert(Request $request)
    {
        Employee::create([
            'FirstName' => $request->FirstName,
            'LastName'=> $request->LastName,
            'Job'=> $request->Job,
            'Salary' => $request->Salary
        ]);

        return redirect('/employees');
    }
}
