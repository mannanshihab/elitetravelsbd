<div>
    <h4 class="py-1 mb-4">
        <span class="text-muted fw-light">Vendors /</span> List
    </h4>
    <hr class="my-2">
  
    <div class="card">
  
        <h5 class="card-header pb-0">Vendors  List</h5>
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
                            <th>Vendors Name</th>
                            <th>CEO Name</th>
                            <th>Mobile</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td class="text-center" colspan="4">No records found</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            
        </div>
        {{--/ End Table List --}}
    </div>
  </div>
  

