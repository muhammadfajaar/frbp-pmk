@extends('dashboard.layouts.main')

@section('content-wrapper')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail {{ $title }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/profiles">Profil</a></li>
                        <li class="breadcrumb-item active">Detail {{ $title }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <!-- /.content-header -->
        <div class="container">
            <div class="row justify-content-center mb-2">
                <div class="col-md-8">

                    <h1 class="mb-3">{{ $profile->name }}</h1>

                    <a href="/dashboard/profiles" class="btn btn-success mb-3 btn-sm">Kembali ke semua berita</a>
                    <a href="/dashboard/profiles/{{ $profile->slug }}/edit" class="btn btn-warning mb-3 btn-sm">Ubah</a>
                    <form action="/dashboard/profiles/{{ $profile->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger mb-3 btn-sm" type="button" data-toggle="modal"
                            data-target="#confirmDeleteModal">Hapus</button>

                        <div class="modal" id="confirmDeleteModal" tabindex="-1" role="dialog"
                            aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel">Hapus
                                            {{ $title }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah kamu serius untuk menghapus data
                                            {{ $title }}?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    @if ($profile->image)
                        <div style="max-height: 350px; overflow: hidden;">
                            <img src="{{ asset('storage/' . $profile->image) }}" alt="{{ $profile->name }}"
                                class="img-fluid mt-3">
                        </div>
                    @else
                        <img src="https://source.unsplash.com/1200x400/?{{ $profile->name }}" alt="{{ $profile->name }}"
                            class="img-fluid mt-3">
                    @endif

                    <article class="my-3 fs-5">
                        {!! $profile->description !!}
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection
