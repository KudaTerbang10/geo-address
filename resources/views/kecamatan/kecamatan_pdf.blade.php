<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report Data Kecamatan</title>
<!-- CSS only -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body>
    <center>
       <h1>Laporan Data Kecamatan</h1>
    </center>
    <br>
    <div class="d-flex flex-row justify-content-center">
        <table class="table table-bordered justify-center">
            <thead>
              <tr>
                <th>No</th>
                <th>Kecamatan</th>
                <th>Kabupaten</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($kecamatan as $item)
                    <tr scope='row'>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_kecamatan }}</td>
                        <td>{{ $item->nama_kabupaten }}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</body>
</html>