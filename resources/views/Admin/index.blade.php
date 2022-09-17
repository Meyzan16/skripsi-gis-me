<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form class="form form-horizontal mdi-responsive" action="{{ route('test-lereng') }}" method="POST" >
        @csrf 
        <div class="form-body">
                <div class="row">
                    

                        <div class="col-md-4">
                            <label>ketinggian</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="ketinggian" id="ketinggian" value="" required>
                        </div>

                        <div class="col-md-4">
                            <label>jarak</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control"  name="jarak" id="jarak" value="" required>
                        </div>


                       

                                                               
                        
                        <div class="col-sm-12 d-flex justify-content-end">
                            <button type="submit"  class="btn btn-primary me-1 mb-1">
                            &nbsp;Simpan
                            </button>
                          

                           
                        </div>
                    </form>


</body>
</html>