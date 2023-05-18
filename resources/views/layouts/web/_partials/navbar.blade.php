<nav class="navbar navbar-standard navbar-expand-lg fixed-top navbar-dark"
    data-navbar-darken-on-scroll="data-navbar-darken-on-scroll">
    <div class="container"><a class="navbar-brand" href="/">
            <span class="text-white dark__text-white text-uppercase">
                proxyxyou</span></a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarStandard" aria-controls="navbarStandard" aria-expanded="false"
            aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse scrollbar" id="navbarStandard">
            <ul class="navbar-nav" data-top-nav-dropdowns="data-top-nav-dropdowns">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.home')}}">Dashboard</a>
                </li>
                <li class="nav-item">
                    @if(Auth::check())
                    @php
                    $today = date("Y-m-d");
                    $previousDay = date('Y-m-d', strtotime('-1 day'));
                    $histories = App\Models\History::select()
                    ->where('user_id',auth()->user()->id)
                    ->whereDate('created_at',$today)
                    ->orWhereDate('created_at',$previousDay)
                    ->get()->count();
                    @endphp
                    @endif
                    <a class="nav-link" href="{{route('user.history')}}">

                        <span class="position-relative">
                            History
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-soft-success">
                                {{$histories}}
                            </span>
                        </span>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @if(Auth::check())
                @php
                $id = base64_encode(Auth::user()->id);
                @endphp
                @endif
                <li class="nav-item">
                    @if(Auth::check())
                    <a class="nav-link" href="{{route('user.profile',$id)}}">
                        <span class="badge badge-soft-info text-capitalize">{{Auth::user()->name}}</span>
                    </a>
                    @endif
                </li>
                <li class="nav-item">
                    @if(Auth::check())
                    <a class="nav-link" href="{{route('user.logout')}}">Logout</a>
                    @else
                    <a class="nav-link" href="{{route('user.login')}}">Login</a>
                    @endif
                </li>
                <li class="nav-item">
                    @role('admin')
                    @if(Auth::check())
                    <a class="nav-link" href="{{route('user.dashboard')}}">Go To Admin</a>
                    @endif
                    @endrole
                </li>
                <li class="nav-item d-none"><a class="nav-link" href="#!" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Register</a></li>
            </ul>
        </div>
    </div>
</nav>