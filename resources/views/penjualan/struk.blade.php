<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Struk Penjualan</h1>
    <p><strong>ID Penjualan:</strong> {{ $formattedPenjualan['id_penjualan'] }}</p>
    <p><strong>Tanggal Penjualan:</strong> {{ $formattedPenjualan['tanggal_penjualan'] }}</p>
    <p><strong>Pelanggan:</strong> {{ $formattedPenjualan['nama_pelanggan'] }}</p>

    <h3>Menu yang Dibeli:</h3>
    <p>{{ $formattedPenjualan['menu_detail'] }}</p>

    <h3>Total Penjualan:</h3>
    <p>Rp {{ $formattedPenjualan['total_penjualan'] }}</p>
</body>
</html>
