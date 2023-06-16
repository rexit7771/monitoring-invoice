<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Monitoring Invoice</title>

    <link rel="stylesheet" href="{{ asset('vendors/themify-icons/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('css/rubic.css') }}">
        <script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

        <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')

    @include('export.index')

    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>

        <script src="{{ asset('vendors/jquery/jquery-3.4.1.js') }}"></script>
        <script src="{{ asset('vendors/bootstrap/bootstrap.bundle.js') }}"></script>
        <script src="{{ asset('vendors/bootstrap/bootstrap.affix.js') }}"></script>
        <script src="{{ asset('js/rubic.js') }}"></script>

        {{-- Select2 --}}
        {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
        {{-- Select2 --}}

        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
        {{-- <script src="https://code.jquery.com/jquery-3.6.3.js"></script> --}}

        @yield('script')
</body>
</html>