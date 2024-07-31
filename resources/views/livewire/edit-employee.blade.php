<div>
    <!-- Content -->
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Employee /</span> Edit Employee
    </h4>
    <div class="row">
        <!-- FormValidation -->
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Edit Employee</h5>
                <div class="card-body">

                    <form id="formValidationExamples" class="row g-3" wire:submit.prevent="editEmployee">

                        <!-- Account Details -->
                        <div class="col-12">
                            <hr class="mt-0" />
                        </div>
                        @include('livewire.partials.flash-session')

                        <div class="col-md-6">
                            <label class="form-label" for="formValidationName">Name</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="ti ti-user"></i></span>
                                <input type="text" class="form-control" placeholder="Please enter CEO Name"  wire:model="name" aria-label="name"  />
                            </div>
                           
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
                            <div class="mb-3">
                                <label for="designation" class="form-label">Designation</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon11"><i class="ti ti-tag"></i></span>
                                    <input type="text" class="form-control" placeholder="Enter employee designation" wire:model="designation" aria-label="designation" id="designation" name="designation" />
                                </div>
                            </div>
                            @error('designation')
                                <p class="text-danger mt-2" id="password-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Sallery" class="form-label">Sallery</label>
                                <div class="input-group">
                                    <span class="input-group-text">৳</span>
                                    <input type="number" class="form-control" placeholder="Please Enter salary" wire:model="salary" id="salary" name="salary"/>
                                    
                                </div>
                            </div>
                            @error('salary')
                                <p class="text-danger mt-2" id="password-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="TA / DA" class="form-label">TA / DA</label>
                                <div class="input-group">
                                    <span class="input-group-text">৳</span>
                                    <input type="number" class="form-control" placeholder="Please Enter TA | DA"  wire:model="ta_da" id="ta_da" name="ta_da"/>  
                                </div>
                            </div>
                            @error('ta_da')
                                <p class="text-danger mt-2" id="password-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="basic-default-upload-file">NID No</label>
                            <input type="file" class="form-control" wire:model="nid_no" id="basic-default-upload-file"/>
                            @error('nid_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="basic-default-upload-file">CV</label>
                            <input type="file" class="form-control" wire:model="employee_cv" id="basic-default-upload-file"/>
                            @error('employee_cv')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Bkash" class="form-label">Bkash</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon11"><i class="ti ti-phone"></i></span>
                                    <input type="number" class="form-control" placeholder="01613456789" wire:model="bkash" aria-label="bkash"/>
                                </div>
                            </div>
                            @error('bkash')
                                <p class="text-danger mt-2" id="password-error">{{ $message }}</p>
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
                            <a href="{{ route('list-employees') }}" class="btn btn-secondary text-white" wire:navigate><i
                                class="ti ti-arrow-left"></i> Back </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /FormValidation -->
    </div>

    <!-- / Content -->
</div>


