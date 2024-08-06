<div>
    @vite(['resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss', 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.js', 'resources/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.scss', 'resources/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js'])
    <!-- Content -->
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Add /</span> Invoice
    </h4>
    <div class="row">
        <!-- FormValidation -->
        <div class="col-12">
            <div class="card">
                <h5 class="card-header text-black">Create Invoice</h5>
                <div class="card-body">

                    <form id="formValidationExamples" wire:submit.prevent="addInvoice" class="row g-3">

                        @include('livewire.partials.flash-session')


                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md mb-md-0 mb-2">
                                    <div class="form-check custom-option custom-option-icon">
                                        <label class="form-check-label custom-option-content" for="customRadioIcon1">
                                            <span class="custom-option-body">
                                                <i class="ti ti-e-passport text-primary"></i>
                                                <span class="custom-option-title">VISA</span>
                                                <small>A local citizen seeking to travel abroad.</small>
                                            </span>
                                            <input name="work_type" value="visa" wire:model.live="work_type"
                                                class="form-check-input" type="radio" id="customRadioIcon1" />
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md mb-md-0 mb-2">
                                    <div class="form-check custom-option custom-option-icon">
                                        <label class="form-check-label custom-option-content" for="customRadioIcon2">
                                            <span class="custom-option-body">
                                                <i class="ti ti-plane text-success"></i>
                                                <span class="custom-option-title"> AIR TICKET </span>
                                                <small> An air ticket confirms a passenger’s seat on a flight.
                                                </small>
                                            </span>
                                            <input name="work_type" value="air ticket" wire:model.live="work_type"
                                                class="form-check-input" type="radio" value=""
                                                id="customRadioIcon2" />
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-check custom-option custom-option-icon">
                                        <label class="form-check-label custom-option-content" for="customRadioIcon3">
                                            <span class="custom-option-body">
                                                <i class="ti ti-beach  text-danger"></i>
                                                <span class="custom-option-title"> Tour Packege </span>
                                                <small> A tour package includes transport, stay, and activities.</small>
                                            </span>
                                            <input name="work_type" value="tour package" wire:model.live="work_type"
                                                class="form-check-input" type="radio" id="customRadioIcon3" />
                                        </label>
                                    </div>
                                </div>
                            </div>
                            @error('work_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <hr>


                        @if ($work_type)
                            <div class="col-md-6 my-2">
                                <label class="form-label" for="formValidationName">Full Name*</label>
                                <div class="input-group" wire:ignore>
                                    <a class="btn btn-outline-secondary waves-effect" href="{{ route('add-customer') }}"
                                        wire:navigate>Add
                                        Customer</a>
                                    <select id="selectpickerLiveSearch" wire:change.live="getCustomerDetails"
                                        wire:model='customer_id' class="selectpicker form-select"
                                        data-style="btn-default" data-live-search="true" required>
                                        <option value="">Select Work Type</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">
                                                {{ $customer->name . ' - ' . $customer->mobile }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('customer_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 my-2">
                                <label class="form-label" for="formValidationDob">Date of Birth*</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon11"><i
                                            class="ti ti-calendar"></i></span>
                                    <input type="text" placeholder="DD/MM/YYYY" name="date_of_birth"
                                        wire:model="date_of_birth" disabled class="form-control bsdatepicker" />
                                    <!-- show error Validation-->
                                    @error('date_of_birth')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 my-2">
                                <label class="form-label" for="formValidationPassportNo">Passport No*</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon11"><i
                                            class="ti ti-e-passport"></i></span>
                                    <input type="text" class="form-control" disabled
                                        placeholder="Please Enter Passport No" wire:model="passport_no" />

                                    <!-- show error Validation-->
                                    @error('passport_no')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 my-2">
                                <label class="form-label" for="Member Id">Member Id</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon11"><i class="ti ti-award"></i></span>

                                    <input type="text" class="form-control" disabled
                                        placeholder="Please Enter Member Id" wire:model="member_id" />

                                    <!-- show error Validation-->
                                    @error('member_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {!! $html !!}



                            <!-- File Status -->
                            <div class="col-xl-12">
                                <div class="card">
                                    <h5 class="card-header">File Status</h5>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md mb-md-0 mb-2">
                                                <div class="form-check custom-option custom-option-basic">
                                                    <label class="form-check-label custom-option-content"
                                                        for="customRadioTemp1">
                                                        <input name="customRadioTemp" class="form-check-input"
                                                            wire:model.live='status' type="radio"
                                                            value="file received" id="customRadioTemp1" required />
                                                        <span class="custom-option-header">
                                                            <span class="h6 mb-0">File Received</span>
                                                        </span>
                                                        <span class="custom-option-body">
                                                            <small>Document received and acknowledged processing.
                                                            </small>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md mb-md-0 mb-2">
                                                <div class="form-check custom-option custom-option-basic">
                                                    <label class="form-check-label custom-option-content"
                                                        for="customRadioTemp2">
                                                        <input name="customRadioTemp" class="form-check-input"
                                                            wire:model.live='status' type="radio"
                                                            value="processing" id="customRadioTemp2" required />
                                                        <span class="custom-option-header">
                                                            <span class="h6 mb-0">Processing</span>
                                                        </span>
                                                        <span class="custom-option-body">
                                                            <small>Tasks underway but not completed.</small>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md mb-md-0 mb-2">
                                                <div class="form-check custom-option custom-option-basic">
                                                    <label class="form-check-label custom-option-content"
                                                        for="customRadioTemp3">
                                                        <input name="customRadioTemp" class="form-check-input"
                                                            wire:model.live='status' type="radio" value="success"
                                                            id="customRadioTemp3" />
                                                        <span class="custom-option-header">
                                                            <span class="h6 mb-0">Success</span>
                                                        </span>
                                                        <span class="custom-option-body">
                                                            <small>Tasks completed successfully.</small>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md mb-md-0 mb-2">
                                                <div class="form-check custom-option custom-option-basic">
                                                    <label class="form-check-label custom-option-content"
                                                        for="customRadioTemp4">
                                                        <input name="customRadioTemp" class="form-check-input"
                                                            wire:model.live='status' type="radio" value="refused"
                                                            id="customRadioTemp4" required />
                                                        <span class="custom-option-header">
                                                            <span class="h6 mb-0">Refused</span>
                                                        </span>
                                                        <span class="custom-option-body">
                                                            <small>Denying acceptance or declining request. </small>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md mb-md-0 mb-2">
                                                <div class="form-check custom-option custom-option-basic">
                                                    <label class="form-check-label custom-option-content"
                                                        for="customRadioTemp5">
                                                        <input name="customRadioTemp" class="form-check-input"
                                                            wire:model.live='status' type="radio" value="delivered"
                                                            id="customRadioTemp5" required />
                                                        <span class="custom-option-header">
                                                            <span class="h6 mb-0">Delivered</span>
                                                        </span>
                                                        <span class="custom-option-body">
                                                            <small>Document successfully delivered. </small>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--/End File Status -->


                            <div class="my-3"></div>
                            <hr>
                        @endif



                        @if ($work_type && $status)
                            <!-- Payment Details -->
                            
                            <div class="col-md-12">
                                <div class="row">
                                    <h6>Payment Details</h6>

                                    <div class="col">
                                        <label class="form-label" for="selectpickerLiveSearch">Refer Agent</label>
                                        <div class="input-group" wire:ignore>
                                            <a class="btn btn-outline-secondary waves-effect"
                                                href="{{ route('add-agent') }}" wire:navigate>Add Agent</a>
                                            <select id="selectpickerLiveSearch" wire:model="agent_id"
                                                class="selectpicker form-control" data-style="btn-default"
                                                data-live-search="true" tabindex="null" required>
                                                <option value="">Select Agent</option>
                                                @foreach ($agents as $agent)
                                                    <option value="{{ $agent->id }}">
                                                        {{ $agent->company_name . ' - ' . $agent->mobile }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error(' agent_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <label class="form-label" for="Our Amount">Our Amount</label>
                                        <div class="input-group">
                                            <span class="input-group-text">৳</span>
                                            <input type="number" class="form-control"
                                                placeholder="Please Enter Our Amount"
                                                wire:model.live.debounce.500ms="our_amount" min="0"
                                                aria-label="Our Amount (to the nearest dollar)" required />
                                            <span class="input-group-text">.00</span>
                                        </div>
                                        @error('our_amount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <label class="form-label" for="Received Amount">Received
                                            Amount</label>
                                        <div class="input-group">
                                            <span class="input-group-text">৳</span>
                                            <input type="number" class="form-control"
                                                placeholder="Please Enter Received Amount"
                                                wire:model.live.debounce.500ms="received_amount" min="0"
                                                aria-label="Received Amount (to the nearest dollar)" required />
                                            <span class="input-group-text">.00</span>
                                        </div>
                                        @error('received_amount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <label class="form-label" for="Agent Amount">Agent Amount</label>
                                        <div class="input-group">
                                            <span class="input-group-text">৳</span>
                                            <input type="number" class="form-control"
                                                placeholder="Please Enter Agent Amount" wire:model="agent_amount"
                                                min="0" aria-label="Agent Amount (to the nearest dollar)"
                                                disabled />
                                            <span class="input-group-text">.00</span>
                                        </div>
                                        @error('agent_amount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            @if(!empty($status) && $status != 'file received')
                            <div class="col-md-4 my-2">
                                <label class="form-label" for="selectpickerLiveSearch">Working
                                    Vendors</label>
                                <div class="input-group" wire:ignore>
                                    <a class="btn btn-outline-secondary waves-effect"
                                        href="{{ route('add-vendor') }}" wire:navigate>Add
                                        Vendor</a>
                                    <select id="selectpickerLiveSearch" wire:model="vendor_id"
                                        class="selectpicker form-control" data-style="btn-default"
                                        data-live-search="true" tabindex="null" {{ $status ? '' : 'disabled' }}>
                                        <option value="">Select Work Type</option>
                                        @foreach ($vendors as $vendor)
                                            <option value="{{ $vendor->id }}">
                                                {{ $vendor->vendor_name . ' - ' . $vendor->mobile }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- show error Validation-->
                                @error('vendor_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 my-2">
                                <label class="form-label" for="Costing">Costing</label>
                                <div class="input-group">
                                    <span class="input-group-text">৳</span>
                                    <input type="number" class="form-control" min="0"
                                        placeholder="Enter Costing" wire:model.live.debounce.500ms="costing"
                                        aria-label="Costing" />
                                    <span class="input-group-text">.00</span>
                                    <!-- show error Validation-->
                                    @error('costing')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 my-2">
                                <label class="form-label" for="Profit">Our Profit (show when
                                    status
                                    is delivered)</label>
                                <div class="input-group">
                                    <span class="input-group-text">৳</span>
                                    <input type="number" class="form-control" min="0"
                                        placeholder="Enter Profit" wire:model="profit" aria-label="Profit"
                                        disabled />
                                    {{-- <span class="input-group-text">.00</span> --}}
                                </div>
                            </div>
                            @endif
                            <!--/End Payment Details -->
                            <div class="col-12">
                                <button type="submit" name="submitButton" class="btn btn-primary">
                                    <span wire:loading.remove>Submit</span>
                                    <span wire:loading>
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </span>
                                </button>
                            </div>

                        @endif
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
        // $(".form-check-input").click(function() {
        //     runSelector();
        // })

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
