<!DOCTYPE html>
<html lang="en">
<head>
    @include('head')
    <link rel="icon" type="image" href="/template/images/icons/logo_2.png"/>
</head>

<body class="d-flex flex-column min-vh-100">
    <!--class="animsition" -->

<!-- Header -->

@include('header')

<!-- Cart -->
{{-- @include('cart') --}}

@yield('content')
{{-- @include('index-content') --}}

@include('footer')

</body>
</html>