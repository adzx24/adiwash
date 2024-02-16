<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<style>
    .p{
        background-color: lightgoldenrodyellow;
    }
    h2{
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;

    }



</style>
<body class="p">
    @include('nav')
    <div class="container mt-5">
        @if (Session::has('m'))
        <p style="color: green">
        {{ Session::get('m') }}</p>
    @endif
        <div class="row">
            <p><h2 style="text-align: center">Adi_carwash</h2></p>
            @foreach ($data  as $o)

            <div class="col-4">
                <div class="card mt-4">
                    <div class="card-body">
                        <h4>{{ $o->paket }}</h4>
                    <p class="card-title">Harga : Rp : {{number_format($o->harga,0,',','.') }}</p>
                    <p class="card-text">{{ $o->deskripsi }}</p>
                    <a href="{{ route('paket',$o->id) }}" class="btn btn-primary  ">Pilih paket</a>
                </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
@include('template')
</html>
