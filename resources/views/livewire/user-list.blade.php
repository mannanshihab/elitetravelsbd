<div>
    <h4 class="py-1 mb-4">
        <span class="text-muted fw-light">Users /</span> List
    </h4>
    <hr class="my-2">

    <div class="card">

        <h5 class="card-header pb-0">Users List</h5>
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
            </div>{{-- / view Pages --}}

            {{-- Search --}}
            <div class="col-md-6 d-flex justify-content-end">
                <div class="form-group d-flex card-header">
                    <label for="inputCity" class="mt-2">Search: </label>&nbsp;
                    <input type="text" wire:model.live.debounce.250ms="search" class="form-control" id="inputCity"
                        placeholder="search ...">
                </div>
            </div>
            {{-- End Search --}}
        </div>
        {{-- / table header --}}

        @include('livewire.partials.flash-session')

        {{-- Table List --}}
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($users as $user)
                            <tr>
                                <td>
                                    <span class="fw-medium">{{ $user->name }}</span>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div class="demo-inline-spacing text-center">
                                        <!-- Start Delete Button -->
                                        <a type="button" 
                                                class="btn rounded-pill btn-icon btn-danger" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#deleteModal-{{ $user->id }}"> <span class="ti ti-trash"> 
                                        </a><!--/ End Delete Button -->

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal-{{ $user->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                            <div class="modal-content p-3 p-md-5">
                                                <div class="modal-body">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                <div class="text-center mb-4">
                                                    <h3 class="mb-2">Delete </h3>
                                                    <p class="text-muted">Are you sure you want to delete this User?</p>
                                                </div>

                                                <div class="col-12 text-center">
                                                    <a type="reset" class="btn btn-label-secondary btn-reset" data-bs-dismiss="modal" aria-label="Close">No</a>
                                                    <a type="submit" wire:click="delete({{ $user->id }})" class="btn btn-danger me-sm-3 me-5" data-bs-dismiss="modal" aria-label="Close">Yes</a>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <!--/ Delete Modal -->
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <td colspan="3">No records found</td>
                        @endforelse

                    </tbody>
                </table>
            </div>
            <br>
            {{ $users->links() }}
        </div>
        {{-- / End Table List --}}
    </div>
</div>
