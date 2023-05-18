@extends('layouts.web.web')


@section('head')
<style>
  .btn-falcon-danger:hover,
  .btn-falcon-danger:focus {
    color: var(--falcon-btn-falcon-danger-hover-color) !important;
    background-color: var(--falcon-btn-falcon-background) !important;
    border-color: var(--falcon-btn-falcon-background) !important;
  }

  .mb-8 {
    margin-bottom: 6.5rem !important;
  }

  .mlr-build {
    margin: 4px 18px;
  }

  .text-purple {
    --falcon-text-opacity: 1;
    color: #8327fd !important;
  }

  .text-green {
    --falcon-text-opacity: 1;
    color: #017e39 !important;
  }

  .text-pink {
    --falcon-text-opacity: 1;
    color: #D5266B !important;
  }

  .card-body-custom {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 0 17px;
  }
</style>
@endsection

@section('content')
<section>

  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-lg-8 col-xl-7 col-xxl-6">
        <h1 class="fs-2 fs-sm-3 fs-md-4">User profile</h1>
        <div class="header_divider"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card mb-3 btn-reveal-trigger">
          <div class="card-header position-relative min-vh-25 mb-8">
            <div class="bg-holder rounded-3 rounded-bottom-0"
              style="background-image:url('{{asset($user->cover_image)}}');">
            </div>
            <div class="avatar avatar-5xl avatar-profile">
              @if($user->image)
              <img class="rounded-circle img-thumbnail shadow-sm" src="{{asset($user->image)}}" width="200" alt="">
              @else
              <div class="avatar-name rounded-circle img-thumbnail"><span class="">
                  {{substr($user->name, 0,2)}}</span></div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row g-0">
      <div class="col-lg-12 pe-lg-2">
        <div class="card mb-3">
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <h5 class="mb-0">Profile Details</h5>
              @if(Auth::check())
              @php
              $id = base64_encode($user->id);
              @endphp
              @endif
              <a href="{{route('user.profile.edit',$id)}}">
                <button class="btn btn-falcon-danger btn-sm editAndAssignUser" type="button" data-toggle="tooltip"
                  data-placement="top" title="Edit"><span class="fas fa-pencil-alt"></span></button>
              </a>
            </div>
          </div>
          <div class="card-body bg-light">
            <div class="row g-3">
              <div class="col-lg-6">
                <h6 class="fs-0 mb-0"><small class="fa fa-user text-primary"
                    data-fa-transform="shrink-4 down-2"></small> Name
                </h6>
                <p class="text-1000 mb-0 mlr-build">{{$user->name}}</p>
              </div>
              <div class="col-lg-6">
                <h6 class="fs-0 mb-0"><small class="fa fa-envelope text-success"
                    data-fa-transform="shrink-4 down-2"></small>
                  Email
                </h6>
                <p class="text-1000 mb-0 mlr-build">{{$user->email}}</p>
              </div>
              <div class="col-lg-6">
                <h6 class="fs-0 mb-0"><small class="fa fa-phone-alt text-purple"
                    data-fa-transform="shrink-4 down-2"></small>
                  Phone
                </h6>
                <p class="text-1000 mb-0 mlr-build">{{$user->phone}}</p>
              </div>
              <div class="col-lg-6">
                <h6 class="fs-0 mb-0"><small class="fa fa-user text-green" data-fa-transform="shrink-4 down-2"></small>
                  Role
                </h6>
                <p class="text-1000 mb-0 mlr-build">
                  <span class="badge rounded-pill bg-primary text-capitalize">
                    {{str_replace("-"," ",$user->roles[0]->name)}}
                  </span>
                </p>
              </div>
              <div class="col-lg-6">
                <h6 class="fs-0 mb-0">
                  @if($user->status == "active")
                  <small class="fa fa-user-check text-green" data-fa-transform="shrink-4 down-2"></small>
                  @else
                  <small class="fa fa-user-times text-danger" data-fa-transform="shrink-4 down-2"></small>
                  @endif
                  Status
                </h6>
                <p class="text-1000 mb-0 mlr-build">
                  @if($user->status == "active")
                  <span class="badge badge-soft-primary text-capitalize">
                    {{$user->status}}
                  </span>
                  @else
                  <span class="badge badge-soft-danger text-capitalize">
                    {{$user->status}}
                  </span>
                  @endif
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection