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
                {{-- <li class="menu-item" x-bind:class="$current('/form') ? 'active' : ''">
                    <a href="{{ route('form') }}" wire:navigate class="menu-link">
                        <div data-i18n="Academy">Form</div>
                    </a>
                </li> --}}
            </ul>
        </li>
        <!--/ Dashboards -->

        <!-- invoice -->

        <li class="menu-item"
            x-bind:class="$current('/invoice') || $current('/invoice-list') || $current('/invoice-edit*') || $current(
                '/invoice-show*') ? 'open' : ''">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-receipt"></i>
                <div data-i18n="Invoice">Invoice</div>
                <div class="badge bg-primary rounded-pill ms-auto"></div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item" x-bind:class="$current('/invoice') ? 'active' : ''">
                    <a href="{{ route('invoice') }}" wire:navigate class="menu-link">
                        <div data-i18n="Invoice">Add Invoice</div>
                    </a>
                </li>

                <li class="menu-item"
                    x-bind:class="$current('/invoice-list') || $current('/invoice-edit*') || $current('/invoice-show*') ? 'active' :
                        ''">
                    <a href="{{ route('invoice-list') }}" wire:navigate class="menu-link">
                        <div data-i18n="Invoice">Invoice List</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- customer -->
        <li class="menu-item"
            x-bind:class="$current('/add-customer') || $current('/list-customer') || $current('/edit-customer*') ? 'open' : ''">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-user"></i>
                <div data-i18n="Customer">Customers</div>
                <div class="badge bg-primary rounded-pill ms-auto"></div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item" x-bind:class="$current('/add-customer') ? 'active' : ''">
                    <a href="{{ route('add-customer') }}" wire:navigate class="menu-link">
                        <div data-i18n="Customer">Add Customer</div>
                    </a>
                </li>

                <li class="menu-item"
                    x-bind:class="$current('/list-customer') || $current('/edit-customer*') ? 'active' : ''">
                    <a href="{{ route('list-customer') }}" wire:navigate class="menu-link">
                        <div data-i18n="Customer">List Customer</div>
                    </a>
                </li>
            </ul>
        </li>


        <!-- Agent -->
        <li class="menu-item"
            x-bind:class="$current('/add-agent') || $current('/list-agent') || $current('/edit-agent*') ? 'open' : ''">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-a-b"></i>
                <div data-i18n="Agent">Agent</div>
                <div class="badge bg-primary rounded-pill ms-auto"></div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item" x-bind:class="$current('/add-agent') ? 'active' : ''">
                    <a href="{{ route('add-agent') }}" wire:navigate class="menu-link">
                        <div data-i18n="agent">Add Agent</div>
                    </a>
                </li>

                <li class="menu-item"
                    x-bind:class="$current('/list-agent') || $current('/edit-agent*') ? 'active' : ''">
                    <a href="{{ route('list-agent') }}" wire:navigate class="menu-link">
                        <div data-i18n="Agent">List Agent</div>
                    </a>
                </li>
            </ul>
        </li>


        <!-- vendor -->
        <li class="menu-item"
            x-bind:class="$current('/add-vendor') || $current('/list-vendor') || $current('/edit-vendor*') ? 'open' : ''">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
                <div data-i18n="Vendor">Vendor</div>
                <div class="badge bg-primary rounded-pill ms-auto"></div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item" x-bind:class="$current('/add-vendor') ? 'active' : ''">
                    <a href="{{ route('add-vendor') }}" wire:navigate class="menu-link">
                        <div data-i18n="Vendor">Add Vendor</div>
                    </a>
                </li>

                <li class="menu-item"
                    x-bind:class="$current('/list-vendor') || $current('/edit-vendor*') ? 'active' : ''">
                    <a href="{{ route('list-vendor') }}" wire:navigate class="menu-link">
                        <div data-i18n="Vendor">List Vendor</div>
                    </a>
                </li>
            </ul>
        </li>


        <!-- Employee -->
        <li class="menu-item"
            x-bind:class="$current('/add-employee') || $current('/list-employees') || $current('/edit-employees*') ? 'open' : ''">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-briefcase"></i>
                <div data-i18n="Employees">Employee</div>
                <div class="badge bg-primary rounded-pill ms-auto"></div>
            </a>
            <ul class="menu-sub">

                <li class="menu-item" x-bind:class="$current('/add-employee') ? 'active' : ''">
                    <a href="{{ route('add-employee') }}" wire:navigate class="menu-link">
                        <div data-i18n="Users">Add Employee</div>
                    </a>
                </li>

                <li class="menu-item"
                    x-bind:class="$current('/list-employees') || $current('/edit-employees*') ? 'active' : ''">
                    <a href="{{ route('list-employees') }}" wire:navigate class="menu-link">
                        <div data-i18n="Users">List Employee</div>
                    </a>
                </li>
            </ul>
        </li>
        <!--/ Users -->

        <!-- Users -->
        <li class="menu-item" x-bind:class="$current('/users') || $current('/role') ? 'open' : ''">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-user-cog"></i>
                <div data-i18n="Users">Users</div>
                <div class="badge bg-primary rounded-pill ms-auto"></div>
            </a>
            <ul class="menu-sub">

                <li class="menu-item" x-bind:class="$current('/add-users') ? 'active' : ''">
                    <a href="{{ route('add-users') }}" wire:navigate class="menu-link">
                        <div data-i18n="Users">Add User</div>
                    </a>
                </li>

                <li class="menu-item" x-bind:class="$current('/list-users') ? 'active' : ''">
                    <a href="{{ route('list-users') }}" wire:navigate class="menu-link">
                        <div data-i18n="Users">List Users</div>
                    </a>
                </li>
            </ul>
        </li>
        <!--/ Users -->

        <!-- Misc -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text" data-i18n="Misc">Reports</span>
        </li>

        <li class="menu-item" x-bind:class="$current('/add-agent-bill') || $current('/agent-reports') ? 'open' : ''">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-file-description"></i>
                <div data-i18n="Reports">Agent Reports</div>
                <div class="badge bg-primary rounded-pill ms-auto"></div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item" x-bind:class="$current('/add-agent-bill') ? 'active' : ''">
                    <a href="{{ route('add-agent-bill') }}" wire:navigate class="menu-link">
                        <div data-i18n="Add Bill">Add Bill</div>
                    </a>
                </li>

                <li class="menu-item" x-bind:class="$current('/agent-reports') ? 'active' : ''">
                    <a href="{{ route('agent-reports') }}" wire:navigate class="menu-link">
                        <div data-i18n="Reports">Reports</div>
                    </a>
                </li>
            </ul>
        </li>


        <li class="menu-item"
            x-bind:class="$current('/add-vendor-bill') || $current('/vendor-reports') ? 'open' : ''">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-file-description"></i>
                <div data-i18n="Vendor Reports">Vendor Reports</div>
                <div class="badge bg-primary rounded-pill ms-auto"></div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item" x-bind:class="$current('/add-vendor-bill') ? 'active' : ''">
                    <a href="{{ route('add-vendor-bill') }}" wire:navigate class="menu-link">
                        <div data-i18n="Add Bill">Add Bill</div>
                    </a>
                </li>

                <li class="menu-item" x-bind:class="$current('/vendor-reports') ? 'active' : ''">
                    <a href="{{ route('vendor-reports') }}" wire:navigate class="menu-link">
                        <div data-i18n="Reports">Reports</div>
                    </a>
                </li>
            </ul>
        </li>


        <li class="menu-item" x-bind:class="$current('/add-expense') || $current('/expense-reports') ? 'open' : ''">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-file-description"></i>
                <div data-i18n="Vendor Reports">Expenses Reports</div>
                <div class="badge bg-primary rounded-pill ms-auto"></div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item" x-bind:class="$current('/add-expense') ? 'active' : ''">
                    <a href="{{ route('add-expense') }}" wire:navigate class="menu-link">
                        <div data-i18n="Add Bill">Add Bill</div>
                    </a>
                </li>

                <li class="menu-item" x-bind:class="$current('/expense-reports') ? 'active' : ''">
                    <a href="{{ route('expense-reports') }}" wire:navigate class="menu-link">
                        <div data-i18n="Reports">Reports</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item" x-bind:class="$current('/final-statment') ? 'active' : ''">
            <a href="{{ route('final-statment') }}" wire:navigate class="menu-link">
                <i class="menu-icon tf-icons ti ti-report-money"></i>
                <div data-i18n="Vendor Reports">Final Statements</div>
                <div class="badge bg-primary rounded-pill ms-auto"></div>
            </a>
        </li>


    </ul>
</aside>
<!-- / Menu -->
