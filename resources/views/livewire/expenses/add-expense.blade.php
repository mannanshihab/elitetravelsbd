<div>
    @vite(['resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss', 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.js', 'resources/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.scss', 'resources/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js'])
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Expenses /</span> Bill
    </h4>
    <div class="row">
        <!-- FormValidation -->
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Add Expenses Bill</h5>
                <div class="card-body">

                    <form id="formValidationExamples" class="row g-3" wire:submit.prevent="addExpenseBill">

                        <!-- Account Details -->
                        <div class="col-12">
                            <hr class="mt-0" />
                        </div>
                        @include('livewire.partials.flash-session')

                        <div class="col-md-6">
                            <label class="form-label" for="selectpickerLiveSearch">Type Of Expense</label>
                            <div class="input-group" wire:ignore>
                                <span class="input-group-text" id="basic-addon11"><i class="ti ti-license"></i></span>
                                <select id="selectpickerLiveSearch" wire:model.live="type_of_expense"
                                    class="selectpicker form-control" data-style="btn-default" data-live-search="true"
                                    tabindex="null" required>
                                    <option value="">Type Of Expense</option>
                                    <option>Pettycash</option>
                                    <option>Salary</option>
                                </select>
                            </div>
                            @error('agent_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        @if ($type_of_expense == 'Pettycash')
                            <div class="col-md-6">
                                <label class="form-label" for="formValidationSource">Purpose</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon11"><i
                                            class="ti ti-package"></i></span>
                                    <input type="text" id="formValidationSource" class="form-control"
                                        wire:model="purpose" placeholder="Enter Purpose" name="formValidationSource" />
                                </div>
                                @error('source')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif

                        @if ($type_of_expense == 'Salary')
                            <div class="col-md-6">
                                <label class="form-label" for="selectpickerLiveSearch">Employee List</label>
                                <div class="input-group" wire:ignore>
                                    <span class="input-group-text" id="basic-addon11"><i class="ti ti-user"></i></span>
                                    <select id="selectpickerLiveSearch" wire:model="employee_id"
                                        class="selectpicker form-control" data-style="btn-default"
                                        data-live-search="true" tabindex="null" required>
                                        <option value="">Select Employee</option>
                                        @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('agent_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif

                        @if($type_of_expense)
                        <div class="col-md-6">
                            <label class="form-label" for="Amount">Amount </label>
                            <div class="input-group">
                                <span class="input-group-text">৳</span>
                                <input type="number" class="form-control" placeholder="Amount"
                                    wire:model="amount" aria-label="Amount " required />
                                <span class="input-group-text">.00</span>
                            </div>
                            @error('amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endif

                        <div class="col-12">
                            <button type="submit" name="submitButton" class="btn btn-primary"><span
                                    wire:loading.remove>Submit</span>
                                <span wire:loading>
                                    <div class="spinner-border text-light" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </span></button>

                            <a href="{{ route('expense-reports') }}" class="btn btn-secondary text-white" wire:navigate><i
                                    class="ti ti-arrow-left"></i> Back Expense Reports </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- /FormValidation -->
    </div>

    <!-- / Content -->
</div>

@script
    <script>
        document.addEventListener('picker', function(e) {
            const status = e.detail[0].status;
            if (status === 'yes') {
                setTimeout(() => {
                    const selectPicker = $(".selectpicker");
                    if (selectPicker.length) {
                        selectPicker.selectpicker('destroy');
                        selectPicker.selectpicker();
                    }

                    const bsDatepickerFormat = $(".bsdatepicker");
                    if (bsDatepickerFormat.length) {
                        bsDatepickerFormat.datepicker({
                            format: "dd-mm-yyyy",
                        });
                    }
                }, 100);
            } else if (status === 'no') {
                setTimeout(() => {
                    const selectPicker = $(".selectpicker");
                    if (selectPicker.length) {
                        selectPicker.selectpicker('destroy');
                        selectPicker.selectpicker();
                    }
                }, 100);

                const bsDatepickerFormat = $(".bsdatepicker");
                if (bsDatepickerFormat.length) {
                    bsDatepickerFormat.datepicker("destroy");
                }
            }
        });
    </script>
@endscript
