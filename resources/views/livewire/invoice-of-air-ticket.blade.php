<div class="row">
    <div class="col-md-6 my-2">
        <label class="form-label" for="Ticket no">Ticket No</label>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon11"><i class="ti ti-calendar-event"></i></span>
            <input type="text" placeholder="Ticket No" class="form-control" wire:model="ticket_no" autocomplete="off"
                name="ticket_no" />
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
            <input type="text" class="form-control" placeholder="Please Enter PNR No" wire:model="pnr_no"
                name="pnr_no" />
            <!-- show error Validation-->
            @error('pnr_no')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
