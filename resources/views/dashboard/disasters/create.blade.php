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
                        <li class="breadcrumb-item active"><a href="/dashboard/disasters">{{ $title }}</a></li>
                        <li class="breadcrumb-item active">Tambah {{ $title }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    {{-- main section start --}}
    <section class="content">
        <div class="col-lg-8">
            <form method="post" action="/dashboard/disasters" class="mb-5">
                @csrf
                <div class="form-group">
                    <label for="waktu" class="form-label">Tanggal</label>
                    <input type="date" class="form-control @error('waktu') is-invalid @enderror" id="waktu"
                        name="waktu" required>
                    @error('waktu')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="disaster_category" class="form-label">Jenis Peristiwa</label>
                    <select class="custom-select" name="disaster_category_id">
                        <option>Pilih</option>
                        @foreach ($disasterCategories as $disasterCategory)
                            @if (old('disaster_category_id') == $disasterCategory->id)
                                <option value="{{ $disasterCategory->id }}" selected>{{ $disasterCategory->name }}</option>
                            @else
                                <option value="{{ $disasterCategory->id }}">{{ $disasterCategory->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="subdistrict" class="form-label">Kecamatan</label>
                    <select class="custom-select" name="subdistrict_id">
                        <option>Pilih</option>
                        @foreach ($subdistricts as $subdistrict)
                            @if (old('subdistrict_id') == $subdistrict->id)
                                <option value="{{ $subdistrict->id }}" selected>{{ $subdistrict->name }}</option>
                            @else
                                <option value="{{ $subdistrict->id }}">{{ $subdistrict->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="location">Lokasi</label>
                    <textarea id="location" name="location" class="form-control @error('location') is-invalid @enderror"
                        placeholder="Masukkan nama kecamatan" rows="3" oninput="searchVillages()"></textarea>
                    @error('location')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div id="result"></div>
                <div class="form-group">
                    <label for="penyebab" class="form-label">Penyebab</label>
                    <input type="text" class="form-control @error('penyebab') is-invalid @enderror" id="penyebab"
                        name="penyebab" required value="{{ old('penyebab') }}">
                    @error('penyebab')
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
                    <label for="meninggal_dunia" class="form-label">Meniggal</label>
                    <input type="number" class="form-control" id="meninggal_dunia" name="meninggal_dunia" required
                        value="{{ old('meninggal_dunia', 0) }}">
                    @error('meninggal_dunia')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="hilang" class="form-label">Hilang</label>
                    <input type="number" class="form-control" id="hilang" name="hilang" required
                        value="{{ old('hilang', 0) }}">
                    @error('hilang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="luka_luka" class="form-label">Luka_Luka</label>
                    <input type="number" class="form-control" id="luka_luka" name="luka_luka" required
                        value="{{ old('luka_luka', 0) }}">
                    @error('luka_luka')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="mengungsi" class="form-label">Mengungsi</label>
                    <input type="number" class="form-control" id="mengungsi" name="mengungsi" required
                        value="{{ old('mengungsi', 0) }}">
                    @error('mengungsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="rumah_rusak_ringan" class="form-label">Rumah Rusak Ringan</label>
                    <input type="number" class="form-control" id="rumah_rusak_ringan" name="rumah_rusak_ringan"
                        required value="{{ old('rumah_rusak_ringan', 0) }}">
                    @error('rumah_rusak_ringan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="rumah_rusak_sedang" class="form-label">Rumah Rusak Sedang</label>
                    <input type="number" class="form-control" id="rumah_rusak_sedang" name="rumah_rusak_sedang"
                        required value="{{ old('rumah_rusak_sedang', 0) }}">
                    @error('rumah_rusak_sedang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="rumah_rusak_berat" class="form-label">Rumah Rusak Berat</label>
                    <input type="number" class="form-control" id="rumah_rusak_berat" name="rumah_rusak_berat" required
                        value="{{ old('rumah_rusak_berat', 0) }}">
                    @error('rumah_rusak_berat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="rumah_terendam" class="form-label">Rumah Terendam</label>
                    <input type="number" class="form-control" id="rumah_terendam" name="rumah_terendam" required
                        value="{{ old('rumah_terendam', 0) }}">
                    @error('rumah_terendam')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="fas_pendidikan" class="form-label">Fas. Pendidikan</label>
                    <input type="number" class="form-control" id="fas_pendidikan" name="fas_pendidikan" required
                        value="{{ old('fas_pendidikan', 0) }}">
                    @error('fas_pendidikan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="fas_kesehatan" class="form-label">Fas. Kesehatan</label>
                    <input type="number" class="form-control" id="fas_kesehatan" name="fas_kesehatan" required
                        value="{{ old('fas_kesehatan', 0) }}">
                    @error('fas_kesehatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="fas_umum" class="form-label">Fas. Umum</label>
                    <input type="number" class="form-control" id="fas_umum" name="fas_umum" required
                        value="{{ old('fas_umum', 0) }}">
                    @error('fas_umum')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="fas_ibadah" class="form-label">Fas. Ibadah</label>
                    <input type="number" class="form-control" id="fas_ibadah" name="fas_ibadah" required
                        value="{{ old('fas_ibadah', 0) }}">
                    @error('fas_ibadah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Tambah Kebencanaan</button>

            </form>
        </div>
    </section>

    {{-- main section end --}}
    <script>
        const penyebab = document.querySelector('#penyebab');
        const slug = document.querySelector('#slug');

        penyebab.addEventListener('change', function() {
            fetch('/dashboard/disasters/checkSlug?penyebab=' + penyebab.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        var selectedVillages = []; // Menyimpan nama-nama desa yang dipilih

        var villages = [{
                kecamatan: "Proppo",
                desa: ["Ds.Badung, Kec.Proppo, Kab.Pamekasan",
                    "Ds.Banyubulu, Kec.Proppo, Kab.Pamekasan",
                    "Ds.Batokalangan, Kec.Proppo, Kab.Pamekasan",
                    "Ds.Billa'an, Kec.Proppo, Kab.Pamekasan",
                    "Ds.Campor, Kec.Proppo, Kab.Pamekasan",
                    "Ds.Candi Burung, Kec.Proppo, Kab.Pamekasan",
                    "Ds.Gro'om, Kec.Proppo, Kab.Pamekasan",
                    "Ds.Jambringin, Kec.Proppo, Kab.Pamekasan",
                    "Ds.Karanganyar, Kec.Proppo, Kab.Pamekasan",
                    "Ds.Klampar, Kec.Proppo, Kab.Pamekasan",
                    "Ds.Koding, Kec.Proppo, Kab.Pamekasan",
                    "Ds.Lenteng, Kec.Proppo, Kab.Pamekasan",
                    "Ds.Mapper, Kec.Proppo, Kab.Pamekasan",
                    "Ds.Panangguan, Kec.Proppo, Kab.Pamekasan",
                    "Ds.Pangbatok, Kec.Proppo, Kab.Pamekasan",
                    "Ds.Panglemah, Kec.Proppo, Kab.Pamekasan",
                    "Ds.Pangoranyan, Kec.Proppo, Kab.Pamekasan",
                    "Ds.Pangtonggal, Kec.Proppo, Kab.Pamekasan",
                    "Ds.Proppo, Kec.Proppo, Kab.Pamekasan",
                    "Ds.Rangperang Daja, Kec.Proppo, Kab.Pamekasan",
                    "Ds.Rangperang Laok, Kec.Proppo, Kab.Pamekasan",
                    "Ds.Samatan, Kec.Proppo, Kab.Pamekasan",
                    "Ds.Samiran, Kec.Proppo, Kab.Pamekasan",
                    "Ds.Srambah, Kec.Proppo, Kab.Pamekasan",
                    "Ds.Tattangoh, Kec.Proppo, Kab.Pamekasan",
                    "Ds.Tlangoh ,Kec.Proppo, Kab.Pamekasan",
                    "Ds.Toket, Kec.Proppo, Kab.Pamekasan"
                ]
            },
            {
                kecamatan: "Pamekasan",
                desa: ["Kel.Barurambat Kota, Kec.Pamekasan, Kab.Pamekasan",
                    "Kel.Bugih, Kec.Pamekasan, Kab.Pamekasan",
                    "Kel.Gladak Anyar, Kec.Pamekasan, Kab.Pamekasan",
                    "Kel.Jungcancang, Kec.Pamekasan, Kab.Pamekasan",
                    "Kel.Kangenan, Kec.Pamekasan, Kab.Pamekasan",
                    "Kel.Kolpajung, Kec.Pamekasan, Kab.Pamekasan",
                    "Kel.Kowel, Kec.Pamekasan, Kab.Pamekasan",
                    "Kel.Parteker, Kec.Pamekasan, Kab.Pamekasan",
                    "Kel.Patemon, Kec.Pamekasan, Kab.Pamekasan",
                    "Ds.Bettet, Kec.Pamekasan, Kab.Pamekasan",
                    "Ds.Jalmak, Kec.Pamekasan, Kab.Pamekasan",
                    "Ds.Laden, Kec.Pamekasan, Kab.Pamekasan",
                    "Ds.Nyalabu Daya, Kec.Pamekasan, Kab.Pamekasan",
                    "Ds.Nyalabu Laok, Kec.Pamekasan, Kab.Pamekasan",
                    "Ds.Panempan, Kec.Pamekasan, Kab.Pamekasan",
                    "Ds.Teja Barat, Kec.Pamekasan, Kab.Pamekasan",
                    "Ds.Teja Timur, Kec.Pamekasan, Kab.Pamekasan",
                    "Ds.Toronan, Kec.Pamekasan, Kab.Pamekasan"
                ]
            },
            {
                kecamatan: "Batu Marmar",
                desa: ["Ds.Bangserreh, Kec.Batu Marmar, Kab.Pamekasan",
                    "Ds.Batu Bintang, Kec.Batu Marmar, Kab.Pamekasan",
                    "Ds.Blaban, Kec.Batu Marmar, Kab.Pamekasan",
                    "Ds.Bajur Barat, Kec.Batu Marmar, Kab.Pamekasan",
                    "Ds.Bajur Tengah, Kec.Batu Marmar, Kab.Pamekasan",
                    "Ds.Bajau Timur, Kec.Batu Marmar, Kab.Pamekasan",
                    "Ds.Kapong, Kec.Batu Marmar, Kab.Pamekasan",
                    "Ds.Lessong Daja, Kec.Batu Marmar, Kab.Pamekasan",
                    "Ds.Lessong Laok, Kec.Batu Marmar, Kab.Pamekasan",
                    "Ds.Pangerreman, Kec.Batu Marmar, Kab.Pamekasan",
                    "Ds.Ponjanan Barat, Kec.Batu Marmar, Kab.Pamekasan",
                    "Ds.Ponjanan Timur,Kec.Batu Marmar, Kab.Pamekasan",
                    "Ds.Tamberu, Kec.Batu Marmar, Kab.Pamekasan"
                ]
            },
            {
                kecamatan: "Galis",
                desa: ["Ds.Bangserreh, Kec.Galis, Kab.Pamekasan",
                    "Ds.Artodung, Kec.Galis, Kab.Pamekasan",
                    "Ds.Bulay, Kec.Galis, Kab.Pamekasan",
                    "Ds.Galis, Kec.Galis, Kab.Pamekasan",
                    "Ds.Konang, Kec.Galis, Kab.Pamekasan",
                    "Ds.Lembung, Kec.Galis, Kab.Pamekasan",
                    "Ds.Pangendingan, Kec.Galis,Kab.Pamekasan",
                    "Ds.Pandan, Kec.Galis, Kab.Pamekasan",
                    "Ds.Polagan, Kec.Galis, Kab.Pamekasan",
                    "Ds.Ponteh, Kec.Galis, Kab.Pamekasan",
                    "Ds.Tobungan, Kec.Galis, Kab.Pamekasan"
                ]
            },
            {
                kecamatan: "Kadur",
                desa: ["Ds.Bangkes, Kec.Kadur, Kab.Pamekasan",
                    "Ds.Bungbaruh, Kec.Kadur, Kab.Pamekasan",
                    "Ds.Gagah, Kec.Kadur, Kab.Pamekasan",
                    "Ds.kadur, Kec.Kadur ,Kab.Pamekasan",
                    "Ds.Kertagena Dajah, Kec.Kadur, Kab.Pamekasan",
                    "Ds.Kertegena Laok, Kec.Kadur, Kab.Pamekasan",
                    "Ds.Kertagena Tengah, Kec.Kadur, Kab.Pamekasan",
                    "Ds.Pamaroh, Kec.Kadur, Kab.Pamekasan",
                    "Ds.Pamoroh, Kec.Kadur, Kab.Pamekasan",
                    "Ds.Sakolelah, Kec.Kadur, Kab.Pamekasan"
                ]
            },
            {
                kecamatan: "Larangan",
                desa: ["Ds.Blumbungan, Kec.Larangan, Kab.Pamekasan",
                    "Ds.Duko Timur, Kec.Larangan, Kab.Pamekasan",
                    "Ds.Grujugan, Kec.Larangan, Kab.Pamekasan",
                    "Ds.Kaduara Barat, Kec.Larangan,Kab.Pamekasan",
                    "Ds.Lancar, Kec.Larangan, Kab.Pamekasan",
                    "Ds.Larangan Dalam, Kec.Larangan, Kab.Pamekasan",
                    "Ds.Larangan Luar, Kec.Larangan, Kab.Pamekasan",
                    "Ds.Montok, Kec.Larangan, Kab.Pamekasan",
                    "Ds.Panaguan, Kec.Larangan, Kab.Pamekasan",
                    "Ds.Peltong, Kec.Larangan, Kab.Pamekasan",
                    "Ds.Taraban, Kec.Larangan, Kab.Pamekasan",
                    "Ds.Tentenan Barat, Kec.Larangan, Kab.Pamekasan",
                    "Ds.Tentenan Timur, Kec.Larangan, Kab.Pamekasan",
                    "Ds.Trasak, Kec.Larangan, Kab.Pamekasan"
                ]
            },
            {
                kecamatan: "Pandemawu",
                desa: ["Ds.Baddurih, Kec.Pandemawu, Kab.Pamekasan",
                    "Ds.Buddagan, Kec.Pandemawu, Kab.Pamekasan",
                    "Ds.Buddih, Kec.Pandemawu, Kab.Pamekasan",
                    "Ds.Bunder, Kec.Pandemawu, Kab.Pamekasan",
                    "Ds.Dasok, Kec.Pandemawu, Kab.Pamekasan",
                    "Ds.Durbuk, Kec.Pandemawu, Kab.Pamekasan",
                    "Ds.Jarin, Kec.Pandemawu, Kab.Pamekasan",
                    "Ds.Lemper, Kec.Pandemawu, Kab.Pamekasan",
                    "Ds.Majungan, Kec.Pandemawu, Kab.Pamekasan",
                    "Ds.Murtajih, Kec.Pandemawu,  Kab.Pamekasan",
                    "Ds.Padelegan, Kec.Pandemawu, Kab.Pamekasan",
                    "Ds.Pademawu Barat, Kec.Pandemawu, Kab.Pamekasan",
                    "Ds.Pademawu Timur, Kec.Pandemawu, Kab.Pamekasan",
                    "Ds.Pagagan, Kec.Pandemawu, Kab.Pamekasan",
                    "Ds.Prekbun, Kec.Pandemawu, Kab.Pamekasan",
                    "Ds.Sentol, Kec.Pandemawu, Kab.Pamekasan",
                    "Ds.Sopa'ah, Kec.Pandemawu, Kab.Pamekasan",
                    "Ds.Sumedangan, Kec.Pandemawu, Kab.Pamekasan",
                    "Ds.Tambung, Kec.Pandemawu, Kab.Pamekasan",
                    "Ds.Tanjung, Kec.Pandemawu, Kab.Pamekasan",
                    "Kel.Baru Rambar Timur, Kec.Pandemawu, Kab.Pamekasan",
                    "Kel.Lawangan Daya, Kec.Pandemawu, Kab.Pamekasan"
                ]
            },
            {
                kecamatan: "Pakong",
                desa: ["Ds.Bajang Daya ,Kec.Pakong, Kab.Pamekasan",
                    "Ds.Bajan Daya, Kec.Pakong, Kab.Pamekasan",
                    "Ds.Ban-ban Daya, Kec.Pakong, Kab.Pamekasan",
                    "Ds.Bandungan Daya, Kec.Pakong, Kab.Pamekasan",
                    "Ds.Bicorong Daya, Kec.Pakong, Kab.Pamekasan",
                    "Ds.Cen Lecen Daya, Kec.Pakong, Kab.Pamekasan",
                    "Ds.Klompang Barat Daya, Kec.Pakong, Kab.Pamekasan",
                    "Ds.Klompang Timur Daya, Kec.Pakong,  Kab.Pamekasan",
                    "Ds.Lebbak Daya, Kec.Pakong, Kab.Pamekasan",
                    "Ds.Pakong, Kec.Pakong, Kab.Pamekasan",
                    "Ds.Palalang, Kec.Pakong, Kab.Pamekasan",
                    "Ds.Seddur, Kec.Pakong, Kab.Pamekasan"
                ]
            },
            {
                kecamatan: "Pasean",
                desa: ["Ds.Batokerbuy, Kec.Pasean, Kab.Pamekasan",
                    "Ds.Bindang, Kec.Pasean, Kab.Pamekasan",
                    "Ds.Dempo Barat, Kec.Pasean, Kab.Pamekasan",
                    "Ds.Dempo Timur, Kec.Pasean, Kab.Pamekasan",
                    "Ds.Sana Daja, Kec.Pasean, Kab.Pamekasan",
                    "Ds.Sana Tengah, Kec.Pasean, Kab.Pamekasan",
                    "Ds.Satobar, Kec.Pasean, Kab.Pamekasan",
                    "Ds.Tangangser Daja, Kec.Pasean, Kab.Pamekasan",
                    "Ds.Tlontoraja, Kec.Pasean, Kab.Pamekasan",
                ]
            },
            {
                kecamatan: "Palenggaan",
                desa: ["Ds.Tlontoraja, Kec.Palenggaan, Kab.Pamekasan",
                    "Ds.Akkor, Kec.Palenggaan, Kab.Pamekasan",
                    "Ds.Angsanah, Kec.Palenggaan, Kab.Pamekasan",
                    "Ds.Banupelle, Kec.Palenggaan, Kab.Pamekasan",
                    "Ds.Kacok, Kec.Palenggaan, Kab.Pamekasan",
                    "Ds.Larangan Badung, Kec.Palenggaan, Kab.Pamekasan",
                    "Ds.Palenggaan Laok, Kec.Palenggaan, Kab.Pamekasan",
                    "Ds.Palenggaan Dajah, Kec.Palenggaan, Kab.Pamekasan",
                    "Ds.Pana'an, Kec.Palenggaan, Kab.Pamekasan",
                    "Ds.Patoan Laok, Kec.Palenggaan, Kab.Pamekasan",
                    "Ds.Patoan Dajah, Kec.Palenggaan, Kab.Pamekasan",
                    "Ds.Rekerrek, Kec.Palenggaan, Kab.Pamekasan",
                    "Ds.Rombuh, Kec.Palenggaan, Kab.Pamekasan",
                ]
            },
            {
                kecamatan: "Pegantenan",
                desa: ["Ds.Ambender, Kec.Pegantenan, Kab.Pamekasan",
                    "Ds.Bulangan, Kec.Pegantenan, Kab.Pamekasan",
                    "Ds.Branta, Kec.Pegantenan, Kab.Pamekasan",
                    "Ds.Bulangan Haji, Kec.Pegantenan, Kab.Pamekasan",
                    "Ds.Bulangan Timur, Kec.Pegantenan, Kab.Pamekasan",
                    "Ds.Palesanggar, Kec.Pegantenan, Kab.Pamekasan",
                    "Ds.Pasanggar, Kec.Pegantenan, Kab.Pamekasan",
                    "Ds.Pegantenan ,Kec.Pegantenan, Kab.Pamekasan",
                    "Ds.Plakpak, Kec.Pegantenan, Kab.Pamekasan",
                    "Ds.Tanjung, Kec.Pegantenan, Kab.Pamekasan",
                    "Ds.Tebul Barat, Kec.Pegantenan, Kab.Pamekasan",
                    "Ds.Tebul Timur, Kec.Pegantenan, Kab.Pamekasan",
                    "Ds.Tlagah, Kec.Pegantenan, Kab.Pamekasan",
                ]
            },
            {
                kecamatan: "Waru",
                desa: ["Ds.Bajur, Kec.Waru, Kab.Pamekasan",
                    "Ds.Ragang, Kec.Waru, Kab.Pamekasan",
                    "Ds.Sana, Kec.Waru, Kab.Pamekasan",
                    "Ds.Laok, Kec.Waru, Kab.Pamekasan",
                    "Ds.Sumber Baru, Kec.Waru, Kab.Pamekasan",
                    "Ds.Tagangser Laok, Kec.Waru, Kab.Pamekasan",
                    "Ds.Tampojung Luwa, Kec.Waru, Kab.Pamekasan",
                    "Ds.Tampojung Pregih, Kec.Waru, Kab.Pamekasan",
                    "Ds.Tampojung Tengah, Kec.Waru, Kab.Pamekasan",
                    "Ds.Tampojung Tenggina, Kec.Waru, Kab.Pamekasan",
                    "Ds.Tlonto Ares, Kec.Waru, Kab.Pamekasan",
                    "Ds.Waru Barat, Kec.Waru, Kab.Pamekasan",
                    "Ds.Waru Timur, Kec.Waru, Kab.Pamekasan"
                ]
            },
            {
                kecamatan: "Tlanakan",
                desa: ["Ds.Dabuan, Kec.Tlanakan, Kab.Pamekasan",
                    "Ds.Terrak, Kec.Tlanakan, Kab.Pamekasan",
                    "Ds.Mangar, Kec.Tlanakan, Kab.Pamekasan",
                    "Ds.Bandaran, Kec.Tlanakan, Kab.Pamekasan",
                    "Ds.Kramat, Kec.Tlanakan, Kab.Pamekasan",
                    "Ds.Ambat, Kec.Tlanakan, Kab.Pamekasan",
                    "Ds.Branta Pesisir, Kec.Tlanakan, Kab.Pamekasan",
                    "Ds.Tlanakan, Kec.Tlanakan, Kab.Pamekasan",
                    "Ds.Branta, Kec.Tlanakan, Kab.Pamekasan",
                    "Ds.Branta Tinggi, Kec.Tlanakan, Kab.Pamekasan",
                    "Ds.Tlesah, Kec.Tlanakan, Kab.Pamekasan",
                    "Ds.Larangan Tokol, Kec.Tlanakan, Kab.Pamekasan",
                    "Ds.Ceguk, Kec.Tlanakan, Kab.Pamekasan",
                    "Ds.Panglegur, Kec.Tlanakan, Kab.Pamekasan",
                    "Ds.Bukek, Kec.Tlanakan, Kab.Pamekasan",
                    "Ds.Gugul, Kec.Tlanakan, Kab.Pamekasan",
                    "Ds.Larangan Slampar, Kec.Tlanakan, Kab.Pamekasan",
                    "Ds.Taro'an, Kec.Tlanakan, Kab.Pamekasan",
                ]
            }
        ];

        function getVillagesByKecamatan(kecamatan) {
            var filteredVillages = villages.find(function(village) {
                return village.kecamatan.toLowerCase() === kecamatan.toLowerCase();
            });

            if (filteredVillages) {
                return filteredVillages.desa;
            } else {
                return [];
            }
        }

        function searchVillages() {
            var input = document.getElementById("location").value;
            var resultDiv = document.getElementById("result");

            if (input.trim() !== "") {
                if (input !== selectedVillages.join(", ")) {
                    selectedVillages = []; // Set array selectedVillages menjadi kosong jika input berubah
                    resultDiv.innerHTML = ""; // Hapus isi dari elemen dengan id "result"
                    isInputChanged = true;
                } else {
                    isInputChanged = false;
                }

                var filteredVillages = getVillagesByKecamatan(input);

                if (filteredVillages.length > 0) {
                    var resultList = document.createElement("ul");
                    resultList.className = "list-group";
                    filteredVillages.forEach(function(desa) {
                        var listItem = document.createElement("li");
                        listItem.className = "list-group-item";
                        listItem.innerHTML = desa;

                        listItem.onclick = function() {
                            toggleVillageSelection(listItem.innerHTML);
                        };

                        if (selectedVillages.includes(listItem.innerHTML)) {
                            listItem.classList.add("selected");
                        }

                        resultList.appendChild(listItem);
                    });
                    resultDiv.appendChild(resultList);
                } else {
                    resultDiv.innerHTML = "<p>Tidak ada desa yang ditemukan.</p>";
                }
            } else {
                resultDiv.innerHTML = "";
            }
        }

        function toggleVillageSelection(villageName) {
            var index = selectedVillages.indexOf(villageName);
            if (index > -1) {
                selectedVillages.splice(index, 1);
            } else {
                selectedVillages.push(villageName);
            }

            var kecamatanInput = document.getElementById("location");
            kecamatanInput.value = selectedVillages.join(", ");
        }

        var kecamatanInput = document.getElementById("location");
        kecamatanInput.addEventListener("keyup", function(event) {
            if (event.keyCode === 13) {
                searchVillages();
            }
        });

        window.addEventListener("keydown", function(event) {
            if (event.keyCode === 27) {
                var resultDiv = document.getElementById("result");
                resultDiv.innerHTML = "";
            }
        });
    </script>
@endsection
