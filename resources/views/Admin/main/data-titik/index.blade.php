
@extends('admin.layout_admin.layout')

@section('content')
<div id="main-content">
    <div class="page-heading">
        <h3>Data Titik</h3>
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

                        <a href="{{ route('data-titik.create') }}" class="mr-3 btn btn-outline-primary block" >
                        &nbsp;Tambah Data
                        </a>

                    </div>


                    

                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Alamat</th>
                                    {{-- <th>Geologi Fisik</th> --}}
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Detail Data</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    {{-- <td>{{ $item->geologi_fisik->kelas_informasi }}</td> --}}
                                    <td>{{ $item->latitude }}</td>
                                    <td>{{ $item->longitude }}</td>

                                    <td class="text-center">
                                        <a href="{{ route('data-titik.show', $item->id_titik) }}" class="mr-3 btn btn-outline-primary block d-flex justify-content-center ">
                                        &nbsp; Detail Data
                                        </a>
                                    </td> 

                                    {{-- <td>{{ $item->kemiringan_lereng->kelas_informasi }}</td>    --}}

                                    <td>   
                                        <div class="row">
                                            
                                            <div class="col">
                                                {{-- <a class="badge bg-warning"   href="{{ route('data-titik.edit', $item->id) }}">  <i class="fa fa-edit"> </i>  </a> --}}
                                            </div>

                                            <div class="col">
                                                <form action="{{ route('data-titik.destroy', $item->id_titik) }}" method="POST" >
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

