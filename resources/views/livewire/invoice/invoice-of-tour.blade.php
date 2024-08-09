<div class="row">
    <div class="col-md-6 my-2">
        <label class="form-label" for="formValidationName">Package Name/Code no</label>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon11"><i class="ti ti-file"></i></span>
            <select id="selectpickerLiveSearch" wire:model="going" class="selectpicker form-select"
                data-style="btn-default" data-live-search="true" required>
                <option value="">Select Package</option>
                <option>#258 - India - Thailand - Singapore</option>
                <option>#257 - Kolkata - Mumbai - Kashmir</option>
            </select>
        </div>
        @error('going')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
