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
        'resources/assets/vendor/scss/rtl/core.scss',
        'resources/assets/vendor/scss/rtl/theme-default.scss',
        'resources/assets/css/demo.css',
        'resources/assets/vendor/js/bootstrap.js',
        'resources/assets/vendor/libs/jquery/jquery.js',
        'resources/assets/vendor/libs/popper/popper.js',
        'resources/assets/js/config.js',
        'resources/assets/vendor/js/menu.js',
        'resources/assets/vendor/js/helpers.js',
        'resources/assets/js/main.js',
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

    <script data-navigate-once>
        document.addEventListener('alpine:init', () => {
            let state = Alpine.reactive({
                path: window.location.pathname
            })

            document.addEventListener('livewire:navigated', () => {
                queueMicrotask(() => {
                    state.path = window.location.pathname
                })
            })

            let strip = (subject) => subject.replace(/^\/|\/$/g, '')

            if (!String.prototype.startsWith) {
                String.prototype.startsWith = function(searchString, position) {
                    position = position || 0;
                    return this.substr(position, searchString.length) === searchString;
                };
            }

            Alpine.magic('current', (el) => (expected = '') => {
                let regexMatch = strip(expected).substr(-1) === '*';
                return regexMatch ? strip(state.path).startsWith(strip(expected.replace(/.$/, ""))) : strip(
                    state.path) === strip(expected)
            })
        })
        
    </script>


    @livewireScripts
</body>

</html>
