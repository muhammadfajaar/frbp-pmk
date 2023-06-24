@extends('dashboard.layouts.main')

@section('content-wrapper')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah {{ $title }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><a href="/dashboard/posts">{{ $title }}</a></li>
                        <li class="breadcrumb-item">Tambah {{ $title }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    {{-- Main Content Start --}}
    <section class="content">
        <div class="col-lg-8">
            <form method="post" action="/dashboard/galleries" enctype="multipart/form-data" class="mb-5">
                @csrf
                <div class="form-group">
                    <label for="description" class="form-label">Deskripsi</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                        name="description" required autofocus value="{{ old('description') }}">
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                        name="slug" required value="{{ old('slug') }}">
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gallery" class="form-label">Kategori</label>
                    <select class="custom-select" name="gallery_category_id">
                        @foreach ($galleryCategories as $galleryCategory)
                            @if (old('gallery_category_id') == $galleryCategory->id)
                                <option value="{{ $galleryCategory->id }}" selected>{{ $galleryCategory->name }}</option>
                            @else
                                <option value="{{ $galleryCategory->id }}">{{ $galleryCategory->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image" class="form-label">Gambar Galeri</label>
                    <img class="img-preview img-fluid  mb-3 col-sm-5">
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image"
                        name="image" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Buat Galeri</button>
            </form>
        </div>
    </section>
    <script>
        const description = document.querySelector('#description');
        const slug = document.querySelector('#slug');

        description.addEventListener('change', function() {
            fetch('/dashboard/galleries/checkSlug?description=' + description.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
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