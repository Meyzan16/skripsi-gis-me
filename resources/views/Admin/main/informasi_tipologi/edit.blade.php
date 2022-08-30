
@extends('admin.layout_admin.layout')

@section('content')
<div id="main-content">
<div class="page-heading">
    <h3>Edit Data Tipologi {{ $data->tipologi }} </h3>
</div>

<div class="page-content">
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-10 col-12">
                <div class="card">
                    <div class="div">
                        @if(session()->has('success'))
                        <div class="autohide">
                            <div class="alert alert-success autohide" role="alert">
                             {{ session('success') }}
                            </div>    
                        </div>
                        @endif
                    </div>

                    <div class="card-content">
                        <div class="card-body">
                                <div class="form-body">
                                    <form action="{{ route('admin.informasitipologi.update', $data->id) }}" method="POST">
                                        @csrf @method('PATCH')

                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Tipologi</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" class="form-control" value="{{ $data->tipologi }} " readonly > 
                                            </div>
                                            <div class="col-md-2">
                                                <label>Informasi Tipologi</label>
                                            </div>
                                            <div class="col-md-10 form-group">                                                 
                                                <textarea class="form-control" name="informasi_tipologi" id="editor" rows="3"> {{ $data->informasi_tipologi }}</textarea>                                                  
                                            </div>
                                           
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit"  class="btn btn-primary me-1 mb-1">
                                                &nbsp;Simpan
                                                </button>
                                              

                                                <a  href="{{ route('admin.informasitipologi.index') }}"
                                                    class="btn btn-light-secondary me-1 mb-1">Kembali</a>
                                            </div>

                                            
                                        </div>
                                    </form>

                                </div>       
                        </div>
                    </div>

                </div>
            </div>

           
        </div>
        </section>
</div> 
@endsection

@push('addon-script')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<script>
  CKEDITOR.replace( 'editor' );
</script>
    
@endpush





