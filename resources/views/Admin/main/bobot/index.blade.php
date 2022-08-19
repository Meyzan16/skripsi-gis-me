
@extends('admin.layout_admin.layout')

@section('content')
<div id="main-content">
    <div class="page-heading">
        <h3>Data Bobot</h3>
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
                                    <th>Nama Parameter</th>
                                    <th>Nilai Bobot</th>
                                    {{-- <th>Tanggal Diperbarui</th> --}}
                                    {{-- <th>Aksi</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_parameter }}</td>
                                    <td>{{ $item->bobot }}</td>
                                    {{-- <td>{{ $item->update   d_at }}</td>    --}}

                                    {{-- <td>   
                                        <a class="badge bg-warning"   data-bs-toggle="modal" data-bs-target="#edit_data{{ $item->id }}">  <i class="fa fa-edit"> </i>  </a>

                                        
                                    </td> --}}
                                    

                                
                                    
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
                        <input type="text" value="{{  old('bobot', $item1->bobot)  }}" class="form-control" name="bobot" maxlength="1" onkeypress="return hanyaAngka(event)">
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

@push('addon-script')
<script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
      return true;
    }
</script>

@endpush


