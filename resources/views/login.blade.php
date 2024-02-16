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
    .card{
        margin-top: 10%;
        width: 35%;
    }
    .b{
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        font-weight: bold;
        color: white;
    }
    body{
        background-image: url('/img/R.jpg');
    }
    .container{
        margin-top: 10%;
    }
    .card{
        background: transparent;
        color: white;
        border-color: white;
        border-radius: 9%;
    }

</style>
<body >
    <div class="container ">
        <center><h1 class="b">Selamat datang di Adi Carwash</h1></center>
        <div class="card p-3 mx-auto mt-3">
            <center><h4>Carwash</h4></center>
            <form action="{{ route('postlogin') }}" method="POST" class="form-group">
                @csrf
            {{-- <label for="">Email</label>
            <input type="email" name="email" class="form-control"> --}}
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Masukkan name anda" required>
            <label for="">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password anda" required>
            @if (Session::has('m'))
            <p style="color: chartreuse      ;">
            {{ Session::get('m') }}</p>
        @endif
            <button class="btn btn-primary mt-2 form-control">Login</button>
            </form>
        </div>
    </div>
</body>

</html>
