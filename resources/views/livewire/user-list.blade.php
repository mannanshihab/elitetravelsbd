<div>

  <h4 class="py-3 mb-4"><span class="text-muted fw-light">Users /</span> List</h4>

  <!-- DataTable with Buttons -->
  <div class="card">
    <div class="d-flex justify-content-between mt-5 m-3">
      <button wire:click="create" class="btn btn-primary" data-bs-toggle="modal"> Add User </button>
    </div>
    <div class="px-5">
      @include('livewire.partials.flash-session')
    </div>
    <div class="card-datatable table-responsive pt-0">
      <table class="datatables-basic table">
        <thead>
          <tr>
            <th>id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td></td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn btn-primary text-center dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i>Action</button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" wire:click="edit({{ $user->id }})" href="javascript:void(0);"><i class="ti ti-pencil me-1"></i> Edit</a>
                  <a class="dropdown-item" onclick="return confirm('Are you sure you want to delete this item?') || event.stopImmediatePropagation()" wire:click="delete({{ $user->id }})" href="javascript:void(0);"><i class="ti ti-trash me-1"></i> Delete</a>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{-- <div>
        {{ $users->links() }}
      </div> --}}
    </div>
  </div>

  @if ($isOpen)
  <!-- User Modal -->
  <div class="modal show" tabindex="-1" aria-hidden="true" style="display: block;" >
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2"> {{$user_id ? 'Edit User' : 'Create User' }}</h3>
            <p class="text-muted">Details will receive a privacy audit.</p>
          </div>
          <form wire:submit.prevent="{{ $user_id ? 'update' : 'store' }}" class="row g-3">
            <div class="col-12">
              <label class="form-label" for="Name">Name</label>
              <input type="text" wire:model="name" id="name" name="Name" class="form-control" placeholder="user name" />
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="Email">Email</label>
              <input type="text" wire:model="email" id="email" name="email" class="form-control" placeholder="example@domain.com" />
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="Password">Password</label>
              <input type="password" wire:model="password" id="password" name="email" class="form-control" />
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="Status">Status</label>
              <select id="Status" name="Status" class="select2 form-select" aria-label="Default select example">
                <option selected>Status</option>
                <option value="1">Active</option>
                <option value="2">Inactive</option>
                <option value="3">Suspended</option>
              </select>
            </div>
            
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserPhone">Phone Number</label>
              <div class="input-group">
                <span class="input-group-text">US (+1)</span>
                <input type="text" id="modalEditUserPhone" name="modalEditUserPhone" class="form-control phone-number-mask" placeholder="202 555 0111" />
              </div>
            </div>

            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary me-sm-3 me-1">{{ $user_id ? 'Update' : 'Create' }}</button>
              <button type="reset" wire:click="closeModal" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--/User Modal -->
  @endif
</div>

