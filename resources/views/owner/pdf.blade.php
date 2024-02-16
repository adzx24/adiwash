<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struk Pembayaran</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style type="text/css">
        body {
            padding: 2em;
        }

        h1 {
            text-align: center;
        }

        .receipt {
            border: 1px solid #ddd;
            padding: 1em;
            margin-top: 1em;
        }

        .receipt p {
            margin: 0.5em 0;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Transaksi Pembayaran</h1>
        <div class="card receipt">
            <div class="card-body">
                <p>Nama: {{ $transaksi->nama }}</p>
                <p>No Telepon: {{ $transaksi->notelp }}</p>
                <p>Paket: {{ $transaksi->namapaket }}</p>
                <p>Harga: Rp {{ number_format($transaksi->harga, 0, ',', '.') }}</p>
                <p>Nominal: Rp {{ number_format($transaksi->nominal, 0, ',', '.') }}</p>
                <p>Kembalian: Rp {{ number_format($transaksi->kembalian, 0, ',', '.') }}</p>
            </div>
            <p><strong>Terimakasih !!</strong></p>
        </div>
    </div>
</body>
</html>
