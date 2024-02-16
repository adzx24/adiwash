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
</head>
<style>
    .pi{background-color: lightgoldenrodyellow;}

</style>

<body class="pi">
    @include('nav')
    <div class="container mt-3">
        @if (Session::has('m'))
        <p style="color: green">
            {{ Session::get('m') }}</p>
        @endif
        <h2 class="text-center ">Laporan Transaksi</h2>
        <div class="row">
            <div class="col-md-6" >
                <div class="card p-3 o mb-4" style=" background-color: blanchedalmond;">
                    <h4 class="text-center">Date</h4>
                    <form action="{{ route('search') }}" method="GET">
                        <div class="form-group">
                            <label for="startdate">Tanggal awal</label>
                            <input type="date" name="startdate" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="enddate">Tanggal akhir</label>
                            <input type="date" name="enddate" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">Search</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-3 i mb-4" style=" background-color: blanchedalmond;">
                    <h4 class="text-center">Date</h4>
                    <form action="{{ route('pdfByDate') }}" method="GET">
                        <div class="form-group">
                            <label for="startdate">Tanggal awal</label>
                            <input type="date" name="startdate" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="enddate">Tanggal akhir</label>
                            <input type="date" name="enddate" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-danger mt-2">PDF by date</button>
                    </form>
                </div>
            </div>
        </div>
        <a href="{{ route('log') }}" class="btn btn-primary mb-2">Log</a>
        <a href="{{ route('cetakpdfow') }}" class="btn btn-danger mb-2">Print All</a>
        {{-- <a href="{{ route('clearAll') }}" class="btn btn-danger mb-2">Clear All</a> --}}
        <div class="card p-2" style=" background-color: blanchedalmond;">
            <table class="table table-bordered" id="example">
                <thead>
                    <tr class="table-info">
                        <th>No</th>
                        <th>Tanggal Transaksi</th>
                        <th>Nama</th>
                        <th>No telepon</th>
                        <th>Paket</th>
                        <th>Harga</th>
                        <th>Nominal</th>
                        <th>Kembalian</th>
                        <th>Act</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $total = 0;
                    @endphp
                    @foreach ($data as $p)
                    <tr class="table-secondary">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->created_at }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->notelp }}</td>
                        <td>{{ $p->namapaket }}</td>
                        <td>Rp : {{ number_format($p->harga,0,',','.') }}</td>
                        <td>Rp : {{ number_format($p->nominal,0,',','.') }}</td>
                        <td>Rp : {{ number_format($p->kembalian,0,',','.') }}</td>
                        <td>
                            <a href="{{ route('cetakpdfo',$p->id) }}" class="btn btn-info">Print</a>
                        </td>
                    </tr>
                    @php
                    $total += $p->harga;
                    @endphp
                    @endforeach
                </tbody>
                <p>Total pendapatan: Rp {{ number_format($total,0,',','.') }}</p>
            </table>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/responsive.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                responsive: true
            });
        });
    </script>
</body>
@include('template')

</html>
