<div>
    <h4 class="py-1 mb-4">
        <span class="text-muted fw-light">Customer /</span> List
    </h4>
    <hr class="my-2">

    <div class="card">

        <h5 class="card-header pb-0">Customers list</h5>

        <div class="row">
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
            </div>

            <div class="col-md-6 d-flex justify-content-end">
                <div class="form-group d-flex card-header">
                    <label for="inputCity" class="mt-2">Search: </label>&nbsp;
                    <input type="text" wire:model.live.debounce.250ms="search" class="form-control" id="inputCity"
                        placeholder="search ...">
                </div>
            </div>
        </div>


        <div class="card-body">
            @include('livewire.partials.flash-session')
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Source</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($customers as $customer)
                            <tr>
                                <td>
                                    @if ($customer->gender == 'male')
                                        <i class="ti ti-man ti-md text-success me-4"></i>
                                    @else
                                        <i class="ti ti-woman ti-md text-info me-4"></i>
                                    @endif
                                    <span class="fw-medium">{{ $customer->name }}</span>
                                </td>
                                <td>{{ $customer->email }}</td>
                                <td><i class="ti ti-phone ti-md text-danger me-4"></i>
                                    <span class="fw-medium">{{ $customer->mobile }}</span>
                                </td>
                                <td>
                                    @if ($customer->gender == 'male')
                                        <span
                                            class="badge bg-label-success me-1">{{ ucwords($customer->gender) }}</span>
                                    @else
                                        <span
                                            class="badge bg-label-primary me-1">{{ ucwords($customer->gender) }}</span>
                                    @endif
                                </td>
                                <td><span>{{ ucwords($customer->address) }}</span></td>
                                <td><span>{{ ucwords($customer?->source) }}</span></td>
                                <td>
                                    <div class="demo-inline-spacing text-center">
                                        <!-- Start Edit Button -->
                                        <a class="btn rounded-pill btn-icon btn-primary" 
                                           href="{{ route('edit-customer', $customer->id) }}"
                                           wire:navigate><span class="ti ti-pencil"></span>
                                        </a><!-- End Edit Button -->
                                        
                                        <!-- Start Make User Button -->
                                        {{-- <a class="btn rounded-pill btn-icon btn-secondary" 
                                           wire:click=""
                                           wire:navigate><span class="ti ti-eye"></span>
                                        </a> --}}
                                        <!-- End User Button -->

                                        <!-- Start Delete Button -->
                                        <a type="button" 
                                                class="btn rounded-pill btn-icon btn-danger" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#deleteModal-{{ $customer->id }}"> <span class="ti ti-trash"> 
                                        </a><!--/End Delete Button -->

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal-{{ $customer->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                            <div class="modal-content p-3 p-md-5">
                                                <div class="modal-body">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                <div class="text-center mb-4">
                                                    <h3 class="mb-2">Delete </h3>
                                                    <p class="text-muted">Are you sure you want to delete this Customer?</p>
                                                </div>

                                                <div class="col-12 text-center">
                                                    <a type="reset" class="btn btn-label-secondary btn-reset" data-bs-dismiss="modal" aria-label="Close">No</a>
                                                    <a type="submit" wire:click="delete({{ $customer->id }})" class="btn btn-danger me-sm-3 me-5" data-bs-dismiss="modal" aria-label="Close">Yes</a>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div><!--/ Delete Modal -->
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <br>
            {{ $customers->links() }}
        </div>
    </div>
</div>
