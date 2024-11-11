@extends('dashboard.template.main')
@section('title', 'Home')


@section('content')
    
    
<div class="container m-3 ">
    
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3><?= $total_kandidat ?></h3>

          <p>Kandidat Yang Ada</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="/admin/kandidat" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3><?= round(($hmj/$total_user*100), 2) ?><sup style="font-size: 20px">%</sup></h3>

          <p><?= $hmj ?> User Telah Memilih HMJ</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>


    <!-- ./col -->
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3><?= round(($dema/$total_user*100), 2) ?><sup style="font-size: 20px">%</sup></h3>

          <p><?= $dema ?> User Telah Memilih DEMA</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3><?= round(($sema/$total_user*100), 2) ?><sup style="font-size: 20px">%</sup></h3>

          <p><?= $sema ?> User Telah Memilih SEMA</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3><?= $total_user ?></h3>

          <p>User Yang Telah Terdaftar</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="/admin/user" class="small-box-footer"> More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->


    
    <!-- ./col -->
  </div>
  <!-- /.row -->

  </div>
</div>
    

@endsection