<li class="nav-item">
    <a class="single-link" href="/">
        <div class="d-flex align-items-center">
            <span class="nav-link-icon">
                <span class="fas fa-chart-pie"></span></span>
            <span class="nav-link-text ps-1">Dashboard</span>
        </div>
    </a>
</li>
<li class="nav-item">
    <!-- label-->
    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
        <div class="col-auto navbar-vertical-label">User Department
        </div>
        <div class="col ps-0">
            <hr class="mb-0 navbar-vertical-divider" />
        </div>
    </div>
    <!-- User pages-->
    <a class="nav-link dropdown-indicator" href="#user" role="button" data-bs-toggle="collapse" aria-expanded="false"
        aria-controls="user">
        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user"></span></span><span
                class="nav-link-text ps-1">User</span>
        </div>
    </a>
    <ul class="nav collapse false" id="user">
        <li class="nav-item">
            <a class="nav-link" href="{{route('user.create')}}">
                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Add User</span>
                </div>
            </a>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{route('user.index')}}">
                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">User List</span>
                </div>
            </a>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{route('user.pending.index')}}">
                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Pending Users</span>
                </div>
            </a>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{route('user.deactive.index')}}" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Deactive Users</span>
                </div>
            </a>
        </li>
    </ul>
    <!-- User pages-->
    <a class="nav-link dropdown-indicator" href="#proxy" role="button" data-bs-toggle="collapse" aria-expanded="false"
        aria-controls="proxy">
        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                    class="fas fc-daygrid-event-dot"></span></span><span class="nav-link-text ps-1">Proxy</span>
        </div>
    </a>
    <ul class="nav collapse false" id="proxy">
        <li class="nav-item">
            <a class="nav-link" href="{{route('user.proxy.history')}}">
                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">
                        Proxy History
                    </span>
                </div>
            </a>
            <a class="nav-link d-none" href="{{route('user.proxy.location.index')}}">
                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">
                        Location
                    </span>
                </div>
            </a>
        </li>
    </ul>

</li>