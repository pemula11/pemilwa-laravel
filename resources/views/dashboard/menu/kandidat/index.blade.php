@extends('dashboard.template.main')
@section('title', 'Data Kandidat')


@section('content')
    
    
<div class="container bg-white">
    
    
    <a class="btn btn-sm btn-primary alight-right p-2 m-2" href="/admin/kandidat/create"> <span class="fa fa-plus"></span> Tambah Data</a>
        
    <table class="table table-hover">
        <thead>
        <tr>
        <th>No.</th>
        <th class="col-md-3">Nama Kandidat</th>
        <th>Image</th>
        <th>organisasi</th>
        <th>Aksi </th>
    
        </tr>
        </thead>
       @foreach ($data_kandidat as $item)
           
      
        <tr>
            <td> {{$loop->iteration}} </td>
            <td> {{$item['nama'] }}</td>
            <td> <img src="{{ asset('storage/'.$item->image) }}" alt="<?= $item['nama_kandidat'] ?>" srcset="" width="200" height="200">   </td>
            <td> {{ $item['organisasi']}}  </td>
            <td>
               
            <a href="/admin/kandidat/{{$item["id"]}}/edit" class="btn btn-warning">Edit</a>
            <form action="/admin/kandidat/{{ $item["id"] }}" class="d-inline" method="post">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('yakin hapus data?')"> 
                    
                   Hapus
                    
                </button>
            </form>
        
            </td>
        </tr>
        @endforeach
        </table>
    
        
    </div>
    

@endsection
