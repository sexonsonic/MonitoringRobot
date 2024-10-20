<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Data </title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/responsive.dataTables.min.css">


</head>

<body>

    <!-- NAVBAR-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg fixed-top animate__animated animate__fadeInDown">
        <div class="container">
            <a class="navbar-brand" href="#">User Data</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-right" id="navbarText">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#UsageTotal">Usage Total</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#myTable">Data Pengguna</a>
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

    <!-- CONTENT -->
    <div class="container mt-5 pt-5">
        <!-- START CHART -->
        <div class="row">
            <!-- CHART USAGE TOTAL -->
            <div id="UsageTotal" class="col-md-6">
                <center>
                    <h3>Usage Keseluruhan</h3>
                </center>
                <canvas id="overallUsageChart" width="400" height="150"></canvas>
            </div>
            <!-- END CHART USAGE TOTAL -->

            <!-- START CHART USAGE DAILY -->
            <div id="UsageHarian" class="col-md-6">
                <?php
$groupedData2 = [];
foreach ($data2 as $user2) {
    $botName2 = $user2['namabot'];
    if (!isset($groupedData2[$botName2])) {
        $groupedData2[$botName2] = [
            'namabot' => $botName2,
            'dailyUsage' => 0,
        ];
    }
    $groupedData2[$botName2]['dailyUsage'] += $user2['usage'];
}
                ?>

                <?php
$dailyUsageData = []; // Menyimpan data harian
usort($groupedData2, function ($a, $b) {
    return $b['dailyUsage'] <=> $a['dailyUsage'];
});
$top5DailyUsage = array_slice($groupedData2, 0, 5); // Ambil 5 penggunaan harian tertinggi
foreach ($top5DailyUsage as $item) {
    $dailyUsageData[] = [
        'namabot' => $item['namabot'],
        'dailyUsage' => $item['dailyUsage'],
    ];
}
                ?>
                <center>
                    <h3>Usage Hari Ini</h3>
                </center>
                <canvas id="dailylUsageChart" width="400" height="150"></canvas>
            </div><br><br>
            <!-- END CHART DAILY USAGE -->
        </div>
        <!-- END CHART -->

        <!-- START TABLE -->
        <div class="TabelUsage mt-5">
            <center>
                <h3>Data Pengguna Robot</h3>
            </center>
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>Tipe Instansi</th>
                        <th>Nama Bot</th>
                        <th>Total Usage</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$groupedData = [];
foreach ($data as $user) {
    $botName = $user['namabot'];
    if (!isset($groupedData[$botName])) {
        $groupedData[$botName] = [
            'tipe' => $user['tipe'],
            'namabot' => $botName,
            'totalUsage' => 0,
        ];
    }
    $groupedData[$botName]['totalUsage'] += $user['usage'];
}
                ?>

                    <?php foreach ($groupedData as $botName => $item): ?>
                    <tr data-bs-toggle="modal" data-bs-target="#botDetailsModal" data-bot-name="<?= $botName ?>">
                        <td><?= $item['tipe'] ?></td>
                        <td><?= $item['namabot'] ?></td>
                        <td><?= $item['totalUsage'] ?></td>
                        <td></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- END TABLE -->

        <!-- Function Chart Total Usage -->
        <?php
