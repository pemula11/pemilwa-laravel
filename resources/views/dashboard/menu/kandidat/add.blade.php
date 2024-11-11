@extends('dashboard.template.main')
@section('title', 'Home')


@section('content')
    
   
<div class="container m-3  bg-white">
  <form action="/admin/kandidat" enctype="multipart/form-data" method="post" class="row  needs-validation" novalidate>
    @foreach ($errors->all() as $err)
        {{$err}}
    @endforeach
    
      @csrf
    
      <div class="col col-md-8">
      <div class="">
        <label for="validationCustom01" class="form-label">Nama</label>
        <input type="text" class="form-control" name="nama" id="validationCustom01" required>
        <div class="valid-feedback">
          Looks good!
        </div>
      </div>
      </div>
    
      
      <div class="mb-3 col col-md-8">
        <label for="validationTextarea" class="form-label">VISI</label>
        <textarea class="form-control " name="visi" id="validationTextarea" placeholder="Required example textarea" required></textarea>
        <div class="valid-feedback">
          Looks good!
        </div>
      </div>
    
      <div class="mb-3 col col-md-8">
        <label for="validationTextarea" class="form-label">MISI</label>
        <textarea class="form-control " name="misi" id="validationTextarea" placeholder="Required example textarea" required></textarea>
        <div class="valid-feedback">
          Looks good!
        </div>
      </div>
    
      <div class="mb-3 col col-md-8">
        <label for="validationTextarea" class="form-label">Quote</label>
        <textarea class="form-control " name="motto" id="validationTextarea" placeholder="Required example textarea" required></textarea>
        <div class="valid-feedback">
          Looks good!
        </div>
      </div>
    
    
      <div class="col col-md-8 m-2">
        
        <label for="validationCustom01" class="form-label">Organisasi</label>
        <select class="form-select-lg mb-3" aria-label="Organisasi" name="organisasi" id="validationCustom01" require>
    
          <option  value="HMJ">HMJ</option>
          <option value="DEMA">DEMA</option>
          <option value="SEMA">SEMA</option>
        </select>
        
       
      </div>
    
      <div class="col col-md-8">
        <div class="mb-3">
          <label for="image" class="form-label">Choose Image</label>
          <img class="img-preview img-fluid mb-3 col-sm-5">
          <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" id="validationCustom01" required onchange="previewImage()">
          @error('image')
            <div class="invalid-feedback">
              {{ $message }}.
            </div>
           @enderror
        
        </div>
      </div>
    
    
      <div class="col-12">
        <button class="btn btn-primary mt-3" name="submit" value="submit" type="submit">Tambah Data</button>
      </div>
    </form>
    </div>
  </div>
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

function previewImage(){
  const image = document.querySelector('#image');
  const imgPreview = document.querySelector('.img-preview')

  imgPreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);

  oFReader.onload = function(oFREvent){
    imgPreview.src = oFREvent.target.result;
  }
}
</script>
    

@endsection
