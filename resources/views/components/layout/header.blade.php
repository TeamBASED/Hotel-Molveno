<header id="header">
    <a class="top" href="{{ route('home') }}">
        <img src="/images/companyLogo.jpg"/>
        <h1>Hotel Molveno</h1>
    </a>
    <div class="bottom">
        <nav>
            <a class="navigation-link" href="{{ route('home') }}">Home</a>
            <a class="navigation-link" href="{{ route('room.overview') }}">Rooms</a>
            <a class="navigation-link" href="{{ route('reservation.overview') }}">Reservations</a>
        </nav>
        <a class="logout-link" href="{{ route('logout') }}" method="POST">
            @csrf
            Logout</a>
    </div>
</header>