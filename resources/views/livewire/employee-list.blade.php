<div>
    <h4 class="py-1 mb-4">
        <span class="text-muted fw-light">Employee /</span> List
    </h4>
    <hr class="my-2">
  
    <div class="card">
  
        <h5 class="card-header pb-0">Employee  List</h5>
        {{-- table header --}}
        <div class="row">
            {{-- view Pages --}}
            <div class="col-md-6 d-flex justify-content-start">
                <div class="form-group d-flex card-header">
                    <label for="inputCity" class="mt-2">Show: </label>&nbsp;
                    <select wire:model.change="rows" name="rows" class="form-select"
                        aria-label="Default select example">
                        <option selected>10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    &nbsp;<label for="inputCity" class="mt-2">entries</label>
                </div>
            </div>{{--/ view Pages --}}
  
            {{-- Search --}}
            <div class="col-md-6 d-flex justify-content-end">
                <div class="form-group d-flex card-header">
                    <label for="inputCity" class="mt-2">Search: </label>&nbsp;
                    <input type="text" wire:model.live.debounce.250ms="search" class="form-control" id="inputCity"
                        placeholder="search ...">
                </div>
            </div>
            {{--End Search --}}
        </div>
        {{--/ table header --}}
  
        {{-- Table List --}}
        <div class="card-body">
            @include('livewire.partials.flash-session')
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Employee Info</th>
                            <th>Office Info</th>
                            <th>Bank Info</th>
                            <th>Address</th>
                            <th>Nid</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($employees as $employee)
                            <tr>
                                <td>
                                   <span>Name : {{ $employee->name }}</span> <br>
                                   <span>Email : <a href="mailto:{{ $employee->email }}">{{ $employee->email }}</a></span><br>
                                   <span class="fw-medium"> Mobile : <a href="tel:{{ $employee->mobile }}">{{ $employee->mobile }}</a></span>
                                </td>
                                
                                <td>
                                    <span>Designation : {{ $employee->designation }}</span><br>
                                    <span>Sallery : {{ $employee->sallery }}</span><br>
                                    <span>TA-DA : {{ $employee->ta_da }}</span>
                                </td>

                                <td>
                                    <span>Bkash : {{ $employee->bkash }}</span><br>
                                    <span>Bank Details : {{ ucwords($employee->banks_details ) }}</span><br>
                                </td>
                                    
                                <td><span>{{ ucwords($employee->address) }}</span></td>
                               
                                <td>
                                    <a href="{{ asset($employee->nid_no) }}" target="_blank"><img src="{{ asset($employee->nid_no) }}" alt="user-avatar"
                                    class="d-block w-px-50 h-px-50 rounded avatar" id="uploadedAvatar" /></a>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('edit-employee', $employee->id) }}"
                                                wire:navigate><i class="ti ti-pencil me-1"></i> Edit
                                            </a>

                                            <a class="dropdown-item" href="" wire:click="addUser({{ $employee->id }})"
                                                wire:navigate><i class="ti ti-user me-1"></i> Make User
                                            </a>
                                            
                                            <a class="dropdown-item" href="javascript:void(0);"
                                                wire:click="delete({{ $employee->id }})"
                                                wire:confirm="Are you sure you want to delete this post?">
                                                <i class="ti ti-trash me-1"></i> Delete
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="6">No records found</td>
                            </tr>
                        @endforelse
                        
                    </tbody>
                </table>
            </div>
            <br>
            {{ $employees->links() }}
        </div>
        {{--/ End Table List --}}
    </div>
  </div>
  

