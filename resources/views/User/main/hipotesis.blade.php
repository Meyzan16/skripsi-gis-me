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

                 <h4 class="sidebar-title">HIPOTESIS KERAWANAN TITIK BERDASARKAN GEMPA LAMA</h4>       
            </center>
            </div><!-- End sidebar search formn-->

            

            <div class="sidebar-item recent-posts">

              <div class="card-body">
                <form class="form form-horizontal mdi-responsive" action="{{ route('chartDashboard') }}" method="POST" >
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
              <div>

                @if (Route::current()->getName() == 'chartDashboard')
                {!! $chartTerpilih->container() !!}   
                @else
                {!! $usersChart->container() !!}   
                @endif
              </div>

              <div class="mt-3">

              
              </div>
            </div><!-- End sidebar recent posts-->

          </div><!-- End Blog Sidebar -->

        </div>
      </div>

    </div>
  </section><!-- End Blog Details Section -->


@endsection



@push('addon-script')
   


    
    @if (Route::current()->getName() == 'chartDashboard')
    {!! $chartTerpilih->script() !!}   
    @else
    {!! $usersChart->script() !!}
    @endif
    


@endpush
