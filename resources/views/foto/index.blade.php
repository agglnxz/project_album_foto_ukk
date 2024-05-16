@extends('layouts.main')
@section('content')
<section class="bg-gray200 pt-5 pb-5">
     <!-- Button trigger modal -->
     <button type="button" class="btn btn-primary btn-sm mx-4" data-bs-toggle="modal" data-bs-target="#tambahFoto">
        Tambah postingan
    </button>

    <div class="container-fluid mt-5">
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

      <!--  tambah foto -->
  <div class="modal fade" id="tambahFoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Foto</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('posting')}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="jdlfto" class="form-label">Judul foto</label>
                <input type="text" name="judul_foto" class="form-control" id="jdlfto" placeholder="Judul foto">
                @error('judul_foto')
                 <p style="color: red">{{$message}}</p>
                @enderror
              </div>

              <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"></textarea>
                @error('deskripsi')
                <p style="color: red">{{$message}}</p>
               @enderror
              </div>

              <div class="mb-3">
                <label for="formFile" class="form-label">Input File Foto</label>
                <input class="form-control" name="lokasi_file" type="file" id="formFile">
                @error('lokasi_file')
                <p style="color: red">{{$message}}</p>
               @enderror
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
