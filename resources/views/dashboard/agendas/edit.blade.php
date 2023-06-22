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
                        <li class="breadcrumb-item"><a href="/dashboard/agendas">{{ $title }}</a></li>
                        <li class="breadcrumb-item">Tambah {{ $title }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="col-lg-8">
            <form method="post" action="/dashboard/agendas/{{ $agenda->slug }}" enctype="multipart/form-data" class="mb-5">
              @method('put')
                @csrf
                <div class="form-group">
                    <label for="date" class="form-label">Tanggal</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                        name="date" required value="{{ old('date', isset($agenda) ? \Carbon\Carbon::parse($agenda->date)->format('Y-m-d') : '') }}">
                    @error('date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="start_time" class="form-label">Waktu Mulai</label>
                    <input type="time" class="form-control @error('start_time') is-invalid @enderror" id="start_time"
                        name="start_time" required value="{{ old('start_time', $agenda->start_time) }}">
                    @error('start_time')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="end_time" class="form-label">Waktu Selesai</label>
                    <input type="time" class="form-control @error('end_time') is-invalid @enderror" id="end_time"
                        name="end_time" required value="{{ old('end_time', $agenda->end_time) }}">
                    @error('end_time')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="activity" class="form-label">Aktifitas</label>
                    <input type="text" class="form-control @error('activity') is-invalid @enderror" id="activity"
                        name="activity" required value="{{ old('activity', $agenda->activity) }}">
                    @error('activity')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                        name="slug" required value="{{ old('slug', $agenda->slug) }}">
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="location" class="form-label">Lokasi</label>
                    <input type="location" class="form-control @error('location') is-invalid @enderror" id="location"
                        name="location" required value="{{ old('location', $agenda->location) }}">
                    @error('location')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image" class="form-label">Gambar Agenda</label>
                    <img class="img-preview img-fluid  mb-3 col-sm-5">
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image"
                        name="image" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskription" class="form-label">Deskripsi</label>
                    @error('deskription')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input id="deskription" type="hidden" name="deskription" value="{{ old('deskription', $agenda->deskription) }}">
                    <trix-editor input="deskription"></trix-editor>
                </div>

                <button type="submit" class="btn btn-primary">Ubah Agenda</button>
            </form>
        </div>
    </section>
    <script>
        const activity = document.querySelector('#activity');
        const slug = document.querySelector('#slug');

        activity.addEventListener('change', function() {
            fetch('/dashboard/agendas/checkSlug?activity=' + activity.value)
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
@endsection
