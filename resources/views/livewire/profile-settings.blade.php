<div>
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Account Settings / {{Auth::user()->name}}</span>
    </h4>
    
    <div class="row">
    <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-4">
            <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="ti-xs ti ti-users me-1"></i> Account</a></li>
        </ul>
        <div class="card mb-4">
        <h5 class="card-header">Profile Details</h5>
        <!-- Account -->
        <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
                <img src="{{ asset('assets/img/avatars/14.png') }}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                <div class="button-wrapper">
                    <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                        <span class="d-none d-sm-block">Upload new photo</span>
                        <i class="ti ti-upload d-block d-sm-none"></i>
                        <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                    </label>
                    <button type="button" class="btn btn-label-secondary account-image-reset mb-3">
                        <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Reset</span>
                    </button>
                    <div class="text-muted">Allowed JPG, GIF or PNG. Max size of 800K</div>
                </div>
            </div>
        </div>
        <hr class="my-0">
        <div class="card-body">
            @if(session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message')}}
                </div>
            @endif
            <form wire:submit.prevent="update" id="formAccountSettings">
                
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <div>
                            <label for="Name" class="form-label">Name</label>
                            <input class="form-control" type="text" wire:model="name" name="name" placeholder="{{Auth::user()->name}}"/>
                        </div>
                       
                        @error('name')
                            <p class="text-danger mt-2" id="password">{{ $message }}</p>
                        @enderror
                    </div>
                   
                    
                    <div class="mb-3 col-md-6">
                        <div>
                            <label for="email" class="form-label">E-mail</label>
                            <input class="form-control" type="text" wire:model="email" name="email" placeholder="{{Auth::user()->email}}"/>
                        </div>
                        @error('email')
                            <p class="text-danger mt-2" id="password">{{ $message }}</p>
                        @enderror
                    </div>
                   
                    
                    {{-- <div class="mb-3 col-md-6">
                        <label class="form-label" for="phoneNumber">Phone Number</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">BD (+880)</span>
                            <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" placeholder="202 555 0111" />
                        </div>
                    </div> --}}

                    {{-- <div class="mb-3 col-md-6">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" />
                    </div> --}}
                </div>
                <div class="mt-2">
                    <button wire:submit.prevent="update" class="btn btn-primary me-2">Save changes</button>
                    <a href="/home"class="btn btn-label-secondary">Cancel</a>
                </div>
            </form>
        </div>
        <!-- /Account -->
        </div>
        <div class="card container-xxl flex-grow-1 container-p-y">
            <h5 class="card-header">Delete Account</h5>
            <div class="card-body">
                <div class="">
                    <div class="alert alert-warning">
                        <h5 class="alert-heading mb-1">Are you sure you want to delete your account?</h5>
                        <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                    </div>
                </div>
                <span class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Account?') || event.stopImmediatePropagation()" wire:click="delete({{Auth::user()->id}})"">
                    Deleted
                </span>
            </div>
        </div>
    </div>
    </div>
</div>