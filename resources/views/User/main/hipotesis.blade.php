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
                                       <select name="option_gempa" id="option_gempa" class="form-control">

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

                        {{-- <div>
                            @if (Route::current()->getName() == 'chartDashboard')
                                {!! $chartTerpilih->container() !!}   
                            @else
                                {!! $usersChart->container() !!}   
                            @endif
                        </div> --}}

              
              <figure class="highcharts-figure">
                <div id="container"></div>
                <p class="highcharts-description">Line chart demonstrating some accessibility features of Highcharts. The chart displays the most commonly used screen readers in surveys taken by WebAIM from December 2010 to September 2019. JAWS was the most used screen reader until 2019, when NVDA took over. VoiceOver is the third most used screen reader, followed by Narrator. ZoomText/Fusion had a surge in 2015, but usage is otherwise low. The overall use of other screen readers has declined drastically the past few years.</p>
              </figure>

              <div class="mt-3">

              
              </div>


            </div><!-- End sidebar recent posts-->

          </div><!-- End Blog Sidebar -->

        </div>
      </div>

    </div>
  </section><!-- End Blog Details Section -->


@endsection

@php
    $ambil_appdatatitik = json_encode($data_gempa);
@endphp

@push('addon-script')


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/themes/high-contrast-light.js"></script>

{{-- @push('addon-script')
   

    <script>
        window.setTimeout(function() {
            $(".autohide").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 4000);
    </script>	
        
        @if (Route::current()->getName() == 'chartDashboard')
        {!! $chartTerpilih->script() !!}   
        @else
        {!! $usersChart->script() !!}
        @endif
        
  
  
    @endpush --}}



<script type="text/javascript">

var userData = {!! $ambil_appdatatitik !!};




var colors = Highcharts.getOptions().colors;

Highcharts.chart('container', 

{
  chart: {
    type: 'spline'
  },

  legend: {
    symbolWidth: 40
  },

  title: {
    text: 'Statistik Kerawanan Data Titik'
  },

  // subtitle: {
  //   text: 'Source: WebAIM. Click on points to visit official screen reader website'
  // },

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

    categories: 

      // [
      // <?php    
      //   foreach($data_gempa as $item){
      //   ?>
      //        ['<?php echo $item['tanggal'];?> | <?php echo $item['magnitude'];?>'], 
            
      //   <?php
      //   }
      //   ?>  
      // ]

       // [
        //     userData.forEach(mobile => {
        //       // for (let key in mobile) 
        //       // {
        //         // console.log(`${key}: ${mobile[key]}`)
        //         var data = `${mobile.tanggal}`
        //         console.log(data);
                
                  
        //         // '`${mobile.tanggal}`'
        //         //}
        //         [
        //           document.write(data)
        //         ]
        //   })
        // ]

          
        
       // })
  
        
         


  },

  tooltip: {
    valueSuffix: '%'
  },

  plotOptions: {
    series: {
      // point: {
      //   events: {
      //     click: function () {
      //       window.location.href = this.series.options.website;
      //     }
      //   }
      // },
      cursor: 'pointer'
    }
  },

  series:

      [
         <?php    
        foreach($calculasi as $item){
        ?>
            $data
             {
                 // $data = $item->kategori_name;
     
                   name: ['<?php echo $item['tanggal'];?>'],
                   data: [3,2,1],
                   website: 'https://www.nvaccess.org',
                   color: colors[2],
                   accessibility: {
                     description: 'This is the most used screen reader in 2019.'
                   }
            }
            
        <?php
        }
        ?>

          
    
          
      ],
  
 
                  
       
    
    // , {
    //   name: 'JAWS',
    //   data: [69.6, 63.7, 63.9],
    //   website: 'https://www.freedomscientific.com/Products/Blindness/JAWS',
    //   dashStyle: 'Dash',
    //   color: colors[0]
    // }, {
    //   name: 'VoiceOver',
    //   data: [20.2, 30.7, 36.8],
    //   website: 'http://www.apple.com/accessibility/osx/voiceover',
    //   dashStyle: 'ShortDot',
    //   color: colors[1]
    // }, 
    // {
    //   name: 'Narrator',
    //   data: [null, null, null, null, 21.4, 30.3],
    //   website: 'https://support.microsoft.com/en-us/help/22798/windows-10-complete-guide-to-narrator',
    //   dashStyle: 'Dash',
    //   color: colors[9]
    // }, 
    // {
    //   name: 'ZoomText/Fusion',
    //   data: [6.1, 6.8, 5.3, 27.5, 6.0, 5.5],
    //   website: 'http://www.zoomtext.com/products/zoomtext-magnifierreader',
    //   dashStyle: 'ShortDot',
    //   color: colors[5]
    // }, 
    // {
    //   name: 'Other',
    //   data: [42.6, 51.5, 54.2, 45.8, 20.2, 15.4],
    //   website: 'http://www.disabled-world.com/assistivedevices/computer/screen-readers.php',
    //   dashStyle: 'ShortDash',
    //   color: colors[3]
    // }
  

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
          categories: ['Dec. 2010', 'May 2012', 'Jan. 2014'],
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
