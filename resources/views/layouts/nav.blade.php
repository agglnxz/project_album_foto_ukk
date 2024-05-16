<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    {{-- <a href="index.html" class="navbar-brand font-weight-bolder mr-3"><img src="assets/img/logo.png"></a>
    <button class="navbar-light navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsDefault"
        aria-controls="navbarsDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button> --}}
    <div class="collapse navbar-collapse" id="navbarsDefault">
        {{-- <ul class="navbar-nav mr-auto align-items-center">
            <form class="bd-search hidden-sm-down">
                <input type="text" class="form-control bg-graylight border-0 font-weight-bold" id="search-input"
                    placeholder="Search..." autocomplete="off">
                <div class="dropdown-menu bd-search-results" id="search-results">
                </div>
            </form>
        </ul> --}}
        <ul class="navbar-nav ml-auto align-items-center">
            <li class="nav-item">
                <a  href="{{route('dashboard')}}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Dashboard</a>
            </li>
            @auth
            <li class="nav-item">
                <a href="{{route('foto_index')}}" class="nav-link {{ request()->is('foto_index') ? 'active' : '' }}">Gallery</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{request()->is('album') ? 'active': ''}}" href="{{route('album')}}">album</a>
            </li>

            <li class="nav-item">
                <a href="{{route('profil_index')}}" class="nav-link {{ request()->is('profil_index') ? 'active' : '' }}">
                    @auth
                    @if( auth()->user()->foto_profile == null)
                    <img src="{{ asset('style_main/img/av.png') }}" class="rounded-circle" width="30">
                    @else
                    <img class="rounded-circle" src="{{asset('storage/images'.$komen->user->foto_profil)}}" width="30">
                    @endif
                    @endauth
                    <span class="align-middle">profil</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}">logout</a>
                </li>

                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
            @endauth
        </ul>
    </div>
</nav>
