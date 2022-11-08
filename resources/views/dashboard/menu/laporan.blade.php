

@extends('dashboard.template.main')
@section('title', 'Home')


@section('content')
    
<div class="container bg-white">
    <?php
                         $pil = 'hmj';
                         if (isset($_GET['pil'])){
                             $pil = ($_GET['pil']);
                            // echo $pil;
                         }
                  ?>
                  <div class="text-white">
                    <a href="?pil=hmj" class="btn  <?php echo $pil=='hmj' ?  "btn-primary" : "btn-success"  ?>">HMJ</a>
                    <a href="?pil=dema" class="btn <?php echo $pil=='dema' ?  "btn-primary" : "btn-success"  ?>">DEMA</a>
                    <a href="?pil=sema" class="btn <?php echo $pil=='sema' ?  "btn-primary" : "btn-success"  ?>">SEMA</a>
                  </div>
    
   
    
        
        
        
        <canvas id="myChart"></canvas>
        <table class="table table-hover">
        <thead>
        <tr>
        <th>No.</th>
        <th>Nama kandidat.</th>
        <th>perolehan suara.</th>
        </tr>
            @foreach ($pilihan as $data)
                
            
            
        <tr>
            <td></td>
            <td>{{$data->kandidat->nama}} </td>
            <td>{{$data->total}}</td>
        </tr>
        @php
            $pemilih += $data->total
        @endphp
        @endforeach
        <tr>
            <td>  </td>
            <td> Belum Memilih </td>
            <td> {{$total_user-$pemilih}}  </td>
        </tr>
        <tr>
            <td>  </td>
            <td> <b> TOTAL </b> </td>
            <td> <b> {{$total_user}} </b> </td>
        </tr>
        </table>
       
       
    </div>
    <p id='coba'>ddd</p>
    <script src="{{asset('/js/charts.js')}}"></script>
    <script src="{{asset('/js/pallete.js')}}"></script>
    <script>
        
       
    </script>
    <script>
        var data_kandidat = <?php echo json_encode($pilihan) ?>;
        var lbl_kandidat = []
        var data_suara = []
        data_kandidat.forEach(element => {
        lbl_kandidat.push(element['kandidat']['nama']);
        data_suara.push(element['total']);
       })
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'pie',
            // The data for our dataset
            data: {
                labels: lbl_kandidat,
                datasets: [{
                    label:'Data Mahasiswa',
                    backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(15, 200, 15)', 'rgb(255, 255, 132)'],
                    borderColor: ['rgb(255, 99, 132)'],
                    data: data_suara,
                }]
            },
            // Configuration options go here
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>

@endsection