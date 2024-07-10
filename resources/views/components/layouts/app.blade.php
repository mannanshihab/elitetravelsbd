<!DOCTYPE html>
<html lang="en" class="light-style layout-compact layout-navbar-fixed layout-menu-fixed customizer-hide"
    dir="ltr" data-theme="theme-default" data-assets-path="http://127.0.0.1:8000/assets/"
    data-base-url="http://127.0.0.1:8000" data-framework="laravel" data-template="vertical-menu-theme-default-light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    @vite([
        'resources/assets/vendor/fonts/tabler-icons.scss',
        'resources/assets/vendor/fonts/fontawesome.scss',
        'resources/assets/vendor/fonts/flag-icons.scss',
        'resources/assets/vendor/scss/rtl/core.scss',
        'resources/assets/vendor/scss/rtl/theme-default.scss',
        'resources/assets/css/demo.css',
        'resources/assets/vendor/libs/node-waves/node-waves.scss',
        'resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.scss',
        'resources/assets/vendor/libs/typeahead-js/typeahead.scss',
        'resources/assets/vendor/libs/@form-validation/form-validation.scss',
        'resources/assets/vendor/scss/pages/page-auth.scss',
        'resources/assets/vendor/libs/apex-charts/apex-charts.scss',
        'resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss',
        'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss',
        'resources/assets/vendor/scss/pages/app-logistics-dashboard.scss',
        'resources/assets/vendor/js/helpers.js',
        'resources/assets/vendor/js/template-customizer.js',
        'resources/assets/js/config.js',
        'resources/assets/vendor/libs/jquery/jquery.js',
        'resources/assets/vendor/libs/popper/popper.js',
        'resources/assets/vendor/js/bootstrap.js',
        'resources/assets/vendor/libs/node-waves/node-waves.js',
        'resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js',
        'resources/assets/vendor/libs/hammer/hammer.js',
        'resources/assets/vendor/libs/typeahead-js/typeahead.js',
        'resources/assets/vendor/js/menu.js',
        'resources/assets/vendor/libs/@form-validation/popular.js',
        'resources/assets/vendor/libs/@form-validation/bootstrap5.js',
        'resources/assets/vendor/libs/@form-validation/auto-focus.js',
        'resources/assets/js/main.js',
        'resources/assets/js/pages-auth.js',
        'resources/assets/vendor/libs/select2/select2.js',
        'resources/assets/vendor/libs/cleavejs/cleave.js',
        'resources/assets/vendor/libs/cleavejs/cleave-phone.js',
        'resources/assets/vendor/libs/sweetalert2/sweetalert2.js',
        'resources/assets/js/pages-account-settings-account.js',
        'resources/assets/vendor/libs/apex-charts/apexcharts.js',
        'resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js',
        'resources/assets/js/app-logistics-dashboard.js',
    ])


    @livewireStyles
</head>

<body>
    @if (Route::has('login'))
        @auth
            <div class="layout-wrapper layout-content-navbar">
                <div class="layout-container">
                    @persist('menu')
                        @livewire('partials.layout-menu')
                    @endpersist
                    <!-- Layout container -->
                    <div class="layout-page">
                        @persist('navbar')
                            @livewire('partials.layout-navbar')
                        @endpersist

                        <!-- Content wrapper -->
                        <div class="content-wrapper">
                        @endauth
                        <main>
                            <div class="container-xxl flex-grow-1 container-p-y">
                                {{ $slot }}
                            </div>
                        </main>
                        @auth
                            @persist('footer')
                                @livewire('partials.content-footer')
                            @endpersist

                            <div class="content-backdrop fade"></div>
                        </div>
                        <!-- Content wrapper -->
                    </div>
                    <!-- / Layout page -->
                </div>
                <!-- Overlay -->
                <div class="layout-overlay layout-menu-toggle"></div>

                <!-- Drag Target Area To SlideIn Menu On Small Screens -->
                <div class="drag-target"></div>
            @endauth
    @endif
    @livewireScripts
</body>

</html>
