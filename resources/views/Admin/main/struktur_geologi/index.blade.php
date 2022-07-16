
@extends('admin.layout_admin.layout')

@section('content')
<div id="main-content">
    <div class="page-heading">
        <h3>Informasi Struktur Geologi</h3>
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
                                    <th>Kelas Informasi</th>
                                    <th>NILAI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>> 1000 M jauh dari zoan sesar</td>
                                    <td>1
                                    </td>   
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Dekat dengan zona sesar (100 - 1000 M dai zona sesar)
                                        </td>
                                    <td>2
                                    </td>   
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Pada zona sesar (< 100 M )</td>
                                    <td>3
                                    </td>   
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
        </section>
    </div>
        

@endsection


