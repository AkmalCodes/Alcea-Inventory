<!-- resources/views/layouts/app.blade.php master layout of all templates-->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'My Application')</title>
    
    <!-- Common CSS files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">

    @yield('styles') <!-- Allows additional styles specific to pages -->
</head>

<body>
    <header>
        @include('layouts.header') <!-- Navbar -->
    </header>

    <main>
        @yield('content') <!-- Content will be injected here -->
    </main>

    <footer>
        @include('layouts.footer')
    </footer>
    @include('forms.login-form')
    @include('forms.register-form')

    <!-- Common JS files -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    @yield('scripts') <!-- Allows additional scripts specific to pages -->
</body>

</html>
