<div>
    <h4 class="py-1 mb-4">
        <span class="text-muted fw-light">Invoice /</span> List
    </h4>
    <hr class="my-2">
  
    <div class="card">
  
        <h5 class="card-header pb-0">Invoice  List</h5>
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
                            <th>Sl</th>
                            <th>Coustomer Details</th>
                            <th>Work Type</th>
                            <th>Descr</th>
                            <th>Qty</th>
                            <th>Amount</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                       @php
                        $sl = 1;
                       @endphp
                      {{--  @forelse ($invoices as $user) --}}
                            <tr>
                                <td>{{ $sl++ }}</td>
                                <td>
                                    <span>Name: Mannan</span><br>
                                    <span>Passport No: Mannan</span>
                                </td>
                                <td>Visa</td>
                                <td>Tourist</td>
                                <td>03</td>
                                <td>100</td>
                                <td>300</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href=""
                                                wire:navigate><i class="ti ti-pencil me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"
                                                wire:click=""
                                                wire:confirm="Are you sure you want to delete this post?"><i
                                                    class="ti ti-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        {{-- @empty --}}
                            <tr>
                                <td class="text-center" colspan="8">No records found</td>
                            </tr>
                        {{-- @endforelse --}}
                        
                    </tbody>
                </table>
            </div>
            <br>
            {{-- {{ $invoices->links() }} --}}
        </div>
        {{--/ End Table List --}}
    </div>
  </div>
  

