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
                                    <div class="col-md-8 form-group">
                                       <select name="option_titik" id="option_titik" class="form-control">

                                            <option value="">-- Pilih data --</option>   
                                            @foreach ($data_titik as $item)
                                                 <option value="{{ $item->id }}">{{ $item->alamat }}</option>   
                                            @endforeach

                                       </select>
                                    </div>    
 
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit"  class="btn btn-primary me-1 mb-1">
                                        &nbsp;Cari
                                        </button>
                                    </div>
                </form>

            <div>

                    
                  
                          
                        <figure class="highcharts-figure">
                          <div id="container_before"></div>
                          <p class="highcharts-description"> </p>
                        </figure>
                
                    



            </div><!-- End sidebar recent posts-->

          </div><!-- End Blog Sidebar -->

        </div>
      </div>

    </div>
  </section><!-- End Blog Details Section -->


@endsection




@push('addon-script')


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/themes/high-contrast-light.js"></script>


<script type="text/javascript">
    var colors = Highcharts.getOptions().colors;

    Highcharts.chart('container_before', {
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
        text: 'Alamat : Belum Terpilih'
      },

      yAxis: {
        title: {
          text: 'Percentage usage'
        },
        accessibility: {
          description: 'Percentage usage'
        }
      },

      xAxis: {
        title: {
          text: 'Time'
        },
        accessibility: {
          description: 'Time from December 2010 to September 2019'
        },
        categories: [
          
          
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
             
            }
          },
          cursor: 'pointer'
        }
      },

      series: [
       {
            name: 'Silahkan pilih alamat terlebih dahulu',
            data: [69.6, 63.7, 63.9, 43.7, 66.0, 61.7],
            website: 'https://www.freedomscientific.com/Products/Blindness/JAWS',
            dashStyle: 'ShortDashDot',
            color: colors[0]
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
