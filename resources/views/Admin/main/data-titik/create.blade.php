
@extends('admin.layout_admin.layout')

@section('content')
<div id="main-content">
<div class="page-heading">
    <h3>Tambah Data Titik</h3>
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
                            <form class="form form-horizontal mdi-responsive" action="{{ route('data-titik.store') }}" method="POST" >
                                @csrf 
                                <div class="form-body">
                                        <div class="row">
                                            

                                                {{-- <div class="col-md-4">
                                                    <label>Kecamatan</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" class="form-control" name="kecamatan" id="kecamatan" value="" readonly>
                                                </div> --}}

                                                <div class="col-md-4">
                                                    <label>Ketinggian</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" maxlength="2" name="ketinggian" id="ketinggian" value="" required>
                                                </div>

                                                {{-- <div class="col-md-4">
                                                    <label>Geologi Fisik</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <select id="geologi_fisik" name="id_geologi_fisik" required style="border-radius: 30px" class="form-control @error('id_geologi_fisik') is-invalid @enderror" >
                                                        <option value="">--Pilih Data--</option>
                                                        @foreach ($geologiFisik as $geologi)
                                                            @if(old('id_geologi_fisik') == $geologi->id )
                                                              <option value="{{ $geologi->id }}" selected>{{ $geologi->kelas_informasi }}</option>      
                                                            @else
                                                              <option value="{{ $geologi->id }}">{{ $geologi->kelas_informasi }}</option>    
                                                            @endif
                                                        @endforeach
                                                      </select>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Kemiringan Lereng</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <select name="id_kemiringan_lereng" required style="border-radius: 30px" class="form-control @error('id_kemiringan_lereng') is-invalid @enderror" >
                                                        <option value="">--Pilih Data--</option>
                                                        @foreach ($kemiringanLereng as $lereng)
                                                            @if(old('id_kemiringan_lereng') == $lereng->id )
                                                              <option value="{{ $lereng->id }}" selected>{{ $lereng->kelas_informasi }}</option>      
                                                            @else
                                                              <option value="{{ $lereng->id }}">{{ $lereng->kelas_informasi }}</option>    
                                                            @endif
                                                        @endforeach
                                                      </select>
                                                </div> --}}

                                                <div class="col-md-4">
                                                    <label>Latitude</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" class="form-control" required name="latitude" id="lat" value="" readonly>
                                                       
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Longitude</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" class="form-control" required name="longitude" id="lng" value="" readonly>
                                                       
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Alamat</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" autocomplete="off" required class="form-control" name="location" id="location" value=""  >
                                                </div>                                         
                                                
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit"  class="btn btn-primary me-1 mb-1">
                                                    &nbsp;Simpan
                                                    </button>
                                                  

                                                    <a  href="{{ route('data-titik.index') }}"
                                                        class="btn btn-light-secondary me-1 mb-1">Kembali</a>
                                                </div>
                                            </form>

                                            

                                        <div class="row">
                                            <div class="col-sm-10 mt-2">
                                                <input
                                                id="searchInput"
                                                class="form-control"
                                                class="controls"
                                                type="text"
                                                placeholder="Cari Lokasi"
                                                autocomplete="off"
                                                />
                                            </div>

                                            <div class="col-sm-2 mt-2">
                                                <button type="button"  onclick="javascript:eraseText();" class="btn btn-secondary">
                                                    &nbsp;Refresh
                                                </button>
                                            </div>

                                        </div>

                                            <div id="map" style="height:400px; width: 900px;" class="my-3"></div>  
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

google.maps.event.addDomListener(window, 'load', initMap);

var marker;

function eraseText() {
     document.getElementById("location").value = "";
     document.getElementById("lat").value = "";
     document.getElementById("lng").value = "";
    //  document.getElementById("kecamatan").value = "";
     document.getElementById("ketinggian").value = "";
     document.getElementById("searchInput").value = "";
	}

