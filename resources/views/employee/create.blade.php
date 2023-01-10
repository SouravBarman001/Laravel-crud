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
            <div class="h4 ">Add Empoyees Info</div>
            <div>
                <a href="{{ route('employees.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
        {{-- container table --}}
        <form action="{{route('employees.store')}}" method="post" enctype="multipart/form-data">
        @csrf
       <div class="card border-0 shadow-lg mt-2">
          <div class="card-body">

          <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter your name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name')}}">
            @error('name') 
                <p class="invalid-feedback">{{$message}}</p>
            @enderror
          </div>

          <div class="mb-3">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Enter your email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}"  >
            @error('email') 
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
          </div>

          <div class="mb-3">

            <label for="address">Address</label>
            <textarea name="address" id="address" cols="30" rows="4" placeholder="Enter your address" class="form-control">{{ old('address')}}</textarea>
         
        </div>
          <div class="mb-3">
            <label for="image" class="form-label"></label>
            <input type="file" name="image" id="image" class=" @error('image') is-invalid @enderror"">    
            
            @error('image') 
            <p class="invalid-feedback">{{$message}}</p>
            @enderror

             </div>

        </div>
     </div>
         <button type="submit" class="btn btn-primary mt-3"  >Save employee</button>
    </form>

    </div>
    
</body>
</html>