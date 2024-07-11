<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <span class="app-brand-logo demo">
            <img src="{{ asset('images/Elite-Travels-Logo.png') }}" alt="">
        </span>
        {{-- <span class="app-brand-text demo menu-text fw-bold">Elite Travels</span> --}}

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item" x-bind:class="$current('/home') || $current('/form') ? 'open' : ''">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboards">Dashboards</div>
                <div class="badge bg-primary rounded-pill ms-auto"></div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item" x-bind:class="$current('/home') ? 'active' : ''">
                    <a href="{{ route('home') }}" wire:navigate class="menu-link">
                        <div data-i18n="Home">Home</div>
                    </a>
                </li>
                <li class="menu-item" x-bind:class="$current('/form') ? 'active' : ''">
                    <a href="{{ route('form') }}" wire:navigate class="menu-link">
                        <div data-i18n="Academy">Form</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Misc -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text" data-i18n="Misc">Misc</span>
        </li>
        <li class="menu-item">
            <a href="#" target="_blank" class="menu-link">
                <i class="menu-icon tf-icons ti ti-lifebuoy"></i>
                <div data-i18n="Support">Support</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="#" target="_blank" class="menu-link">
                <i class="menu-icon tf-icons ti ti-file-description"></i>
                <div data-i18n="Documentation">Documentation</div>
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->
