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
        <h1 class="fs-2 fs-sm-3 fs-md-4">User profile Update</h1>
        <div class="header_divider"></div>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-lg-12 pe-lg-2">
        <div class="card mb-3">
          <div class="card-header">
            <h5 class="mb-0">User Details</h5>
          </div>
          <div class="card-body bg-light">
            <form class="row g-3" action="{{route('user.profile.update')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" value="{{$user->id}}">
              <div class="col-lg-6">
                <label class="form-label" for="name">Name</label>
                <input class="form-control" name="name" type="text" placeholder="Enter user name"
                  value="{{ $user->name }}" />
                @error('name')
                <span class="text-danger text-sm">{{ $message }}</span>
                @enderror
              </div>
              <div class="col-lg-6">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" name="email" type="email" placeholder="Enter user email"
                  value={{$user->email}}
                />
                @error('email')
                <span class="text-danger text-sm">{{ $message }}</span>
                @enderror
              </div>
              <div class="col-lg-6">
                <label class="form-label" for="phone">Phone</label>
                <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone"
                  placeholder="Enter Phone Number" maxlength="11" pattern="[0-9]{3}[0-9]{8}" value="{{$user->phone}}" />
                @error('phone')
                <span class="text-danger text-sm">{{ $message }}</span>
                @enderror
              </div>
              <div class="col-lg-6">
                <label class="form-label" for="password">Password </label>
                <input class="form-control" name="password" type="password" placeholder="Enter user password" />
                @error('password')
                <span class="text-danger text-sm">{{ $message }}</span>
                @enderror
              </div>
              <div class="col-lg-6">
                <label class="form-label" for="password_confirmation">Confirm Password </label>
                <input class="form-control" name="password_confirmation" type="password"
                  placeholder="Enter user password" />
                @error('password_confirmation')
                <span class="text-danger text-sm">{{ $message }}</span>
                @enderror
              </div>
              <div class="col-lg-6">
                <label class="form-label optional" for="image">Image</label>
                <input class="form-control" name="image" type="file" placeholder="Enter user image" />
                @error('image')
                <span class="text-danger text-sm">{{ $message }}</span>
                @enderror
              </div>
              <div class="col-lg-6">
                <label class="form-label optional" for="cover_image">Cover Image</label>
                <input class="form-control" name="cover_image" type="file" placeholder="Enter user cover_image" />
                @error('cover_image')
                <span class="text-danger text-sm">{{ $message }}</span>
                @enderror
              </div>
              {{-- Role --}}

              <div class="col-12 d-flex justify-content-end">
                @php
                $id = base64_encode($user->id);
                @endphp
                <a href="{{route('user.profile',$id)}}">
                  <button type="button" class="btn btn-danger btn-sm m-2">Cancel</button>
                </a>
                <button type="submit" class="btn btn-primary btn-sm m-2">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection