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
                        <li class="breadcrumb-item"><a href="/dashboard/members">{{ $title }}</a></li>
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

                    <a href="/dashboard/members" class="btn btn-success mb-3 btn-sm">Kembali ke semua anggota</a>
                    <a href="/dashboard/members/{{ $member->slug }}/edit" class="btn btn-warning mb-3 btn-sm">Ubah</a>
                    <form action="/dashboard/members/{{ $member->slug }}" method="post" class="d-inline">
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
                            <dt class="col-sm-4">Nama</dt>
                            <dd class="col-sm-8">{{ $member->name }}</dd>
                            <dt class="col-sm-4">Alamat</dt>
                            <dd class="col-sm-8">{{ $member->address }}</dd>
                            <dt class="col-sm-4">Nomer HP</dt>
                            <dd class="col-sm-8">{{ $member->phone_number }}</dd>
                            <dt class="col-sm-4">Email</dt>
                            <dd class="col-sm-8">{{ $member->email }}</dd>
                            <dt class="col-sm-4">Tgl Lahir</dt>
                            <dd class="col-sm-8">{{ $member->date_birth }}</dd>
                            <dt class="col-sm-4">Jenis Kelamin</dt>
                            <dd class="col-sm-8">{{ $member->gender }}</dd>
                            <dt class="col-sm-4">Status</dt>
                            <dd class="col-sm-8">{{ $member->marital_status }}</dd>
                            <dt class="col-sm-4">Pekerjaan</dt>
                            <dd class="col-sm-8">{{ $member->work }}</dd>
                            <dt class="col-sm-4">Foto</dt>
                            <dd class="col-sm-8">
                              @if ($member->image)
                                  <div style="max-height: 350px; overflow: hidden;">
                                      <img src="{{ asset('storage/' . $member->image) }}"alt="{{ $member->name }}"
                                          class="img-fluid mt-3">
                                  </div>
                              @else
                                  <img src="https://source.unsplash.com/300x400/?{{ $member->name }}"alt="{{ $member->name }}"
                                      class="img-fluid mt-3">
                              @endif
                            </dd>
                        </dl>
                    </div>


                </div>
            </div>
        </div>
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
