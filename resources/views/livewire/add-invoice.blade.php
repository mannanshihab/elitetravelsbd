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
                            @error('status')
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

                            <div class="col-md-6 my-2"->
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
                        @endif


                        {!! $html !!}

                        <div class="my-3"></div>
                        <hr>
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
                                                        <i class="ti ti-loader-2 text-primary"></i>
                                                        <span class="custom-option-title">Pending</span>
                                                        <small>Still in progress or awaiting further action.</small>
                                                    </span>
                                                    <input name="status" value="pending" wire:model="status"
                                                        class="form-check-input" type="radio" id="customRadioIcon1"
                                                        checked />
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md mb-md-0 mb-2">
                                            <div class="form-check custom-option custom-option-icon">
                                                <label class="form-check-label custom-option-content"
                                                    for="customRadioIcon2">
                                                    <span class="custom-option-body">
                                                        <i class="ti ti-star text-success"></i>
                                                        <span class="custom-option-title"> Complete </span>
                                                        <small> Fully finished and finalized. </small>
                                                    </span>
                                                    <input name="status" value="complete" wire:model="status"
                                                        class="form-check-input" type="radio" value=""
                                                        id="customRadioIcon2" />
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-check custom-option custom-option-icon">
                                                <label class="form-check-label custom-option-content"
                                                    for="customRadioIcon3">
                                                    <span class="custom-option-body">
                                                        <i class="ti ti-circle-x  text-danger"></i>
                                                        <span class="custom-option-title"> Cancelled </span>
                                                        <small> Process is no longer proceeding. </small>
                                                    </span>
                                                    <input name="status" value="Cancelled" wire:model="status"
                                                        class="form-check-input" type="radio" value=""
                                                        id="customRadioIcon3" />
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-12">
                            <h6>Payment Details</h6>
                            <hr class="mt-0" />
                        </div>

                        {{-- <div class="col-md-4">
                            <label class="form-label" for="selectpickerLiveSearch">Refer Agent</label>
                            <div class="input-group" wire:ignore>
                                <a class="btn btn-outline-secondary waves-effect" href="{{ route('add-agent') }}"
                                    wire:navigate>Add
                                    Agent</a>
                                <select id="selectpickerLiveSearch" wire:model="agent_id"
                                    class="selectpicker form-control" data-style="btn-default"
                                    data-live-search="true" tabindex="null" required>
                                    <option value="">Select Work Type</option>
                                    @foreach ($agents as $agent)
                                        <option value="{{ $agent->id }}">
                                            {{ $agent->company_name . ' - ' . $agent->mobile }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- show error Validation-->
                            @error('agent_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}


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
                            <button type="submit" name="submitButton" class="btn btn-primary">
                                <span wire:loading.remove>Submit</span>
                                <span wire:loading>
                                    <div class="spinner-border text-light" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </span>
                            </button>

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
                const bsDatepickerFormat = $(".bsdatepicker");
                if (bsDatepickerFormat.length) {
                    bsDatepickerFormat.datepicker("destroy");
                }
            }
        });
    </script>
@endscript
