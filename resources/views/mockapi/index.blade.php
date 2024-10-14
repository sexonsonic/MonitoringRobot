<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Data </title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/responsive.dataTables.min.css">

    <style>
    .container.mt-5 {
    padding-top: 70px; /* Adjust based on the actual height of your navbar */
    margin-top: 2rem; /* Adjust the value for desired spacing */
}
    </style>
 
 
</head>
<body>

     <!-- NAVBAR-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg fixed-top animate__animated animate__fadeInDown">
          <div class="container">
            <a class="navbar-brand" href="#">User Data</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-right" id="navbarText">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" href="#Layanan">Layanan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#Tentang">Tentang</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#Staff">Staff</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#Kontak">Kontak Kami</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- END NAVBAR -->

    
    <div class="container mt-5">
      
        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Tipe Instansi</th>
                    <th>Nama Bot</th>
                    <th>Chat ID</th>
                    <th>Usage</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $user)
                    <tr>
                        <td>{{ $user['tipe'] ?? 'N/A' }}</td>
                        <td>{{ $user['namabot'] ?? 'N/A' }}</td>
                        <td>{{ $user['chatid'] ?? 'N/A' }}</td>
                        <td>{{ $user['usage'] ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha384-KJ3oAiL9yI6zDdM0D4kZgOY1CkA9i8Rt6h3bRzpV3PVRD9gFl59EJQCrFFk13X1L" crossorigin="anonymous"></script>
    
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRsQQxSFFwpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>

    <!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>   

    <script src="https://cdn.datatables.net/1.13.4/js/responsive.dataTables.min.js"></script>   

    
    <!-- Initialize DataTables -->
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true
            });
        });
    </script>

</body>
</html>