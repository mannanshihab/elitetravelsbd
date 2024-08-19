<div>

    @vite(['resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss', 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.js', 'resources/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.scss', 'resources/assets/vendor/libs/moment/moment.js', 'resources/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js'])

    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Final /</span> Reports
    </h4>
    <div class="card">

        <h5 class="card-header pb-0">Final Reports</h5>
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
                            <th>Invoice Amount (received amout)</th>
                            <th>Expenses Amount</th>
                            <th>Agent Amount</th>
                            <th>Vendor Amount</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td class="sorting_1">{{ $invoice }} (BDT) - Delivered</td>
                            <td>{{ $expense }} (BDT)</td>
                            <td>{{ $agent }} (BDT)</td>
                            <td>{{ $vendor }} (BDT)</td>
                        </tr>

                    </tbody>

                </table>
            </div>
            <br>
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
