
@extends('admin.layout_admin.layout')

@section('content')
<div id="main-content">
<div class="page-heading">
    <h3>Tambah Data Gempa</h3>
</div>

<div class="page-content">
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-8 col-12">
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
                            <form class="form form-horizontal mdi-responsive" action="{{ route('data-gempa.store') }}" method="POST" >
                                @csrf 
                                <div class="form-body">
                                        <div class="row">
                                                <div class="col-md-4">
                                                    <label>Tanggal</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="date" class="form-control" name="tanggal" id="tanggal" value="" >
                                                </div>


                                                <div class="col-md-4">
                                                    <label>Latitude</label>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <input placeholder="isi nilai depan koma" maxlength="1" onkeypress="return hanyaAngka(event)" type="text" class="form-control" required name="latitude" id="lat" >
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <input placeholder="isi nilai belkang koma" maxlength="5" onkeypress="return hanyaAngka(event)" type="text" class="form-control" required name="latitude_blk_koma"  >
                                                </div>

                                                <div class="col-md-2 form-group " >
                                                   <select name="value_koor_lat"  class="form-control" required>
                                                    <option value="LS">LS</option>
                                                    <option value="LU">LU</option>
                                                   </select>
                                                </div>
                                             
                                                    <div class="col-md-4">
                                                        <label>Longitude</label>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <input type="text" placeholder="isi nilai depan koma" class="form-control" required name="longitude" id="lng"> 
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <input placeholder="isi nilai belkang koma" maxlength="5" onkeypress="return hanyaAngka(event)" type="text" class="form-control" required name="longitude_blk_koma"  >
                                                    </div>
    
                                                    <div class="col-md-2 form-group " >
                                                       <select name="value_koor_lng"  class="form-control" required>
                                                        <option value="BT">BT</option>
                                                        <option value="BB">BB</option>
                                                       </select>
                                                    </div>



                                                <div class="col-md-4">
                                                    <label>Magnitude</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" autocomplete="off" class="form-control" required name="magnitude" onkeypress="return hanyaAngka(event)" id="magnitude" value="" >
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Kedalaman</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" class="form-control" required name="kedalaman" id="kedalaman" onkeypress="return hanyaAngka(event)" value="" >
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Wilayah</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" class="form-control" required name="wilayah" id="wilayah" value="" >
                                                </div>
                
                                                
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit"  class="btn btn-primary me-1 mb-1">
                                                    &nbsp;Simpan
                                                </button>
                                                  

                                                    <a type="reset" href="{{  route('data-gempa.index')  }}" 
                                                        class="btn btn-light-secondary me-1 mb-1">Kembali</a>
                                                </div>
                            </form>

                                            <p id="demo"></p>

                                           

                                        </div>
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
<script>
  
  function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}

</script>

@endpush









