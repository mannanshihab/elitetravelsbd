<div>
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Account Settings / {{ Auth::user()->name }}</span>
    </h4>

    <div class="row">
        <div class="col-md-12">

            <div class="card mb-4">
                <h5 class="card-header">Profile Details</h5>
                <!-- Account -->
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">

                        @if ($photo)
                            <img src="{{ $photo->temporaryUrl() }}" alt="user-avatar"
                                class="d-block w-px-100 h-px-100 rounded avatar" id="uploadedAvatar" />
                        @elseif (auth()->user()->photo)
                            <img src="{{ asset(auth()->user()->photo) }}" alt="user-avatar"
                                class="d-block w-px-100 h-px-100 rounded avatar" id="uploadedAvatar" />
                        @else
                            <img src="{{ asset('assets/img/avatars/14.png') }}" alt="user-avatar"
                                class="d-block w-px-100 h-px-100 rounded avatar" id="uploadedAvatar" />
                        @endif

                        <div class="button-wrapper">
                            <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                                <span class="d-none d-sm-block">Upload new photo</span>
                                <i class="ti ti-upload d-block d-sm-none"></i>
                                <input type="file" wire:model="photo" id="upload" class="account-file-input"
                                    hidden accept="image/png, image/jpeg" />
                            </label>
                            <div class="text-muted">Allowed JPG, GIF or PNG.</div>
                        </div>
                    </div>
                </div>

                <hr class="my-0">
                <div class="card-body">

                    @include('livewire.partials.flash-session')

                    <form wire:submit.prevent="update" id="formAccountSettings">

                        <div class="row">
                            <div class="mb-3 col-md-6">
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
    
                            <div class="mb-3 col-md-6">
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

                            <div class="mb-3 col-md-6">
                                <div>
                                    <label for="old_password" class="form-label">Old Password</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text" id="basic-addon11"><i class="ti ti-lock"></i></span>
                                        <input type="password" wire:model="old_password" id="old_password"
                                            class="form-control" name="old_password" placeholder="Enter your old password"
                                            aria-describedby="old_password" />
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>
                                @error('old_password')
                                    <p class="text-danger mt-2" id="password">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <div>
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text" id="basic-addon11"><i class="ti ti-lock"></i></span>
                                        <input type="password" wire:model="password" id="password" class="form-control"
                                            name="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password" />
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>
                                @error('password')
                                    <p class="text-danger mt-2" id="password">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <div>
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text" id="basic-addon11"><i class="ti ti-lock"></i></span>
                                        <input type="password" wire:model="password_confirmation" id="password_confirmation"
                                            class="form-control" name="password_confirmation" placeholder="Confirm your password"
                                            aria-describedby="password_confirmation" />
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>
                                @error('password_confirmation')
                                    <p class="text-danger mt-2" id="password">{{ $message }}</p>
                                @enderror
                            </div>


                        </div>
                        <div class="mt-2">
                            <button class="btn btn-primary me-2">
                                <span wire:loading.remove>Save changes</span>
                                <span wire:loading>
                                    <div class="spinner-border text-light" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </span>
                            </button>
                            <a href="/home"class="btn btn-label-secondary" wire:navigate>Cancel</a>
                        </div>
                    </form>
                </div>
                <!-- /Account -->

                {{-- change password setiing --}}
            </div>
        </div>
    </div>
</div>
