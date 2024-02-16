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
</style>
<body >
    @include('nav')
    <div class="container mt-4">
        <center><h3>Edit user</h3></center>
        <div class="card p-3">
            <form action="{{ route('postedituser',$user->id) }}" method="POST" class="form-group">
                @csrf
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $user->name }}" required disabled>
            <input type="hidden" class="form-control" name="name" value="{{ $user->name }}" required >
            {{-- <label for="">email</label>
            <input type="email" class="form-control" name="email" value="{{ $user->email }}" required> --}}
            <label for="">password</label>
            <input type="text" class="form-control" name="password" value="{{ $user->password }}" required>
            <button class="btn btn-primary mt-2">Update user</button>
            <a href="{{ route('user') }}" class="btn btn-secondary mt-2">Kembali</a>
            </form>
        </div>
    </div>
</body>
@include('template')
</html>
