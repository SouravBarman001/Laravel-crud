<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Employee;

class employeeController extends Controller
{
    public function index(){
        return view('employee.list');
    }
    public function create(){
       return view('employee.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'image'=>'sometimes|image:gif,png,jpg'
        ]);

        if($validator->passes()){
            // save data here

          $employee = new Employee();

          $employee->name = $request->name;
          $employee->email = $request->email;

          $employee->address = $request->address;
          $employee->save();




        }
        else{
            //return with errors

            return redirect()->route('employees.create')->withErrors($validator)->withInput();
        }
    }
}
