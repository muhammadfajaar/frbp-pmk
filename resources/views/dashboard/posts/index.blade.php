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
                          <a href="/dashboard/posts/create" class="btn btn-block btn-primary">Tambah Berita</a>
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
                                  <th>Judul</th>
                                  <th>Kategori</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($posts as $post)
                                  <tr>
                                      <td>{{ $loop->iteration }}</td>
                                      <td>{{ $post->title }}</td>
                                      <td>{{ $post->category->name }}</td>
                                      <td>
                                        <a href="/dashboard/posts/{{ $post->slug }}" class="btn btn-info btn-sm">View</a>
                                        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="/dashboard/posts/{{ $post->slug }}" method="post"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm" type="button" data-toggle="modal"
                                                data-target="#confirmDeleteModal">Hapus</button>

                                            <div class="modal" id="confirmDeleteModal" tabindex="-1" role="dialog"
                                                aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="confirmDeleteModalLabel">Hapus {{ $title }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Apakah kamu serius untuk menghapus data {{ $title }}?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Batal</button>
                                                            <button type="submit"
                                                                class="btn btn-danger">Hapus</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
