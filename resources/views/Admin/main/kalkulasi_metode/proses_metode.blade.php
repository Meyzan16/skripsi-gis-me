
@extends('admin.layout_admin.layout')

@section('content')
<div id="main-content">
<div class="page-heading">
    <h3>Gempa Terpilih Tanggal   {{ date("m F , Y", strtotime($dataGempa->tanggal)) }}   </h3>
</div>

<div class="page-content">
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12">
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
                                                    <select name="option_gempa"  class="form-control">
 
                                                        <option value="">-- Pilih data --</option>   
                                                        @foreach ($dataGempa_option as $item)
                                                            <option value="{{ $item->id }}">{{ date("m F , Y", strtotime($item->tanggal)) }} | {{ $item->magnitude }} Mg</option>   
                                                        @endforeach

                                                   </select>
                                                </div>    
                                                
                      
                                                
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit"  class="btn btn-primary me-1 mb-1">
                                                    &nbsp;Cari
                                                    </button>
                                                  
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

            


            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-content" style="overflow: scroll; height:710px">
                        <div class="card-body">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="page-heading">
                                            <h5 class="text-center">Informasi Data Titik </h5>

                                            {{-- <h6>wilayah Gempa : {{ $dataGempa->wilayah }} </h6>
                                         
                                            <h6>Tahun :   {{ date("m F , Y", strtotime($item->tanggal)) }}   </h6> --}}

                                            @foreach ($calculasi_tipologi as $dataa)
                                                <br>{{ $dataa->data_titik->alamat }} <br> kategori rawan : {{ $dataa->kategori }}  | 
                                                
                                                @if($dataa->id_tipologi!= null)
                                                   
                                                    tipologi kawasan : {{   $dataa->tipologi_kawasan->informasi_tipologi->tipologi  }} | 
                                                @else
                                                        Tipologi Kawasan : Tidak ada |
                                                @endif

                                                
                                                @if($dataa->label_tipologi == 'N')    
                                                    <a href="" style="color:goldenrod" data-bs-toggle="modal" data-bs-target="#informasi_penting{{ $dataa->id_titik }}"> informasi penting, klik disini</a> | 
                                                @endif


                                                <a class="badge bg-warning"   data-bs-toggle="modal" data-bs-target="#edit_data{{ $dataa->id_titik }}">  <i class="fa fa-edit"> </i> Detail </a> <br>

                                                @endforeach 
                                    
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            
     
    </section>
</div> 

@foreach ($calculasi_tipologi as $item1)
<div class="modal fade" id="edit_data{{ $item1->id_titik  }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="exampleModalCenterTitle"> Detail Data {{ $item1->data_titik->alamat }} --}}
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>

            <div class="modal-body">
                <h6>Kecamatan : {{ $item1->data_titik->kecamatan }}</h6>
                <h6>Geologi Fisik : {{ $item1->data_titik->geologi_fisik->kelas_informasi }}</h6>
                <h6>Kemiringan Lereng : {{ $item1->data_titik->kemiringan_lereng->kelas_informasi }}</h6>

                

                <h6>Hasil PGA : {{ round($item1->hasil_pga,2) }} g</h6>
                <h6>Jarak Dalam KM dari pusat Gempa : {{ $item1->hasil_jarak_struktur_geologi }}</h6>
                <h6>Kategori wilayah  : {{ $item1->kategori }} </h6>

                @if($item1->id_tipologi!= null)
                    <h6>Tipe Bangunan : {!! $item1->tipologi_kawasan->informasi_tipologi->informasi_tipologi !!}</h6>       
                @else
                    <h6>Tipologi Kawasang : Tidak ada </h6>
                @endif


               
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

@push('addon-script')
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








