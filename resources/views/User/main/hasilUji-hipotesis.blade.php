@extends('User.app.app')

@section('content')
  <!-- ======= Blog Details Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row g-5">

        

        <div class="col-lg-12">

          <div class="sidebar">

            <div class="sidebar-item search-form">
             <center>

                 <h4 class="sidebar-title">STATISTIK KERAWANAN TITIK BERDASARKAN GEMPA LAMA</h4>       
            </center>
            </div><!-- End sidebar search formn-->

            

            <div class="sidebar-item recent-posts">

              <div class="card-body">
                <form class="form form-horizontal mdi-responsive" action="{{ route('user.data-uji-gempa-lama.uji-hipotesis') }}" method="POST" >
                    @csrf 
                    <div class="form-body">
                            <div class="row">

                                    <div class="col-md-4">
                                        <label>Pilih Data Titik</label>
                                    </div>

                                
                                        <div class="col-md-8 form-group  d-flex justify-content-end">
                                          <select name="option_titik" id="option_titik" class="form-control">

                                                <option value="">-- Pilih data --</option>   
                                                @foreach ($data_titik as $item)
                                                    <option value="{{ $item->id }}">{{ $item->alamat }}</option>   
                                                @endforeach

                                          </select>
                                        
                                            <button type="submit"  class="btn btn-primary mr-3">
                                            &nbsp;Cari
                                            </button>


                                        </div>
                                    
                                  
                </form>

            <div>

                        {{-- <div>
                            @if (Route::current()->getName() == 'chartDashboard')
                                {!! $chartTerpilih->container() !!}   
                            @else
                                {!! $usersChart->container() !!}   
                            @endif
                        </div> --}}

                                
                        <figure class="highcharts-figure mt-2">
                          <div id="container"></div>
                          <p class="highcharts-description text-center"> 
                          Berdasarkan hasil kalkulasi dari gempa gempa sebelumnya, statistik diatas memberikan
                          informasi tentang hipotesis tingkat kerawanan pada alamat ( 
                            {{ $dataGempaTerpilih->alamat }} )
                          agar masyarakat, pemerintah dan khalayak umum bisa mempertimbangkan proses pembangunan
                          infrastruktur, permukiman dan lain lain untuk keselamatan kita semua jika terjadi gempa gempa yang
                          tidak terduga dan berakbiat pada titik ini.

  
                           </p>
                        </figure>
            
                    



            </div><!-- End sidebar recent posts-->

          </div><!-- End Blog Sidebar -->

        </div>
      </div>

    </div>
  </section><!-- End Blog Details Section -->


@endsection

@php

  $dataGempaTerpilih = json_encode($dataGempaTerpilih);
  $calculasi = json_encode($calculasi);


@endphp

@push('addon-script')


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/themes/high-contrast-light.js"></script>


  

<script type="text/javascript">

    var aaa; 
    var dataArray = [];
    var populationArray = [];

    var dataGempaTerpilih = {!! $dataGempaTerpilih !!};

    aaa = {!! $calculasi !!};

    aaa.forEach(myFunction);
    function myFunction(item, index, arr) {
         populationArray.push(parseInt(item.kategori_name));
    }
    dataArray.push(populationArray);
 
    console.log(dataArray)

  

      

    var colors = Highcharts.getOptions().colors;

    Highcharts.chart('container', {


      chart: {
        type: 'spline'
      },

      legend: {
        symbolWidth: 40
      },

      title: {
        text: 'GRAFIK HIPOTESIS KERAWANAN'
      },

      subtitle: {
        text: dataGempaTerpilih.alamat
      },

      yAxis: {
        title: {
          text: 'Hipotesis Kerawanan'
        },
        accessibility: {
          description: 'Hipotesis Kerawanan'
        }
      },

      xAxis: {
        title: {
          text: 'Time'
        },
        accessibility: {
          description: 'Time from December 2010 to September 2019'
        },

        categories: 
        [

          
          <?php 
              $a = '';
            foreach($data_gempa as $item){
              $a = date("d M, Y", strtotime($item->tanggal));
              ?>
                ['<?php echo $a ;?> | <?= $item['magnitude'] ?> Mg'], 
            <?php
            }
            ?>  
              ]



      },

      tooltip: {
        valueSuffix: '%'
      },

      plotOptions: {
        series: {
          point: {
            events: {
              // click: function () {
              //   window.location.href = this.series.options.website;
              // }
            }
          },
          cursor: 'pointer'
        }
      },

      series: 
      
      [
        {
          name: dataGempaTerpilih.alamat,
          data: dataArray[0],
          color: colors[2],
          accessibility: {
            description: 'This is the most used screen reader in 2019.'
          }
        },  

        
      ],

      responsive: {
        rules: [{
          condition: {
            maxWidth: 550
          },
          chartOptions: {
            chart: {
              spacingLeft: 3,
              spacingRight: 3
            },
            legend: {
              itemWidth: 150
            },
            xAxis: {
              categories: ['Dec. 2010', 'May 2012', 'Jan. 2014', 'July 2015', 'Oct. 2017', 'Sep. 2019'],
              title: ''
            },
            yAxis: {
              visible: false
            }
          }
        }]
      }
    });
 

</script>
  
        








@endpush 
