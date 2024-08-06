<div>

    @vite('resources/assets/vendor/scss/pages/app-invoice.scss')

    <div class="row invoice-preview">
        <!-- Invoice -->
        <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4 card">
            <div class="invoice-preview-card p-5">
                <div class="card-body invoice-preview-header rounded">
                    <div
                        class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column">
                        <div class="mb-xl-0 mb-1">
                            <div class="d-flex svg-illustration mb-2 gap-2 align-items-center">
                                <div class="app-brand-logo">
                                    <img src="{{ asset('images/Elite-Travels-Logo.png') }}" alt="" height="60">
                                </div>
                            </div>
                            <p class="mb-1">191 Commerce View Complex (4th Floor)</p>
                            <p class="mb-1">Above Mercantile Bank, Opposite Indian Embassy,</p>
                            <p class="mb-1">2no Gate, Panchlaish, Chattogram.</p>
                        </div>
                        <div>
                            <h4 class="fw-medium mb-2">Invoice #{{$invoice->invoice}}</h4>
                            <div class="mb-2 pt-1">
                                <span>Invoice Issues:</span>
                                <span class="fw-medium">{{ $invoice->created_at->format('d-m-Y') }}</span>
                            </div>
                            <div class="pt-1">
                                <span>Sales Date:</span>
                                <span class="fw-medium">{{ $invoice->created_at->format('d-m-Y') }}</span>
                            </div>
                            <div class="pt-2">
                                <span>Mobile:</span>
                                <span class="fw-medium">+880 1837212985</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row p-sm-3 p-0">
                        <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
                            <h6 class="mb-3">Invoice To:</h6>
                            <p class="mb-1 fw-bold robi-black">{{$invoice->customer->name}}</p>
                            <p class="mb-1 fw-bold robi-black">{{$invoice->customer->mobile}}</p>
                        </div>
                 
                    </div>
                </div>
                <div class="table-responsive border-top">
                    <table class="table m-0">
                        <thead class="table-light">
                            <tr>
                                <th class="fw-bold">Item</th>
                                <th class="fw-bold">Description</th>
                                <th class="fw-bold">Main Amount</th>
                                <th class="fw-bold">Qty</th>
                                <th class="fw-bold">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-bold">{{ ucwords($invoice->work_type) }}</td>
                                <td class="text-nowrap">{{ ucwords($invoice->going) }}</td>
                                <td class="px-5">{{$invoice->our_amount}} (BDT)</td>
                                <td class="px-4">1</td>
                                <td>{{1 * $invoice->our_amount}} (BDT)</td>
                            </tr>
                            <tr> 
                                <td colspan="3">
                                    <p class="mb-2 mt-3">
                                        <span class="ms-3 fw-medium">Salesperson:</span>
                                        <span>{{$invoice->billed->name}}</span>
                                    </p>
                                    <span class="ms-3">Thanks you.</span>
                                </td>
                                <td class="text-end pe-3 py-4">
                                    <p class="mb-2 pt-3">Total:</p>
                                    <p class="mb-0 pb-3">Paid/Due:</p>
                                </td>
                                <td class="ps-2 py-4">
                                    <p class="fw-medium mb-2 pt-3">{{$invoice->our_amount}} (BDT)</p>
                                    <p class="fw-medium mb-0 pb-3">{{$invoice->our_amount - $invoice->received_amount}} (BDT)</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-body mx-3">
                    <div class="row">
                        <div class="col-12">
                            <span class="fw-medium">Note:</span>
                            <span>It was a pleasure working with you and your team. 
                                future freelance
                                projects. Thank You!</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Invoice -->

        <!-- Invoice Actions -->
        <div class="col-xl-3 col-md-4 col-12 invoice-actions">
            <div class="card">
                <div class="card-body">
                    <a href="{{ url('app/invoice/edit') }}" class="btn btn-info d-grid w-100 mb-2">
                        Edit Invoice
                    </a>
                    <button class="btn btn-primary d-grid w-100 mb-2">
                        Download PDF
                    </button>
                    <a class="btn btn-success d-grid w-100 mb-2" target="_blank" href="{{ url('app/invoice/print') }}">
                        Print
                    </a>
                </div>
            </div>
        </div>
        <!-- /Invoice Actions -->
    </div>
</div>
