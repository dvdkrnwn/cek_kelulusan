@include('layouts.header')

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            {{-- menu --}}
            @include('layouts.sidebar')

            <!-- Layout container -->
            <div class="layout-page">

                {{-- navbar --}}
                @include('layouts.navbar')

                <!-- Content -->

                <div class="content-wrapper">
                    <!-- Content -->
                    <div
                        class="container-xxl col-12 demo-inline-spacing d-flex justify-content-between align-items-center">
                        <!-- Left Side: Buttons and Dropdowns -->
                        <div class="d-flex">
                            <a type="button" href="{{ route('predict.add') }}" class="btn btn-primary me-3">Tambah
                                Data</a>
                            <div class="dropdown me-3">
                                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Angkatan
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    @foreach ($angkatan as $tahun)
                                        <li><a class="dropdown-item"
                                                href="{{ route('predict.list', ['year' => $tahun]) }}">{{ $tahun }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="dropdown">
                                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Status
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    @foreach ($keterangan as $t)
                                        <li><a class="dropdown-item"
                                                href="{{ route('predict.list', ['status' => $t]) }}">{{ $t }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- Right Side: Search Form -->
                        <div class="d-flex justify-content-end">
                            <form action="{{ route('predict.list') }}" method="GET">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-8">
                                        <input type="text" id="NIM" class="form-control" name="NIM"
                                            required placeholder="NIM" aria-describedby="NIM" />
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- Basic Bootstrap Table -->
                        <div class="card">
                            <h5 class="card-header">Daftar Mahasiswa</h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nomor Induk Mahasiswa</th>
                                            <th>Jalur Masuk</th>
                                            <th>Angkatan</th>
                                            <th>IPS 1</th>
                                            <th>IPS 2</th>
                                            <th>IPS 3</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Prediksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @php $no = ($mahasiswas->currentPage() - 1) * $mahasiswas->perPage() + 1; @endphp
                                        @forelse ($mahasiswas as $mahasiswa)
                                            <tr>
                                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                    <strong>{{ $mahasiswa->NIM }}</strong>
                                                </td>
                                                <td>{{ $mahasiswa->Jalur_Masuk }}</td>
                                                <td>{{ $mahasiswa->Tahun_Angkatan }}</td>
                                                <td>{{ $mahasiswa->IPS_1 }}</td>
                                                <td>{{ $mahasiswa->IPS_2 }}</td>
                                                <td>{{ $mahasiswa->IPS_3 }}</td>
                                                <td>{{ $mahasiswa->J_Kelamin }}</td>
                                                <td>
                                                    @if ($mahasiswa->Keterangan == 'Tepat Waktu')
                                                        <span
                                                            class="badge bg-label-success me-1">{{ $mahasiswa->Keterangan }}</span>
                                                    @elseif ($mahasiswa->Keterangan == 'Tidak Tepat Waktu')
                                                        <span
                                                            class="badge bg-label-danger me-1">{{ $mahasiswa->Keterangan }}</span>
                                                    @else
                                                        <span
                                                            class="badge bg-label-secondary me-1">{{ $mahasiswa->Keterangan }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center m-3">
                                                    Tidak Ada Data
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                                <div class="d-flex justify-content-end mt-3 me-2">
                                    {{ $mahasiswas->links() }}
                                </div>
                            </div>
                        </div>
                        <!--/ Basic Bootstrap Table -->


                        <!-- / Content -->


                        <!-- Core JS -->
                        <!-- build:js assets/vendor/js/core.js -->
                        <script src="{{ asset('sneat') }}/assets/vendor/libs/jquery/jquery.js"></script>
                        <script src="{{ asset('sneat') }}/assets/vendor/libs/popper/popper.js"></script>
                        <script src="{{ asset('sneat') }}/assets/vendor/js/bootstrap.js"></script>
                        <script src="{{ asset('sneat') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

                        <script src="{{ asset('sneat') }}/assets/vendor/js/menu.js"></script>
                        <!-- endbuild -->

                        <!-- Vendors JS -->

                        <!-- Main JS -->
                        <script src="{{ asset('sneat') }}/assets/js/main.js"></script>

                        <!-- Page JS -->

                        <!-- Place this tag in your head or just before your close body tag. -->
                        <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
