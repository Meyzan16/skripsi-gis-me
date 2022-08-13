
@extends('admin.layout_admin.layout')

@section('content')
<div id="main-content">
<div class="page-heading">
    <h3>Detail Data Titik </h3>
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
                                <div class="form-body">
                                        <div class="row">
                                                <div class="col-md-4">
                                                    <label>Kecamatan</label>
                                                </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control"   value="{{ $data->kecamatan }}" readonly >
                                                    </div>


                                                <div class="col-md-4">
                                                    <label>Geologi Fisik</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" class="form-control"  value="{{ $data->geologi_fisik->kelas_informasi }}" readonly >
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <label>Kemiringan Lereng</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" class="form-control"  value="{{ $data->kemiringan_lereng->kelas_informasi }}" readonly >
                                                </div>
                                            
                                                 

                                                <div class="col-md-4">
                                                    <label>Latitude</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" class="form-control" value="{{ $data->latitude }}" readonly >
                                                </div>
                                            

                                                    <div class="col-md-4">
                                                        <label>Longitude</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" value="{{ $data->longitude }} " readonly > 
                                                    </div>


            
                                                <div class="col-md-4">
                                                    <label>Alamat</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <textarea readonly class="form-control" id="" rows="3">{{ $data->alamat }}</textarea>
                                                </div>
                                                  

                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <a type="reset" href="{{  route('data-titik.index')  }}" 
                                                        class="btn btn-primary me-1 mb-1">Kembali</a>
                                                </div>
                                           
                                                
                                                <div id="map" style="height:400px; width: 900px;" class="my-3"></div>  
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

var marker;
    var latitude = {{ $data->latitude }};
    var longitude = {{ $data->longitude }};

function initMap(){
        var propertiPeta = {
            zoom: 16,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: {lat:latitude, lng:longitude},
        }
        //tampilkan maps
        var map = new google.maps.Map(document.getElementById('map'), propertiPeta);


        marker = new google.maps.Marker({
                                position: {lat:latitude, lng:longitude},
                                map: map,
                                zoom: 19,
                                icon:"https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",                      
        });
        
}


</script>

@endpush







