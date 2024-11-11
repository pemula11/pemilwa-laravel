@extends('dashboard.template.main')
@section('title', 'edit user')


@section('content')
    
   
<div class="container m-3 bg-white">
    @foreach ($errors->all() as $err)
    {{$err}}
@endforeach
  <form action="/admin/user/{{$user->id}}" method="post" class="row  needs-validation" novalidate>
    @method('put')
    @csrf
    <div class="col col-md-8">
    <div class="">
      <label for="validationCustom01" class="form-label">NIM</label>
      <input type="Number" class="form-control" name="nim" id="validationCustom01" value="{{$user->nim}}" disabled required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    </div>
  
    <div class="col col-md-8">
    <div class="">
      <label for="validationCustom01" class="form-label">Nama</label>
      <input type="text" class="form-control" name="name" id="validationCustom01" value="{{$user->name}}"  required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    </div>
  
    <div class="col col-md-8">
    <div class="">
      <label for="validationCustom01" class="form-label">Password</label>
      <input type="password" class="form-control" name="password" placeholder="just empty if not any changed" >
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    </div>
  
    
    <div class="col-12">
      <button class="btn btn-primary mt-3" name="submit" value="submit" type="submit">Edit Data</button>
    </div>
  </form>
  </div>
  
  
  
  <script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function () {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
  
          form.classList.add('was-validated')
        }, false)
      })
  })()
  </script> 
    

@endsection
