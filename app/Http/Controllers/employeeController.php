<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use App\Models\Employee;

class employeeController extends Controller
{
    public function index(){


        $employees = Employee::orderBy('id','DESC')->paginate(5);

        return view('employee.list',['employees'=>$employees]);
    }
    public function create(){
       return view('employee.create');
    }


    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'image'=>'sometimes|image:gif,png,jpg,jpeg'
        ]);

        if($validator->passes()){
            // save data here

          $employee = new Employee();

          $employee->name = $request->name;
          $employee->email = $request->email;

          $employee->address = $request->address;
          $employee->save();

       //   $request->session()->flash('success',"Employee added successfully");
        
         //upload image here

         if($request->image){

            $ext = $request->image->getClientOriginalExtension();
            $newFileName = time().'.'.$ext;
            $request->image->move(public_path().'/uploads/employees/',$newFileName);
            $employee->image = $newFileName; // database image name update
            $employee->save();

         }





          return redirect()->route('employees.index');



        }
        else{
            //return with errors

            return redirect()->route('employees.create')->withErrors($validator)->withInput();
        }
    }

    public function edit($id){

        $employee = Employee::findOrFail($id);
        // if(!$employee){
        //     abort(404);
        // }
       // dd($employee);
        return view('employee.edit',['employee'=>$employee]);
    }

    public function update($id,Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'image'=>'sometimes|image:gif,png,jpg,jpeg'
        ]);

        if($validator->passes()){
            // save data here

          $employee = Employee::find($id);

          $employee->name = $request->name;
          $employee->email = $request->email;

          $employee->address = $request->address;
          $employee->save();

       //   $request->session()->flash('success',"Employee added successfully");
        
         //upload image here

         if($request->image){
            $oldImage = $request->image;

            $ext = $request->image->getClientOriginalExtension();
            $newFileName = time().'.'.$ext;
            $request->image->move(public_path().'/uploads/employees/',$newFileName);
            $employee->image = $newFileName; // database image name update
         
            $employee->save();


            File::delete(public_path().'/uploads/employees/',$oldImage);
         }

          return redirect()->route('employees.index');

        }
        else{
            //return with errors

            return redirect()->route('employees.edit',$employee->id)->withErrors($validator)->withInput();
        }
        
    }

}
