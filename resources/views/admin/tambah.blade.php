<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body style="  background-color: lightgoldenrodyellow;">
    @include('nav')
    <div class="container mt-4">
        <center><h2>Tambah paket</h2></center>
        <div class="card p-3">
            <form action="{{ route('posttambah') }}" method="POST" class="form-group">
                @csrf
            <label for="">Paket</label>
            <input type="text" class="form-control" name="paket">
            <label for="">Harga</label>
            <input type="number" class="form-control" name="harga">
            <label for="">Deskripsi</label>
            <input type="text" class="form-control" name="deskripsi">
            <button class="btn btn-primary mt-2" >Tambah paket</button>
            <a href="{{ route('home') }}" class="btn btn-secondary mt-2">Kembali</a>
            </form>
        </div>
    </div>
</body>
@include('template')
</html>
