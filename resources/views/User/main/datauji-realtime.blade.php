@extends('User.app.app')

@section('content')
  <!-- ======= Blog Details Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row g-5">

        

        <div class="col-lg-12">

          <div class="sidebar">

            <div class="sidebar-item search-form">
             
              <h4 class="sidebar-title">Data Gempa Bengkulu Terbaru</h4>       
            </div><!-- End sidebar search formn-->

            

            <div class="sidebar-item recent-posts">
              <h3 class="sidebar-title">Hasil kalkulasi data titik</h3>

              <div class="mt-3">

              
              </div>
            </div><!-- End sidebar recent posts-->

          </div><!-- End Blog Sidebar -->

        </div>
      </div>

    </div>
  </section><!-- End Blog Details Section -->


  

@endsection


{{-- 
@php
    $ambil_appdatatitik = json_encode($dataTitik);
@endphp

@push('prepand-script')
<script>

  
google.maps.event.addDomListener(window, 'load', initMap);


function initMap() {
            //simpan lat lng bengkulu di varibel
        
            let lat_gempa1 =   {{ $dataGempa->latitude; }};
            let lng_gempa1 =   {{ $dataGempa->longitude; }};

            var propertiPeta = {
                zoom: 8,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                center: new google.maps.LatLng( -3.788892, 102.266579),
                disableDefaultUI: false, // Disables the controls like zoom control on the map if set to true
                scrollWheel: true, // If set to false disables the scrolling on the map.
                draggable: true // If set to false , you cannot move the map around.
        
            }
            //tampilkan maps
            var map = new google.maps.Map(document.getElementById( 'map' ), propertiPeta);
            var marker_gempa = new google.maps.Marker({
                map: map,
                position:  {lat:lat_gempa1, lng:lng_gempa1},
                animation: google.maps.Animation.DROP,
                anchorPoint: new google.maps.Point(0, -29),
            });    

            marker_gempa.setAnimation(google.maps.Animation.BOUNCE);
                    

            var app_dataTitik = {!! $ambil_appdatatitik !!}

            showAll(map, app_dataTitik);

           

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






</script> --}}

{{-- @endpush --}}
