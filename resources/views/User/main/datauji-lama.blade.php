@extends('User.app.app')

@section('content')
  <!-- ======= Blog Details Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row g-5">

        <div class="col-lg-8">

          <article class="blog-details">


            {{-- <div class="post-img">
              <img src="/template-user/assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
            </div> --}}

   
            <form action="{{ route('user.data-uji-gempa-lama.proses-kalkulasi') }}" method="POST" >
                @csrf 
                <div class="row col-12">
            
                    <h5 class="sidebar-title">Pilih Data Gempa</h5>

                    <div class="col-10 ">
                        <select name="option_gempa" id="option_gempa" class="form-control">
                            <option value="">-- Pilih data --</option>   
                            @foreach ($dataGempa as $item)
                                <option value="{{ $item->id }}">{{ date("m F , Y", strtotime($item->tanggal)) }} | {{ $item->magnitude }} Mg</option>   
                            @endforeach

                        </select>
                    
                    </div><!-- End sidebar search formn-->

                    <div class="col-2 ">
                        <button type="submit"  class="btn btn-primary me-1 mb-1">
                        &nbsp;Cari
                        </button>
                    </div>

                </div>
            </form>
      

            
            

            <h2 class="title">Data titik yang tersedia</h2>

            
            <div class="content">

                <div id="map" style="height:400px; width: 800px;" class="content my-3">
                </div> 


              <p>
                Data titik yang telah tersedia di atas merupakan titik data uji yang telah di siapkan oleh pakar geologi 
                untuk menguji dan mengetahui tingkat kerawanan yang mewakili setiap kecamatan dalam kota bengkulu
              </p> 
            </div><!-- End post content -->
          </article><!-- End blog post -->
        </div>        
      </div>

    </div>
  </section><!-- End Blog Details Section -->

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


</script>

@endpush