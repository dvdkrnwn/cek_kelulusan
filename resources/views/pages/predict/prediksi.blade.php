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

                    <div class="container-xxl col-12 demo-inline-spacing">
                        <a type="button" href="{{ route('predict.add') }}" class="btn btn-primary">Tambah Data</a>
                        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle">Angkatan
                        </button>
                        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle">Status
                        </button>
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
                                        @forelse ($mahasiswa as $mahasiswa)
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
                                                Tidak Ada Data
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
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
