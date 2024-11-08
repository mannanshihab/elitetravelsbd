@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Account settings - Security')

<!-- Vendor Styles -->
@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/select2/select2.scss',
  'resources/assets/vendor/libs/@form-validation/form-validation.scss'
])
@endsection

<!-- Page Styles -->
@section('page-style')
@vite(['resources/assets/vendor/scss/pages/page-account-settings.scss'])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/select2/select2.js',
  'resources/assets/vendor/libs/@form-validation/popular.js',
  'resources/assets/vendor/libs/@form-validation/bootstrap5.js',
  'resources/assets/vendor/libs/@form-validation/auto-focus.js',
  'resources/assets/vendor/libs/cleavejs/cleave.js',
  'resources/assets/vendor/libs/cleavejs/cleave-phone.js'
])
@endsection

<!-- Page Scripts -->
@section('page-script')
@vite([
  'resources/assets/js/pages-account-settings-security.js',
  'resources/assets/js/modal-enable-otp.js'
])
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Account Settings /</span> Security
</h4>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-4">
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-account')}}"><i class="ti-xs ti ti-users me-1"></i> Account</a></li>
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="ti-xs ti ti-lock me-1"></i> Security</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-billing')}}"><i class="ti-xs ti ti-file-description me-1"></i> Billing & Plans</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-notifications')}}"><i class="ti-xs ti ti-bell me-1"></i> Notifications</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-connections')}}"><i class="ti-xs ti ti-link me-1"></i> Connections</a></li>
    </ul>
    <!-- Change Password -->
    <div class="card mb-4">
      <h5 class="card-header">Change Password</h5>
      <div class="card-body">
        <form id="formAccountSettings" method="POST" onsubmit="return false">
          <div class="row">
            <div class="mb-3 col-md-6 form-password-toggle">
              <label class="form-label" for="currentPassword">Current Password</label>
              <div class="input-group input-group-merge">
                <input class="form-control" type="password" name="currentPassword" id="currentPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="mb-3 col-md-6 form-password-toggle">
              <label class="form-label" for="newPassword">New Password</label>
              <div class="input-group input-group-merge">
                <input class="form-control" type="password" id="newPassword" name="newPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
              </div>
            </div>

            <div class="mb-3 col-md-6 form-password-toggle">
              <label class="form-label" for="confirmPassword">Confirm New Password</label>
              <div class="input-group input-group-merge">
                <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
              </div>
            </div>
            <div class="col-12 mb-4">
              <h6>Password Requirements:</h6>
              <ul class="ps-3 mb-0">
                <li class="mb-1">Minimum 8 characters long - the more, the better</li>
                <li class="mb-1">At least one lowercase character</li>
                <li>At least one number, symbol, or whitespace character</li>
              </ul>
            </div>
            <div>
              <button type="submit" class="btn btn-primary me-2">Save changes</button>
              <button type="reset" class="btn btn-label-secondary">Cancel</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!--/ Change Password -->

    <!-- Two-steps verification -->
    <div class="card mb-4">
      <h5 class="card-header">Two-steps verification</h5>
      <div class="card-body">
        <h5 class="mb-3">Two factor authentication is not enabled yet.</h5>
        <p class="w-75">Two-factor authentication adds an additional layer of security to your account by requiring more than just a password to log in.
          <a href="javascript:void(0);">Learn more.</a>
        </p>
        <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#enableOTP">Enable two-factor authentication</button>
      </div>
    </div>
    <!-- Modal -->
    @include('_partials/_modals/modal-enable-otp')
    <!-- /Modal -->

    <!--/ Two-steps verification -->

    <!-- Create an API key -->
    <div class="card mb-4">
      <h5 class="card-header">Create an API key</h5>
      <div class="row">
        <div class="col-md-5 order-md-0 order-1">
          <div class="card-body">
            <form id="formAccountSettingsApiKey" method="POST" onsubmit="return false">
              <div class="row">
                <div class="mb-3 col-12">
                  <label for="apiAccess" class="form-label">Choose the Api key type you want to create</label>
                  <select id="apiAccess" class="select2 form-select">
                    <option value="">Choose Key Type</option>
                    <option value="full">Full Control</option>
                    <option value="modify">Modify</option>
                    <option value="read-execute">Read & Execute</option>
                    <option value="folders">List Folder Contents</option>
                    <option value="read">Read Only</option>
                    <option value="read-write">Read & Write</option>
                  </select>
                </div>
                <div class="mb-3 col-12">
                  <label for="apiKey" class="form-label">Name the API key</label>
                  <input type="text" class="form-control" id="apiKey" name="apiKey" placeholder="Server Key 1" />
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary me-2 d-grid w-100">Create Key</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-7 order-md-1 order-0">
          <div class="text-center mt-4 mx-3 mx-md-0">
            <img src="{{asset('assets/img/illustrations/girl-with-laptop.png')}}" class="img-fluid" alt="Api Key Image" width="202">
          </div>
        </div>
      </div>
    </div>
    <!--/ Create an API key -->

    <!-- API Key List & Access -->
    <div class="card mb-4">
      <h5 class="card-header">API Key List & Access</h5>
      <div class="card-body">
        <p>An API key is a simple encrypted string that identifies an application without any principal. They are useful for accessing public data anonymously, and are used to associate API requests with your project for quota and billing.</p>
        <div class="row">
          <div class="col-md-12">
            <div class="bg-lighter rounded p-3 mb-3 position-relative">
              <div class="dropdown api-key-actions">
                <a class="btn dropdown-toggle text-muted hide-arrow p-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm"></i></a>
                <div class="dropdown-menu dropdown-menu-end">
                  <a href="javascript:;" class="dropdown-item"><i class="ti ti ti-pencil text-white me-2"></i>Edit</a>
                  <a href="javascript:;" class="dropdown-item"><i class="ti ti-trash text-white me-2"></i>Delete</a>
                </div>
              </div>
              <div class="d-flex align-items-center mb-3">
                <h4 class="mb-0 me-3">Server Key 1</h4>
                <span class="badge bg-label-primary">Full Access</span>
              </div>
              <div class="d-flex align-items-center mb-3">
                <p class="me-2 mb-0 fw-medium">23eaf7f0-f4f7-495e-8b86-fad3261282ac</p>
                <span class="text-muted cursor-pointer"><i class="ti ti-copy ti-sm"></i></span>
              </div>
              <span class="text-muted">Created on 28 Apr 2021, 18:20 GTM+4:10</span>
            </div>
            <div class="bg-lighter rounded p-3 position-relative mb-3">
              <div class="dropdown api-key-actions">
                <a class="btn dropdown-toggle text-muted hide-arrow p-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm"></i></a>
                <div class="dropdown-menu dropdown-menu-end">
                  <a href="javascript:;" class="dropdown-item"><i class="ti ti ti-pencil text-white me-2"></i>Edit</a>
                  <a href="javascript:;" class="dropdown-item"><i class="ti ti-trash text-white me-2"></i>Delete</a>
                </div>
              </div>
              <div class="d-flex align-items-center mb-3">
                <h4 class="mb-0 me-3">Server Key 2</h4>
                <span class="badge bg-label-primary">Read Only</span>
              </div>
              <div class="d-flex align-items-center mb-3">
                <p class="me-2 mb-0 fw-medium">bb98e571-a2e2-4de8-90a9-2e231b5e99</p>
                <span class="text-muted cursor-pointer"><i class="ti ti-copy ti-sm"></i></span>
              </div>
              <span class="text-muted">Created on 12 Feb 2021, 10:30 GTM+2:30</span>
            </div>
            <div class="bg-lighter rounded p-3 position-relative">
              <div class="dropdown api-key-actions">
                <a class="btn dropdown-toggle text-muted hide-arrow p-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm"></i></a>
                <div class="dropdown-menu dropdown-menu-end">
                  <a href="javascript:;" class="dropdown-item"><i class="ti ti ti-pencil text-white me-2"></i>Edit</a>
                  <a href="javascript:;" class="dropdown-item"><i class="ti ti-trash text-white me-2"></i>Delete</a>
                </div>
              </div>
              <div class="d-flex align-items-center mb-3">
                <h4 class="mb-0 me-3">Server Key 3</h4>
                <span class="badge bg-label-primary">Full Access</span>
              </div>
              <div class="d-flex align-items-center mb-3">
                <p class="me-2 mb-0 fw-medium">2e915e59-3105-47f2-8838-6e46bf83b711</p>
                <span class="text-muted cursor-pointer"><i class="ti ti-copy ti-sm"></i></span>
              </div>
              <span class="text-muted">Created on 28 Dec 2020, 12:21 GTM+4:10</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ API Key List & Access -->

    <!-- Recent Devices -->
    <div class="card mb-4">
      <h5 class="card-header">Recent Devices</h5>
      <div class="table-responsive">
        <table class="table border-top">
          <thead>
            <tr>
              <th class="text-truncate">Browser</th>
              <th class="text-truncate">Device</th>
              <th class="text-truncate">Location</th>
              <th class="text-truncate">Recent Activities</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <tr>
              <td class="text-truncate"><i class='ti ti-brand-windows text-info me-2 ti-sm'></i> <span class="fw-medium">Chrome on Windows</span></td>
              <td class="text-truncate">HP Spectre 360</td>
              <td class="text-truncate">Switzerland</td>
              <td class="text-truncate">10, July 2021 20:07</td>
            </tr>
            <tr>
              <td class="text-truncate"><i class='ti ti-device-mobile text-danger me-2 ti-sm'></i> <span class="fw-medium">Chrome on iPhone</span></td>
              <td class="text-truncate">iPhone 12x</td>
              <td class="text-truncate">Australia</td>
              <td class="text-truncate">13, July 2021 10:10</td>
            </tr>
            <tr>
              <td class="text-truncate"><i class='ti ti-brand-android text-success me-2 ti-sm'></i> <span class="fw-medium">Chrome on Android</span></td>
              <td class="text-truncate">Oneplus 9 Pro</td>
              <td class="text-truncate">Dubai</td>
              <td class="text-truncate">14, July 2021 15:15</td>
            </tr>
            <tr>
              <td class="text-truncate"><i class='ti ti-brand-apple me-2 ti-sm'></i> <span class="fw-medium">Chrome on MacOS</span></td>
              <td class="text-truncate">Apple iMac</td>
              <td class="text-truncate">India</td>
              <td class="text-truncate">16, July 2021 16:17</td>
            </tr>
            <tr>
              <td class="text-truncate"><i class='ti ti-brand-windows text-info me-2 ti-sm'></i> <span class="fw-medium">Chrome on Windows</span></td>
              <td class="text-truncate">HP Spectre 360</td>
              <td class="text-truncate">Switzerland</td>
              <td class="text-truncate">20, July 2021 21:01</td>
            </tr>
            <tr class="border-transparent">
              <td class="text-truncate"><i class='ti ti-brand-android text-success me-2 ti-sm'></i> <span class="fw-medium">Chrome on Android</span></td>
              <td class="text-truncate">Oneplus 9 Pro</td>
              <td class="text-truncate">Dubai</td>
              <td class="text-truncate">21, July 2021 12:22</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!--/ Recent Devices -->

  </div>
</div>

@endsection
