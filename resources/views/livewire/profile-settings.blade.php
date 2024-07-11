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
                            <img src="{{ $photo }}" alt="user-avatar"
                                class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                        @else
                            <img src="{{ asset('assets/img/avatars/14.png') }}" alt="user-avatar"
                                class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
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

                    <form wire:submit.prevent="update" id="formAccountSettings" enctype="multipart/form-data">

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <div>
                                    <label for="Name" class="form-label">Name</label>
                                    <input class="form-control" type="text" wire:model="name" name="name"
                                        placeholder="Enter Your Name" />
                                </div>

                                @error('name')
                                    <p class="text-danger mt-2" id="password">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="mb-3 col-md-6">
                                <div>
                                    <label for="email" class="form-label">E-mail</label>
                                    <input class="form-control" type="text" wire:model="email" name="email"
                                        placeholder="Enter Your Email" />
                                </div>
                                @error('email')
                                    <p class="text-danger mt-2" id="password">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <div>
                                    <label for="old_password" class="form-label">Old Password</label>
                                    <input class="form-control" type="password" wire:model="old_password"
                                        name="old_password" placeholder="Enter your old password" />
                                </div>
                                @error('old_password')
                                    <p class="text-danger mt-2" id="password">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <div>
                                    <label for="password" class="form-label">Password</label>
                                    <input class="form-control" type="password" wire:model="password" name="password"
                                        placeholder="Enter your password" />
                                </div>
                                @error('password')
                                    <p class="text-danger mt-2" id="password">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <div>
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input class="form-control" type="password" wire:model="password_confirmation"
                                        name="password_confirmation" placeholder="Confirm your password" />
                                </div>
                                @error('password_confirmation')
                                    <p class="text-danger mt-2" id="password">{{ $message }}</p>
                                @enderror
                            </div>


                        </div>
                        <div class="mt-2">
                            <button wire:submit.prevent="update" class="btn btn-primary me-2">
                                <span wire:loading.remove>Save changes</span>
                                <span wire:loading>
                                    <div class="spinner-border text-light" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </span>
                            </button>
                            <a href="/home"class="btn btn-label-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
                <!-- /Account -->

                {{-- change password setiing --}}
            </div>
        </div>
    </div>
</div>
