
@extends('admin.layout_admin.layout')

@section('content')
<div id="main-content">
    <div class="page-heading">
        <h3>Kemiringan Lereng</h3>
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


                    </div>


                    

                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kelas Informasi</th>
                                    <th>Nilai Kemampuan</th>
                                    {{-- <th>Tanggal Diperbarui</th> --}}
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kelas_informasi }}</td>
                                    <td>{{ $item->nilai_kemampuan }}</td>
                                    {{-- <td>{{ $item->updated_at }}</td>    --}}

                                    <td>   
                                        <a class="badge bg-warning"   data-bs-toggle="modal" data-bs-target="#edit_data{{ $item->id_kemiringan_lereng }}">  <i class="fa fa-edit"> </i>  </a>

                                        
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
    <div class="modal fade" id="edit_data{{ $item1->id_kemiringan_lereng  }}" tabindex="-1" role="dialog"
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
                <form action="{{ route('kemiringan-lereng.update', $item1->id_kemiringan_lereng) }}" method="POST">
                    @csrf  @method('put')

                    <div class="modal-body">
                        <h6 class="modal-title" id="exampleModalCenterTitle"> Kelas Informasi  </h6>
                        <textarea class="form-control" name="kelas_informasi" >{{ $item1->kelas_informasi }} </textarea>
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


