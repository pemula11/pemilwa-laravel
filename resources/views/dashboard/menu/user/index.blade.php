@extends('dashboard.template.main')
@section('title', 'Data User')


@section('content')
    
    
<div class="container bg-white">
    
    
    <a class="btn btn-sm btn-primary alight-right p-2 m-2" href="/admin/user/create"> <span class="fa fa-plus"></span> Tambah Data</a>
        
    <table class="table table-hover">
        <thead>
        <tr>
        <th>No.</th>
        <th class="col-md-3">Nama </th>
        <th>status</th>
        
        <th>Aksi </th>
    
        </tr>
        </thead>
       @foreach ($data_user as $item)
           
      
        <tr>
            <td> {{$loop->iteration}} </td>
            <td> {{$item['name'] }}</td>
            
            <td> @if ($item['status']=="0")
                Tidal aktif
            @else
                aktif
            @endif </td>
            <td>
          
            <a href="/admin/user/{{$item["id"]}}/edit" class="btn btn-warning">Edit</a>

            <form action="/admin/user/{{$item["id"]}}" class="d-inline" method="post">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('yakin hapus data?')"> 
                    
                    Hapus
                    
                </button>
            </form>

            @if ($item['status']=="0")
               
            <a href="/admin/user/{{$item["id"]}}/aktivasi" class="btn btn-primary" >aktivasi</a>
               
             @endif  
        
            </td>
        </tr>
        @endforeach
        </table>
    
        
    </div>
    

@endsection
