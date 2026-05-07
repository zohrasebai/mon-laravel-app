<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>QualiPro Plus | Dashboard</title>
    
    <link rel="stylesheet" href="{{ asset('bigdash/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bigdash/assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('bigdash/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('bigdash/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bigdash/assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('bigdash/assets/images/favicon.png') }}" />
</head>
<body>
    <div class="container-scroller">
        @include('admin.partials.navbar')

        <div class="container-fluid page-body-wrapper">
            @include('admin.partials.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    @if(session('success'))
                        <div class="alert alert-success border-0 shadow-sm">
                            {{ session('success') }}
                        </div>
                    @endif
                    @yield('content')
                </div>

                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted">Copyright © 2025 QualiPro Plus. Tous droits réservés.</span>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <script src="{{ asset('bigdash/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('bigdash/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('bigdash/assets/js/misc.js') }}"></script>
    <script src="{{ asset('bigdash/assets/js/dashboard.js') }}"></script>
</body>
</html>