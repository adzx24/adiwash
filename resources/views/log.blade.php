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
    .l{ background-color: lightgoldenrodyellow;}
    .card{
        background-color: blanchedalmond;
    }
</style>
<body class="l">
    @include('nav')
    <div class="container mt-2">
        <center><h2>Log Aktifitas</h2></center>
        <div class=" card p-3" style=" background-color: blanchedalmond;">
            <table class="table table-responive" id="example">
                <thead>
                    <tr class="table-success">
                        <th >Oleh</th>
                        <th>Aktifitas</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($log  as $y)
                    <tr>
                        <td>{{ $y->user->name }}</td>
                        <td>{{ $y->activity }}</td>
                        <td>{{ $y->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ route('reportowner') }}" class="btn btn-secondary mt-2">Kembali</a>
    </div>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/responsive.bootstrap5.min.js') }}"></script>
    <script>
        $('#example').DataTable({
                responsive: true
            });
    </script>
    @include('template')
</body>
</html>
