@extends('dashboard.layouts.main')

@section('content-wrapper')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit {{ $title }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/posts">Berita</a></li>
                        <li class="breadcrumb-item active">Edit {{ $title }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
{{-- Main Content Start --}}
    <section class="content">
        <div class="col-lg-8">
            <form method="post" action="/dashboard/posts/{{ $post->slug }}" enctype="multipart/form-data">
               @method('put')
                @csrf
                <div class="form-group">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" required autofocus value="{{ old('title', $post->title) }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                        name="slug" required value="{{ old('slug', $post->slug) }}">
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category" class="form-label">Kategori</label>
                    <select class="custom-select" name="category_id">
                        @foreach ($categories as $category)
                            @if (old('category_id', $post->category_id) == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image" class="form-label">Gambar Berita</label>
                    <input type="hidden" name="oldImage" value="{{ $post->image }}">
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" class="img-preview img-fluid  mb-3 col-sm-5 d-block">
                    @else
                        <img class="img-preview img-fluid  mb-3 col-sm-5">
                    @endif
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image"
                        name="image" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="body" class="form-label">Konten</label>
                    @error('body')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                    <trix-editor input="body"></trix-editor>
                </div>

                <button type="submit" class="btn btn-primary">Perbarui Berita</button>
            </form>
        </div>
    </section>
        <script>
            const title = document.querySelector('#title');
            const slug = document.querySelector('#slug');

            title.addEventListener('change', function() {
                fetch('/dashboard/posts/checkSlug?title=' + title.value)
                    .then(response => response.json())
                    .then(data => slug.value = data.slug)
            });

            document.addEventListener('trix-file-accept', function(e) {
                e.preventDefault();
            });

            function previewImage() {
				const image = document.querySelector('#image');
				const imgPreview = document.querySelector('.img-preview');

				imgPreview.style.display = 'block';

				const oFReader = new FileReader();
				oFReader.readAsDataURL(image.files[0]);

				oFReader.onload = function(oFREvent) {
					imgPreview.src = oFREvent.target.result;
				}
			}
        </script>
        {{-- Main Content End --}}
    @endsection
