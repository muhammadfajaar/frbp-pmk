@extends('layouts.main')

@section('container')
    <h1>{{ $title }}</h1>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
@endsection
