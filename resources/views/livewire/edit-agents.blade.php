<div>
   
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Agents /</span> Edit Agents
    </h4>
    
    <div class="row">
        <!-- FormValidation -->
        <div class="col-12">
            <div class="card">
            <h5 class="card-header">Update Agents information</h5>
            <div class="card-body">
                <form id="formValidationExamples" class="row g-3" wire:submit.prevent="updateAgent">
                    <!--Agents Details -->
                    <div class="col-12">
                        <hr class="mt-0" />
                    </div>
                    @include('livewire.partials.flash-session')

                    <div class="col-md-6">
                        <label class="form-label" for="formValidationName">Company Name</label>
                        <input type="text" wire:model="company_name" id="formValidationName" class="form-control" placeholder="John Doe" name="formValidationName" />
                        {{-- show error --}}
                        @error('company_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="formValidationName">CEO Name</label>
                        <input type="text" wire:model="ceo_name" id="formValidationName" class="form-control" placeholder="John Doe" name="formValidationName" />
                        {{-- show error --}}
                        @error('ceo_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="formValidationMobile">Mobile</label>
                        <input type="number" id="formValidationMobile" class="form-control" wire:model="mobile"
                            placeholder="01613456789" name="formValidationMobile" />
                        {{-- show error --}}
                        @error('mobile')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="formValidationEmail">Email</label>
                        <input class="form-control" type="email" id="formValidationEmail" wire:model="email"
                            name="formValidationEmail" placeholder="john.doe" />
                        {{-- show error --}}
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="formValidationAddress">Address</label>
                        <input type="text" id="formValidationAddress" class="form-control" wire:model="address"
                            placeholder="Enter Address" name="formValidationAddress" />
                        {{-- show error --}}
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-upload-file">Trade License No</label>
                        <input type="file" class="form-control" wire:model="trade_license_no" id="basic-default-upload-file" />
                        @error('trade_license_no')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-upload-file">NID No</label>
                        <input type="file" class="form-control" wire:model="nid_no" id="basic-default-upload-file" />
                        @error('nid_no')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {{--  Add Bank Account --}}
                    <div class="col-12">
                        <h6 class="mt-2">Bank Account Details</h6>
                        <hr class="mt-0" />
                    </div>
                    
                    <div class="input-group">
                        <span class="input-group-text">Banks</span>
                        <textarea class="form-control" wire:model="banks_details" rows="6" aria-label="With textarea"></textarea>
                        @error('banks_details')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
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

</div>
