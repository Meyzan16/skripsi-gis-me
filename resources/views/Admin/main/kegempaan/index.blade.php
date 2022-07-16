
@extends('admin.layout_admin.layout')

@section('content')
<div id="main-content">
    <div class="page-heading">
        <h3>Informasi Kegempaan</h3>
    </div>

   
    <div class="page-content">
            <section class="section">
                <div class="card">
                    <div class="card-header text-right">


                    </div>

                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>MMI</th>
                                    <th>PGA</th>
                                    <th>RICHTER</th>
                                    <th>NILAI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->MMI }}</td>

                                    <td>{{ $item->PGA }} g
                                    </td>

                                    <td>{{ $item->richter }}</td>   
                                    <td>{{ $item->nilai_kemampuan }}</td>   
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </section>
    </div>
        

@endsection


