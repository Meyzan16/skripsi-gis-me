@extends('User.app.app')

@section('content')
  <!-- ======= Blog Details Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row g-5">

        <div class="col-lg-6">

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
                            @foreach ($dataGempa_option as $item)
                                <option value="{{ $item->id }}">{{ $item->tanggal }}</option>   
                            @endforeach
                        </select>
                    </div>

                    <div class="col-2 ">
                        <button type="submit"  class="btn btn-primary me-1 mb-1">
                        &nbsp;Cari
                        </button>
                    </div>

                </div>
            </form>
      

            <div id="map" style="height:400px; width: 570px;" class="content my-3">
            </div> 
            

            <h4>{{ $dataGempa->wilayah }}</h4>

            <div class="meta-top">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html">John Doe</a></li>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01">Jan 1, 2022</time></a></li>
                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html">12 Comments</a></li>
              </ul>
            </div><!-- End meta top -->

            <div class="content">
                <p>
                  Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta.
                  Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.
                </p>

                <p>
                  Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.
                </p>          

            </div><!-- End post content -->

         

          </article><!-- End blog post -->

          

         

        </div>

        <div class="col-lg-6">

          <div class="sidebar">

            <div class="sidebar-item search-form">
              @php
                $tgl = $dataGempa->tanggal;
                $konversi = date("m F , Y", strtotime($tgl));
              @endphp
              <h4 class="sidebar-title">Gempa yang terpilih : {{ $konversi }}</h4>       
            </div><!-- End sidebar search formn-->

            

            <div class="sidebar-item recent-posts">
              <h3 class="sidebar-title">Hasil kalkulasi data titik</h3>

              <div class="mt-3">

              @foreach ($calculasi_tipologi as $dataa)  
                <div class="post-item mt-3">
                  
                  <div>
                    <h4><a href="blog-details.html">{{ $dataa->data_titik->alamat }}</a></h4>
                    <time >kategori rawan : {{ $dataa->kategori }} </time>
                  </div>
                </div><!-- End recent post item-->
                @endforeach


              
              

              </div>

            </div><!-- End sidebar recent posts-->

            

          </div><!-- End Blog Sidebar -->

        </div>
      </div>

    </div>
  </section><!-- End Blog Details Section -->

@endsection



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






</script>

@endpush
