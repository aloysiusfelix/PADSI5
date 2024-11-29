<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Laporan Penjualan</h1>
    <table>
        <thead>
            <tr>
                <th>ID Penjualan</th>
                <th>Tanggal Penjualan</th>
                <th>Menu Detail</th>
                <th>Total Penjualan</th>
                <th>Pelanggan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($formattedPenjualan as $penjualan)
                <tr>
                    <td>{{ $penjualan['id_penjualan'] }}</td>
                    <td>{{ $penjualan['tanggal_penjualan'] }}</td>
                    <td>{{ $penjualan['menu_detail'] }}</td>
                    <td>Rp {{ $penjualan['total_penjualan'] }}</td>
                    <td>{{ $penjualan['nama_pelanggan'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
