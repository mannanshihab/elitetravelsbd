<div class="authentication-wrapper authentication-cover authentication-bg">
  @vite(['resources/assets/vendor/scss/pages/page-auth.scss', 'resources/assets/js/pages-auth.js'])

    <div class="authentication-inner row">
  
      <!-- /Left Text -->
      <div class="d-none d-lg-flex col-lg-7 p-0">
        <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
          <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
              <img src="{{ asset('images/travels.png') }}" alt="auth-login-cover" class="img-fluid my-5 auth-illustration"/>
          </div>
        </div>
      </div>
      <!-- /Left Text -->
  
      <!-- Forgot Password -->
      <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
        <div class="w-px-400 mx-auto">
           <!-- Logo -->
            <div class="app-brand mb-4">
              <img src="{{ asset('images/Elite-Travels-Logo.png') }}" alt="auth-login-cover" class="img-fluid">
            </div>
            <!-- /Logo -->
          <h3 class="mb-1">Forgot Password? 🔒</h3>
          <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
          <form wire:submit.prevent='save' id="formAuthentication" class="mb-3">
            <!-- flash message -->
              @include('livewire.partials.flash-session')
            <!-- /flash message -->
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" wire:model="email" id="email" name="email" placeholder="Enter your email">
            </div>
            @error('email')
                <p class="text-danger mt-2" id="email">{{ $message }}</p>
            @enderror
            <button type="submit" class="btn btn-primary d-grid w-100">
              <span wire:loading.remove>Send Reset Link</span>
              <span wire:loading>
                <div class="spinner-border text-dark" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
              </span>
            </button>
          </form>
          <div class="text-center">
            <a wire:navigate href="{{route('login')}}" class="d-flex align-items-center justify-content-center">
              <i class="ti ti-chevron-left scaleX-n1-rtl"></i>
              Back to login
            </a>
          </div>
        </div>
      </div>
      <!-- /Forgot Password -->
    </div>
  </div>
