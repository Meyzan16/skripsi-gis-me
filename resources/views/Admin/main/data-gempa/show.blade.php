
@extends('admin.layout_admin.layout')

@section('content')
<div id="main-content">
<div class="page-heading">
    <h3>Detail Data </h3>
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
                                                    <label>Tanggal</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="date" class="form-control" name="tanggal"  value="{{ $data->tanggal }}" readonly >
                                                </div>


                                                <div class="col-md-4">
                                                    <label>Latitude</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" class="form-control" value="{{ $data->latitude }} {{ $data->label_koor_lintang }}" readonly >
                                                </div>
                                            

                                                    <div class="col-md-4">
                                                        <label>Longitude</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" value="{{ $data->longitude }} {{ $data->label_koor_bujur }}" readonly > 
                                                    </div>
                                                 

                                                <div class="col-md-4">
                                                    <label>Magnitude</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text"  class="form-control"  value="{{ $data->magnitude }}" readonly >
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Kedalaman</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" class="form-control"  value="{{ $data->kedalaman }} KM" readonly>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Wilayah</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <textarea readonly class="form-control" id="" rows="3">{{ $data->wilayah }}</textarea>
                                                </div>


                                                <div class="col-md-4">
                                                    <label>Area Yang Dirasakan</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    @if($data->dirasakan != NULL)
                                                        <textarea readonly class="form-control" id="" rows="3">{{ $data->dirasakan }}</textarea>
                                                    @else
                                                        <textarea readonly class="form-control" id="" rows="3"> - </textarea>
                                                    @endif
                                                </div>
                
                                                
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <a type="reset" href="{{  route('data-gempa.index')  }}" 
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
            zoom: 8,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: {lat:-3.788892, lng:102.266579}
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







