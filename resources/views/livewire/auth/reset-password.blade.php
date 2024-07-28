<div class="authentication-wrapper authentication-cover authentication-bg ">
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
  
      <!-- Reset Password -->
      <div class="d-flex col-12 col-lg-5 align-items-center p-4 p-sm-5">
        <div class="w-px-400 mx-auto">
         <!-- Logo -->
          <div class="app-brand mb-4">
            <img src="{{ asset('images/Elite-Travels-Logo.png') }}" alt="auth-login-cover" class="img-fluid">
          </div>
          <!-- /Logo -->
          <h4 class="mb-1">Reset Password 🔒</h4>
          {{-- <p class="mb-4">for <span class="fw-medium">john.doe@email.com</span></p> --}}
          <form wire:submit.prevent='save' id="formAuthentication" class="mb-3">
            <!-- flash message -->
              @include('livewire.partials.flash-session')
            <!-- /flash message -->
            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password">New Password</label>
              <div class="input-group input-group-merge">
                <input type="password" wire:model="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
              </div>
              @error('password')
                  <p class="text-danger mt-2" id="password">{{ $message }}</p>
              @enderror
            </div>
            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="confirm-password">Confirm Password</label>
              <div class="input-group input-group-merge">
                <input type="password" wire:model="password_confirmation" id="confirm-password" class="form-control" name="confirm-password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
              </div>
            </div>
            @error('password')
                <p class="text-danger mt-2" id="confirm-password">{{ $message }}</p>
            @enderror
            <button class="btn btn-primary d-grid w-100 mb-3">
              <span wire:loading.remove>Set new password</span>
              <span wire:loading>
                <div class="spinner-border text-light" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
              </span>
            </button>
            <div class="text-center">
              <a wire:navigate href="{{route('login')}}">
                <i class="ti ti-chevron-left scaleX-n1-rtl"></i>
                Back to login
              </a>
            </div>
          </form>
        </div>
      </div>
      <!-- /Reset Password -->
    </div>
</div>
