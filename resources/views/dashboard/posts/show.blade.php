@extends('dashboard.layouts.main')

@section('content-wrapper')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">View {{ $title }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><a href="/dashboard/posts">Berita</a></li>
                        <li class="breadcrumb-item">View {{ $title }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    {{-- Main Content Start --}}
    <section class="content">
        <!-- /.content-header -->
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-8">
                    <h1 class="mb-3">{{ $post->title }}</h1>

                    <a href="/dashboard/posts" class="btn btn-success mb-3 btn-sm">Kembali ke semua berita</a>
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning mb-3 btn-sm">Ubah</a>
                    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger mb-3 btn-sm" onclick="return confirm('Are you sure')">Hapus</button>
                    </form>

                    @if ($post->image)
                        <div style="max-height: 350px; overflow: hidden;">
                            <img src="{{ asset('storage/' . $post->image) }}"alt="{{ $post->category->name }}" class="img-fluid mt-3">
                        </div>
                    @else
                        <img src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}"alt="{{ $post->category->name }}" class="img-fluid mt-3">
                    @endif

                    <article class="my-3 fs-5">
                        {!! $post->body !!}
                    </article>

                </div>
            </div>
        </div>
    </section>
    {{-- Main Content End --}}
@endsection
