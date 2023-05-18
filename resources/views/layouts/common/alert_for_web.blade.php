@if (Session::has('message'))
<div class="alert alert-{{Session::get('class')}} border-2 d-flex align-items-center" role="alert">
    <div class="bg-{{Session::get('class')}} me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span>
    </div>
    <p class="mb-0 flex-1">{{Session::get('message')}}</p><button class="btn-close" type="button"
        data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif