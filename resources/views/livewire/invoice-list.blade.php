<div>

    <div class="card mb-4">
        <div class="card-widget-separator-wrapper">
            <div class="card-body card-widget-separator">
                <div class="row gy-4 gy-sm-1">
                    <div class="col-sm-6 col-lg-3">
                        <div
                            class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                            <div>
                                <h3 class="mb-1 text-black">{{ $total_clients }}</h3>
                                <p class="mb-0 text-black">Clients</p>
                            </div>
                            <span class="avatar me-sm-4">
                                <span class="avatar-initial bg-label-secondary rounded text-black"><i
                                        class="ti ti-user ti-md"></i></span>
                            </span>
                        </div>
                        <hr class="d-none d-sm-block d-lg-none me-4">
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div
                            class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                            <div>
                                <h3 class="mb-1 text-black">{{ $total_invoices }}</h3>
                                <p class="mb-0 text-black">Invoices</p>
                            </div>
                            <span class="avatar me-lg-4">
                                <span class="avatar-initial bg-label-secondary rounded  text-black"><i
                                        class="ti ti-file-invoice ti-md"></i></span>
                            </span>
                        </div>
                        <hr class="d-none d-sm-block d-lg-none">
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div
                            class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
                            <div>
                                <h3 class="mb-1 text-black">$2.46k</h3>
                                <p class="mb-0 text-black">Paid</p>
                            </div>
                            <span class="avatar me-sm-4">
                                <span class="avatar-initial bg-label-secondary rounded  text-black"><i
                                        class="ti ti-checks ti-md"></i></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h3 class="mb-1 text-black">$876</h3>
                                <p class="mb-0 text-black">Unpaid</p>
                            </div>
                            <span class="avatar">
                                <span class="avatar-initial bg-label-secondary rounded  text-black"><i
                                        class="ti ti-circle-off ti-md"></i></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">

        <h5 class="card-header pb-0">Invoice List</h5>
        {{-- table header --}}
        <div class="row">
            {{-- view Pages --}}
            <div class="col-md-6 d-flex justify-content-start">
                <div class="form-group d-flex card-header">
                    <label for="inputCity" class="mt-2">Show: </label>&nbsp;
                    <select wire:model.change="rows" name="rows" class="form-select"
                        aria-label="Default select example">
                        <option selected>10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    &nbsp;<label for="inputCity" class="mt-2">entries</label>
                </div>
            </div>{{-- / view Pages --}}

            {{-- Search --}}
            <div class="col-md-6 d-flex justify-content-end">
                <div class="form-group d-flex card-header">
                    <label for="inputCity" class="mt-2">Search: </label>&nbsp;
                    <input type="text" wire:model.live.debounce.250ms="search" class="form-control" id="inputCity"
                        placeholder="Search ...">
                </div>
            </div>
            {{-- End Search --}}
        </div>
        {{-- / table header --}}

        {{-- Table List --}}
        <div class="card-body">
            @include('livewire.partials.flash-session')
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th># ID</th>
                            <th>Billed</th>
                            <th>Customer Details</th>
                            <th>Work Type</th>
                            <th>Going/Tour</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                        @forelse ($invoices as $invoice)
                            <tr>
                                <td class="sorting_1"><a href="{{ route('invoice-show', $invoice->invoice) }}"
                                        class="text-primary">#{{ $invoice->invoice }}</a></td>
                                <td><span>{{ ucwords($invoice->billed->name) }}</span></td>
                                <td>
                                    <span>Name : {{ ucwords($invoice->customer->name) }}</span><br>
                                    <span>Passport No : {{ $invoice->customer->passport }}</span><br>
                                    <span>Mobile No : {{ $invoice->customer->mobile }}</span>
                                </td>
                                <td>{{ ucwords($invoice->work_type) }}</td>
                                <td>{{ ucwords($invoice->going) }}</td>
                                <td>
                                    <span>Our Amount : {{ ucwords($invoice->our_amount) }}</span><br>
                                    <span>Rcv Amount : {{ ucwords($invoice->received_amount) }}</span><br>
                                    <span>Agent Amount : {{ ucwords($invoice->agent_amount) }}</span><br>
                                </td>

                                <td>
                                    @if ($invoice->status == 'pending')
                                        <span class="badge bg-label-primary">{{ strtoupper($invoice->status) }}</span>
                                    @elseif($invoice->status == 'complete')
                                        <span class="badge bg-label-success">{{ strtoupper($invoice->status) }}</span>
                                    @else
                                        <span class="badge bg-label-danger">{{ strtoupper($invoice->status) }}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="demo-inline-spacing text-center">
                                        <!-- Start Edit Button -->
                                        <a class="btn rounded-pill btn-icon btn-primary" href="{{ route('invoice-edit', $invoice->id) }}" wire:navigate>
                                            <span class="ti ti ti-pencil text-white"></span>
                                        </a><!-- End Edit Button -->

                                        <!-- Start Delete Button -->
                                        <a type="button" class="btn rounded-pill btn-icon btn-danger"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal-{{ @$invoice->id }}">
                                            <span class="ti ti-trash text-white">
                                        </a><!--/End Delete Button -->

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal-{{ @$invoice->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div
                                                class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                                <div class="modal-content p-3 p-md-5">
                                                    <div class="modal-body">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                        <div class="text-center mb-4">
                                                            <h3 class="mb-2">Delete </h3>
                                                            <p class="text-muted">Are you sure you want to delete this
                                                                Invoice?</p>
                                                        </div>

                                                        <div class="col-12 text-center">
                                                            <a type="reset" class="btn btn-label-secondary btn-reset"
                                                                data-bs-dismiss="modal" aria-label="Close">No</a>
                                                            <a type="submit" wire:click="delete({{ $invoice->id }})"
                                                                class="btn btn-danger me-sm-3 me-5"
                                                                data-bs-dismiss="modal" aria-label="Close">Yes</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/ Delete Modal -->
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="9">No records found</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
            <br>
            {{ $invoices->links() }}
        </div>
        {{-- / End Table List --}}
    </div>
</div>
