<div>
    <!-- Content -->
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Customers /</span> Add Customer
    </h4>
    <div class="row">
        <!-- FormValidation -->
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Add Customers Information</h5>
                <div class="card-body">

                    <form id="formValidationExamples" class="row g-3" wire:submit.prevent="addCustomer">

                        <!-- Account Details -->
                        <div class="col-12">
                            <hr class="mt-0" />
                        </div>
                        @include('livewire.partials.flash-session')

                        <div class="col-md-6">
                            <label class="form-label" for="formValidationName">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="ti ti-user"></i></span>
                                <input type="text" class="form-control" placeholder="Please enter Name" wire:model="name" aria-label="name"  />
                            </div>
                           
                            {{-- show error --}}
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="formValidationEmail">Email</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="ti ti-mail"></i></span>
                                <input type="email" class="form-control" placeholder="Please enter email" wire:model="email" aria-label="email"  />
                            </div>
                           
                            {{-- show error --}}
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="formValidationMobile">Mobile No</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="ti ti-phone"></i></span>
                                <input type="number" class="form-control" placeholder="01613456789" wire:model="mobile" aria-label="mobile"  />
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
                                <input type="text" class="form-control" placeholder="Please Enter Address" wire:model="address" aria-label="address"  />
                            </div>
                        
                            {{-- show error --}}
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="formValidationSource">Source</label>
                            <input type="text" id="formValidationSource" class="form-control" wire:model="source"
                                placeholder="Enter Source" name="formValidationSource" />
                            {{-- show error --}}
                            @error('source')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="formValidationGender">Gender</label>
                            <select id="formValidationGender" class="form-select" name="formValidationGender"
                                wire:model="gender">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            {{-- show error --}}
                            @error('gender')
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
