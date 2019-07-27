<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        @include('inc.header')
        @include('inc.navbar')
        <main>
            @if ($message = Session::get('success'))
            <div class="alert alert-success mb-0">
                {{$message}}
            </div>
            @endif

            @yield('content')
        </main>
        @include('inc.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

    {{-- Cart Alert --}}
    <!-- Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ session()->get('cart-added') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="/user/cart"><button type="button" class="btn btn-primary">Go to Cart</button></a>
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('cart-added'))
    <script>
        $(document).ready(function() {
            $('#cartModal').modal('show');
        });
    </script>
    @endif
</body>

</html>