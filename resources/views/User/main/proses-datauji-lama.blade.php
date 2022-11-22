@extends('User.app.app')

@section('content')
  <!-- ======= Blog Details Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row">

          <div class="col-lg-4">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">

                            <article class="blog-details">
                    
                                    <form action="{{ route('user.data-uji-gempa-lama.proses-kalkulasi') }}" method="POST" >
                                        @csrf 
                                        <div class="row col-12">
                                    
                                            <h5 class="sidebar-title">Pilih Data Gempa</h5>

                                            <div class="col-10 ">
                                                <select name="option_gempa" id="option_gempa" class="form-control">
                                                    <option value="">-- Pilih data --</option>   
                                                    @foreach ($dataGempa_option as $item)
                                                        <option value="{{ $item->id_gempa }}"> {{ date("d F , Y", strtotime($item->tanggal)) }} | {{ $item->magnitude }} Mg</option>   
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
                                    <div id="map" style="height:400px; width: 500;" class="content my-3"></div> 
                                    
                                    <h5>{{ $dataGempa->wilayah }}</h5>
                                   
                                    <div class="content">
                                        <p>
                                            Gempa berkekuatan magnitudo {{ $item['magnitude'] }}
                                            dengan kedalaman {{ $item['kedalaman'] }} KM yang terjadi di {{ $dataGempa->wilayah }}.
                                            Area yang terasa {{ $dataGempa->dirasakan }}
                                        </p>
                                    </div><!-- End post content -->
                            </article><!-- End blog post -->
                        </div>
                    </div>
                </div>
            </div>


          <div class="col-lg-8">
            <div class="sidebar" style="overflow: scroll; height:760px">
                  <div class="sidebar-item search-form">
                    @php
                      $tgl = $dataGempa->tanggal;
                      $konversi = date("d F , Y", strtotime($tgl));
                    @endphp
                    <h4 class="sidebar-title">Gempa yang terpilih : {{ $konversi }}</h4>       
                    <h6 class="sidebar-title mt-2">Magnitude : {{ $dataGempa->magnitude }} Mg</h6>       
                  </div><!-- End sidebar search formn-->

                  <div class="sidebar-item recent-posts">
                    <h3 class="sidebar-title">Hasil kalkulasi data titik</h3>
                    <div class="mt-3">
                        @foreach ($calculasi_tipologi as $dataa)  
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
                                      <h4>{{ $dataa->data_titik->alamat }}</h4>
                                      <time class="{{ $a }}">kategori rawan : {{ $dataa->kategori }} | 
                                        
                                               @if($dataa->id_tipologi!= null)
                                                    tipologi kawasan : {{   $dataa->tipologi_kawasan->informasi_tipologi->tipologi  }} |
                                                @else
                                                        Tipologi Kawasang : Tidak ada |
                                                @endif
                                                

                                          <a href="" class="{{ $a; }}" data-bs-toggle="modal" data-bs-target="#saran_bangunan{{ $dataa->id_titik }}"> tipe saran bangunan, klik disini </a> |
                                

                                           @if($dataa->label_tipologi == 'N')    
                                                  
                                                <a href="" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#informasi_penting{{ $dataa->id_titik }}"> informasi penting, klik disini</a> | 
                                            @endif

                                          <a href="" class="badge bg-primary"   data-bs-toggle="modal" data-bs-target="#edit_data{{ $dataa->id_titik }}">  <i class="fa fa-edit"> </i> Detail </a> </time>
                          
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


  @foreach ($calculasi_tipologi as $item1)
  <div class="modal fade" id="edit_data{{ $item1->id_titik  }}" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
          role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h6  id="exampleModalCenterTitle"> Alamat {{ $item1->data_titik->alamat }}
                  </h6>

              </div>
  
              <div class="modal-body">
                  <h6>Geologi Fisik : {{ $item1->data_titik->geologi_fisik->kelas_informasi }}</h6>
                  <h6>Kemiringan Lereng : {{ $item1->data_titik->kemiringan_lereng->kelas_informasi }}</h6>
                  <h6>Percepatan Tanah Maksimum : {{ round($item1->hasil_pga,2) }} g</h6>
                  <h6>Jarak dari pusat Gempa : {{ $item1->hasil_jarak_struktur_geologi }} KM</h6>
                 
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


  {{-- saran bangunan --}}
  @foreach ($calculasi_tipologi as $item1)
  <div class="modal fade bd-example-modal-lg" id="saran_bangunan{{ $item1->id_titik  }}" tabindex="-1" role="dialog"
      aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
          role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h6  id="myLargeModalLabel"> Alamat {{ $item1->data_titik->alamat }}
                  </h6>

              </div>
  
              <div class="modal-body">
                  @if(empty($item1->id_tipologi ))
                      <center>
                        <h6>Informasi tipe bangunan : tidak ada </h6>  
                        </center>
                  @else
                      <h6>{!! $item1->tipologi_kawasan->informasi_tipologi->informasi_tipologi !!}</h6>       
                  @endif   
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
  @endforeach

  {{-- informasi penting --}}
  @foreach ($calculasi_tipologi as $item2)
  <div class="modal fade bd-example-modal-lg" id="informasi_penting{{ $item2->id_titik  }}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h6  id="myLargeModalLabel"> 
                  Informasi Penting
                </h6>

            </div>

            <div class="modal-body">
                
                    <center>
                      <h6> Hasil kalkulasi dari data gempa yang terpilih menginformasi bahwasanya
                           data titik dengan<br> alamat {{ $item2->data_titik->alamat }} <br> 
                           diperlukan nya justifikasi dilapangan secara lanjut untuk mendukung hipotesis ini  </h6>  
                    </center>
                   
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
  @endforeach


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
