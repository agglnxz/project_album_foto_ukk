@extends('layouts.main')
@section('content')
    <section class="bg-gray200 pt-5 pb-5">
        <!-- Button trigger modal tambah -->
        <button type="button" class="btn btn-primary btn-sm mx-4 mb-3" data-bs-toggle="modal" data-bs-target="#tambahAlbum">
            Tambah Album
        </button>
        <div class="container mx-2">
            <div class="row">

                @foreach (Auth::user()->album as $item)
                    <div class="col-md-4"> <!-- Menggunakan kolom Bootstrap untuk membuat 3 card dalam satu baris -->
                        <div class="card mb-4" style="border:solid 0.5px">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->nama_album }}</h5>
                                <p class="card-text">{{ $item->deskripsi }}.</p>
                                <a href="{{ route('detail_album', ['id' => $item]) }}" class="card-link">Detail Album</a>
                                <br>
                                {{-- button triger modal hapus --}}
                                <button type="button" style="background: none;border:none" data-bs-toggle="modal"
                                    data-bs-target="#hapusAlbum{{ $item->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zm2-4h2V8H9zm4 0h2V8h-2z" />
                                    </svg>
                                </button>
                                {{-- button triger modal edit --}}
                                <button type="button" style="background: none;border:none" data-bs-toggle="modal"
                                    data-bs-target="#editAlbum{{ $item->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M9 15v-4.25l9.175-9.175q.3-.3.675-.45t.75-.15q.4 0 .763.15t.662.45L22.425 3q.275.3.425.663T23 4.4q0 .375-.137.738t-.438.662L13.25 15zm10.6-9.2l1.425-1.4l-1.4-1.4L18.2 4.4zM5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h8.925L7 9.925V17h7.05L21 10.05V19q0 .825-.587 1.413T19 21z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

        <!--  hapus Album -->
        <div class="modal fade" id="hapusAlbum{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Album</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                            Apakah anda yakin ingin menghapus album ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                            <form action="{{ route('delete_album',['id'=>$item]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary btn-sm">delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--  edit Album -->
        <div class="modal fade" id="editAlbum{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Album</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('edit_album',['id'=>$item]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="album" class="form-label">Nama album</label>
                                <input type="text" name="nama_album" class="form-control" id="album"
                                    value="{{$item->nama_album}}">
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" >{{$item->deskripsi}}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary btn-sm">Simpan perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
                @endforeach
            </div>
        </div>



        <!--  tambah Album -->
        <div class="modal fade" id="tambahAlbum" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Album</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('upload_album') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="album" class="form-label">Nama album</label>
                                <input type="text" name="nama_album" class="form-control" id="album"
                                    placeholder="Nama Album">
                                @error('nama_album')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="Deskripsi"></textarea>
                                @error('deskripsi')
                                    <p style="color: red">{{ $message }}</p>
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
