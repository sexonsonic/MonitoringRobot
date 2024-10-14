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

 
 
 
</head>
<body>
    
    <div class="container mt-5">
        <h2 class="mb-4">User Data</h2>
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