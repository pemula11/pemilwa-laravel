@include('user.template.header')

<!-- Section: Design Block -->
<section class="text-center">
  <!-- membuat rata tengah  -->
  <div class="position-absolute top-50 start-50 translate-middle w-100 h-100 p-3" >
    <div class="container shadow-5-strong" style="
        
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
      
      <div class="center pt-5"> 

      <img src="{{ asset('storage/'.$data->image) }}" alt="{{$data->nama}}" class="border m-2 rounded  border-secondary border-2" srcset="" width="200" height="200"> 
                              
            <p>Profil Kandidat </p>
            <h2>{{$data->nama}}</h2>
            <p><i>"{{$data->motto}}"</i></p>
            <div class="border border-secondary border-1"></div>
            <div class="row ">
             <div class="col">
                <h3>Visi</h3>
                <ul>
                  {{$data->visi}}
                </ul>
                </div>
            <div class="col">
                <h3>Misi</h3>
                {{$data->misi}}
            </div>
        </div>

        <a class="btn btn-success btn-lg m-3" href="/dashboard"> Kembali </a> 
      </div>
       

      </div>
    </div>
  </div>
</section>

@include('user.template.footer')
