<div>
    <!-- Content -->
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Employee /</span> Add Employee
    </h4>
    <div class="row">
        <!-- FormValidation -->
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Add Employee</h5>
                <div class="card-body">

                    <form id="formValidationExamples" class="row g-3" wire:submit.prevent="addEmployee">

                        <!-- Account Details -->
                        <div class="col-12">
                            <hr class="mt-0" />
                        </div>
                        @include('livewire.partials.flash-session')

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" wire:model="name" id="name" name="name"
                                    placeholder="Enter your name" autofocus />
                            </div>
                            @error('name')
                                <p class="text-danger mt-2" id="name">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" wire:model="email" id="email" name="email"
                                    placeholder="Enter your email" />
                            </div>
                            @error('email')
                                <p class="text-danger mt-2" id="password-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="designation" class="form-label">Designation</label>
                                <input type="text" class="form-control" wire:model="designation" id="designation" name="designation"
                                    placeholder="Enter employee designation" />
                            </div>
                            @error('designation')
                                <p class="text-danger mt-2" id="password-error">{{ $message }}</p>
                            @enderror
                        </div>
                         
                        {{-- <div class="col-md-6">
                            <label class="form-label" for="formValidationDesignation">Designation</label>
                            <select id="formValidationDesignation" class="form-select" name="formValidationDesignation"
                                wire:model="designation">
                                <option value="">Select Designation</option>
                                <option value="Senior">Senior</option>
                                <option value="Junior">Junior</option>
                            </select>
                            
                            @error('designation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>  --}}

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Sallery" class="form-label">Sallery</label>
                                <input type="number" class="form-control" wire:model="sallery" id="sallery" name="sallery"/>
                            </div>
                            @error('sallery')
                                <p class="text-danger mt-2" id="password-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="TA / DA" class="form-label">TA / DA</label>
                                <input type="number" class="form-control" wire:model="ta_da" id="ta_da" name="ta_da"/>
                            </div>
                            @error('ta_da')
                                <p class="text-danger mt-2" id="password-error">{{ $message }}</p>
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
                            <label class="form-label" for="formValidationAddress">Address</label>
                            <input type="text" id="formValidationAddress" class="form-control" wire:model="address"
                                placeholder="Enter Address" name="formValidationAddress" />
                            {{-- show error --}}
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
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
                                <input type="number" class="form-control" wire:model="bkash" id="bkash" name="bkash"/>
                            </div>
                            @error('ta_da')
                                <p class="text-danger mt-2" id="password-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="input-group">
                            <span class="input-group-text">Banks</span>
                            <textarea class="form-control" wire:model="banks_details" rows="6" aria-label="With textarea"></textarea>
                        </div>
                        @error('banks_details')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="col-12">
                            <button type="submit" name="submitButton" class="btn btn-primary"><span
                                    wire:loading.remove>Submit</span>
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

