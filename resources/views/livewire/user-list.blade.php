<div>
  <h4 class="py-3 mb-4"><span class="text-muted fw-light">Users /</span> List</h4>
  <!-- DataTable with Buttons -->
  <div class="card">
    <div class="me-1">
      @include('livewire.partials.flash-session')
    </div>
    <div class="card-datatable table-responsive pt-0">
      <table class="datatables-basic table">
        <thead>
          <tr>
            <th>id</th>
            <th>Name</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
              <a onclick="return confirm('Are you sure you want to delete this item?') || event.stopImmediatePropagation()" wire:click="delete({{ $user->id }})" href="javascript:void(0);"><i class="ti ti-trash me-1"></i> Delete</a>
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
</div>

