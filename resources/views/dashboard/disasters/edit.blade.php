@extends('dashboard.layouts.main')

@section('content-wrapper')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Halaman Tambah Kebencanaan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">home</a></li>
                        <li class="breadcrumb-item active"><a href="/dashboard/disasters"> data kebencanaan</a></li>
                        <li class="breadcrumb-item active">tambah kebencanaan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    {{-- main section start --}}
    <div class="container">
        <h1>Pencarian Desa</h1>
        <div class="form-group">
            <label for="kecamatan">Kecamatan:</label>
            <input type="text" id="kecamatan" class="form-control" placeholder="Masukkan nama kecamatan"
                oninput="searchVillages()" />
        </div>
        <div id="result"></div>
    </div>
    {{-- main section end --}}
    <script>
        var selectedVillages = []; // Menyimpan nama-nama desa yang dipilih

        var villages = [{
                kecamatan: "Proppo",
                desa: ["Ds.Badung,Kec.Proppo,Kab.Pamekasan",
                    "Ds.Banyubulu,Kec.Proppo,Kab.Pamekasan",
                    "Ds.Batokalangan,Kec.Proppo,Kab.Pamekasan",
                    "Ds.Billa'an,Kec.Proppo,Kab.Pamekasan",
                    "Ds.Campor,Kec.Proppo,Kab.Pamekasan",
                    "Ds.Candi Burung,Kec.Proppo,Kab.Pamekasan",
                    "Ds.Gro'om,Kec.Proppo,Kab.Pamekasan",
                    "Ds.Jambringin,Kec.Proppo,Kab.Pamekasan",
                    "Ds.Karanganyar,Kec.Proppo,Kab.Pamekasan",
                    "Ds.Klampar,Kec.Proppo,Kab.Pamekasan",
                    "Ds.Koding,Kec.Proppo,Kab.Pamekasan",
                    "Ds.Lenteng,Kec.Proppo,Kab.Pamekasan",
                    "Ds.Mapper,Kec.Proppo,Kab.Pamekasan",
                    "Ds.Panangguan,Kec.Proppo,Kab.Pamekasan",
                    "Ds.Pangbatok,Kec.Proppo,Kab.Pamekasan",
                    "Ds.Panglemah,Kec.Proppo,Kab.Pamekasan",
                    "Ds.Pangoranyan,Kec.Proppo,Kab.Pamekasan",
                    "Ds.Pangtonggal,Kec.Proppo,Kab.Pamekasan",
                    "Ds.Proppo,Kec.Proppo,Kab.Pamekasan",
                    "Ds.Rangperang Daja,Kec.Proppo,Kab.Pamekasan",
                    "Ds.Rangperang Laok,Kec.Proppo,Kab.Pamekasan",
                    "Ds.Samatan,Kec.Proppo,Kab.Pamekasan",
                    "Ds.Samiran,Kec.Proppo,Kab.Pamekasan",
                    "Ds.Srambah,Kec.Proppo,Kab.Pamekasan",
                    "Ds.Tattangoh,Kec.Proppo,Kab.Pamekasan",
                    "Ds.Tlangoh,Kec.Proppo,Kab.Pamekasan",
                    "Ds.Toket,Kec.Proppo,Kab.Pamekasan"
                ]
            },
            {
                kecamatan: "Pamekasan",
                desa: ["Kel.Barurambat Kota,Kec.Pamekasan,Kab.Pamekasan",
                    "Kel.Bugih,Kec.Pamekasan,Kab.Pamekasan",
                    "Kel.Gladak Anyar,Kec.Pamekasan,Kab.Pamekasan",
                    "Kel.Jungcancang,Kec.Pamekasan,Kab.Pamekasan",
                    "Kel.Kangenan,Kec.Pamekasan,Kab.Pamekasan",
                    "Kel.Kolpajung,Kec.Pamekasan,Kab.Pamekasan",
                    "Kel.Kowel,Kec.Pamekasan,Kab.Pamekasan",
                    "Kel.Parteker,Kec.Pamekasan,Kab.Pamekasan",
                    "Kel.Patemon,Kec.Pamekasan,Kab.Pamekasan",
                    "Ds.Bettet,Kec.Pamekasan,Kab.Pamekasan",
                    "Ds.Jalmak,Kec.Pamekasan,Kab.Pamekasan",
                    "Ds.Laden,Kec.Pamekasan,Kab.Pamekasan",
                    "Ds.Nyalabu Daya,Kec.Pamekasan,Kab.Pamekasan",
                    "Ds.Nyalabu Laok,Kec.Pamekasan,Kab.Pamekasan",
                    "Ds.Panempan,Kec.Pamekasan,Kab.Pamekasan",
                    "Ds.Teja Barat,Kec.Pamekasan,Kab.Pamekasan",
                    "Ds.Teja Timur,Kec.Pamekasan,Kab.Pamekasan",
                    "Ds.Toronan,Kec.Pamekasan,Kab.Pamekasan",
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
            var input = document.getElementById("kecamatan").value;
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

            var kecamatanInput = document.getElementById("kecamatan");
            kecamatanInput.value = selectedVillages.join(", ");
        }

        var kecamatanInput = document.getElementById("kecamatan");
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
