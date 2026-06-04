<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="dark" data-topbar-color="light">

<head>
    <meta charset="utf-8" />
    <title>Log In | {{ $setting?->brand_name ?? 'Admin' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Admin Login" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="{{ $setting?->favicon_url ?? asset('assets/backend/images/favicon.ico') }}">
    <link href="{{ asset('assets/backend/css/style.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/backend/css/icons.min.css') }}s" rel="stylesheet" type="text/css">
    <script src="{{ asset('assets/backend/js/config.js') }}"></script>
    <link href="{{ asset('assets/backend/css/fixes.css') }}" rel="stylesheet" type="text/css">

</head>

<body>

    <div style="background-color: #751419">
        {{ $slot }}
    </div>

    <script src="{{ asset('assets/backend/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/app.js') }}"></script>

</body>

</html>