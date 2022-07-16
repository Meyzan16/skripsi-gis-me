
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
                                    <th>Kecamatan</th>
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
                                    <td>{{ $item->kecamatan }}</td>
                                    {{-- <td>{{ $item->geologi_fisik->kelas_informasi }}</td> --}}
                                    <td>{{ $item->latitude }}</td>
                                    <td>{{ $item->longitude }}</td>

                                    <td class="text-center">
                                        <a href="{{ route('data-titik.show', $item->id) }}" class="mr-3 btn btn-outline-primary block d-flex justify-content-center ">
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
                                                <form action="{{ route('data-titik.destroy', $item->id) }}" method="POST" >
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
    <div class="modal fade" id="edit_data{{ $item1->id  }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle"> Edit Data {{ $item1->nama_parameter }}
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ route('data-bobot.update', $item1->id) }}" method="POST">
                    @csrf  @method('put')
                    <div class="modal-body">
                        <h6 class="modal-title" id="exampleModalCenterTitle"> Nama  </h6>
                        <input type="text" value="{{  old('bobot', $item1->bobot)  }}" class="form-control" name="bobot">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Kembali</span>
                        </button>
        
                        
                            <button type="submit" class="btn btn-primary ml-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Simpan</span>
                            </button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

@endsection

