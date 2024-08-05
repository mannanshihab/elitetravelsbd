<div class="row">

    <div class="col-md-6 my-2">
        <label class="form-label" for="Going Country">Going Country</label>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon11"><i class="ti ti-flag"></i></span>
            <select id="selectpickerLiveSearch" data-size="5" wire:model="going" class="selectpicker form-select"
                data-style="btn-default" data-live-search="true" required>
                <option value="">Select Country</option>
                @foreach ($countries as $country)
                    <option>{{ $country }}</option>
                @endforeach
            </select>

            @error('going')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-md-6 my-2">
        <label class="form-label" for="Ticket no">Ticket No</label>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon11"><i class="ti ti-calendar-event"></i></span>
            <input type="text" placeholder="Ticket No"  class="form-control" wire:model="ticket_no" autocomplete="off"
                name="ticket_no" required/>
            <!-- show error Validation-->
            @error('ticket_no')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-md-6 my-2">
        <label class="form-label" for="pnr_no">PNR No</label>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon11"><i class="ti ti-file"></i></span>
            <input type="text" class="form-control" placeholder="Please Enter PNR No" wire:model="pnr_no" autocomplete="off"
                name="pnr_no" required/>
            <!-- show error Validation-->
            @error('pnr_no')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
