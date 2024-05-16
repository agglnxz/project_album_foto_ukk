@extends('layouts.main')
@section('content')
<section class="bg-gray200 pt-5 pb-5">
    <div class="container-fluid mt-5">
    	<div class="row">
            <div class="card-columns">
                @foreach (Auth::user()->foto as $item)
                <div class="card card-pin">
    				<img class="card-img" src="{{asset('storage/images/'. $item->lokasi_file)}}" alt="Card image">
    				<div class="overlay">
    					<h2 class="card-title title">{{$item->judul_foto}}</h2>
    					{{-- <div class="more">
    						<a href="#">
    						<i class="fa fa-arrow-circle-o-right" aria-hidden="true">detail</i></a>
    					</div> --}}
    				</div>
    			</div>
                @endforeach

    		</div>
    	</div>
    </div>
</section>
@endsection
