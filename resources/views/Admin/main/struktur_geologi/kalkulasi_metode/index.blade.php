
@extends('admin.layout_admin.layout')

@section('content')
<div id="main-content">
<div class="page-heading">
    <h3>Metode Haversine Distance</h3>
</div>

<div class="page-content">
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-8 col-12">
                <div class="card">

                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal mdi-responsive" action="{{ route('data-titik.store') }}" method="POST" >
                                @csrf 
                                <div class="form-body">
                                        <div class="row">

                                                <div class="col-md-4">
                                                    <label>Pilih Data Gempa</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                   <select name="" id="" class="form-control">
                                                    <option value="">2007</option>
                                                    <option value="">2009</option>
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

            


            <div class="col-md-4 col-12">
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
            </div>

            
     
    </section>
</div> 
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



            var app = <?php echo json_encode($dataTitik); ?>;
            showAll(map, app);
            
              

};

function showAll(map, app){
    var infowin = new google.maps.InfoWindow;

    Array.prototype.forEach.call(app, function(data){
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







