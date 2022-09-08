
@extends('admin.layout_admin.layout')

@section('content')
<div id="main-content">
    <div class="page-heading">
        <h3>Data Gempa</h3>
    </div>

    <div class="div">
        @if(session()->has('success'))
        <div class="autohide">
            <div class="alert alert-success autohide" role="alert">
             {{ session('success') }}
            </div>    
        </div>
        @endif
    </div>

    <div class="div">
        @if(session()->has('error'))
        <div class="autohide">
            <div class="alert alert-danger autohide" role="alert">
             {{ session('error') }}
            </div>    
        </div>
        @endif
    </div>

    <div class="page-content">
            <section class="section">
                <div class="card">
                    <div class="card-header text-right">

                        <a href="{{ route('data-gempa.create') }}" class="mr-3 btn btn-outline-primary block" >
                        &nbsp;Tambah Data
                        </a>

                    </div>


                    

                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Tanggal</th>
                                    {{-- <th class="text-center">Jam</th> --}}
                                    {{-- <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Magnitude</th>
                                    <th>Kedalaman</th> --}}
                                    <th class="text-center">Detail data</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center" >{{ $item->tanggal }}</td>
                                    {{-- <td class="text-center"> @if($item->jam == null) {{ '-' }} @else {{ $item->jam }} @endif </td>                                     --}}

                                    <td class="text-center">
                                        <a href="{{ route('data-gempa.show', $item->id) }}" class="mr-3 btn btn-outline-primary block d-flex justify-content-center ">
                                        &nbsp; detail Data
                                        </a>
                                    </td>                                 
                                    
                                    <td>   
                                        <div class="row">
                                            
                                            <div class="col">
                                                {{-- <a class="badge bg-warning"   href="{{ route('data-titik.edit', $item->id) }}">  <i class="fa fa-edit"> </i>  </a> --}}
                                            </div>

                                            <div class="col">
                                                <form action="{{ route('data-gempa.destroy', $item->id) }}" method="POST" >
                                                    @csrf @method('DELETE')
                                                    <button class="badge bg-danger border-0" onclick="return confirm('anda yakin menghapus data ?')" >  <i class="fa fa-trash"> </i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        

                                        
                                    </td>
                                    

                                
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </section>
    </div>
        

    



@endsection

