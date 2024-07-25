<div>
    <h4 class="py-1 mb-4">
        <span class="text-muted fw-light">Customer /</span> List
    </h4>
    <hr class="my-2">

    <div class="card">

        <h5 class="card-header pb-0">Customer list</h5>

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
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('edit-customer', $customer->id) }}"
                                                wire:navigate><i class="ti ti-pencil me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"
                                                wire:click="delete({{ $customer->id }})"
                                                wire:confirm="Are you sure you want to delete this post?"><i
                                                    class="ti ti-trash me-1"></i> Delete</a>
                                        </div>
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
