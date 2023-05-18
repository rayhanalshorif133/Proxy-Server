@extends('layouts.admin.admin')


@section('head')
@endsection

@section('content')
<div class="card">
  <div class="card-body">
    <div class="card shadow-none">
      <div class="card-body p-0 pb-3">
        <div class="row">
          <div class="col-md-6">
            <div class="card-header">
              <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                  <h5 class="mb-0">Location List</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="d-flex align-items-center justify-content-end my-3">
              <div id="bulk-select-replace-element">
                <button class="btn btn-falcon-success btn-sm locationAddBtn" data-bs-toggle="modal"
                  data-bs-target="#location-modal" type="button"><span class="fas fa-plus"
                    data-fa-transform="shrink-3 down-2"></span><span class="ms-1">New</span></button>
              </div>
              <div class="d-none ms-3" id="bulk-select-actions">
                <div class="d-flex">
                  <select class="form-select form-select-sm userActionSelect" aria-label="Bulk actions">
                    <option selected="selected">Actions</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="delete">Delete</option>
                  </select>
                  <button class="btn btn-falcon-danger btn-sm ms-2 userApplyBtn" type="button">Apply</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="table-responsive scrollbar">
          <table class="table mb-0 customDataTable">
            <thead class="text-black bg-200">
              <tr>
                <th class="align-middle" style="width: 7% !important">
                  <div class="form-check mb-0">
                    <input class="form-check-input" type="checkbox"
                      data-bulk-select='{"body":"bulk-select-body","actions":"bulk-select-actions","replacedElement":"bulk-select-replace-element"}' />
                  </div>
                </th>
                <th class="align-middle">#sl</th>
                <th class="align-middle">Name</th>
                <th class="align-middle">Code</th>
                <th class="align-middle text-center">Action</th>
              </tr>
            </thead>
            <tbody id="bulk-select-body">
              @foreach ($locations as $location)
              <tr>
                <td class="align-middle w-25" style="width: 7% !important">
                  <div class="form-check mb-0">
                    <input class="form-check-input" type="checkbox" id="checkbox-1"
                      data-bulk-select-row="data-bulk-select-row" />
                  </div>
                </td>
                <td class="align-middle">{{$loop->index+1}}</td>
                <td class="align-middle">{{$location->name}}</td>
                <td class="align-middle">{{$location->code}}</td>
                <td class="align-middle text-center">
                  <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                    <button class="btn btn-falcon-info btn-sm locationEditBtn" type="button" data-bs-toggle="modal"
                      data-bs-target="#location-modal" data-id="{{$location->id}}" data-name="{{$location->name}}"
                      data-code="{{$location->code}}"><span class="fas fa-edit"
                        data-fa-transform="shrink-3 down-2"></span>
                    </button>
                    <button class="btn btn-falcon-danger btn-sm locationDeleteBtn" type="button"
                      data-id="{{$location->id}}">
                      <span class="fas fa-trash" data-fa-transform="shrink-3 down-2"></span>
                    </button>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@include('proxy._partials.location_models')
@endsection


@section('scripts')
<script>
  $(document).ready(function() {
    handleDeleteBtn();
    handleAddBtn();
    handleEditBtn();
  });

  function handleAddBtn(){
    $(".locationAddBtn").on('click',function(){
      $("#location-modal").find("#location_id").val('');
      $("#location-modal").find("#name").val('');
      $("#location-modal").find("#code").val('');
    });
  }
  function handleEditBtn(){
    $(".locationEditBtn").on('click',function(){
      var id = $(this).data('id');
      var name = $(this).data('name');
      var code = $(this).data('code');
      $("#location-modal").find("#location_id").val(id);
      $("#location-modal").find("#name").val(name);
      $("#location-modal").find("#code").val(code);
    });
  }

  function handleDeleteBtn(){
    $(".locationDeleteBtn").on('click',function(){
      var id = $(this).data('id');
      Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
      if (result.isConfirmed) {
        axios.delete(`/user/proxy/location/${id}/delete`)
        .then(function(response) {
          if(response.data.status == true){
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
              )
              setTimeout(() => {
                location.reload();
              }, 1800);
            }
          })
      }else{
        Swal.fire(
          'Cancelled',
          'Your data is safe :)',
          'error'
          );
      }
      })
    });
  }
</script>
@endsection