<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .total {
            margin-top: 20px;
            font-weight: bold;
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

    <div class="total">
        <strong>Total Keseluruhan Penjualan: Rp {{ number_format(array_sum(array_column($formattedPenjualan, 'total_penjualan')), 0, ',', '.') }}</strong>
    </div>
</body>
</html>