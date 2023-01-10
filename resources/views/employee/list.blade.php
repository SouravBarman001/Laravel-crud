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

                <tr>
                    <td>1</td>
                    <td></td>
                    <td>Sourav</td>
                    <td>sourav@gmail.com</td>
                    <td>Joypurhat</td>
                    <td>
                        <a href="#" class="btn btn-primary sm">Edit</a>
                        <a href="#" class="btn btn-danger sm">Delete</a>

                    </td>
                   
                </tr>
            </table>
        </div>
     </div>


    </div>
    
</body>
</html>