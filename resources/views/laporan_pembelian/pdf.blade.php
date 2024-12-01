<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pembelian</title>
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
    <h1>Laporan Pembelian</h1>
    <table>
        <thead>
            <tr>
                <th>Tanggal Pembelian</th>
                <th>Detail Stok</th>
                <th>Total Harga Pembelian</th>
            </tr>
        </thead>
        <tbody>
            @foreach($formattedPembelian as $pembelian)
                <tr>
                    <td>{{ $pembelian['tanggal_pembelian'] }}</td>
                    <td>{{ $pembelian['stok_detail'] }}</td>
                    <td>{{ $pembelian['total_harga_pembelian'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
  
    <div class="total">
        <strong>Total Keseluruhan Pembelian: Rp {{ number_format(array_sum(array_column($formattedPembelian, 'total_harga_pembelian_raw')), 0, ',', '.') }}</strong>
    </div>
</body>
</html>
