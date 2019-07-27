<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{-- {{ config('app.name', 'Laravel') }} --}}
            Bakrewala
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
                <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">About</a>
                <div class="dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Bakra's Category
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a href="/bakra/sojat" class="dropdown-item">Sojat</a>
                        <a href="/bakra/sirohi" class="dropdown-item">Sirohi</a>
                        <a href="/bakra/desi" class="dropdown-item">Desi</a>
                        <a href="/bakra/barbari" class="dropdown-item">Barbari</a>
                        <a href="/bakra/mewati" class="dropdown-item">Mewati</a>
                        <a href="/bakra/tota-pari-alwar" class="dropdown-item">Tota pari - Alwar</a>
                    </div>
                </div>
                <a class="nav-link {{ Request::is('about-qurbani') ? 'active' : '' }}" href="/about-qurbani">About Qurbani</a>
                <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="/contact">Contact</a>
            </ul>
        </div>
    </div>
</nav>

<section id="categ-bar" class="bg-dark universal-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col md-2"><a href="/bakra/sojat" class="text-white text-decoration-none">Sojat</a></div>
            <div class="col md-2"><a href="/bakra/sirohi" class="text-white text-decoration-none">Sirohi</a></div>
            <div class="col md-2"><a href="/bakra/desi" class="text-white text-decoration-none">Desi</a></div>
            <div class="col md-2"><a href="/bakra/barbari" class="text-white text-decoration-none">Barbari</a></div>
            <div class="col md-2"><a href="/bakra/mewati" class="text-white text-decoration-none">Mewati</a></div>
            <div class="col md-2"><a href="/bakra/tota-pari-alwar" class="text-white text-decoration-none">Tota pari - Alwar</a></div>
        </div>
    </div>
</section>