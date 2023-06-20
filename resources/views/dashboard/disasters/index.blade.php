@extends('dashboard.layouts.main')

@section('content-wrapper')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Halaman Data {{ $title }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">dashboard</a></li>
                        <li class="breadcrumb-item active">kebencanaan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    {{-- Main Content Start --}}
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a href="/dashboard/disasters/create" class="btn btn-block btn-primary">Tambah Kebencanaan</a>
                        </h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Waktu Kejadian</th>
                                    <th>Kejadian</th>
                                    <th>Kecamatan</th>
                                    <th>Lokasi</th>
                                    <th>Penyebab</th>
                                    <th>Meninggal</th>
                                    <th>Hilang</th>
                                    <th>Luka-Luka</th>
                                    <th>Mengungsi</th>
                                    <th>Rumah Rusak Rigan</th>
                                    <th>Rumah Rusak Sedang</th>
                                    <th>Rumah Rusak Berat</th>
                                    <th>Rumah Terendam</th>
                                    <th>Fas. Pendidikan</th>
                                    <th>Fas. Ibadah</th>
                                    <th>Fas. Kesehatan</th>
                                    <th>Fas. Umum</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($disasters as $disaster)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $disaster->waktu }}</td>
                                        <td>{{ $disaster->disasterCategory->name }}</td>
                                        <td>{{ $disaster->subdistrict->name }}</td>
                                        <td>{{ $disaster->location }}</td>
                                        <td>{{ $disaster->penyebab }}</td>
                                        <td>{{ $disaster->meninggal_dunia }}</td>
                                        <td>{{ $disaster->hilang }}</td>
                                        <td>{{ $disaster->luka_luka }}</td>
                                        <td>{{ $disaster->mengungsi }}</td>
                                        <td>{{ $disaster->rumah_rusak_ringan }}</td>
                                        <td>{{ $disaster->rumah_rusak_sedang }}</td>
                                        <td>{{ $disaster->rumah_rusak_berat }}</td>
                                        <td>{{ $disaster->rumah_terendam }}</td>
                                        <td>{{ $disaster->fas_pendidikan }}</td>
                                        <td>{{ $disaster->fas_ibadah }}</td>
                                        <td>{{ $disaster->fas_kesehatan }}</td>
                                        <td>{{ $disaster->fas_umum }}</td>
                                        <td>
                                            <a href="/dashboard/disasters/{{ $disaster->slug }}" class="badge bg-info">View</a>
                                            <a href="/dashboard/disasters/{{ $disaster->slug }}/edit"
                                                class="badge bg-warning">Edit</a>
                                            <form action="/dashboard/disasters/{{ $disaster->slug }}" method="post"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="badge bg-danger border-0"
                                                    onclick="return confirm('Are you sure')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    {{-- Main Content End --}}
@endsection
