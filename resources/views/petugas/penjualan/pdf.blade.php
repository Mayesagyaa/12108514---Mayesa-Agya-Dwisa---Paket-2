<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pembelian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .customer-info {
            margin-bottom: 20px;
        }
        .table-container {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .total {
            text-align: right;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Detail Pembelian</h1>
        </div>
        <div class="customer-info">
            <p><strong>Nama Pelanggan:</strong> {{ $penjualan->pelanggan->nama_pelanggan }}</p>
            <p><strong>Alamat Pelanggan:</strong> {{ $penjualan->pelanggan->alamat }}</p>
            <p><strong>Nomor Pelanggan:</strong> {{ $penjualan->pelanggan->no_telp }}</p>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Banyak Barang</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penjualan->detailPenjualans as $item)
                        <tr>
                            <td>{{ $item->produk->nama_produk }}</td>
                            <td>{{ $item->jumlah_produk }}</td>
                            <td>Rp{{ number_format($item->produk->harga, 0, ',' . '.') }}</td>
                            <td>Rp{{ number_format($item->subtotal, 0, ',' . '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="total">
            <p><strong>Total Harga:</strong> Rp{{ number_format($penjualan->total_harga, 0, ',' . '.') }}</p>
        </div>
    </div>
</body>
</html>
