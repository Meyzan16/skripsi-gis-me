<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Load file library jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <!-- Load file library Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    
    <!-- Load file library JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
 <table class="table mt-5">
    <thead class="">
      <tr>
        <th>Tanggal</th>
        <th>Tanggal</th>
        <th>Jam</th>
        <th>latitude</th>
        <th>longitude</th>
        <th>magnitude</th>
        <th>kedalaman</th>
        <th>wilayah</th>
        <th>area yang dirasakan</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($properties as $item)
        
            <tr>

                <td>{{ $loop->iteration }}</td>
                <td>{{ $item['tanggal'] }}</td>
                <td>{{ $item['jam'] }}</td>
                <td>{{ $item['lat'] }}</td>
                <td>{{ $item['lng'] }}</td>
                <td>{{ $item['magnitude'] }}</td>
                <td>{{ $item['kedalaman'] }}</td>
                <td>{{ $item['wilayah'] }}</td>
                <td>{{ $item['dirasakan'] }}</td>
            </tr>
    @endforeach
     
    </tbody>
  </table>
</div>

</body>
</html> 