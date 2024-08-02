<div>
    @vite(['resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss', 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.js', 'resources/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.scss', 'resources/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js'])
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
                            <label class="form-label" for="formValidationName">Full Name (Passport)</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="ti ti-user"></i></span>
                                <input type="text" class="form-control" placeholder="Please enter Name"
                                    wire:model="name" aria-label="name" />
                            </div>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="formValidationdate_of_birth">Date of Birth (Passport)</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="ti ti-calendar"></i></span>
                                <input type="date" class="form-control bsdatepicker" placeholder="31-12-1996"
                                    wire:model="date_of_birth" aria-label="date_of_birth"
                                    onchange="this.dispatchEvent(new InputEvent('input'))" required />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="formValidationPassport">Passport Number</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="ti ti-id-badge"></i></span>
                                <input type="text" class="form-control" placeholder="Please Enter Passport Number"
                                    wire:model="passport" aria-label="passport" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="formValidationMemberId">Member Id</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="ti ti-id-badge"></i></span>
                                <input type="text" class="form-control" placeholder="Please Enter Member Id"
                                    wire:model="member_id" aria-label="member_id" />
                            </div>
                        </div>



                        <div class="col-md-6">
                            <label class="form-label" for="formValidationEmail">Email</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11"><i class="ti ti-mail"></i></span>
                                <input type="email" class="form-control" placeholder="Please enter email"
                                    wire:model="email" aria-label="email" />
                            </div>

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


                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="formValidationSource">Source</label>
                            <input type="text" id="formValidationSource" class="form-control" wire:model="source"
                                placeholder="Enter Source" name="formValidationSource" />

                            @error('source')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="formValidationGender">Gender</label>
                            <div class="input-group" wire:ignore>
                                <select id="selectpickerLiveSearch" data-style="btn-default" data-live-search="true"
                                    class="selectpicker form-select" name="formValidationGender" wire:model="gender"
                                    onchange="this.dispatchEvent(new InputEvent('input'))">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>

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

                            <a href="{{ route('list-customer') }}" class="btn btn-secondary text-white"
                                wire:navigate><i class="ti ti-arrow-left"></i> Back Customers List </a>
                            <a href="{{ route('invoice') }}" class="btn btn-warning" wire:navigate><i
                                    class="ti ti-arrow-left"></i> Back to Invoice </a>
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
            const selectPicker = $(".selectpicker");

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
