
@extends('admin.layout_admin.layout')

@section('content')
<div id="main-content">
<div class="page-heading">
    <h3>Data Uji Gempa Lama</h3>
</div>

<div class="page-content">
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-8 col-12">
                <div class="card">

                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal mdi-responsive" action="{{ route('admin.dataujigempa-lama.proses_metode') }}" method="POST" >
                                @csrf 
                                <div class="form-body">
                                        <div class="row">

                                                <div class="col-md-4">
                                                    <label>Pilih Data Gempa</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                   <select name="option_gempa" id="option_gempa" class="form-control">
 
                                                        <option value="">-- Pilih data --</option>   
                                                        @foreach ($dataGempa as $item)
                                                             <option value="{{ $item->id }}">{{ $item->tanggal }}</option>   
                                                        @endforeach

                                                   </select>
                                                </div>    

                                                
                      
                                                
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit"  class="btn btn-primary me-1 mb-1">
                                                    &nbsp;Cari
                                                    </button>
                                                  

                                                    <a  href="{{ route('data-titik.index') }}"
                                                        class="btn btn-light-secondary me-1 mb-1">Kembali</a>
                                                </div>
                                              
                                     
                            </form>
                                            
                                            <div
                                            id="map" style="height:400px; width: 900px;" class="my-3">
                                            </div>  

                        </div>

                    </div>




                        </div>

                    </div>

                           

                     
                </div>


            </div>

            


            {{-- <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="page-heading">
                                            <h5>Informasi Data</h5>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            
     
    </section>
</div> 
        @php
            $ambilData_titik = json_encode($dataTitik);
            $ambilData_gempa = json_encode($dataGempa);
        @endphp
@endsection

@push('addon-script')
<script>

google.maps.event.addDomListener(window, 'load', initMap);


function initMap() {
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
            
            
            // var mk1 = -3.75982765;
            // var mk2 = -4.517;
         
                    

            var app_dataTitik = {!! $ambilData_titik !!};
            // console.log(app_dataTitik);
            showAll(map, app_dataTitik);

           
            var app_dataGempa = {!! $ambilData_gempa !!};
            haversine_distance(map, app_dataTitik , app_dataGempa);
           

};



function showAll(map, app_dataTitik){
    var infowin = new google.maps.InfoWindow;
    Array.prototype.forEach.call(app_dataTitik, function(data){
        var marker = new google.maps.Marker({
                map: map,
                position:  new google.maps.LatLng(data.latitude, data.longitude),
                icon:"https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",                      
        });    
        

        marker.addListener('click', function(){
            infowin.setContent('<div><strong>' + data.alamat );
            infowin.open(map, marker);
        })

    });
}

function rad(x) {return x*Math.PI/180;}


// code dibawah untuk mencari jarak antar dua titik

// function haversine_distance(map, app_dataTitik, app_dataGempa) {

//       var R = 6371; // Radius of the Earth in miles
//       var tujuan_lat1 = app_dataTitik[0].latitude  //tujuan
//       var asal_lat2 = app_dataGempa[0].latitude  //asal 

//       var tujuan_lng = app_dataTitik[0].longitude //tujuan
//       var asal_lng = app_dataGempa[0].longitude //asal


//       var difflat = rad(asal_lat2 - tujuan_lat1); // Rdaerah asal dikurang tujuan
//       var dLong = rad(asal_lng - tujuan_lng); // Rdaerah asal dikurang tujuan

//       var a = Math.sin(difflat/2) * Math.sin(difflat/2) + Math.cos(rad(asal_lat2)) * Math.cos(rad(tujuan_lat1)) * Math.sin(dLong/2) * Math.sin(dLong/2);
//       var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
//       var d = R * c;
//       console.log(d);
//     //   var km = round(d * 1.609344, 2).' KM ';
//     //   console.log(km);
      
// }



function getCurrent(lat, lng) {

        var lat1 = lat; 
        var lon1 = lng;

        var lat2 = 42.741; 
        var lon2 = -71.3161; 

        Number.prototype.toRad = function() {
        return this * Math.PI / 180;
        }
        var R = 6371; // km 
        //has a problem with the .toRad() method below.
        var x1 = lat2-lat1;
        var dLat = x1.toRad();  
        var x2 = lon2-lon1;
        var dLon = x2.toRad();  
        var a = Math.sin(dLat/2) * Math.sin(dLat/2) + 
                        Math.cos(lat1.toRad()) * Math.cos(lat2.toRad()) * 
                        Math.sin(dLon/2) * Math.sin(dLon/2);  
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
        var d = R * c; 

        console.log(d);

        alert(d);
        var distance1 = d
        document.getElementById('distance').value = distance1;
}




</script>

@endpush







