<div>
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
                            <input type="text" id="formValidationVendorName" class="form-control" placeholder="John Doe"
                                wire:model="vendor_name" name="formValidationVendorName" />
                            {{-- show error --}}
                            @error('vendor_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="formValidationMobile">Mobile No</label>
                            <input type="number" id="formValidationMobile" class="form-control" wire:model="mobile"
                                placeholder="01613456789" name="formValidationMobile" />
                            {{-- show error --}}
                            @error('mobile')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="address">Address</label>
                            <input type="text" id="address" class="form-control" wire:model="address"
                                placeholder="Enter Address" name="address" />
                            {{-- show error --}}
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="vendor_type">Vendor Type</label>
                            <select id="vendor_type" class="form-select" name="vendor_type"
                                wire:model="vendor_type">
                                <option value="">Select Vendor Type</option>
                                <option value="Service Charge">Service Charge</option>
                                <option value="Visa Fee">Visa Fee</option>
                            </select>
                            {{-- show error --}}
                            @error('vendor_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label" for="account_details">Account Details</label>
                            <textarea class="form-control" wire:model="account_details" name="account_details" rows="3" aria-label="With textarea"></textarea>
                            @error('account_details')
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

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /FormValidation -->
    </div>

    <!-- / Content -->
</div>
