@extends('dashboard.layouts.main')

@section('content-wrapper')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Halaman {{ $title }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    {{-- main section start --}}
    <section class="content">
        <div class="container">
            <div class="form-group">
                <label for="selectedDesaInput">Nama Desa:</label>
                <input type="text" class="form-control" id="selectedDesaInput" placeholder="Masukkan nama desa">
                <small class="form-text text-muted">Tekan tombol apa saja untuk aktifkan pencarian</small>
            </div>
            <ul id="searchResults" class="list-group"></ul>
        </div>
    </section>
    {{-- main section end --}}
    <script>
      const selectedDesaInput = document.getElementById('selectedDesaInput');
      const searchResults = document.getElementById('searchResults');
    
      // Data desa yang akan digunakan untuk pencarian
      const desa = [
        'Ds. Badung',
        'Ds. Banyubulu',
        'Ds. Batokalangan',
        'Ds. Billa\'an',
        'Ds. Campor',
        'Ds. Candi Burung',
        'Ds. Gro\'om',
        'Ds. Jambringin',
        'Ds. Karanganyar',
        'Ds. Klampar',
        'Ds. Kodik',
        'Ds. Lenteng',
        'Ds. Mapper',
        'Ds. Panangguan',
        'Ds. Pangbatok',
        'Ds. Panglemah',
        'Ds. Pangorayan',
        'Ds. Pangtonggal',
        'Ds. Proppo',
        'Ds. Rangperang Daja',
        'Ds. Rangperang Laok',
        'Ds. Samatan',
        'Ds. Samiran',
        'Ds. Srambah',
        'Ds. Tattangoh',
        'Ds. Tlangoh',
        'Ds. Toket'
      ];
    
      // Fungsi untuk melakukan pencarian dan menampilkan hasil
      function searchDesa(query) {
        // Menghapus hasil pencarian sebelumnya
        searchResults.innerHTML = '';
    
        // Menampilkan hasil pencarian yang cocok
        const filteredDesa = desa.filter((namaDesa) => {
          return namaDesa.toLowerCase().includes(query.toLowerCase());
        });
    
        filteredDesa.forEach((namaDesa) => {
          const li = document.createElement('li');
          li.textContent = namaDesa;
          li.classList.add('list-group-item');
          li.addEventListener('click', function () {
            addDesaToInput(namaDesa);
            selectedDesaInput.focus(); // Fokus kembali ke input setelah menambahkan nama desa
          });
          searchResults.appendChild(li);
        });
      }
    
      // Fungsi untuk menambahkan nama desa ke input
      function addDesaToInput(namaDesa) {
        if (selectedDesaInput.value.trim() === '') {
          selectedDesaInput.value = namaDesa;
        } else {
          selectedDesaInput.value += ', ' + namaDesa;
        }
    
        searchDesa(''); // Mengaktifkan kembali pencarian
      }
    
      // Event listener untuk memicu pencarian saat input berubah
      selectedDesaInput.addEventListener('input', function (event) {
        const query = event.target.value;
        searchDesa(query);
      });
    
      // Event listener untuk mengosongkan nilai input form saat form dikirim
      selectedDesaInput.addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
          const selectedDesa = searchResults.querySelector('.list-group-item.active');
          if (selectedDesa) {
            addDesaToInput(selectedDesa.textContent);
            searchResults.innerHTML = ''; // Menghapus hasil pencarian
          }
        } else if (event.key === ',') {
          addDesaToInput(selectedDesaInput.value.trim());
          selectedDesaInput.value = '';
          event.preventDefault();
          searchDesa(''); // Mengaktifkan kembali pencarian
        } else if (event.key === 'Escape') {
          if (selectedDesaInput.value.trim() !== '') {
            searchDesa(selectedDesaInput.value.trim()); // Memunculkan hasil pencarian dengan nilai input saat ini
          }
        }
      });
    </script>
    
    
@endsection
