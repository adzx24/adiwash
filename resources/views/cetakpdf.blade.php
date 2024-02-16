<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Transaksi Pembayaran</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style type="text/css">
        body {
            padding: 2,5em;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1em;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 0.5em;
            text-align: left;
        }

        th {
            background-color: #f2f2f2; /* Light gray background for header */
        }

        td {
            font-size: 9pt;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Laporan Transaksi Pembayaran</h1>
        <div class="card p-2">
            
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal </th>
                            <th>Nama</th>
                            <th>No Telepon</th>
                            <th>Paket</th>
                            <th>Harga</th>
                            <th>Nominal</th>
                            <th>Kembalian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($transaksi as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->notelp }}</td>
                                <td>{{ $item->namapaket }}</td>
                                <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                                <td>{{ number_format($item->nominal, 0, ',', '.') }}</td>
                                <td>{{ number_format($item->kembalian, 0, ',', '.') }}</td>
                            </tr>
                            @php
                                $total += $item->harga;
                            @endphp
                        @endforeach
                        <tr>
                            <td colspan="5"><strong>Total Pendapatan </strong></td>
                            <td><strong> {{ number_format($total, 0, ',', '.') }}</strong></td>
                            <td colspan="2"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
