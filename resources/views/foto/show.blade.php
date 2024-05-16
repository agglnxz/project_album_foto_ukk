@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-8 col-sm-6">
                <article class="card">
                    <img class="card-img-top mb-2" src="{{ asset('storage/images/' . $foto->lokasi_file) }}" alt="Card image">
                    <div class="card-body">
                        <h1 class="card-title display-4">{{ $foto->judul_foto }}</h1>
                        <p class="mx-4">{{ $foto->deskripsi }}</p>
                        <div class="bg-white">
                            <div class="d-flex flex-row fs-12">
                                @auth
                                    @if (Auth::user()->id === $foto->user->id)
                                        <div class="like p-2 cursor">
                                            @if ($islike >= 1)
                                                <form action="{{ route('like', ['id' => $foto]) }}" method="post">
                                                    @csrf
                                                    <button type="submit" style="background: none;border:none">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                            viewBox="0 0 24 24">
                                                            <path fill="red"
                                                                d="m12 21l-1.45-1.3q-2.525-2.275-4.175-3.925T3.75 12.812Q2.775 11.5 2.388 10.4T2 8.15Q2 5.8 3.575 4.225T7.5 2.65q1.3 0 2.475.55T12 4.75q.85-1 2.025-1.55t2.475-.55q2.35 0 3.925 1.575T22 8.15q0 1.15-.387 2.25t-1.363 2.412q-.975 1.313-2.625 2.963T13.45 19.7z" />
                                                        </svg>
                                                        <span class="ml-1">{{ $foto->like->count() }}</span>
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('like', ['id' => $foto]) }}" method="post">
                                                    @csrf
                                                    <button type="submit" style="background: none;border:none">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                            viewBox="0 0 24 24">
                                                            <path fill="currentColor"
                                                                d="m12 21l-1.45-1.3q-2.525-2.275-4.175-3.925T3.75 12.812Q2.775 11.5 2.388 10.4T2 8.15Q2 5.8 3.575 4.225T7.5 2.65q1.3 0 2.475.55T12 4.75q.85-1 2.025-1.55t2.475-.55q2.35 0 3.925 1.575T22 8.15q0 1.15-.387 2.25t-1.363 2.412q-.975 1.313-2.625 2.963T13.45 19.7z" />
                                                        </svg>
                                                        <span class="ml-1">{{ $foto->like->count() }}</span>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                        <div class="like p-2 cursor">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                viewBox="0 0 24 24" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $foto->id }}">
                                                <path fill="currentColor"
                                                    d="M9 15v-4.25l9.175-9.175q.3-.3.675-.45t.75-.15q.4 0 .763.15t.662.45L22.425 3q.275.3.425.663T23 4.4q0 .375-.137.738t-.438.662L13.25 15zm10.6-9.2l1.425-1.4l-1.4-1.4L18.2 4.4zM5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h8.925L7 9.925V17h7.05L21 10.05V19q0 .825-.587 1.413T19 21z" />
                                            </svg>
                                        </div>
                                        <div class="like p-2 cursor">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                viewBox="0 0 24 24" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $foto->id }}">
                                                <path fill="currentColor"
                                                    d="M7 21q-.825 0-1.412-.587T5 19V6q-.425 0-.712-.288T4 5q0-.425.288-.712T5 4h4q0-.425.288-.712T10 3h4q.425 0 .713.288T15 4h4q.425 0 .713.288T20 5q0 .425-.288.713T19 6v13q0 .825-.587 1.413T17 21zm3-4q.425 0 .713-.288T11 16V9q0-.425-.288-.712T10 8q-.425 0-.712.288T9 9v7q0 .425.288.713T10 17m4 0q.425 0 .713-.288T15 16V9q0-.425-.288-.712T14 8q-.425 0-.712.288T13 9v7q0 .425.288.713T14 17" />
                                            </svg>
                                        </div>
                                    @else
                                        @if ($islike >= 1)
                                            <form action="{{ route('like', ['id' => $foto]) }}" method="post">
                                                @csrf
                                                <button type="submit" style="background: none;border:none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                        viewBox="0 0 24 24">
                                                        <path fill="red"
                                                            d="m12 21l-1.45-1.3q-2.525-2.275-4.175-3.925T3.75 12.812Q2.775 11.5 2.388 10.4T2 8.15Q2 5.8 3.575 4.225T7.5 2.65q1.3 0 2.475.55T12 4.75q.85-1 2.025-1.55t2.475-.55q2.35 0 3.925 1.575T22 8.15q0 1.15-.387 2.25t-1.363 2.412q-.975 1.313-2.625 2.963T13.45 19.7z" />
                                                    </svg>
                                                    <span class="ml-1">{{ $foto->like->count() }}</span>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('like', ['id' => $foto]) }}" method="post">
                                                @csrf
                                                <button type="submit" style="background: none;border:none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                        viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="m12 21l-1.45-1.3q-2.525-2.275-4.175-3.925T3.75 12.812Q2.775 11.5 2.388 10.4T2 8.15Q2 5.8 3.575 4.225T7.5 2.65q1.3 0 2.475.55T12 4.75q.85-1 2.025-1.55t2.475-.55q2.35 0 3.925 1.575T22 8.15q0 1.15-.387 2.25t-1.363 2.412q-.975 1.313-2.625 2.963T13.45 19.7z" />
                                                    </svg>
                                                    <span class="ml-1">{{ $foto->like->count() }}</span>
                                                </button>
                                            </form>
                                        @endif
                                    @endif
                                @else
                                    <div class="like p-2 cursor">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="m12 21l-1.45-1.3q-2.525-2.275-4.175-3.925T3.75 12.812Q2.775 11.5 2.388 10.4T2 8.15Q2 5.8 3.575 4.225T7.5 2.65q1.3 0 2.475.55T12 4.75q.85-1 2.025-1.55t2.475-.55q2.35 0 3.925 1.575T22 8.15q0 1.15-.387 2.25t-1.363 2.412q-.975 1.313-2.625 2.963T13.45 19.7z" />
                                        </svg>
                                        <span class="ml-1">0</span>
                                    </div>
                                @endauth
                            </div>
                        </div>

                        <!-- Modal edit -->
                        <div class="modal fade" id="editModal{{ $foto->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">edit Postingan</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('edit_postingan', ['id' => $foto]) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="jdlfto" class="form-label">Judul foto</label>
                                                <input type="text" name="judul_foto" class="form-control" id="jdlfto"
                                                    value="{{ $foto->judul_foto }}">
                                                @error('judul_foto')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3">{{ $foto->deskripsi }}</textarea>
                                                @error('deskripsi')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            @if(Auth::user()->album->count() > 0)
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>masukkan album</option>
                                                @foreach (Auth::user()->album as $item )
                                                <option value="">{{$item->nama_album}}</option>
                                                @endforeach
                                              </select>
                                            @endif

                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Input File Foto</label>
                                                <input class="form-control" name="lokasi_file" type="file"
                                                    value="{{ $foto->lokasi_file }}" id="formFile">
                                                @error('lokasi_file')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-danger">Edit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- modal edit end --}}

                        <!-- Modal delete -->
                        <div class="modal fade" id="deleteModal{{ $foto->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Postingan</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah anda yakin akan menghapus postingan ini?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('delete_postingan', ['id' => $foto]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- modal delete end --}}

                        <!-- Begin Comments ================================================== -->
                        <div class="container mt-5 mb-5">
                            <div class="d-flex justify-content-center row">
                                <div class="col-lg-10 col-md-8 col-sm-6">
                                    <div class="d-flex flex-column comment-section">
                                        <div class="bg-light p-2 mb-3">
                                            <form action="{{ route('comments', ['id' => $foto->id]) }}" method="post">
                                                @csrf
                                                <div class="d-flex flex-row align-items-start">
                                                    @auth
                                                        @if (auth()->user()->foto_profile == null)
                                                            <img src="{{ asset('style_main/img/av.png') }}"
                                                                class="rounded-circle" width="40">
                                                        @else
                                                            <img class="rounded-circle"
                                                                src="{{ asset('storage/images' . $komen->user->foto_profil) }}"
                                                                width="40">
                                                        @endif
                                                    @endauth
                                                    <textarea class="form-control ml-1 shadow-none textarea" name="isi_komentar" rows="3"></textarea>
                                                </div>
                                                <div class="mt-2 text-right">
                                                    <button class="btn btn-primary btn-sm shadow-none" type="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                            height="32" viewBox="0 0 256 256">
                                                            <path fill="currentColor"
                                                                d="M227.32 28.68a16 16 0 0 0-15.66-4.08h-.15L19.57 82.84a16 16 0 0 0-2.42 29.84l85.62 40.55l40.55 85.62a15.86 15.86 0 0 0 14.42 9.15q.69 0 1.38-.06a15.88 15.88 0 0 0 14-11.51l58.2-191.94v-.15a16 16 0 0 0-4-15.66m-69.49 203.17l-.05.14l-39.36-83.09l47.24-47.25a8 8 0 0 0-11.31-11.31l-47.25 47.24L24 98.22h.14L216 40Z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>


                                    @foreach ($foto->komentar as $komen)
                                        <div class="bg-white p-2">
                                            <div class="d-flex flex-row user-info">
                                                @auth
                                                    @if (auth()->user()->foto_profile == null)
                                                        <img src="{{ asset('style_main/img/av.png') }}"
                                                            class="rounded-circle" width="40">
                                                    @else
                                                        <img class="rounded-circle"
                                                            src="{{ asset('storage/images' . $komen->user->foto_profil) }}"
                                                            width="40">
                                                    @endif
                                                @endauth
                                                <div class="d-flex flex-column justify-content-start ml-2">
                                                    <span class="d-block font-weight-bold name">{{ $komen->user->name }}</span>
                                                    <small class="text-muted">{{$komen->created_at}}</small>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <p class="comment-text">{{ $komen->isi_komentar }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Comments================================================== -->
            </div>
            </article>
        </div>
    </div>
    </div>
@endsection
