@extends('layouts.admin.admin')


@section('head')
<style>
  /* .fa-reply {
    rotate: 90deg;
  } */

  .message:first-letter {
    text-transform: capitalize
  }

  .swal-modal {
    width: 664px !important;
  }

  .swal-icon--info {
    border-color: #00a8ed !important;
  }

  .swal-icon--info::after,
  .swal-icon--info::before {
    background-color: #00a8ed !important;
  }

  .swal-button--cancel {
    display: none !important;
  }

  .swal-button--confirm {
    background-color: #00a8ed !important;
  }
</style>
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
                  <h5 class="mb-0">Contact List</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="d-flex align-items-center justify-content-end my-3">
              <div id="bulk-select-replace-element">
                <button class="btn btn-falcon-info btn-sm" type="button" data-bs-toggle="modal"
                  data-bs-target="#createNotice">
                  <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                  <span class="ms-1">New</span>
                </button>
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
      </div>
      <div class="table-responsive scrollbar">
        <table class="table mb-0 customDataTable">
          <thead class="text-black bg-200">
            <tr>
              <th class="align-middle white-space-nowrap">
                <div class="form-check mb-0"><input class="form-check-input" type="checkbox"
                    data-bulk-select='{"body":"bulk-select-body","actions":"bulk-select-actions","replacedElement":"bulk-select-replace-element"}' />
                </div>
              </th>
              <th class="align-middle white-space-nowrap">Name</th>
              <th class="align-middle white-space-nowrap">Email</th>
              <th class="align-middle white-space-nowrap">Message</th>
              <th class="align-middle white-space-nowrap">Status</th>
              <th class="align-middle">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($contacts as $contact)
            <tr>
              <td class="align-middle white-space-nowrap">
                <div class="form-check mb-0">
                  <input class="form-check-input" type="checkbox" id="checkbox-1"
                    data-bulk-select-row="data-bulk-select-row" />
                </div>
              </td>
              <td>{{$contact->name}}</td>
              <td>{{$contact->email}}</td>
              <td class="message">
                <span class="getMessage d-none">{{$contact->message}}</span>
                {{Str::limit($contact->message,25)}}
              </td>
              <td class="text-center m-auto status">
                @if($contact->status == "unchecked")
                <span class="far fa-envelope fs-1 text-danger"></span>
                @else
                <span class="far fa-envelope-open fs-1 text-success"></span>
                @endif
              </td>
              <td class="align-middle">
                <div class="btn-group btn-group-sm btn-group-flush" id="contactId-{{$contact->id}}" role="group"
                  aria-label="Basic example">
                  <button class="btn btn-falcon-primary btn-sm showMessageBtn" type="button" data-toggle="tooltip"
                    data-placement="top" title="Reply">
                    {{-- <span class="fas fa-reply"></span> --}}
                    <span class="fas fa-eye"></span>
                  </button>
                  <button class="btn btn-falcon-danger btn-sm" type="button" data-toggle="tooltip" data-placement="top"
                    title="Delete"><span class="fas fa-trash"></span></button>
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
@endsection
@section('scripts')
<script>
  $(document).ready(function () {
    showMessageInDetails();
  });

  function showMessageInDetails() {
    $('.showMessageBtn').click(function () {
      var id = $(this).parent().attr('id').split('-')[1];
      let tr = $(this).parent().parent().parent();
      var message = tr.find('.getMessage').text();
      var status = tr.find('.status');
      axios.get(`contact/${id}/checked-status-update`)
      .then(function (response) {
        if(response.data.status == true){
            status.html(`<span class="far fa-envelope-open fs-1 text-success"></span>`);
            swal({
            title: "Message Details",
            text: message,
            icon: "info",
            buttons: true,
            });
            $(".swal-title").html(`Message Details <hr/>`);
          }
        });
    });
  }
</script>
@endsection