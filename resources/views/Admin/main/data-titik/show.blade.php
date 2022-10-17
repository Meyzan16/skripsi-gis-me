
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
                                                    <label>Geologi Fisik</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" class="form-control"  value="{{ $data->geologi_fisik->kelas_informasi }}" readonly >
                                                </div>
                                                    
                                                
                                                <div class="col-md-4">
                                                    <label>Kemiringan Lereng</label>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <input type="text" class="form-control"  value="{{ $data->kemiringan_lereng->kelas_informasi }}" readonly >
                                                </div>

                                                <div class="col-md-2 form-group mt-2">
                                                    <a class="badge bg-warning"   data-bs-toggle="modal" data-bs-target="#edit_data{{ $data->id }}">  <i class="fa fa-eye"> </i>  </a>
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

<div class="modal fade" id="edit_data{{ $data->id  }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Informasi Kemiringan Lereng
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>


                <div class="modal-body">
                    <h6 class="modal-title" id="exampleModalCenterTitle"> Jarak Vertikal : {{ $data->jarak }} M </h6>

                    <h6 class="modal-title" id="exampleModalCenterTitle"> Ketinggian Horizontal : {{ $data->ketinggian }} M </h6>
                    
                    <h6 class="modal-title" id="exampleModalCenterTitle"> Kemiringan : {{ $data->derajat_kemiringan * 100 }}  </h6>
                </div>

             
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Kembali</span>
                    </button>                 
                </div>
        </div>
    </div>
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

                    jsonPolygon(map);

    
        
}


///fungsi untuk membuat polygon
function jsonPolygon(map){
                    var infowindow = new google.maps.InfoWindow();

                    let data = {!! json_encode($string)  !!};
                    // console.log(data);
                    for (let s = 0; s < data['features'].length; s++) {
                    var pathCoordinates = [];            

                    for (let i = 0; i < data['features'][s]['geometry']['coordinates'].length; i++) {
                        for (let y = 0; y < data['features'][s]['geometry']['coordinates'][i].length; y++) {
                            for (let z = 0; z < data['features'][s]['geometry']['coordinates'][i][y].length; z++) {
                                pathCoordinates.push({
                                    lat: data['features'][s]['geometry']['coordinates'][i][y][z][1],
                                    lng: data['features'][s]['geometry']['coordinates'][i][y][z][0]
                                });
                            }
                        }
                    }
                                
                    var polygon = new google.maps.Polygon({
                        paths: pathCoordinates,
                        strokeColor: data['features'][s]['properties']['warna'],
                        strokeOpacity: 1.0,
                        strokeWeight: 3.0,
                        fillColor: data['features'][s]['properties']['warna'],
                        fillOpacity: 0.3,
                        map: map,
                        name: data['features'][s]['properties']['batuan'],
                        value: data['features'][s]['properties']['nilai'],
                    });
                    polygon.setMap(map);
                 
                    google.maps.event.addListener(polygon, 'click', function ( event ) {
                            var contentString = "jenis batuan : " + this.name + "<br> nilai kemampuan : "+this.value+"" ;

                            infowindow.setContent(contentString);
                            infowindow.setPosition(event.latLng);
                            infowindow.open(map);         
                    });
                }

            

}



</script>

@endpush







