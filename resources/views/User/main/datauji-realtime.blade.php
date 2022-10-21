@extends('User.app.app')

@section('content')
  <!-- ======= Blog Details Section ======= -->
  <section id="blog" class="blog ">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
    
      @foreach($dataArray as $item)
      <div class="row mt-3">
          <div class="col-lg-4">
            <div class="card">
              <div class="card-content">
                  <div class="card-body">
                  <article class="blog-details">


                          <div id="map" style="height:400px; width: 500;" class="my-3"></div> 

                          
                          <h5>{{ $item['wilayah'] }}</h5>
                          <div class="meta-top">
                            <ul>
                              <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01">{{ $item['tanggal'] }}</time></a></li>
                              <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01">{{ $item['jam'] }}</time></a></li>
                            </ul>
                          </div><!-- End meta top -->
                          <div class="content">
                            <h6>Bengkulu, BMKG</h6> 
                              <p>
                                  Gempa berkekuatan magnitudo {{ $item['magnitude'] }}
                                  dengan kedalaman {{ $item['kedalaman'] }} KM yang terjadi di {{ $item['wilayah'] }}. <br>
                                  Area yang dirasakan : {{ $item['dirasakan'] }}
                              </p>
                          </div><!-- End post content -->
                  </article><!-- End blog post -->
                  
              </div>
            </div>
          </div>
          </div>

          <div class="col-lg-8 ">
            <div class="sidebar " style="overflow: scroll; height:800px">
                  <div class="sidebar-item search-form">
                    <h4 class="text-center sidebar-title">INFORMASI </h4>      
                    <p class="mt-2 text-center">
                      Dari gempa yang terjadi, maka didapatkan informasi tingkat kerawanan pada setiap titik sebagai berikut
                  </div><!-- End sidebar search formn-->

                  <div class="sidebar-item recent-posts">
                    <div class="mt-3">
                        @foreach ($hasilGempaTerbaru[$item['wilayah']] as $dataa)  
                          <div class="post-item mt-3">
                            <div> 
                                      @php
                                        $a = '';   
                                      if($dataa['kategori'] == 'rendah')
                                            $a = "text-success";
                                      elseif($dataa['kategori'] == 'sedang')
                                            $a = "text-warning";
                                      else
                                            $a = "text-danger";
                                      @endphp

                                      <h4>{{ $dataa['alamat'] }}</h4>
                                      <time class={{ $a }}> kategori rawan : {{ $dataa['kategori'] }}  | Jarak dari pusat gempa : {{ $dataa['jarak'] }} KM | Percepatan Tanah : {{ round($dataa['hasil_pga_detik'], 2) }} cm/s² |
                                      <a href="" class="badge bg-primary"   data-bs-toggle="modal" data-bs-target="#edit_data{{ $dataa['id_titik'] }}">  <i class="fa fa-edit"> </i> Detail Data </a> </time>
                            </div>
                          </div><!-- End recent post item-->
                        @endforeach
                    </div>
                  </div><!-- End sidebar recent posts-->
            </div><!-- End Blog Sidebar -->
          </div>
      </div>
      @endforeach
    </div>
  </section><!-- End Blog Details Section -->


  @foreach ($hasilGempaTerbaru[$item['wilayah']] as $item1)
  <div class="modal fade" id="edit_data{{ $item1['id_titik']  }}" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
          role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h6  id="exampleModalCenterTitle"> Alamat {{ $item1['alamat'] }}
                  </h6>

              </div>
  
              <div class="modal-body">
                @php
                  $b = "";
                  if($item1['nilai_kemampuan_lereng'] === 1)
                  {
                      $b = "Datar – landai ";
                  }elseif($item1['nilai_kemampuan_lereng'] === 2){
                      $b = "Miring – Agak Curam ";
                  }elseif($item1['nilai_kemampuan_lereng'] === 3){
                      $b = "Curam – sangat curam ";
                  } else{
                      $b = "Terjal";
                  }
                @endphp


                <h6>Geologi Fisik (Bebatuan) : {{ $item1['bebatuan'] }}</h6>
                <h6>Kemiringan Lereng : {{ $b }}</h6>
                </div>
  
              <form>         
                  <div class="modal-footer">
              
                      <button type="button" class="btn btn-light-secondary"
                              data-bs-dismiss="modal">
                              <i class="bx bx-x d-block d-sm-none"></i>
                              <span class="d-none d-sm-block">Kembali</span>
                          </button>
                      
                  </div>
              </form>
  
          </div>
      </div>
  </div>
  @endforeach
@endsection


@php
    $ambil_appdatatitik = json_encode($dataTitik);
    $aaa = json_encode($dataArray);
@endphp

@push('prepand-script')

<script>

  
google.maps.event.addDomListener(window, 'load', initMap);


function initMap() {
            //simpan lat lng bengkulu di varibel
            
              let lat_gempa1 =   -3.83;
              let lng_gempa1 =   103.68;

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
