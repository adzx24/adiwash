<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap5.min.css') }}">

    <!-- Custom CSS -->
    <style>
        .bgo {
            background-color: lightgoldenrodyellow;
            /* background-image: url('path/to/your/background/image.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif; */
        }



    </style>
</head >

<body class="bgo">
    @include('nav')
    <div class="container mt-3">
        <center><h2>Laporan Transaksi</h2></center>
        @if (Session::has('m'))
            <p style="color: green">
            {{ Session::get('m') }}</p>
        @endif

        <div class="card p-2" style=" background-color: blanchedalmond;">
            <table class="table table-striped" id="example">
                <thead>
                    <tr class="table-primary">
                        <th >Tanggal Transaksi</th>
                        <th>Nama</th>
                        <th>No telepon</th>
                        <th>Paket</th>
                        <th>Harga</th>
                        <th>Nominal</th>
                        <th>Kembalian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($data as $p)
                        <tr class="table-light">
                            <td>{{ $p->created_at }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->notelp }}</td>
                            <td>{{ $p->namapaket }}</td>
                            <td>Rp : {{ number_format($p->harga,0,',','.') }}</td>
                            <td>Rp : {{ number_format($p->harga,0,',','.') }}</td>
                            <td>Rp : {{ number_format($p->harga,0,',','.') }}</td>
                            <td>
                                <a href="{{ route('cetakpdf',$p->id) }}" class="btn btn-info">Print</a>
                            </td>
                        </tr>
                        @php
                            $total += $p->harga;
                        @endphp
                    @endforeach
                </tbody>
                <p >Total pendapatan :
                Rp : {{ number_format($total,0,',','.') }}</p>
            </table>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/responsive.bootstrap5.min.js') }}"></script>

    <!-- Custom JavaScript -->
    <script>
            $('#example').DataTable({
                responsive: true
            });
    </script>
</body>
@include('template')
</html>
