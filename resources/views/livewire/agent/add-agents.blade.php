<div>

    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Agents /</span> Add Agents
    </h4>

    <div class="row">
        <!-- FormValidation -->
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Add Agents information</h5>
                <div class="card-body">
                    <form id="formValidationExamples" class="row g-3" wire:submit.prevent="addAgent">
                        <!--Agents Details -->
                        <div class="col-12">
                            <hr class="mt-0" />
                        </div>
                        @include('livewire.partials.flash-session')

                        <div class="col-md-6">
                            <label class="form-label" for="formValidationName">CEO Name</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="ti ti-user"></i></span>
                                <input type="text" class="form-control" placeholder="Please enter CEO Name"
                                    wire:model="ceo_name" aria-label="name" />
                            </div>

                            @error('ceo_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="formValidationEmail">Email</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="ti ti-mail"></i></span>
                                <input type="email" class="form-control" placeholder="Please enter email"
                                    wire:model="email" aria-label="email" />
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
                            <label class="form-label" for="formValidationName">Company Name</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="ti ti-armchair"></i></span>
                                <input type="text" wire:model="company_name" id="formValidationName"
                                    class="form-control" placeholder="Please enter Company Name"
                                    name="formValidationName" />
                            </div>
                            <div>
                                {{-- show error --}}
                                @error('company_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                        </div>

                        <div class="col-md-6">
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label" for="basic-default-upload-file">Trade License No</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti ti-upload"></i></span>
                                <input type="file" class="form-control" wire:model="trade_license_no"
                                id="basic-default-upload-file" />
                            </div>
                            @error('trade_license_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="basic-default-upload-file">NID No</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti ti-upload"></i></span>
                                <input type="file" class="form-control" wire:model="nid_no"
                                id="basic-default-upload-file" />
                            </div>
                            @error('nid_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        {{--  Add Bank Account --}}
                        <div class="col-12">
                            <h6 class="mt-2">Bank Account Details</h6>
                            <hr class="mt-0" />
                        </div>

                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-text">Banks</span>
                                <textarea class="form-control" wire:model="banks_details" rows="3" aria-label="With textarea"></textarea>
                                @error('banks_details')
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

                            <a href="{{ route('list-agent') }}" class="btn btn-secondary text-white" wire:navigate><i
                                    class="ti ti-arrow-left"></i> Back Agents List </a>
                            <a href="{{ route('invoice') }}" class="btn btn-warning" wire:navigate><i
                                    class="ti ti-arrow-left"></i> Back to Invoice </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /FormValidation -->
    </div>

</div>
