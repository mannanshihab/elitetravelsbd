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
                            <select id="selectpickerLiveSearch" wire:model='customers' class="selectpicker w-100"
                                data-style="btn-default" data-live-search="true" tabindex="null"
                                data-style="btn-danger">
                                <option value="">Select Work Type</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">
                                        {{ $customer->name . ' - ' . $customer->mobile }}
                                    </option>
                                @endforeach
                            </select>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <label class="form-label" for="formValidationDob">Date of Birth*</label>
                            <input type="text" id="bs-datepicker-format" placeholder="DD/MM/YYYY"
                                class="form-control bs-datepicker-format" required autocomplete="off" />
                            <!-- show error Validation-->
                            @error('dob')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="formValidationPassportNo">Passport No*</label>
                            <input type="text" id="formValidationPassportNo" class="form-control"
                                wire:model="passport_no" placeholder="Type Passport No" required
                                name="formValidationPassportNo" />
                            <!-- show error Validation-->
                            @error('PassportNo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="Web FIle No">Web FIle No</label>
                            <input type="text" id="formValidationWebFIleNo" class="form-control"
                                wire:model="web_fIle_no" placeholder="Type Web FIle No"
                                name="formValidationWebFIleNo" />
                            <!-- show error Validation-->
                            @error('web_fIle_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="TokenNo">Token No</label>
                            <input type="text" id="formValidationTokenNo" class="form-control" wire:model="token_no"
                                placeholder="Type Token No" name="formValidationTokenNo" />
                            <!-- show error Validation-->
                            @error('web_fIle_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="Member Id">Member Id</label>
                            <input type="text" id="formValidationMemberId" class="form-control"
                                wire:model="member_id" placeholder="Type MemberId" name="formValidationMemberId" />
                            <!-- show error Validation-->
                            @error('member_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
                            <label class="form-label" for="Member Id">Refer Agent</label>
                            <select id="selectpickerLiveSearch" wire:model='agent_id' class="selectpicker w-100"
                                data-style="btn-default" data-live-search="true" tabindex="null">
                                <option value="">Select Work Type</option>
                                @foreach ($agents as $agent)
                                    <option value="{{ $agent->id }}">
                                        {{ $agent->company_name . ' - ' . $agent->mobile }}
                                    </option>
                                @endforeach
                            </select>
                            <!-- show error Validation-->
                            @error('refer_agent')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="RCV Date">RCV Date</label>
                            <input type="text" id="bs-datepicker-format" placeholder="DD/MM/YYYY"
                                class="form-control bs-datepicker-format" wire:model="RCV_date" autocomplete="off"
                                name="formValidationRCVDate" />
                            <!-- show error Validation-->
                            @error('RCV_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <label class="form-label" for="Delivery Date">Delivery Date</label>
                            <input type="text" id="bs-datepicker-format" placeholder="DD/MM/YYYY"
                                class="form-control bs-datepicker-format" wire:model="delivery_date"
                                autocomplete="off" name="formValidationDeliveryDate" />
                            <!-- show error Validation-->
                            @error('delivery_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 selectpicker-bootstrap">
                            <label class="form-label" for="formValidationGender">File Status</label>
                            <select id="formValidationWorkType" class="form-control selectpicker"
                                wire:model="file_status" name="formValidationWorkType" data-style="btn-default">
                                <option value="Pending">Pending</option>
                                <option value="Complete">Complete</option>
                                <option value="Cancel">Cancel</option>
                            </select>
                            {{-- show error --}}
                            @error('file_status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <hr class="mt-0" />
                            <h6>Payment Details</h6>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label" for="Amount">Amount</label>
                            <input type="number" id="formValidationAmount" class="form-control" wire:model="amount"
                                name="formValidationAmount" placeholder="Please Enter Amount" />
                            <!-- show error Validation-->
                            @error('amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label class="form-label" for="Qty">Qty</label>
                            <input type="number" id="formValidationQty" class="form-control" wire:model="Qty"
                                name="formValidationQty" placeholder="Please Enter Quantity" />
                            <!-- show error Validation-->
                            @error('amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label class="form-label" for="Total">Total</label>
                            <input type="number" id="formValidationTotal" class="form-control" wire:model="total"
                                name="formValidationTotal" placeholder="Please Enter Total" />
                            <!-- show error Validation-->
                            @error('total')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label class="form-label" for="Costing">Costing</label>
                            <input type="number" id="formValidationCosting" class="form-control"
                                wire:model="costing" name="formValidationCosting"
                                placeholder="Please Enter Costing" />
                            <!-- show error Validation-->
                            @error('costing')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label class="form-label" for="VisaFee">Visa Fee</label>
                            <input type="number" id="formValidationVisaFee" class="form-control"
                                wire:model="visa_fee" name="formValidationVisaFee"
                                placeholder="Please Enter Visa Fee" />
                            <!-- show error Validation-->
                            @error('visa_fee')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label class="form-label" for="Service Charge">Service Charge</label>
                            <input type="number" id="formValidationServiceCharge" class="form-control"
                                wire:model="service_charge" name="formValidationService Charge"
                                placeholder="Please Enter Service Charge" />
                            <!-- show error Validation-->
                            @error('service_charge')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
        $(document).on('keyup', '.bs-searchbox input', function() {
            // $wire.updateLive($(this).val());
        });


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
