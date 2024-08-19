<div>
    @vite(['resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss', 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.js', 'resources/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.scss', 'resources/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js'])
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Agents /</span> Bill
    </h4>
    <div class="row">
        <!-- FormValidation -->
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Add Agents Bill</h5>
                <div class="card-body">

                    <form id="formValidationExamples" class="row g-3" wire:submit.prevent="addAgentBill">

                        <!-- Account Details -->
                        <div class="col-12">
                            <hr class="mt-0" />
                        </div>
                        @include('livewire.partials.flash-session')

                        <div class="col-md-6">
                            <label class="form-label" for="selectpickerLiveSearch">Select Agent</label>
                            <div class="input-group" wire:ignore>
                                <span class="input-group-text" id="basic-addon11"><i class="ti ti-user"></i></span>
                                <select id="selectpickerLiveSearch" wire:model="agent_id"
                                    class="selectpicker form-control" data-style="btn-default"
                                    data-live-search="true" tabindex="null" required>
                                    <option value="">Select Agent</option>
                                    @if (!is_null($agents))
                                        @foreach ($agents as $agent)
                                            <option value="{{ $agent->id }}">
                                                {{ $agent->company_name . ' - ' . $agent->mobile }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            @error('agent_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- pay and receive selectPicker --}}

                        <div class="col-md-6">
                            <label class="form-label" for="selectpickerLiveSearch">Pay or Receive</label>
                            <div class="input-group" wire:ignore>
                                <span class="input-group-text" id="basic-addon11"><i
                                        class="ti ti-receipt"></i></span>
                                <select id="selectpickerLiveSearch" wire:model="pay_or_receive"
                                    class="selectpicker form-control" data-style="btn-default"
                                    data-live-search="false" tabindex="null" required>
                                    <option value="">Select</option>
                                    <option value="pay">Pay</option>
                                    <option value="receive">Receive</option>
                                </select>
                            </div>
                            @error('pay_or_receive')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label" for="formValidationSource">Source/Purpose</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="ti ti-package"></i></span>
                                <input type="text" id="formValidationSource" class="form-control" wire:model="source"
                                placeholder="Enter Source" name="formValidationSource" />
                            </div>
                            @error('source')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="Our Amount">Amount </label> 
                            <div class="input-group">
                                <span class="input-group-text">৳</span>
                                <input type="number" class="form-control"
                                    placeholder="Please Enter Amount"
                                    wire:model="amount"
                                    aria-label="Amount (to the nearest dollar)" required />
                                <span class="input-group-text">.00</span>
                            </div>
                            @error('amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label" for="selectpickerLiveSearch">Payment Via (optional)</label>
                            <div class="input-group" wire:ignore>
                                <span class="input-group-text" id="basic-addon11"><i class="ti ti-cash"></i></span>
                                <select id="selectpickerLiveSearch" wire:model="pay_via"
                                    class="selectpicker form-control" data-style="btn-default"
                                    data-live-search="false" tabindex="null">
                                    <option value="">Select</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Bank">Bank</option>
                                    <option value="Bkash">Bkash</option>
                                    <option value="Nagad">Nagad</option>
                                    <option value="Rocket">Rocket</option>
                                </select>
                            </div>
                            @error('pay_via')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button type="submit" name="submitButton" class="btn btn-primary"><span
                                    wire:loading.remove>Submit</span>
                                <span wire:loading>
                                    <div class="spinner-border text-light" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </span></button>

                            <a href="{{ route('agent-reports') }}" class="btn btn-secondary text-white"
                                wire:navigate><i class="ti ti-arrow-left"></i> Back Agent Reports </a>
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
        setTimeout(() => {
            const selectPicker = $(".selectpicker");

            // Bootstrap Select
            // --------------------------------------------------------------------
            if (selectPicker.length) {
                selectPicker.selectpicker('destroy');
                selectPicker.selectpicker();
            }

            // date by robi
            const bsDatepickerFormat = $(".bsdatepicker")

            if (bsDatepickerFormat.length) {
                bsDatepickerFormat.datepicker({
                    format: "dd-mm-yyyy",
                });
            }
        }, 500);
    </script>
@endscript


