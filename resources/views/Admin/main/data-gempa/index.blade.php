
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
                                    <th class="text-center">Jam</th>
                                    {{-- <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Magnitude</th>
                                    <th>Kedalaman</th> --}}
                                    <th class="text-center">Wilayah</th>
                                    <th class="text-center">Area Dirasakan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center" >{{ $item->tanggal }}</td>
                                    <td class="text-center"> @if($item->jam == null) {{ '-' }} @else {{ $item->jam }} @endif </td>
                                    {{-- <td>{{ $item->latitude }} LU</td>
                                    <td>{{ $item->longitude }} BT</td>
                                    <td>{{ $item->magnitude }}</td>    --}}
                                    {{-- <td>{{ $item->kedalaman }} km</td>    --}}
                                    <center>

                                        <td>
                                            <button type="button" class="mr-3 btn btn-outline-primary center-block "
                                                data-bs-toggle="modal" data-bs-target="#wilayah{{ $item->id }}">
                                                &nbsp;Wilayah
                                            </button>
                                        </td>   
                                    </center>

                                    <td class="text-center">
                                        <a href="{{ route('data-gempa.show', $item->id) }}" class="mr-3 btn btn-outline-primary block d-flex justify-content-center ">
                                        &nbsp; Detail Data
                                        </a>
                                    </td>  

                                    {{-- <td>
                                        <button type="button" class="mr-3 btn btn-outline-primary block"
                                        data-bs-toggle="modal" data-bs-target="#area{{ $item->id }}">
                                        &nbsp;Area Dirasakan
                                        </button>
                                    </td>    --}}
                                    
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
        

    @foreach ($data as $item1)
    <div class="modal fade" id="wilayah{{ $item1->id  }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle"> wilayah
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>

                    <div class="modal-body">
                        <textarea class="form-control" name="" cols="30" >{{ $item1->wilayah }}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Kembali</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    @foreach ($data as $item1)
    <div class="modal fade" id="area{{ $item1->id  }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle"> Area
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>

                    <div class="modal-body">
                        <textarea class="form-control" name="" cols="30" >{{ $item1->dirasakan }}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Kembali</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach


@endsection

