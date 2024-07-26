<div>
    <h4 class="py-1 mb-4">
        <span class="text-muted fw-light">Agents /</span> List
    </h4>
    <hr class="my-2">
  
    <div class="card">
  
        <h5 class="card-header pb-0">Agents  List</h5>
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
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>CEO Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Trade License</th>
                            <th>Nid</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($agents as $agent)
                            <tr>
                                <td>{{ $agent->company_name }}</td>
                                <td>{{ $agent->ceo_name }}</td>
                                <td>{{ $agent->email }}</td>
                                <td><i class="ti ti-phone ti-md text-danger me-4"></i>
                                    <span class="fw-medium">{{ $agent->mobile }}</span>
                                </td>
                                <td><span>{{ ucwords($agent->address) }}</span></td>
                                <td>
                                    <img src="{{ asset($agent->trade_license_no) }}" alt="user-avatar"
                                    class="d-block w-px-50 h-px-50 rounded avatar" id="uploadedAvatar" />
                                </td>
                                <td>
                                    <img src="{{ asset($agent->nid_no) }}" alt="user-avatar"
                                    class="d-block w-px-50 h-px-50 rounded avatar" id="uploadedAvatar" />
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('edit-agent', $agent->id) }}"
                                                wire:navigate><i class="ti ti-pencil me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"
                                                wire:click="delete({{ $agent->id }})"
                                                wire:confirm="Are you sure you want to delete this post?"><i
                                                    class="ti ti-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="4">No records found</td>
                            </tr>
                        @endforelse
                        
                    </tbody>
                </table>
            </div>
            <br>
            {{ $agents->links() }}
        </div>
        {{--/ End Table List --}}
    </div>
  </div>
  
