<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<style>
    .q{ background-color: lightgoldenrodyellow;}
</style>
<body class="q">
    @include('nav')
    <div class="container mt-4">
        <center><h3>Edit paket</h3></center>
        <div class="card p-3">
            <form action="{{ route('postedit',$produk->id) }}" method="POST" class="form-group">
                @csrf
            <label for="">Paket</label>
            <input type="text" class="form-control" name="paket" value="{{ $produk->paket }}" required>
            <label for="">Harga</label>
            <input type="number" class="form-control" name="harga" value="{{ $produk->harga }}" required>
            <label for="">Deskripsi</label>
            <input type="text" class="form-control" name="deskripsi" value="{{ $produk->deskripsi }}" required>
            <button class="btn btn-primary mt-2">Update paket</button>
            <a href="{{ route('home') }}" class="btn btn-secondary mt-2">Kembali</a>
            </form>
        </div>
    </div>
</body>
@include('template')
</html>
