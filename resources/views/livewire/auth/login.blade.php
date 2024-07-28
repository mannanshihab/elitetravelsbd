<div>
    @vite(['resources/assets/vendor/scss/pages/page-auth.scss', 'resources/assets/js/pages-auth.js'])

    <div class="authentication-wrapper authentication-cover authentication-bg">
        <div class="authentication-inner row">
            <!-- /Left Text -->
            <div class="d-none d-lg-flex col-lg-7 p-0">
                <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                    <img src="{{ asset('images/travels.png') }}" alt="auth-login-cover"
                        class="img-fluid my-5 auth-illustration" />
                </div>
            </div>
            <!-- /Left Text -->

            <!-- Login -->
            <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
                <div class="w-px-400 mx-auto">
                    <!-- Logo -->
                    <div class="app-brand mb-4">
                        <img src="{{ asset('images/Elite-Travels-Logo.png') }}" alt="auth-login-cover"
                            class="img-fluid">
                    </div>
                    <!-- /Logo -->
                    <h3 class="mb-1">Welcome to Elite Travels! 👋</h3>
                    <p class="mb-4">Please sign-in to your account and start the adventure</p>

                    <form wire:submit.prevent='save' class="mb-3">
                        <!-- flash message -->
                        @include('livewire.partials.flash-session')
                        <!-- /flash message -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" wire:model="email" name="email-username"
                                placeholder="Enter your email" autofocus />
                        </div>
                        @error('email')
                            <p class="text-danger mt-2" id="password">{{ $message }}</p>
                        @enderror
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label>
                                <a href="{{ url('forgot-password') }}" wire:navigate>
                                    <small>Forgot Password?</small>
                                </a>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" wire:model="password" class="form-control" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                            @error('password')
                                <p class="text-danger mt-2" id="password">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-me" />
                                <label class="form-check-label" for="remember-me"> Remember Me </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary d-grid w-100">
                            <span wire:loading.remove>Sign in</span>
                            <span wire:loading>
                                <div class="spinner-border text-light" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </span>
                        </button>
                    </form>

                    <p class="text-center">
                        <span>New on our platform?</span>
                        <a href="{{ url('register') }}" wire:navigate>
                            <span>Create an account</span>
                        </a>
                    </p>

                    <div class="divider my-4">
                        <div class="divider-text">or</div>
                    </div>

                </div>
            </div>
            <!-- /Login -->
        </div>
    </div>
</div>
