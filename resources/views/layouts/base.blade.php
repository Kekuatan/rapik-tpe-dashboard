<!DOCTYPE html>
<html>
<head>
    <title>Laporan Casual Harian Semua Lokasi | Rapik Karya Mandiri Parking</title>
    <link href="https://dashboard.rkmparking.id/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <style type="text/css">
        .btn-circle {
            width: 35px;
            height: 35px;
            text-align: center;
            padding: 5px 10px;
            font-size: 16px;
            line-height: 1.428571429;
            border-radius: 15px;
            float: right;
            margin-top: 15px;
        }

        .group {
            background-color: #ddd !important;
        }

        .total {
            background-color: #ccc !important;
        }

        .last-column {
            font-weight: bold;
        }

        .dt-right {
            text-align: right;
        }

        table.dataTable tbody tr.selected {
            background-color: #DDE;
        }
        td{
            text-align: left;
        }

    </style>
    @livewireStyles
</head>
<body>
{{ $slot }}
</body>
@livewireScripts

</html>

