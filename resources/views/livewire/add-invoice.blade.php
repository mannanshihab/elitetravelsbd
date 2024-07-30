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
                <h5 class="card-header">Create Invoice</h5>
                <div class="card-body">

                    <form id="formValidationExamples" class="row g-3">

                        <!-- Account Details -->

                        {{-- <div class="col-12">
                            <h6>Invoice Information</h6>
                            <hr class="mt-0" />
                        </div> --}}

                        <div class="col-md-6">
                            <label class="form-label" for="formValidationName">Full Name*</label>
                            <div class="input-group">
                                <a class="btn btn-outline-secondary waves-effect" href="{{ route('add-customer') }}" wire:navigate>Add
                                    Customer</a>
                                <select id="selectpickerLiveSearch" wire:model='customers'
                                    class="selectpicker form-select" data-style="btn-default" data-live-search="true"
                                    required>
                                    <option value="">Select Work Type</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">
                                            {{ $customer->name . ' - ' . $customer->mobile }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="col-md-6">
                            <label class="form-label" for="formValidationDob">Date of Birth*</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="ti ti-calendar"></i></span>
                                <input type="text" id="bs-datepicker-format" placeholder="DD/MM/YYYY"
                                    class="form-control bs-datepicker-format" required autocomplete="off" />
                                <!-- show error Validation-->
                                @error('dob')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="formValidationPassportNo">Passport No*</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i
                                        class="ti ti-e-passport"></i></span>
                                <input type="number" class="form-control" placeholder="Please Enter Passport No"
                                    wire:model="passport_no" />

                                <!-- show error Validation-->
                                @error('passport_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="Web FIle No">Web FIle No</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="ti ti-file"></i></span>
                                <input type="text" class="form-control" placeholder="Please Enter Web FIle No"
                                    wire:model="web_fIle_no" />

                                <!-- show error Validation-->
                                @error('web_fIle_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="TokenNo">Token No</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="ti ti-file-info"></i></span>
                                <input type="text" class="form-control" placeholder="Please Enter Token No"
                                    wire:model="token_no" />

                                <!-- show error Validation-->
                                @error('token_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="Member Id">Member Id</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="ti ti-award"></i></span>

                                <input type="text" class="form-control" placeholder="Please Enter Member Id"
                                    wire:model="member_id" />

                                <!-- show error Validation-->
                                @error('member_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-6 ">
                            <label class="form-label" for="Work Type">Work Type</label>
                            <select id="formValidationWorkType" class="selectpicker w-100" wire:model="work_type"
                                name="formValidationWorkType" required data-style="btn-default">
                                <option value="">Select Work Type</option>
                                <option value="VISA">VISA</option>
                                <option value="AIR Ticket">AIR Ticket</option>
                                <option value="Tour Packege">Tour Packege</option>
                            </select>
                            {{-- show error --}}
                            @error('work_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="selectpickerLiveSearch">Refer Agent</label>
                            <div class="input-group">
                                <a class="btn btn-outline-secondary waves-effect" href="{{ route('add-agent') }}" wire:navigate>Add
                                    Agent</a>
                                <select id="selectpickerLiveSearch" wire:model='agent_id'
                                    class="selectpicker form-control" data-style="btn-default"
                                    data-live-search="true" tabindex="null">
                                    <option value="">Select Work Type</option>
                                    @foreach ($agents as $agent)
                                        <option value="{{ $agent->id }}">
                                            {{ $agent->company_name . ' - ' . $agent->mobile }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- show error Validation-->
                            @error('refer_agent')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <label class="form-label" for="RCV Date">RCV Date</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i
                                        class="ti ti-calendar-event"></i></span>
                                <input type="text" id="bs-datepicker-format" placeholder="DD/MM/YYYY"
                                    class="form-control bs-datepicker-format" wire:model="RCV_date"
                                    autocomplete="off" name="formValidationRCVDate" />
                                <!-- show error Validation-->
                                @error('RCV_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>


                        <div class="col-md-6">
                            <label class="form-label" for="Delivery Date">Delivery Date</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i
                                        class="ti ti-calendar-stats"></i></span>
                                <input type="text" id="bs-datepicker-format" placeholder="DD/MM/YYYY"
                                    class="form-control bs-datepicker-format" wire:model="delivery_date"
                                    autocomplete="off" name="formValidationDeliveryDate" />
                                <!-- show error Validation-->
                                @error('delivery_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="card">
                                <h5 class="card-header">File Status</h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md mb-md-0 mb-2">
                                            <div class="form-check custom-option custom-option-icon">
                                                <label class="form-check-label custom-option-content"
                                                    for="customRadioIcon1">
                                                    <span class="custom-option-body">
                                                        <i class="ti ti-loader-2"></i>
                                                        <span class="custom-option-title">Pending</span>
                                                        <small>Still in progress or awaiting further action.</small>
                                                    </span>
                                                    <input name="customOptionRadioIcon" class="form-check-input"
                                                        type="radio" value="" id="customRadioIcon1"
                                                        checked />
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md mb-md-0 mb-2">
                                            <div class="form-check custom-option custom-option-icon">
                                                <label class="form-check-label custom-option-content"
                                                    for="customRadioIcon2">
                                                    <span class="custom-option-body">
                                                        <i class="ti ti-star"></i>
                                                        <span class="custom-option-title"> Complete </span>
                                                        <small> Fully finished and finalized. </small>
                                                    </span>
                                                    <input name="customOptionRadioIcon" class="form-check-input"
                                                        type="radio" value="" id="customRadioIcon2" />
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-check custom-option custom-option-icon">
                                                <label class="form-check-label custom-option-content"
                                                    for="customRadioIcon3">
                                                    <span class="custom-option-body">
                                                        <i class="ti ti-circle-x"></i>
                                                        <span class="custom-option-title"> Cancel </span>
                                                        <small> The action or process is no longer proceeding. </small>
                                                    </span>
                                                    <input name="customOptionRadioIcon" class="form-check-input"
                                                        type="radio" value="" id="customRadioIcon3" />
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-12">
                            <h6>Payment Details</h6>
                            <hr class="mt-0" />
                        </div>



                        <div class="col-md-4">
                            <label class="form-label" for="Amount">Amount</label>
                            <div class="input-group">
                                <span class="input-group-text">৳</span>
                                <input type="number" class="form-control" placeholder="Please Enter Amount"
                                    wire:model="amount" aria-label="Amount (to the nearest dollar)" />
                                <span class="input-group-text">.00</span>
                                <!-- show error Validation-->
                                @error('amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="Qty">Qty</label>
                            <div class="input-group">
                                <span class="input-group-text">Qty</span>
                                <input type="number" class="form-control" placeholder="Please Enter Quantity"
                                    wire:model="Qty" aria-label="Amount (to the nearest dollar)" />
                                <span class="input-group-text">.00</span>
                                <!-- show error Validation-->
                                @error('Qty')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="Total">Total</label>
                            <div class="input-group">
                                <span class="input-group-text">৳</span>
                                <input type="number" class="form-control" placeholder="120"
                                    wire:model="total_amount" aria-label="Amount (to the nearest dollar)" />
                                <span class="input-group-text">.00</span>
                                <!-- show error Validation-->
                                @error('total_amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="Costing">Costing</label>
                            <div class="input-group">
                                <span class="input-group-text">৳</span>
                                <input type="number" class="form-control" placeholder="120" wire:model="costing"
                                    aria-label="Amount (to the nearest dollar)" />
                                <span class="input-group-text">.00</span>
                                <!-- show error Validation-->
                                @error('costing')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="VisaFee">Visa Fee</label>
                            <div class="input-group">
                                <span class="input-group-text">৳</span>
                                <input type="number" class="form-control" placeholder="120" wire:model="visa_fee"
                                    aria-label="Amount (to the nearest dollar)" />
                                <span class="input-group-text">.00</span>
                                <!-- show error Validation-->
                                @error('visa_fee')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="Service Charge">Service Charge</label>
                            <div class="input-group">
                                <span class="input-group-text">৳</span>
                                <input type="number" class="form-control" placeholder="120"
                                    wire:model="service_charge" aria-label="Amount (to the nearest dollar)" />
                                <span class="input-group-text">.00</span>
                                <!-- show error Validation-->
                                @error('service_charge')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" name="submitButton" class="btn btn-primary">Submit</button>
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
            const selectPicker = $(".selectpicker"),
                select2 = $(".select2"),
                select2Icons = $(".select2-icons");

            // Bootstrap Select
            // --------------------------------------------------------------------
            if (selectPicker.length) {
                selectPicker.selectpicker();
            }

            // date by robi
            var bsDatepickerFormat = $(".bs-datepicker-format")

            if (bsDatepickerFormat.length) {
                bsDatepickerFormat.datepicker({
                    todayHighlight: true,
                    format: "dd/mm/yyyy",
                    orientation: isRtl ? "auto right" : "auto left",
                });
            }
        }, 500);
    </script>
@endscript
