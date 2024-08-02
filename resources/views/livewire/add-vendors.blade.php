<div>
    @vite(['resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss', 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.js', 'resources/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.scss', 'resources/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js'])

    <!-- Content -->
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Vendors /</span> Add Vendors
    </h4>
    <div class="row">
        <!-- FormValidation -->
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Add Vendors Information</h5>
                <div class="card-body">

                    <form id="formValidationExamples" class="row g-3" wire:submit.prevent="addVendors">

                        <!-- Vendors Details -->
                        <div class="col-12">
                            <hr class="mt-0" />
                        </div>
                        @include('livewire.partials.flash-session')

                        <div class="col-md-6">
                            <label class="form-label" for="formValidationVendorName">Vendor Name</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="ti ti-user"></i></span>
                                <input type="text" class="form-control" placeholder="Please Enter Vendor Name"
                                    wire:model="vendor_name" aria-label="vendor_name" />
                            </div>

                            @error('vendor_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="formValidationMobile">Mobile No</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="ti ti-phone"></i></span>
                                <input type="number" class="form-control" placeholder="01613456789" wire:model="mobile"
                                    aria-label="mobile" />
                            </div>
                            {{-- show error --}}
                            @error('mobile')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="address">Address</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="ti ti-id-badge"></i></span>
                                <input type="text" class="form-control" placeholder="Please Enter Address"
                                    wire:model="address" aria-label="address" />
                            </div>

                            {{-- show error --}}
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="vendor_type">Vendor Type</label>
                            <div class="input-group">
                                <select id="vendor_type" class="selectpicker form-select" data-style="btn-default"
                                    data-live-search="true" name="vendor_type" wire:model="vendor_type">
                                    <option value="">Select Vendor Type</option>
                                    <option value="Service Charge">Service Charge</option>
                                    <option value="Visa Fee">Visa Fee</option>
                                </select>
                                {{-- show error --}}
                            </div>
                            @error('vendor_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <h6 class="mt-2">Bank Account Details</h6>
                            <hr class="mt-0" />
                        </div>

                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-text">Banks</span>
                                <textarea class="form-control" wire:model="banks_details" rows="3" aria-label="With textarea"></textarea>
                            </div>
                            @error('banks_details')
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
                                </span>
                            </button>

                            <a href="{{ route('list-vendor') }}" class="btn btn-secondary text-white" wire:navigate><i
                                    class="ti ti-arrow-left"></i> Back Vendor List </a>

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
