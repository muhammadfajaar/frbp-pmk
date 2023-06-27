@extends('dashboard.layouts.main')

@section('content-wrapper')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data {{ $title }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    {{-- Main Content Start --}}
    <section class="content">
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a href="/dashboard/disasters/create" class="btn btn-block btn-primary">Tambah Kebencanaan</a>
                        </h3>
                        <div class="card-tools">
                            <form action="" class="form-inline" method="get">
                                @csrf
                                <input type="search" name="search" class="form-control float-right"
                                    placeholder="cari lokasi">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
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
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($disasters as $disaster)
                                    <tr>
                                        <td>{{ $no+ $loop->iteration }}</td>
                                        <td>{{ $disaster->waktu }}</td>
                                        <td>{{ $disaster->disasterCategory->name }}</td>
                                        <td>{{ $disaster->subdistrict->name }}</td>
                                        <td>{{ $disaster->location }}</td>
                                        <td>{{ $disaster->penyebab }}</td>
                                        <td>
                                            <div class="d-inline-flex">
                                                <div class="btn-group d-flex justify-content-center" role="group">
                                                    <a href="/dashboard/disasters/{{ $disaster->slug }}"
                                                        class="btn btn-info btn-sm">Detail</a>
                                                    <a href="/dashboard/disasters/{{ $disaster->slug }}/edit"
                                                        class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="/dashboard/disasters/{{ $disaster->slug }}"
                                                        method="post" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure!')"><span
                                                                data-feather="x-circle"></span>Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                {{ $disasters->links() }}
                            </ul>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    {{-- Main Content End --}}
    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
@endsection
