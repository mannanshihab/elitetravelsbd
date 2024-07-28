<div class="authentication-wrapper authentication-cover authentication-bg">
    @vite(['resources/assets/vendor/scss/pages/page-auth.scss', 'resources/assets/js/pages-auth.js'])

    <div class="authentication-inner row">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 p-0">
            <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                    <img src="{{ asset('images/travels.png') }}" alt="auth-login-cover"
                        class="img-fluid my-5 auth-illustration" />
                </div>
            </div>
        </div>
        <!-- /Left Text -->

        <!-- Register -->
        <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
            <div class="w-px-400 mx-auto">
                <!-- Logo -->
                <div class="app-brand mb-4">
                    <img src="{{ asset('images/Elite-Travels-Logo.png') }}" alt="auth-login-cover" class="img-fluid">
                </div>
                <!-- /Logo -->
                <form wire:submit.prevent='save' class="mb-3">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" wire:model="name" id="name" name="name"
                            placeholder="Enter your name" autofocus />
                    </div>
                    @error('name')
                        <p class="text-danger mt-2" id="name">{{ $message }}</p>
                    @enderror

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" wire:model="email" id="email" name="email"
                            placeholder="Enter your email" />
                    </div>
                    @error('email')
                        <p class="text-danger mt-2" id="password-error">{{ $message }}</p>
                    @enderror

                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-group input-group-merge">
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

                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="password_confirmation">Confirm Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" wire:model="password_confirmation" id="password_confirmation"
                                class="form-control" name="password_confirmation" placeholder="Confirm your password"
                                aria-describedby="password_confirmation" />
                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                        </div>
                        @error('password_confirmation')
                            <p class="text-danger mt-2" id="password_confirmation">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms"
                                required />
                            <label class="form-check-label" for="terms-conditions">
                                I agree to
                                <a href="javascript:void(0);">privacy policy & terms</a>
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-primary d-grid w-100">
                        <span wire:loading.remove>Sign up</span>
                        <span wire:loading>
                            <div class="spinner-border text-light" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </span>
                    </button>
                </form>

                <p class="text-center">
                    <span>Already have an account?</span>
                    <a href="{{ url('/') }}" wire:navigate>
                        <span>Sign in instead</span>
                    </a>
                </p>

                <div class="divider my-4">
                    <div class="divider-text">or</div>
                </div>
            </div>
        </div>
        <!-- /Register -->
    </div>
</div>
