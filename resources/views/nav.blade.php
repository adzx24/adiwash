{{-- <nav class="navbar navbar-primary bg-primary mt-1">
    @auth
        @if (auth()->user()->role == 'admin'){
        <a href="home" class="navbar-brand " style="color: white">Home</a>
        <a href="{{ route('logout') }}" onclick="return confirm('Yakin mau logout?')" class="navbar-brand "
            style="color: white">Logout</a>
        }@else{
        <a href="{{ route('logout') }}" onclick="return confirm('Yakin mau logout?')" class="navbar-brand "
            style="color: white">Logout</a>
        }
        @endif
    @endauth
</nav> --}}

@auth
    @if (auth()->user()->role == 'kasir')
        <nav class="navbar navbar-primary bg-primary p-2" >
            <div>


                <a href="{{ route('kasir') }}" class="navbar-brand" style="color: white">Home</a>
                <a href="{{ route('logout') }}" class="navbar-brand" style="color: white" onclick="return confirm('Yakin logout?')">Logout</a>
                <a href="{{ route('report') }}" class="navbar-brand" style="color: white">Laporan</a>


            </div>
    </nav>


    @else
        <nav class="navbar navbar-primary p-2" style="background-color: darkslategray;">
            <div>

                <a href="{{ route('logout') }}" class="navbar-brand" style="color: white" onclick="return confirm('Yakin logout?')">Logout</a>
            </div>
        </nav>


    @endif
@endauth
