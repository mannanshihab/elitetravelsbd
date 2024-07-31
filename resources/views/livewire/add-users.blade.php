<div>
    <!-- Content -->
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Users /</span> Add User
    </h4>
    <div class="row">
        <!-- FormValidation -->
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Add User</h5>
                <div class="card-body">

                    <form id="formValidationExamples" class="row g-3" wire:submit.prevent="addUser">

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
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text" id="basic-addon11"><i class="ti ti-lock"></i></span>
                                    <input type="password" wire:model="password" id="password" class="form-control"
                                        name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                                @error('password')
                                    <p class="text-danger mt-2" id="password">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password_confirmation">Confirm Password</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text" id="basic-addon11"><i class="ti ti-lock"></i></span>
                                    <input type="password" wire:model="password_confirmation" id="password_confirmation"
                                        class="form-control" name="password_confirmation" placeholder="Confirm your password"
                                        aria-describedby="password_confirmation" />
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                                @error('password_confirmation')
                                    <p class="text-danger mt-2" id="password_confirmation">{{ $message }}</p>
                                @enderror
                            </div>
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
                            <a href="{{ route('list-users') }}" class="btn btn-secondary text-white" wire:navigate><i
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
