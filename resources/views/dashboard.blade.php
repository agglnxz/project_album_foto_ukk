@extends('layouts.main')
@section('content')

{{-- page explore section --}}
<section class="mt-4 mb-5">
    <div class="container mb-4">
        <h1 class="font-weight-bold title">jelajahi</h1>

    </div>
</section>
{{-- end page explore section --}}

{{-- page main --}}
<div class="container-fluid">
    <div class="row">
        @foreach ($foto as $item)
        <div class="card-columns">
            <div class="card card-pin">
                <img class="card-img" src="{{asset('storage/images/'.$item->lokasi_file)}}" alt="Card image">
                <div class="overlay">
                    <h2 class="card-title title">{{$item->judul_foto}}</h2>
                    <div class="more">
                        <a href="{{route('detail',['id'=>$item])}}">
                        <i class="fa fa-arrow-circle-o-right" aria-hidden="true">detail</i></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
{{-- end page main --}}
@endsection
