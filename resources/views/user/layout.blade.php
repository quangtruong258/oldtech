

<!DOCTYPE html>
<html>

<head>
    @include('user.components.header')
</head>

<body>
    @include('user.components.navbar')

    @yield('content')
    @include('user.components.footer')
    <!-- Mainly scripts -->
    @include('user.components.scripts')
</body>

</html>
