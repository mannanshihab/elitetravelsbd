<div>

    @vite(['resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss', 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.js', 'resources/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.scss', 'resources/assets/vendor/libs/moment/moment.js', 'resources/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js'])

    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Expense /</span> Reports
    </h4>
    <div class="card">

        <h5 class="card-header pb-0">Expense Reports</h5>
        {{-- table header --}}
        <div class="row  d-flex justify-content-between">

            <div class="col-md-3">
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
            </div>

            <div class="col-md-3">
                <label for="bs-rangepicker-basic" class="form-label px-2">Date Range</label>
                <div class="form-group px-2">
                    <input type="text" id="bs-rangepicker-basic" name="datefilter" class="form-control"
                        placeholder="08/09/2024 - 08/09/2024" autocomplete="off" wire:model="datefilter" />
                </div>

            </div>


            <div class="col-md-3">
                <label for="bs-rangepicker-basic" class="form-label px-3">Search:</label>
                <div class="form-group px-3">
                    <input type="text" wire:model.live.debounce.250ms="search" class="form-control" id="inputCity"
                        placeholder="Search ...">
                </div>
            </div>

        </div>
        {{-- / table header --}}

        {{-- Table List --}}
        <div class="card-body">
            @include('livewire.partials.flash-session')
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>

                            <th>Type Of Expense</th>
                            <th>Purpose/Customer</th>
                            <th>Amount</th>
                            <th>Created At</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($expenses as $expense)
                            <tr>
                                <td class="sorting_1">{{ $expense->type_of_expense }} </td>
                                <td>
                                    @if (!empty($expense->employee_id))
                                        Employee Name: <span>{{ $expense->employee->name }}</span><br>
                                        Mobile: <span>{{ $expense->employee->mobile }}</span>
                                    @else
                                        @if (is_numeric($expense->purpose))
                                            <a
                                                href="{{ route('invoice-show', $expense->purpose) }}">#{{ $expense->purpose }}</a>
                                        @else
                                            {{ $expense->purpose }}
                                        @endif
                                    @endif
                                </td>
                                <td>{{ ucwords($expense->amount) }} (BDT)</td>
                                <td>{{ $expense->created_at->format('d-m-Y h:i:s A') }}</td>
                                <td>
                                    <div class="demo-inline-spacing text-center">
                                        @if (is_numeric($expense->source))
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
                                                data-bs-target="#deleteModal-{{ @$expense->id }}">
                                                <span class="ti ti-trash text-white">
                                            </a>
                                        @endif
                                        <!--/End Delete Button -->

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal-{{ @$expense->id }}" tabindex="-1"
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
                                                                expense?</p>
                                                        </div>

                                                        <div class="col-12 text-center">
                                                            <a type="reset" class="btn btn-label-secondary btn-reset"
                                                                data-bs-dismiss="modal" aria-label="Close">No</a>
                                                            <a type="submit" wire:click="delete({{ $expense->id }})"
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
                                <td class="text-center" colspan="6">No records found</td>
                            </tr>
                        @endforelse

                    </tbody>
                    <tfoot class="table-border-bottom-0">
                        <tr>
                            <th colspan="2"></th>
                            <th class="fw-bold">Total Amount = {{ $expenses->sum('amount') }} (BDT)</th>
                            <th colspan="1"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <br>
            {{ $expenses->links() }}
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
