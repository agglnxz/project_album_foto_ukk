@extends('layouts.main')
@section('content')
    <div class="jumbotron border-round-0 min-50vh"
        style="background-color:rgb(163, 165, 165);">
        @if ( Auth::check())
         <?php $user = Auth::user(); ?>
         <div class="container mt-5 mx-2 d-flex align-items-center">
            @if (!empty($user->foto_profil))
                <img src="{{ asset('storage/images/'.$user->foto_profil) }}" class="mt-neg100 mb-1 rounded-circle" width="128">
            @else
                <img src="{{ asset('style_main/img/av.png') }}" class="mt-neg100 mb-1 rounded-circle" width="128">
            @endif
            <div class="ml-3">
                <div class="d-flex justify-content-start mb-3">
                    <div>
                      <p class="small text-black mb-1">Articles</p>
                      <p class="mb-0">41</p>
                    </div>
                    <div class="px-3">
                      <p class="small text-black mb-1">Followers</p>
                      <p class="mb-0">976</p>
                    </div>
                    <div>
                      <p class="small text-black mb-1">Rating</p>
                      <p class="mb-0">8.5</p>
                    </div>
                  </div>
                <h3 class="font-weight-bold title">{{ $user->name }}</h3>
                <p>{{ $user->alamat }}</p>
            </div>
        </div>
    </div>
        @endif
        
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="card-columns">
                <div class="card card-pin">
                    <img class="card-img"
                        src=""
                        alt="Card image">
                    <div class="overlay">
                        <h2 class="card-title title">Some Title</h2>
                        <div class="more">
                            <a href="post.html">
                                <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> More </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
