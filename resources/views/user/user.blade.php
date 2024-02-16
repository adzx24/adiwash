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

    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/responsive.bootstrap5.min.js') }}"></script>
</head>
<style>
    .w{
        background-color: lightgoldenrodyellow;

    }
    .card{
        border-radius: 4%;
        }
</style>
<body class="w">
    @include('nav')
    <div class="container mt-3">
        <div class="card p-3" >
            <center><h4>Tambah kasir</h4></center>
            <form action="{{ route('postuser') }}" method="POST" class="form-group">
                @csrf
            <label for="">Name</label>
            <input type="text" name="name" class="form-control">
            {{-- <label for="">Role</label>
            <input type="text" name="role" class="form-control"> --}}
            {{-- <label for="">Email</label>
            <input type="email" name="email" class="form-control"> --}}
            <label for="">Password</label>
            <input type="password" name="password" class="form-control">
            @if (Session::has('m'))
            <p style="color: green">
            {{ Session::get('m') }}</p>
        @endif
            <button class="btn btn-primary mt-1">Register</button>
            <a href="{{ route('home') }}" class="btn btn-secondary mt-2">Kembali</a>
            </form>
        </div>
        <div class="container mt-4">
        <div class="card p-3">
        <table class="table table-striped" id="example">
            <thead>
                <tr class="table-info">
                    <th>No</th>
                    <th>Name</th>

                    <th>Password</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>

                        <td>{{ Hash::make($item->password) }}</td>
                        <td>
                            <a href="{{ route('edituser' ,$item->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('hapususer',$item->id) }}"onclick="return confirm('Yakin hapus user?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
    </div>
</body>
<script>
    new DataTable('#example',{
        responsive : true
    });
</script>
@include('template')
</html>
