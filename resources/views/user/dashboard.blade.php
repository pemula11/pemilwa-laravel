
@include('user.template.header')



<!-- Section: Design Block -->
<section class="text-center">
  <!-- membuat rata tengah  -->
    <div class="position-absolute top-50 start-50 translate-middle w-100 h-100 p-3" >
      <div class="container shadow-5-strong" style="
        
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
      
            <div class="clearfix p-2">
                <div class="float-start border-3 border-secondary border-bottom p-2"><b>Selamat Datang, {{$user->name}} </b></div>
    
            </div>

        <!-- start Containe -->
        
            <div class="p-3 mt-4">
              <?php
                     $pil = 'hmj';
                     if (isset($_GET['pil'])){
                         $pil = ($_GET['pil']);
                        // echo $pil;
                     }
              ?>
                <a href="?pil=hmj" class="btn <?php echo $pil=='hmj' ?  "btn-primary" : "btn-success"  ?>">HMJ</a>
                <a href="?pil=dema" class="btn <?php echo $pil=='dema' ?  "btn-primary" : "btn-success"  ?>">DEMA</a>
                <a href="?pil=sema" class="btn <?php echo $pil=='sema' ?  "btn-primary" : "btn-success"  ?>">SEMA</a>
                <h2> Daftar Kandidat <?= $pil ?> </h2>
                <!-- query untuk mendapat data apakah sudah memilih -->
              @if ($status>0)
                  anda telas coblos
              @else
              
              <?php 
                  $cekkandidat = $data_kandidat->count();
                  if ($cekkandidat > 0) {
              ?>
  
              <form method="post">
                  @csrf
                  <div class="row">
                 @foreach ($data_kandidat as $data)
                     
                 
                      <div class="col m-2">
                          <div class="container col-12 rounded bg-white text-dark"> 
                          
                          <img src=" {{ asset('storage/'.$data->image) }}" alt="<?= $data['nama'] ?>" class="border m-1 rounded  border-secondary border-2" srcset="" width="150" height="150"> 
                          <div class=""> <?= $data['nama'] ?></div>
                          <a href="dashboard/profil/<?= $data['id'] ?>" class="btn btn-success"> Profil </a> <br>
                          <input class="form-check-input" type="radio" name="pilvote" value="<?= $data['id'] ?>" id="2">
                          </div>
                       </div>

                      
                  
                  @endforeach
              </div>
                  <input type="submit" name="vote" value="VOTE" class="btn btn-success mt-4 p-3">
              </form>
                  <?php } 
                      else {
                          echo "SAAT INI SEDANG TIDAK ADA PEMILIHAN";
                      }
?>
              @endif
                
                    {{$status}}
            </div>
         <!-- End Containe -->
       </div>
    </div>
</section>
<!-- Section: Design Block -->


@include('user.template.footer')