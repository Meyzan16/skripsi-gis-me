
@extends('admin.layout_admin.layout')

@section('content')
<div id="main-content">
<div class="page-heading">
    <h3>Profile Statistics</h3>
</div>

                            @if(session()->has('success'))
                                
                                    <div class="alert alert-success autohide" role="alert">
                                    {{ session('success') }}
                                    </div>    
                              
                            @endif

<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-12 col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Data titik</h6>
                                    <h6 class="font-extrabold mb-0">{{ $jml_titik }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Data Gempa</h6>
                                    <h6 class="font-extrabold mb-0">{{ count($data_gempa) }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
               
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Kategori</h4>
                        </div>
                        <div class="card-body">
                            <form class="form form-horizontal mdi-responsive" action="{{ route('chartDashboard') }}" method="POST" >
                                @csrf 
                                <div class="form-body">
                                        <div class="row">

                                                <div class="col-md-4">
                                                    <label>Pilih Data Gempa</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                   <select name="option_gempa" id="option_gempa" class="form-control">
 
                                                        <option value="">-- Pilih data --</option>   
                                                        @foreach ($data_gempa as $item)
                                                             <option value="{{ $item->id }}">{{ date("d F , Y", strtotime($item->tanggal)) }} | {{ $item->magnitude }} Mg</option>   
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
                            @if (Route::current()->getName() == 'chartDashboard')
                                {!! $chartTerpilih->container() !!}   
                            @else
                                {!! $usersChart->container() !!}   
                            @endif
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
        
  
  
    @endpush

