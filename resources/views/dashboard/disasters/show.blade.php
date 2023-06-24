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
                        <li class="breadcrumb-item"><a href="/dashboard/disasters">{{ $title }}</a></li>
                        <li class="breadcrumb-item active">Detail {{ $title }}</li>
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

                    <a href="/dashboard/disasters" class="btn btn-success mb-3 btn-sm">Kembali ke semua kebencanaan</a>
                    <a href="/dashboard/disasters/{{ $disaster->slug }}/edit" class="btn btn-warning mb-3 btn-sm">Ubah</a>
                    <form action="/dashboard/disasters/{{ $disaster->slug }}" method="post" class="d-inline">
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

                    <div class="card-body" style="overflow: auto;">
                        <dl class="row">
                            <dt class="col-sm-4">Waktu Kejadian</dt>
                            <dd class="col-sm-8">{{ $disaster->waktu }}</dd>
                            <dt class="col-sm-4">Kejadian</dt>
                            <dd class="col-sm-8">{{ $disaster->disasterCategory->name }}</dd>
                            <dt class="col-sm-4">Kecamatan</dt>
                            <dd class="col-sm-8">{{ $disaster->subdistrict->name }}</dd>
                            <dt class="col-sm-4">Lokasi</dt>
                            <dd class="col-sm-8">{{ $disaster->location }}</dd>
                            <dt class="col-sm-4">Penyebab</dt>
                            <dd class="col-sm-8">{{ $disaster->penyebab }}</dd>
                            <dt class="col-sm-4">Meninggal</dt>
                            <dd class="col-sm-8">{{ $disaster->meninggal_dunia }}</dd>
                            <dt class="col-sm-4">Hilang</dt>
                            <dd class="col-sm-8">{{ $disaster->hilang }}</dd>
                            <dt class="col-sm-4">Luka-Luka</dt>
                            <dd class="col-sm-8">{{ $disaster->luka_luka }}</dd>
                            <dt class="col-sm-4">Mengungsi</dt>
                            <dd class="col-sm-8">{{ $disaster->mengungsi }}</dd>
                            <dt class="col-sm-4">Rumah Rusak Ringan</dt>
                            <dd class="col-sm-8">{{ $disaster->rumah_rusak_ringan }}</dd>
                            <dt class="col-sm-4">Rumah Rusak Sedang</dt>
                            <dd class="col-sm-8">{{ $disaster->rumah_rusak_sedang }}</dd>
                            <dt class="col-sm-4">Rumah Rusak Berat</dt>
                            <dd class="col-sm-8">{{ $disaster->rumah_rusak_berat }}</dd>
                            <dt class="col-sm-4">Rumah Terendam</dt>
                            <dd class="col-sm-8">{{ $disaster->rumah_terendam }}</dd>
                            <dt class="col-sm-4">Fas. Pendidikan</dt>
                            <dd class="col-sm-8">{{ $disaster->fas_pendidikan }}</dd>
                            <dt class="col-sm-4">Fas. Ibadah</dt>
                            <dd class="col-sm-8">{{ $disaster->fas_ibadah }}</dd>
                            <dt class="col-sm-4">Fas. Kesehatan</dt>
                            <dd class="col-sm-8">{{ $disaster->fas_kesehatan }}</dd>
                            <dt class="col-sm-4">Fas. Umum</dt>
                            <dd class="col-sm-8">{{ $disaster->fas_umum }}</dd>
                        </dl>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
