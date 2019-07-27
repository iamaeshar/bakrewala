<header class="bg-primary text-white pl-3 pr-4 pt-2 pb-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="text-white text-decoration-none mr-3"><i class="fa fa-envelope"></i>
                    info@bakrewala.in</a>
                <a href="#" class="text-white text-decoration-none"><i class="fa fa-phone-alt"></i> +91-9876543210</a>
            </div>

            <div class="col-md-6 text-right">
                <a class="text-white text-decoration-none mr-3" href="/bakra/all">All Bakra</a>
                @guest
                <a class="text-white text-decoration-none mr-3" href="/user/cart"><i
                        class="fa fa-shopping-cart"></i>Cart(0)</a>
                <a class="text-white text-decoration-none mr-3" href="{{ route('login') }}"><i class="fa fa-lock"></i>
                    {{ __('Login') }}</a>
                @if (Route::has('register'))
                {{-- <a class="text-white" href="{{ route('register') }}">{{ __('Register') }}</a> --}}
                @endif
                @else
                <a class="text-white text-decoration-none mr-3" href="/user/cart"><i
                        class="fa fa-shopping-cart"></i>Cart({{App\Cart::where('user_id', Auth::user()->id)->count()}})</a>
                <a id="navbarDropdown" class="dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="fa fa-user"></i>
                    {{ Auth::user()->email }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/user/dashboard">My Dashboard</a>
                    <a class="dropdown-item" href="/user/profile">My Profile</a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                @endguest
            </div>
        </div>
    </div>
</header>