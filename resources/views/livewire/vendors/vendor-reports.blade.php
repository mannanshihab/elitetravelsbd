<div>
    @vite(['resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss', 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.js', 'resources/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.scss', 'resources/assets/vendor/libs/moment/moment.js', 'resources/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js'])

    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Vendor /</span> Reports
    </h4>
    <div class="card">

        <h5 class="card-header pb-0">Vendor Reports</h5>
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
            <div class="col-md-6 d-flex">
                <div class="col-md-4 px-2">
                    <label for="bs-rangepicker-basic" class="form-label">Date Range</label>
                    <input type="text" id="bs-rangepicker-basic" name="datefilter" class="form-control"
                        placeholder="08/09/2024 - 08/09/2024" autocomplete="off" wire:model="datefilter" />
                </div>

                <div class="col-md-4" wire:ignore>
                    <label for="bs-rangepicker-basic" class="form-label">vendors</label>
                    <select id="selectpickerLiveSearch" data-size="5" wire:model.live='vendor_id'
                        class="selectpicker form-select" data-style="btn-default" data-live-search="true" required>
                        <option value="">Select Vendor</option>
                        @foreach ($vendors as $vendor)
                            <option value="{{ $vendor->id }}">{{ $vendor->vendor_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="bs-rangepicker-basic" class="form-label">Search:</label>
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
                            <th>Vendors Details</th>
                            <th>Source Of Money</th>
                            <th>Amount</th>
                            <th>Pay Via</th>
                            <th>Created At</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($statements as $statement)
                            <tr>
                                <td>
                                    Company Name: <span>{{ $statement->vendor->vendor_name }}</span><br>
                                    Mobile: <span>{{ $statement->vendor->mobile }}</span>
                                </td>
                                <td>
                                    <span>
                                        @if (is_numeric($statement->source))
                                            <a href="{{ route('invoice-show', $statement->source) }}"
                                                class="text-primary">#{{ $statement->source }}</a>
                                        @else
                                            {{ ucwords($statement->source) }}
                                        @endif
                                    </span>
                                </td>
                                <td>{{ ucwords($statement->amount) }} (BDT)</td>
                                <td>{{ ucwords($statement->pay_via) }} (BDT)</td>
                                <td>{{ $statement->created_at->format('d-m-Y g:i A') }}</td>
                                <td>
                                    <div class="demo-inline-spacing text-center">
                                        <!-- Start Edit Button -->
                                        {{-- <a class="btn rounded-pill btn-icon btn-primary"
                                            href="{{ route('invoice-edit', $invoice->id) }}" wire:navigate>
                                            <span class="ti ti ti-pencil text-white"></span>
                                        </a> --}}
                                        <!-- End Edit Button -->

                                        <!-- Start Delete Button -->
                                        @if (is_numeric($statement->source))
                                            <div class="tooltip-wrapper" data-bs-toggle="tooltip"
                                                title="This item cannot be deleted due to invoice association">
                                                <button type="button" class="btn rounded-pill btn-icon btn-danger"
                                                    disabled>
                                                    <span class="ti ti-trash text-white"></span>
                                                </button>
                                            </div>
                                        @else
                                            <a type="button" class="btn rounded-pill btn-icon btn-danger"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteModal-{{ @$statement->id }}">
                                                <span class="ti ti-trash text-white">
                                            </a>
                                        @endif
                                        <!--/End Delete Button -->

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal-{{ @$statement->id }}" tabindex="-1"
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
                                                                statement?</p>
                                                        </div>

                                                        <div class="col-12 text-center">
                                                            <a type="reset" class="btn btn-label-secondary btn-reset"
                                                                data-bs-dismiss="modal" aria-label="Close">No</a>
                                                            <a type="submit" wire:click="delete({{ $statement->id }})"
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
                    <tfoot class="table-border-bottom-0">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th class="fw-bold">Total Amount = {{ $statements->sum('amount') }} (BDT)</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <br>
            {{ $statements->links() }}
        </div>
        {{-- / End Table List --}}
    </div>
</div>

@script
    <script>
        setTimeout(() => {
            const selectPicker = $(".selectpicker");
            if (selectPicker.length) {
                // selectPicker.selectpicker('destroy');
                selectPicker.selectpicker();
            }

            $('input[name="datefilter"]').daterangepicker({
                autoUpdateInput: false,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                },
                showCustomRangeLabel: false,
                alwaysShowCalendars: true,
                locale: {
                    format: 'DD-MM-YYYY',
                    firstDay: 1
                }
            }, function(start, end) {
                $('input[name="datefilter"]').val(start.format('DD-MM-YYYY') + ' - ' + end.format(
                    'DD-MM-YYYY'));

                var dateRange = start.format('DD-MM-YYYY') + ' - ' + end.format('DD-MM-YYYY');
                @this.set('datefilter', dateRange);
                // $wire.datefilter = dateRange;
                // console.log($wire.datefilter);

            });



        }, 700);
    </script>
@endscript