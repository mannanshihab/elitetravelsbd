<div>


    @vite(['resources/assets/vendor/libs/apex-charts/apex-charts.scss', 'resources/assets/vendor/scss/pages/app-logistics-dashboard.scss', 'resources/assets/vendor/libs/apex-charts/apexcharts.js', 'resources/assets/js/app-logistics-dashboard.js'])


    <!-- Content -->
    {{-- <livewire:test /> --}}
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Home /</span> Dashboard</h4>

    <!-- Card Border Shadow -->
    <div class="row">
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card card-border-shadow-primary">
                <a href="{{ route('list-customer') }}" wire:navigate>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-primary"><i class="ti ti-users ti-md"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $customerCount }}</h4>
                    </div>
                    <p class="mb-1">Customers</p>
                    <p class="mb-0">
                        {{-- <span class="fw-medium me-1">+18.2%</span> --}}
                        <small class="text-muted">Total Customers</small>
                    </p>
                </div>
                </a>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card card-border-shadow-warning">
                <a href="{{ route('list-agent') }}" wire:navigate>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-warning"><i
                                        class="ti ti-a-b ti-md"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">{{ $agentCount }}</h4>
                        </div>
                        <p class="mb-1">Agents</p>
                        <p class="mb-0">
                            {{-- <span class="fw-medium me-1">-8.7%</span> --}}
                            <small class="text-muted">Total Agents</small>
                        </p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card card-border-shadow-danger">
                <a href="{{ route('list-vendor') }}" wire:navigate>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-danger"><i
                                    class="ti ti-shopping-cart ti-md"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $vendorsCount }}</h4>
                    </div>
                    <p class="mb-1">Vendors</p>
                    <p class="mb-0">
                        {{-- <span class="fw-medium me-1">+4.3%</span> --}}
                        <small class="text-muted">Total Vendors</small>
                    </p>
                </div>
                </a>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card card-border-shadow-info">
                <a href="{{ route('list-employees') }}" wire:navigate>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-info"><i class="ti ti-briefcase ti-md"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $employeesCount }}</h4>
                    </div>
                    <p class="mb-1">Employees</p>
                    <p class="mb-0">
                        {{-- <span class="fw-medium me-1">-2.5%</span> --}}
                        <small class="text-muted">Total Employees</small>
                    </p>
                </div>
                </a>
            </div>
        </div>
    </div>
    <!--/ Card Border Shadow -->
    
    <div class="row">
        
        <!-- Orders by Countries -->
        <div class="col-md-12 col-xxl-4 mb-4 order-0 order-xxl-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between pb-2">
                    <div class="card-title mb-1">
                        <h5 class="m-0 me-2">Invoices</h5>
                        <small class="text-muted">{{$total_invoices}} Deliveries in Progress</small>
                    </div>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="salesByCountryTabs" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="salesByCountryTabs">
                            <a class="dropdown-item" href="javascript:void(0);">Download</a>
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                            <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="nav-align-top">
                        <ul class="nav nav-tabs nav-fill" role="tablist">
                            <li class="nav-item">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-justified-processing" aria-controls="navs-justified-processing"
                                    aria-selected="true">
                                    Processing
                                </button>
                            </li>
                            
                            <li class="nav-item">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-justified-link-success"
                                    aria-controls="navs-justified-link-success" aria-selected="false">
                                    Success
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-justified-link-refused"
                                    aria-controls="navs-justified-link-refused" aria-selected="false">
                                    Refused
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-justified-link-delivered"
                                    aria-controls="navs-justified-link-delivered" aria-selected="false">
                                    Delivered
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content px-2 mx-1 pb-0">

                            <div class="tab-pane fade show active" id="navs-justified-processing" role="tabpanel">
                                <table class="table table-bordered">
                                    <thead>
                                        <th style="width: 10%">#ID</th>
                                        <th>Customer</th>
                                        <th>Biller</th>
                                    </thead>

                                    <tbody class="table-border-bottom-0">
                                        @forelse ($invoices_processing as $invoice)
                                        <tr>
                                            <td style="width: 10%">#{{ $invoice->invoice }}</td>
                                            <!--Customer info-->
                                            <td>
                                                <ul class="timeline mb-0 pb-1">
                                                    <li class="timeline-item ps-4 mt-2 border-left-dashed pb-1">
                                                        <span class="timeline-indicator-advanced timeline-indicator-success">
                                                            <i class="ti ti-circle-check"></i>
                                                        </span>
                                                        <div class="timeline-event px-0 pb-0">
                                                            <div class="timeline-header">
                                                                <small class="text-success text-uppercase fw-medium">{{ $invoice->customer->name}}</small>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="timeline-item ps-4 border-left-dashed">
                                                        <span class="timeline-indicator-advanced timeline-indicator-primary">
                                                            <i class="ti ti-plane"></i>
                                                        </span>
                                                        <div class="timeline-event px-0 pb-0">
                                                            <div class="timeline-header">
                                                                <small class="text-primary text-uppercase fw-medium">{{ ucwords($invoice->going) }}</small>
                                                            </div>
                                                            <p class="text-muted mb-0">{{ ucwords($invoice->work_type) }}</p>
                                                        </div>
                                                    </li>
                                                    <li class="timeline-item ps-4 border-transparent">
                                                        <span class="timeline-indicator-advanced timeline-indicator-primary">
                                                            <i class="ti ti-map-pin"></i>
                                                        </span>
                                                        <div class="timeline-event px-0 pb-0">
                                                            <div class="timeline-header">
                                                                <small class="text-primary text-uppercase fw-medium">Address</small>
                                                            </div>
                                                            <p class="text-muted mb-0">{{ $invoice->customer->address}}</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                            <!--/ End Customer info-->

                                            <!--Biller info-->
                                            <td>
                                                <ul class="timeline mt-2 mb-0 pb-1">
                                                    <li class="timeline-item ps-4 border-0">
                                                        <span class="timeline-indicator-advanced timeline-indicator-success">
                                                            <i class="ti ti-user"></i>
                                                        </span>
                                                        <div class="timeline-event px-0 pb-0">
                                                            <div class="timeline-header">
                                                                <small class="text-success text-uppercase fw-medium">{{ $invoice->billed->name}}</small>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                            <!--/ End Biller info-->
                                        </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center" colspan="9">No records found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <br>
                                {{ $invoices_processing->links() }}
                            </div>

                            <div class="tab-pane fade" id="navs-justified-link-success" role="tabpanel">
                                <div class="tab-pane fade show active" id="navs-justified-success" role="tabpanel">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th style="width: 10%">#ID</th>
                                            <th>Customer</th>
                                            <th>Biller</th>
                                        </thead>
    
                                        <tbody class="table-border-bottom-0">
                                            @forelse ($invoices_success as $invoice)
                                            <tr>
                                                <td style="width: 10%">#{{ $invoice->invoice }}</td>
                                                <!--Customer info-->
                                                <td>
                                                    <ul class="timeline mb-0 pb-1">
                                                        <li class="timeline-item ps-4 mt-2 border-left-dashed pb-1">
                                                            <span class="timeline-indicator-advanced timeline-indicator-success">
                                                                <i class="ti ti-circle-check"></i>
                                                            </span>
                                                            <div class="timeline-event px-0 pb-0">
                                                                <div class="timeline-header">
                                                                    <small class="text-success text-uppercase fw-medium">{{ $invoice->customer->name}}</small>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="timeline-item ps-4 border-left-dashed">
                                                            <span class="timeline-indicator-advanced timeline-indicator-primary">
                                                                <i class="ti ti-plane"></i>
                                                            </span>
                                                            <div class="timeline-event px-0 pb-0">
                                                                <div class="timeline-header">
                                                                    <small class="text-primary text-uppercase fw-medium">{{ ucwords($invoice->going) }}</small>
                                                                </div>
                                                                <p class="text-muted mb-0">{{ ucwords($invoice->work_type) }}</p>
                                                            </div>
                                                        </li>
                                                        <li class="timeline-item ps-4 border-transparent">
                                                            <span class="timeline-indicator-advanced timeline-indicator-primary">
                                                                <i class="ti ti-map-pin"></i>
                                                            </span>
                                                            <div class="timeline-event px-0 pb-0">
                                                                <div class="timeline-header">
                                                                    <small class="text-primary text-uppercase fw-medium">Address</small>
                                                                </div>
                                                                <p class="text-muted mb-0">{{ $invoice->customer->address}}</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <!--/ End Customer info-->
    
                                                <!--Biller info-->
                                                <td>
                                                    <ul class="timeline mt-2 mb-0 pb-1">
                                                        <li class="timeline-item ps-4 border-0">
                                                            <span class="timeline-indicator-advanced timeline-indicator-success">
                                                                <i class="ti ti-user"></i>
                                                            </span>
                                                            <div class="timeline-event px-0 pb-0">
                                                                <div class="timeline-header">
                                                                    <small class="text-success text-uppercase fw-medium">{{ $invoice->billed->name}}</small>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <!--/ End Biller info-->
                                            </tr>
                                            @empty
                                                <tr>
                                                    <td class="text-center" colspan="9">No records found</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table><br>
                                    {{ $invoices_success->links() }}
                                </div>
                            </div>

                            <div class="tab-pane fade" id="navs-justified-link-refused" role="tabpanel">
                                <div class="tab-pane fade show active" id="navs-justified-refused" role="tabpanel">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th style="width: 10%">#ID</th>
                                            <th>Customer</th>
                                            <th>Biller</th>
                                        </thead>
    
                                        <tbody class="table-border-bottom-0">
                                            @forelse ($invoices_refused as $invoice)
                                            <tr>
                                                <td style="width: 10%">#{{ $invoice->invoice }}</td>
                                                <!--Customer info-->
                                                <td>
                                                    <ul class="timeline mb-0 pb-1">
                                                        <li class="timeline-item ps-4 mt-2 border-left-dashed pb-1">
                                                            <span class="timeline-indicator-advanced timeline-indicator-success">
                                                                <i class="ti ti-circle-check"></i>
                                                            </span>
                                                            <div class="timeline-event px-0 pb-0">
                                                                <div class="timeline-header">
                                                                    <small class="text-success text-uppercase fw-medium">{{ $invoice->customer->name}}</small>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="timeline-item ps-4 border-left-dashed">
                                                            <span class="timeline-indicator-advanced timeline-indicator-primary">
                                                                <i class="ti ti-plane"></i>
                                                            </span>
                                                            <div class="timeline-event px-0 pb-0">
                                                                <div class="timeline-header">
                                                                    <small class="text-primary text-uppercase fw-medium">{{ ucwords($invoice->going) }}</small>
                                                                </div>
                                                                <p class="text-muted mb-0">{{ ucwords($invoice->work_type) }}</p>
                                                            </div>
                                                        </li>
                                                        <li class="timeline-item ps-4 border-transparent">
                                                            <span class="timeline-indicator-advanced timeline-indicator-primary">
                                                                <i class="ti ti-map-pin"></i>
                                                            </span>
                                                            <div class="timeline-event px-0 pb-0">
                                                                <div class="timeline-header">
                                                                    <small class="text-primary text-uppercase fw-medium">Address</small>
                                                                </div>
                                                                <p class="text-muted mb-0">{{ $invoice->customer->address}}</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <!--/ End Customer info-->
    
                                                <!--Biller info-->
                                                <td>
                                                    <ul class="timeline mt-2 mb-0 pb-1">
                                                        <li class="timeline-item ps-4 border-0">
                                                            <span class="timeline-indicator-advanced timeline-indicator-success">
                                                                <i class="ti ti-user"></i>
                                                            </span>
                                                            <div class="timeline-event px-0 pb-0">
                                                                <div class="timeline-header">
                                                                    <small class="text-success text-uppercase fw-medium">{{ $invoice->billed->name}}</small>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <!--/ End Biller info-->
                                            </tr>
                                            @empty
                                                <tr>
                                                    <td class="text-center" colspan="9">No records found</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table><br>
                                    {{ $invoices_refused->links() }}
                                </div>
                            </div>

                            <div class="tab-pane fade" id="navs-justified-link-delivered" role="tabpanel">
                                <div class="tab-pane fade show active" id="navs-justified-refused" role="tabpanel">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th style="width: 10%">#ID</th>
                                            <th>Customer</th>
                                            <th>Biller</th>
                                        </thead>
    
                                        <tbody class="table-border-bottom-0">
                                            @forelse ($invoices_delivered as $invoice)
                                            <tr>
                                                <td style="width: 10%">#{{ $invoice->invoice }}</td>
                                                <!--Customer info-->
                                                <td>
                                                    <ul class="timeline mb-0 pb-1">
                                                        <li class="timeline-item ps-4 mt-2 border-left-dashed pb-1">
                                                            <span class="timeline-indicator-advanced timeline-indicator-success">
                                                                <i class="ti ti-circle-check"></i>
                                                            </span>
                                                            <div class="timeline-event px-0 pb-0">
                                                                <div class="timeline-header">
                                                                    <small class="text-success text-uppercase fw-medium">{{ $invoice->customer->name}}</small>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="timeline-item ps-4 border-left-dashed">
                                                            <span class="timeline-indicator-advanced timeline-indicator-primary">
                                                                <i class="ti ti-plane"></i>
                                                            </span>
                                                            <div class="timeline-event px-0 pb-0">
                                                                <div class="timeline-header">
                                                                    <small class="text-primary text-uppercase fw-medium">{{ ucwords($invoice->going) }}</small>
                                                                </div>
                                                                <p class="text-muted mb-0">{{ ucwords($invoice->work_type) }}</p>
                                                            </div>
                                                        </li>
                                                        <li class="timeline-item ps-4 border-transparent">
                                                            <span class="timeline-indicator-advanced timeline-indicator-primary">
                                                                <i class="ti ti-map-pin"></i>
                                                            </span>
                                                            <div class="timeline-event px-0 pb-0">
                                                                <div class="timeline-header">
                                                                    <small class="text-primary text-uppercase fw-medium">Address</small>
                                                                </div>
                                                                <p class="text-muted mb-0">{{ $invoice->customer->address}}</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <!--/ End Customer info-->
    
                                                <!--Biller info-->
                                                <td>
                                                    <ul class="timeline mt-2 mb-0 pb-1">
                                                        <li class="timeline-item ps-4 border-0">
                                                            <span class="timeline-indicator-advanced timeline-indicator-success">
                                                                <i class="ti ti-user"></i>
                                                            </span>
                                                            <div class="timeline-event px-0 pb-0">
                                                                <div class="timeline-header">
                                                                    <small class="text-success text-uppercase fw-medium">{{ $invoice->billed->name}}</small>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <!--/ End Biller info-->
                                            </tr>
                                            @empty
                                                <tr>
                                                    <td class="text-center" colspan="9">No records found</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table><br>
                                    {{ $invoices_delivered->links() }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Orders by Countries -->

    </div>

    <!-- / Content -->
</div>

