<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/bs5/dt-2.1.8/r-3.0.3/sb-1.8.1/datatables.min.css" rel="stylesheet">
  </head>
  <body>
    
    <div clasa="container">
        <table id="myTable" class="table table-stripped">
            <tr>
                <th>Tipe Instansi</th>
                <th>Nama Bot</th>
                <th>Chat ID</th>
                <th>Usage</th>
            </tr>

            <tr>
            @foreach ($data as $user)
                <td>{{ $user['tipe'] }}</td>
                <td>{{ $user['namabot'] }}</td>
                <td>{{ $user['chatid'] }}</td>
                <td>{{ $user['usage'] }}</td>
            </tr>
            @endforeach
        </table>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-2.1.8/r-3.0.3/sb-1.8.1/datatables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
  </body>
</html>