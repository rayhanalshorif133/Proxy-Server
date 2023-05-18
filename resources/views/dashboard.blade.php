@extends('layouts.admin.admin')

@section('head')
@endsection

@section('content')
<div class="row g-3 mb-3">
    <div class="col-sm-6 col-md-4">
        <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card"
                style="background-image:url({{asset('assets/img/icons/spot-illustrations/corner-1.png')}});"></div>
            <div class="card-body position-relative">
                <h6>Users<span class="badge badge-soft-warning rounded-pill ms-2 d-none">Total</span></h6>
                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
                    data-countup="{&quot;endValue&quot;:58.386,&quot;decimalPlaces&quot;:2,&quot;suffix&quot;:&quot;k&quot;}">
                    {{$users}}</div><a class="fw-semi-bold fs--1 text-nowrap" href="{{route('user.index')}}">
                    All users
                    <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 d-none">
        <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card"
                style="background-image:url({{asset('assets/img/icons/spot-illustrations/corner-2.png')}});"></div>
            <!--/.bg-holder-->
            <div class="card-body position-relative">
                <h6>Departments<span class="badge badge-soft-info rounded-pill ms-2 d-none">0.0%</span></h6>
                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info"
                    data-countup="{&quot;endValue&quot;:23.434,&quot;decimalPlaces&quot;:2,&quot;suffix&quot;:&quot;k&quot;}">
                    {{$departments}}</div><a class="fw-semi-bold fs--1 text-nowrap" href="#">All Departments
                    <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 d-none">
        <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card"
                style="background-image:url({{asset('assets/img/icons/spot-illustrations/corner-3.png')}});"></div>
            <!--/.bg-holder-->
            <div class="card-body position-relative">
                <h6>Issues<span class="badge badge-soft-success rounded-pill ms-2 d-none">9.54%</span></h6>
                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif"
                    data-countup="{&quot;endValue&quot;:43594,&quot;prefix&quot;:&quot;$&quot;}">
                    {{$issues}}
                </div><a class="fw-semi-bold fs--1 text-nowrap" href="#">
                    All Issues
                    <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 d-none">
        <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card"
                style="background-image:url({{asset('assets/img/icons/spot-illustrations/corner-4.png')}});"></div>
            <!--/.bg-holder-->
            <div class="card-body position-relative">
                <h6>Devices<span class="badge badge-soft-info rounded-pill ms-2 d-none">0.0%</span></h6>
                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info"
                    data-countup="{&quot;endValue&quot;:23.434,&quot;decimalPlaces&quot;:2,&quot;suffix&quot;:&quot;k&quot;}">
                    {{$devices}}</div><a class="fw-semi-bold fs--1 text-nowrap" href="#">All
                    Devices
                    <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 d-none">
        <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card"
                style="background-image:url({{asset('assets/img/icons/spot-illustrations/corner-1.png')}});"></div>
            <!--/.bg-holder-->
            <div class="card-body position-relative">
                <h6>Rooms</h6>
                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
                    data-countup="{&quot;endValue&quot;:58.386,&quot;decimalPlaces&quot;:2,&quot;suffix&quot;:&quot;k&quot;}">
                    {{$rooms}}
                </div><a class="fw-semi-bold fs--1 text-nowrap" href="#">
                    All Rooms
                    <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-4 d-none">
        <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card"
                style="background-image:url({{asset('assets/img/icons/spot-illustrations/corner-5.png')}});"></div>
            <!--/.bg-holder-->
            <div class="card-body position-relative">
                <h6>Shifts<span class="badge badge-soft-success rounded-pill ms-2 d-none">9.54%</span></h6>
                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif"
                    data-countup="{&quot;endValue&quot;:43594,&quot;prefix&quot;:&quot;$&quot;}">
                    {{$shifts}}
                </div><a class="fw-semi-bold fs--1 text-nowrap" href="#">
                    All Shift
                    <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
            // alert('hello');
            // console.log('hello');
        });
</script>
@endsection