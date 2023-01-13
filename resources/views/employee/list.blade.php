<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 9 CRUD</title>
    <link rel="stylesheet" href="{{asset('./assets/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="bg-dark py-3">
           <div class="container">
            <div class="h4 text-white">Laravel 9 CRUD</div>
           </div>
    </div>
    <div class="container py-3">
        {{-- container heading --}}

        <div class="d-flex justify-content-between">
            <div class="h4 ">Empoyees</div>
            <div>
                <a href="{{ route('employees.create')}}" class="btn btn-primary">Create</a>
            </div>
        </div>

        @if (session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>  
        @endif
        
        @if (session()->has('delete'))
         <div class="alert alert-success">
            {{session()->get('delete')}}
        </div>  
         
        @endif

        {{-- container table --}}
     <div class="card border-0 shadow-lg mt-2">
        <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Action</th>
                   
                </tr>
              @if($employees->isNotEmpty())
                
              @foreach($employees as $employee)
              <tr>
                <td>{{$employee->id}}</td>
                <td>
                    {{-- @if($employee->image != '' && file_exists(public_path().'/uploads/employees'.$employee->image)) --}}
                       <img src="{{ url('uploads/employees/'.$employee->image) }}" alt="{{$employee->name}}" width="40px" height="40px" class="rounded-circle">
                      
                     {{-- @else 

                     <img src="{{ url('assets/images/no-image.png') }}" alt="image" width="40px" height="40px" class="rounded-circle">


                    @endif --}}
                    </td>
                <td>{{$employee->name}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->address}}</td>
                <td>
                    {{-- <a href="{{ url('employees/'.$employee->id.'/edit')}}" class="btn btn-primary sm">Edit</a> --}}
                    <a href="{{ route('employees.edit',$employee->id)}}" class="btn btn-primary sm">Edit</a>

                    
                
                        
                    <form class="d-inline" id="delete-employee-{{$employee->id}}" action="{{route('employees.destroy',$employee->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-primary"> Delete</button>
                    </form> 
                    
                   


                    {{-- onclick="deleteEmployee({{$employee->id}})" --}}
                    
                   
                </td>
               
               </tr>

                @endforeach

                @else
                   <tr>
                    <td colspan="6">record not found</td>
                   </tr>
                @endif

            </table>
        </div>
     </div>
       
     <div class="mt-2">
        {{$employees->links()}}
     </div>


    </div>
    
</body>
</html>
<script>
    // function deleteEmployee(id){
    //     if(confirm('Are you sure to delete?')){
    //         decument.getElementById('delete-employee-'+id).submit();
    //     }
    // }
</script>