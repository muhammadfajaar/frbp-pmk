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
                        <li class="breadcrumb-item"><a href="/dashboard/members">{{ $title }}</a></li>
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
            <form method="post" action="/dashboard/members/{{ $member->slug }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" required autofocus value="{{ old('name', $member->name) }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                        name="slug" required value="{{ old('slug', $member->slug) }}">
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                        name="address" required value="{{ old('address', $member->address) }}">
                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone_number" class="form-label">Nomer HP</label>
                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                        name="phone_number" required value="{{ old('phone_number', $member->phone_number) }}">
                    @error('phone_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" required value="{{ old('email', $member->email) }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="date_birth" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('date_birth') is-invalid @enderror" id="date_birth"
                        name="date_birth" required value="{{ old('date_birth', $member->date_birth) }}">
                    @error('date_birth')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    @php
                        $statusOptions = ['Laki-laki', 'Perempuan'];
                    @endphp
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender"
                        required>
                        @foreach ($statusOptions as $option)
                            <option value="{{ $option }}" @if (old('gender', $member->gender) == $option) selected @endif>
                                {{ ucwords($option) }}</option>
                        @endforeach
                    </select>
                    @error('gender')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    @php
                        $statusOptions = ['Lajang', 'Janda', 'Menikah', 'Duda'];
                    @endphp
                    <label for="marital_status" class="form-label">Status</label>
                    <select class="form-control @error('marital_status') is-invalid @enderror" id="marital_status"
                        name="marital_status" required>
                        @foreach ($statusOptions as $option)
                            <option
                                value="{{ $option }}"@if (old('marital_status', $member->marital_status)) == $option) selected @endif>
                                {{ ucwords($option) }}</option>
                        @endforeach
                    </select>
                    @error('marital_status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="work" class="form-label">Pekerjaan</label>
                    <input type="text" class="form-control @error('work') is-invalid @enderror" id="work"
                        name="work" required value="{{ old('work', $member->work) }}">
                    @error('work')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="date_joined" class="form-label">Tanggal Gabung</label>
                    <input type="date" class="form-control @error('date_joined') is-invalid @enderror"
                        id="date_joined" name="date_joined" required
                        value="{{ old('date_joined', $member->date_joined) }}">
                    @error('date_joined')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image" class="form-label">Gambar Anggota</label>
                    <input type="hidden" name="oldImage" value="{{ $member->image }}">
                    @if ($member->image)
                        <img src="{{ asset('storage/' . $member->image) }}"
                            class="img-preview img-fluid  mb-3 col-sm-5 d-block">
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

                <button type="submit" class="btn btn-primary">Perbarui Angota</button>
            </form>
        </div>
    </section>
    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function() {
            fetch('/dashboard/members/checkSlug?name=' + name.value)
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
