<div>
    <!-- Content -->
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Add /</span> Invoice
    </h4>
    <div class="row">
        <!-- FormValidation -->
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Create Invoice</h5>
                <div class="card-body">

                    <form id="formValidationExamples" class="row g-3">

                        <!-- Account Details -->

                        <div class="col-12">
                            <h6>Client Details</h6>
                            <hr class="mt-0" />
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="formValidationName">Full Name</label>
                            <input type="text" 
                                   id="formValidationName" 
                                   class="form-control"
                                   wire:model="name" 
                                   placeholder="Type Client Name"
                                   name="formValidationName" />
                            <!-- show error Validation-->
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="formValidationPassportNo">Passport No</label>
                            <input type="text" 
                                   id="formValidationPassportNo" 
                                   class="form-control"
                                   wire:model="passport_no" 
                                   placeholder="Type Passport No"
                                   name="formValidationPassportNo" />
                            <!-- show error Validation-->
                            @error('PassportNo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                       
                        <div class="col-md-6">
                            <label class="form-label" for="formValidationDob">DOB</label>
                            <input type="date" 
                                    class="form-control flatpickr-validation" 
                                    name="formValidationDob"
                                    wire:model="dob"
                                    id="formValidationDob" required />
                            <!-- show error Validation-->
                            @error('dob')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="Web FIle No">Web FIle No</label>
                            <input type="text" 
                                   id="formValidationWebFIleNo" 
                                   class="form-control"
                                   wire:model="web_fIle_no" 
                                   placeholder="Type Web FIle No"
                                   name="formValidationWebFIleNo" />
                            <!-- show error Validation-->
                            @error('web_fIle_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="TokenNo">Token No</label>
                            <input type="text" 
                                   id="formValidationTokenNo" 
                                   class="form-control"
                                   wire:model="token_no" 
                                   placeholder="Type Token No"
                                   name="formValidationTokenNo" />
                            <!-- show error Validation-->
                            @error('web_fIle_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="Member Id">Member Id</label>
                            <input type="text" 
                                   id="formValidationMemberId" 
                                   class="form-control"
                                   wire:model="member_id" 
                                   placeholder="Type MemberId"
                                   name="formValidationMemberId" />
                            <!-- show error Validation-->
                            @error('member_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        
                        <div class="col-md-6">
                            <label class="form-label" for="formValidationGender">Work Type</label>
                            <select id="formValidationWorkType" 
                                    class="form-select" wire:model="work_type"
                                    name="formValidationWorkType">
                                <option value="">Select Work Type</option>
                                <option value="VISA">VISA</option>
                                <option value="AIR Ticket">AIR Ticket</option>
                                <option value="Tour Packege">Tour Packege</option>
                            </select>
                            {{-- show error --}}
                            @error('work_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="Member Id">Refer Agent</label>
                            <input type="text" 
                                   id="formValidationReferAgent" 
                                   class="form-control"
                                   wire:model="ReferAgent" 
                                   placeholder="Type Refer Agent"
                                   name="formValidationReferAgent" />
                            <!-- show error Validation-->
                            @error('refer_agent')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="RCV Date">RCV Date</label>
                            <input type="date" 
                                   id="formValidationRCVDate" 
                                   class="form-control"
                                   wire:model="RCV_date" 
                                   min="{{ date('Y-m-d') }}"
                                   name="formValidationRCVDate" />
                            <!-- show error Validation-->
                            @error('RCV_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="formValidationGender">File Status</label>
                            <select id="formValidationWorkType" 
                                    class="form-select" wire:model="file_status"
                                    name="formValidationWorkType">
                                <option value="Pending">Pending</option>
                                <option value="Complete">Complete</option>
                                <option value="Cancel">Cancel</option>
                            </select>
                            {{-- show error --}}
                            @error('file_status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="Delivery Date">Delivery Date</label>
                            <input type="date" 
                                   id="formValidationDeliveryDate" 
                                   class="form-control"
                                   wire:model="delivery_date" 
                                   min="{{ date('Y-m-d') }}"
                                   name="formValidationDeliveryDate" />
                            <!-- show error Validation-->
                            @error('delivery_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="col-md-6"></div>
                        <br class="mt-5">

                        <div class="col-md-3">
                            <label class="form-label" for="Amount">Amount</label>
                            <input type="number" 
                                   id="formValidationAmount" 
                                   class="form-control"
                                   wire:model="amount"
                                   name="formValidationAmount" />
                            <!-- show error Validation-->
                            @error('amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label class="form-label" for="Qty">Qty</label>
                            <input type="number" 
                                   id="formValidationQty" 
                                   class="form-control"
                                   wire:model="Qty" 
                                   name="formValidationQty" />
                            <!-- show error Validation-->
                            @error('amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label class="form-label" for="Total">Total</label>
                            <input type="number" 
                                   id="formValidationTotal" 
                                   class="form-control"
                                   wire:model="total" 
                                   name="formValidationTotal" />
                            <!-- show error Validation-->
                            @error('total')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label class="form-label" for="Costing">Costing</label>
                            <input type="number" 
                                   id="formValidationCosting" 
                                   class="form-control"
                                   wire:model="costing" 
                                   name="formValidationCosting" />
                            <!-- show error Validation-->
                            @error('costing')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label class="form-label" for="VisaFee">Visa Fee</label>
                            <input type="number" 
                                   id="formValidationVisaFee" 
                                   class="form-control"
                                   wire:model="visa_fee" 
                                   name="formValidationVisaFee" />
                            <!-- show error Validation-->
                            @error('visa_fee')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label class="form-label" for="Service Charge">Service Charge</label>
                            <input type="number" 
                                   id="formValidationServiceCharge" 
                                   class="form-control"
                                   wire:model="service_charge" 
                                   name="formValidationService Charge" />
                            <!-- show error Validation-->
                            @error('service_charge')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button type="submit" name="submitButton" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /FormValidation -->
    </div>

    <!-- / Content -->
</div>