function initMap() {
                //library informasi disimpan dalam variabel

                var infowindow = new google.maps.InfoWindow();
                //ambil id form input
                var input = document.getElementById('searchInput');
                var pathCoordinates = [];

                //simpan lat lng bengkulu di varibel
                var propertiPeta = {
                    zoom: 13,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    center: new google.maps.LatLng( -3.788892, 102.266579),
                    disableDefaultUI: false, // Disables the controls like zoom control on the map if set to true
                    scrollWheel: true, // If set to false disables the scrolling on the map.
                    draggable: true // If set to false , you cannot move the map around.
            
                }
                //tampilkan maps
                var map = new google.maps.Map(document.getElementById( 'map' ), propertiPeta);
            
                //buat marker
                marker = new google.maps.Marker({
                    map: map,
                    position: propertiPeta.center,
                    anchorPoint: new google.maps.Point(0, -29),
                    draggable: true
                });
 
    
                // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input); //berfungsi agar form pencarian ada dialam maps
                //library dari maps di simpan dalama variabel
                var autocomplete = new google.maps.places.Autocomplete(input);
                //tampilkan option tempat yang di cari
                autocomplete.bindTo('bounds', map);
                //jalanakan fucntion pencarian 
                autocomplete.addListener('place_changed', function()
                {
                    //setalah itu close informasi dalam input pencarian
                    infowindow.close();
                    //marker di set belum ditampilkan
                    marker.setVisible(false);
                    //library untuk segala informasi alamat
                    var place = autocomplete.getPlace();
                    //cek jika alamat yang di cari tidak ada atau location tidak ditemukan di library maps
                    if (!place.geometry || !place.geometry.location) {
                        window.alert("autocomplete returned place contains no geometry");
                        return;
                    }
                    //jika alamat nya ada maka tampilakan informasi pop up dan zoom maps nya
                    if(place.geometry.viewport){
                        map.fitBounds(place.geometry.viewport);
                    }else{
                        map.setCenter(place.geometry.location);
                        map.setZoom(17);
                    }
                    //setelah itu set icon 
                    marker.setIcon(({
                        // url:place.icon,
                        url: "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(35, 35)
                    }));
                    //set marker sesuai location yang dicari
                    marker.setPosition(place.geometry.location);
                    //dan marker nya ditampilkan
                    marker.setVisible(true);
                    //mengambil semua alamat dan disimpan dalam array
                    var address = '';
                    if (place.address_components) {
                        address = [
                        (place.address_components[0] && place.address_components[0].short_name || ''),
                        (place.address_components[1] && place.address_components[1].short_name || ''),
                        (place.address_components[2] && place.address_components[2].short_name || ''),
                        (place.address_components[3] && place.address_components[3].short_name || ''),
                        (place.address_components[4] && place.address_components[4].short_name || ''),
                        (place.address_components[5] && place.address_components[5].short_name || '')
                        ].join(' ');
                    }
                    //setelah itu tampilkan informasi dan ambil alamat yang sudah disimpan dalam variabel
                    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
                
                        //ambil  parameter yang di butuhkan dan simpan dalam form input 
                        // if(place.address_components){
                        //             document.getElementById('kecamatan').value = place.address_components[3].short_name;
                        // }
                            document.getElementById('location').value = place.formatted_address;
                            document.getElementById('lat').value = place.geometry.location.lat();
                            document.getElementById('lng').value = place.geometry.location.lng();
                    
                                              //setlah itu open map nya
                    infowindow.open(map, marker);
                });



                        //drag marker
                        google.maps.event.addListener(marker, 'dragend', function ( event ) 
                        {
                            var lat, long, address1, resultArray, citi;
                            // console.log( 'i am dragged' );
                            lat = marker.getPosition().lat();
                            long = marker.getPosition().lng();
                            var geocoder = new google.maps.Geocoder();
                            
                                    
                            geocoder.geocode( { latLng: marker.getPosition() }, function ( results, status ) {
                                if ( status == google.maps.GeocoderStatus.OK ) {  // This line can also be written like if ( status == google.maps.GeocoderStatus.OK ) {
                                    // console.log( results[0]);
                                    resultArray =  results[0].address_components;

                                    // Get the city and set the city input value to the one selected
                                    // for( var i = 0; i < resultArray.length; i++ ) {
                                    //     if ( resultArray[ i ].types[0] && 'administrative_area_level_3' === resultArray[ i ].types[0] ) {
                                    //         kecamatan = resultArray[ i ].short_name;
                                    //         document.getElementById('kecamatan').value = kecamatan;
                                    //     }
                                    // }
           

                                    document.getElementById('location').value = results[0].formatted_address;
                                    document.getElementById('searchInput').value = results[0].formatted_address;
                                    document.getElementById('lat').value = lat;
                                    document.getElementById('lng').value = long;
                                } else {
                                    console.log( 'Geocode was not successful for the following reason: ' + status );
                                }
                                // Closes the previous info window if it already exists
                                if ( infoWindow ) {
                                    infoWindow.close();
                                }
                                infoWindow = new google.maps.InfoWindow({
                                    content: address1
                                });
                                infoWindow.open( map, marker );
                            } );
                        });


                   

                jsonPolygon(map);
};




///fungsi untuk membuat polygon
function jsonPolygon(map){
                    var infowindow = new google.maps.InfoWindow();

                    let data = {!! json_encode($string)  !!};
                    console.log(data);

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







