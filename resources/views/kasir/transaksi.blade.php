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
    body{
        background-color: lightgoldenrodyellow;
    }
    .card{background-color: blanchedalmond;}
</style>
<body >
    @include('nav')
    <div class="container mt-4">
        <center><h3>Transaksi pembayaran</h3></center>
        <div class="card p-3" >
            <form action="{{ route('postpilih', $paket->id) }}" method="POST" enctype="multipart/form-data" class="form-group">
                @csrf
                <label for="">No telepon</label>
                <input type="number" name="notelp" class="form-control" required>
                <label for="">Nama</label>
                <input type="text" name="nama" class="form-control" required>
                <label for="">Paket</label>
                <input type="text" name="namapaket" class="form-control" readonly value="{{ $paket->paket }}" required disabled>
                <input type="hidden" name="namapaket" class="form-control" readonly value="{{ $paket->paket }}" required>
                <label for="">Harga</label>
                <input type="hidden" id="harga" name="harga" class="form-control" required readonly value="{{$paket->harga}}">
                <input type="text" id="harga" name="harga" class="form-control" required readonly value="{{$paket->harga}}" disabled>
                <label for="">Input pembayaran</label>
                <input type="text" name="nominal" required oninput="hitungPengurangan()" id="nominal" class="form-control">
                <label for="">Kembalian</label>
                <input type="text" name="kembalian" id="kembalian" class="form-control" required readonly>
                <button class="btn btn-success mt-2">Bayar</button>
                <a href="{{ route('kasir') }}" class="btn btn-secondary mt-2">Kembali</a>
            </form>
        </div>
    </div>
</body>
<script>
    function hitungPengurangan() {
        var harga = parseFloat(document.getElementById('harga').value);
        var nominal = parseFloat(document.getElementById('nominal').value);

        var kembalian = nominal - harga;

        document.getElementById('kembalian').value = kembalian;
    }
</script>
{{-- <script>
    function hitungPengurangan(){
        var harga = parseFloat(document.getElementById('harga').value);
        var nominal = parseFloat(document.getElementById('nominal').value);

        var kembalian = nominal - harga ;

        document.getElementById('kembalian').value = kembalian;
    }
</script> --}}
@include('template')
</html>
