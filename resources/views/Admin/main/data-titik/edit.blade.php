
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
                            <form class="form form-horizontal mdi-responsive" action="{{ route('data-titik.update', $data->id) }}" method="POST" >
                                @csrf @method('PATCH')
                                <div class="form-body">
                                        <div class="row">
                                                <div class="col-md-4">
                                                    <label>Kecamatan</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" class="form-control" name="kecamatan" id="kecamatan" value="{{  old('kecamatan', $data->kecamatan)  }}"" readonly>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Geologi Fisik</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <select name="id_geologi_fisik" required style="border-radius: 30px" class="form-control @error('id_geologi_fisik') is-invalid @enderror" >                                                      
                                                        @foreach ($geologiFisik as $geologi)
                                                            @if(old('id_geologi_fisik', $data->id_geologi_fisik) == $geologi->id )
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
                                                        @foreach ($kemiringanLereng as $lereng)
                                                            @if(old('id_kemiringan_lereng', $data->id_kemiringan_lereng) == $lereng->id )
                                                                <option value="{{ $lereng->id }}" selected>{{ $lereng->kelas_informasi }}</option>      
                                                            @else
                                                                <option value="{{ $lereng->id }}">{{ $lereng->kelas_informasi }}</option>    
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Latitude</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" class="form-control" value="{{  old('latitude', $data->latitude)  }}" name="latitude" id="lat"  readonly>
                                                       
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Longitude</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" class="form-control" name="longitude" id="lng" readonly value="{{  old('longitude', $data->longitude)  }}">
                                                       
                                                </div>

                                                 
                                                        
                                                
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="submit"  class="btn btn-primary me-1 mb-1">
                                                        &nbsp;Simpan
                                                    </button>
                                                  
                                                    <button type="reset" onclick="location.href='{{ route('data-titik.index') }}'"
                                                        class="btn btn-light-secondary me-1 mb-1">Kembali
                                                    </button>

                                                    
                                                </div>
                                </form>
                                            
                                            <input
                                            id="searchInput"
                                            class="form-control mt-2"
                                            class="controls"
                                            type="text"
                                            placeholder="Cari Lokasi"
                                            />
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

    var marker;
    
    var latitude = {{ $data->latitude }};
    var longitude = {{ $data->longitude }};

    function initMap() {
        //simpan lat lng bengkulu di varibel
        var propertiPeta = {
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: {lat:-3.788892, lng:102.266579}
        }
        //tampilkan maps
        var map = new google.maps.Map(document.getElementById('map'), propertiPeta);

        
        marker = new google.maps.Marker({
                            position: {lat:latitude, lng:longitude},
                            map: map,
                            icon:"https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",                      
        });
        
     
        //ambil id form input
        var input = document.getElementById('searchInput');
        // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input); //berfungsi agar form pencarian ada dialam maps
        //library dari maps di simpan dalama variabel
        var autocomplete = new google.maps.places.Autocomplete(input);
        //tampilkan option tempat yang di cari
        autocomplete.bindTo('bounds', map);
        //library informasi disimpan dalam variabel
        var infowindow = new google.maps.InfoWindow();
        //buat marker
        marker = new google.maps.Marker({
            map: map,
            anchorPoint: new google.maps.Point(0, -29)
        });
        //jalanakan fucntion pencarian 
        autocomplete.addListener('place_changed', function(){
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
                // url:"",
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
            //setlah itu open map nya
            infowindow.open(map, marker);

            //ambil  parameter yang di butuhkan dan simpan dalam form input 
            if(place.address_components){
                        document.getElementById('kecamatan').value = place.address_components[3].short_name;
            }
            document.getElementById('location').value = place.formatted_address;
            document.getElementById('lat').value = place.geometry.location.lat();
            document.getElementById('lng').value = place.geometry.location.lng();
        });

        // //jalankan function jika marker di klik
        google.maps.event.addListener(map, 'click', function(event) {
            buatMarker(this, event.latLng);
        });



    };


    //membuat marker dan ambil titik koordinat nya insert to form input
    function buatMarker(map, titikbaru){

        // var click = '';
        var autocomplete_click = new google.maps.places.Autocomplete(map);
        var place = autocomplete_click.getPlace();

        marker.setPosition(titikbaru);
          
        // isi nilai koordinat ke form
        document.getElementById("lat").value = titikbaru.lat();
        document.getElementById("lng").value = titikbaru.lng();
        document.getElementById('location').value = place.formatted_address;

    }

    google.maps.event.addDomListener(window, 'load', propertiPeta);

</script>   
@endpush