usort($groupedData, function ($a, $b) {
    return $b['totalUsage'] <=> $a['totalUsage'];
});
$top5Usage = array_slice($groupedData, 0, 5);
        ?>
        <!-- End Function Chart Total Usage -->

        <!-- Start Modal Details -->
        <div class="modal fade" id="botDetailsModal" tabindex="-1" aria-labelledby="botDetailsModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="botDetailsModalLabel">Detail Bot</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body">
                        <table id="botDetailsTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Chat ID</th>
                                    <th>Usage</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Modal Detail -->
        <!-- End Table -->


    </div>
    <!-- END CONTENT -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha384-KJ3oAiL9yI6zDdM0D4kZgOY1CkA9i8Rt6h3bRzpV3PVRD9gFl59EJQCrFFk13X1L" crossorigin="anonymous">
        </script>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRsQQxSFFwpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>

    <!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.4/js/responsive.dataTables.min.js"></script>

    <!-- Chart JS   -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <!-- Initialize DataTables -->
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable({
                responsive: true
            });

            // Event untuk menangani klik pada baris tabel
            $('#myTable tbody').on('click', 'tr', function () {
                var botName = $(this).find('td:nth-child(2)').text(); // Ambil nama bot dari kolom kedua

                // Filter data dari array asli sesuai dengan bot yang diklik
                var botDetails = <?php echo json_encode($data); ?>.filter(function (user) {
                    return user.namabot === botName;
                });

                // Kosongkan isi tabel modal sebelumnya
                var modalBody = $('#botDetailsTable tbody');
                modalBody.empty();

                // Tambahkan data bot ke tabel modal
                botDetails.forEach(function (detail) {
                    modalBody.append('<tr><td>' + detail.chatid + '</td><td>' + detail.usage +
                        '</td></tr>');
                });

                // Inisialisasi DataTables jika belum diinisialisasi
                if (!$.fn.DataTable.isDataTable('#botDetailsTable')) {
                    $('#botDetailsTable').DataTable({
                        responsive: true
                    });
                } else {
                    // Jika sudah diinisialisasi, refresh data
                    var table = $('#botDetailsTable').DataTable();
                    table.clear(); // Hapus data lama
                    botDetails.forEach(function (detail) {
                        table.row.add([detail.chatid, detail.usage]);
                    });
                    table.draw(); // Gambar ulang tabel dengan data baru
                }

                // Tampilkan modal
                $('#botDetailsModal').modal('show');
            });
        });
    </script>
    <!-- end initialize data tables-->

    <!-- start initialize chart -->
    <script>
        // Event untuk menangani klik pada baris tabel
        $('#myTable tbody').on('click', 'tr', function () {
            var botName = $(this).find('td:nth-child(2)').text(); // Ambil nama bot dari kolom kedua

            // Filter data dari array asli sesuai dengan bot yang diklik
            var botDetails = <?php echo json_encode($data); ?>.filter(function (user) {
                return user.namabot === botName;
            });

            // Kosongkan isi tabel modal sebelumnya
            var modalBody = $('#botDetailsTable tbody');
            modalBody.empty();

            // Tambahkan data bot ke tabel modal
            botDetails.forEach(function (detail) {
                modalBody.append('<tr><td>' + detail.chatid + '</td><td>' + detail.usage + '</td></tr>');
            });

            // Inisialisasi DataTables jika belum diinisialisasi
            if (!$.fn.DataTable.isDataTable('#botDetailsTable')) {
                $('#botDetailsTable').DataTable({
                    responsive: true
                });
            } else {
                // Jika sudah diinisialisasi, refresh data
                var table = $('#botDetailsTable').DataTable();
                table.clear(); // Hapus data lama
                botDetails.forEach(function (detail) {
                    table.row.add([detail.chatid, detail.usage]);
                });
                table.draw(); // Gambar ulang tabel dengan data baru
            }

            // Tampilkan modal
            $('#botDetailsModal').modal('show');
        });

        var botNamesTotal = [];
        var botUsagesTotal = [];

        <?php foreach ($top5Usage as $item): ?>
        botNamesTotal.push('<?= $item['namabot'] ?>'); // Nama bot untuk total usage
        botUsagesTotal.push(<?= $item['totalUsage'] ?>); // Total usage per bot
        <?php endforeach; ?>

        // Data untuk Daily Usage (chart 2)
        var botNamesDaily = [];
        var botUsagesDaily = [];

        <?php foreach ($top5DailyUsage as $item): ?>
        botNamesDaily.push('<?= $item['namabot'] ?>'); // Nama bot untuk daily usage
        botUsagesDaily.push(<?= $item['dailyUsage'] ?>); // Daily usage per bot
        <?php endforeach; ?>

        // Chart untuk Total Usage
        var ctxTotal = document.getElementById('overallUsageChart').getContext('2d');
        var overallUsageChart = new Chart(ctxTotal, {
            type: 'bar',
            data: {
                labels: botNamesTotal,
                datasets: [{
                    label: 'Total Usage',
                    data: botUsagesTotal,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Chart untuk Daily Usage
        var ctxDaily = document.getElementById('dailylUsageChart').getContext('2d');
        var dailyUsageChart = new Chart(ctxDaily, {
            type: 'bar',
            data: {
                labels: botNamesDaily,
                datasets: [{
                    label: 'Daily Usage',
                    data: botUsagesDaily,
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <!-- end initialize chart -->
</body>

</html>