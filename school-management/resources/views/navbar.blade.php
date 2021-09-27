<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{url('/home')}}">Students Management</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    @if(auth()->user()->role_id == 1)
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav">
                <a class="nav-link" href="{{url('/home')}}">Home <span class="sr-only">(current)</span></a>
                <a class="nav-link" href="{{url('/create')}}">Voortgang</a>
                <a class="nav-link" href="{{url('/student/studiegeld')}}">Studiegeld</a>
                <a class="nav-link" href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Uitloggen</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>
        </div>

    @elseif(auth()->user()->role_id == 2)
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav">
                <a class="nav-link" href="{{url('/home')}}">Home <span class="sr-only">(current)</span></a>
                <a class="nav-link" href="{{url('/create')}}">Gegevens</a>
                <a class="nav-link" href="{{url('/home')}}">Studenten</a>
                <a class="nav-link" href="{{url('/create')}}">Cijfers</a>
                <a class="nav-link" href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Uitloggen</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>
        </div>

    @elseif(auth()->user()->role_id == 3)
    <div class="collapse navbar-collapse" id="navbarNav">
        <div class="navbar-nav">
            <a class="nav-link" href="{{url('/home')}}">Home <span class="sr-only">(current)</span></a>
            <a class="nav-link" href="{{url('/users')}}">Gebruikers</a>
            <a class="nav-link" href="{{url('/home')}}">Studenten</a>
            <a class="nav-link" href="{{url('/create')}}">Gegevens</a>
            <a class="nav-link" href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Uitloggen</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

        </div>
    </div>
    @endif
</nav>
