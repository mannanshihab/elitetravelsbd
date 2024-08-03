<div class="row">
    <div class="col-md-6 my-2">
        <label class="form-label" for="formValidationName">Full Name*</label>
        <div class="input-group" wire:ignore>
            <a class="btn btn-outline-secondary waves-effect" href="{{ route('add-customer') }}" wire:navigate>Add
                Customer</a>
            <select id="selectpickerLiveSearch" wire:change.live="getCustomerDetails" wire:model='customer_id'
                class="selectpicker form-select" data-style="btn-default" data-live-search="true" required>
                <option value="">Select Work Type</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">
                        {{ $customer->name . ' - ' . $customer->mobile }}
                    </option>
                @endforeach
            </select>
        </div>
        @error('customer_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-6 my-2"->
        <label class="form-label" for="formValidationDob">Date of Birth*</label>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon11"><i class="ti ti-calendar"></i></span>
            <input type="text" placeholder="DD/MM/YYYY" name="date_of_birth" wire:model="date_of_birth" disabled
                class="form-control bsdatepicker" />
            <!-- show error Validation-->
            @error('date_of_birth')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-md-6 my-2">
        <label class="form-label" for="formValidationPassportNo">Passport No*</label>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon11"><i class="ti ti-e-passport"></i></span>
            <input type="text" class="form-control" disabled placeholder="Please Enter Passport No"
                wire:model="passport_no" />

            <!-- show error Validation-->
            @error('passport_no')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>


    <div class="col-md-6 my-2">
        <label class="form-label" for="Member Id">Member Id</label>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon11"><i class="ti ti-award"></i></span>

            <input type="text" class="form-control" disabled placeholder="Please Enter Member Id"
                wire:model="member_id" />

            <!-- show error Validation-->
            @error('member_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>


    <div class="col-md-6 my-2">
        <label class="form-label" for="formValidationName">Package Name/Code no</label>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon11"><i class="ti ti-file"></i></span>
            <select id="selectpickerLiveSearch" wire:model="package_name" class="selectpicker form-select"
                data-style="btn-default" data-live-search="true" required>
                <option value="">Select Package</option>
                <option value="#257-kolkata-Kashmir">#257 - Kolkata - Kashmir</option>
                <option value="#395-India-Thailand-Singapore">#258 - India - Thailand - Singapore</option>
            </select>
        </div>
        @error('customer_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>