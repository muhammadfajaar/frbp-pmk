@extends('dashboard.layouts.main')

@section('content-wrapper')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Halaman Data Organisasi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Organisasi</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content col-lg-7">
        <div class="row">
            <div class="col-lg-8">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
        @foreach ($organizations as $organization)
            <div class="card-header border-0">
                <h3 class="card-title">
                    <a href="/dashboard/organizations/{{ $organization->slug }}/edit" class="btn btn-block btn-primary">Edit
                        Organisasi</a>
                </h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" value="{{ $organization->name }}" disabled>
                </div>
                <div class="form-group">
                    <label for="short_name">Nama Singkat</label>
                    <input type="text" class="form-control" id="short_name" value="{{ $organization->short_name }}"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="chairman_name">Ketua</label>
                    <input type="text" class="form-control" id="chairman_name" value="{{ $organization->chairman_name }}"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="notelp">Nomer Telfon</label>
                    <input type="text" class="form-control" id="notelp" value="{{ $organization->notelp }}" disabled>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" value="{{ $organization->email }}" disabled>
                </div>
                <div class="form-group">
                    <label for="address">Alamat</label>
                    <input type="text" class="form-control" id="address" value="{{ $organization->address }}" disabled>
                </div>
                <div class="form-group">
                  <label for="maps_link">Map Link</label>
                  <textarea class="form-control" id="maps_link" rows="3" disabled>{{ $organization->maps_link }}</textarea>                  
                </div>
                <div class="form-group">
                    <label for="image">Logo</label>
                    <br>
                    <img src="{{ asset('storage/' . $organization->image) }}" class="img-fluid mt-3" width="300" height="300">
                </div>
            </div>
        @endforeach
    </section>
@endsection
