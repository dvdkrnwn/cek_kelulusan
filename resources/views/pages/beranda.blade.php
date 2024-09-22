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
                    <div class="container-xxl flex-grow-1 container-p-y">
                        {{--  --}}
                        <div class="dropdown me-3">
                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Tahun {{ $tahun_data }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                @foreach ($tahun as $tahun)
                                    <li><a class="dropdown-item"
                                            href="{{ route('dashboard', ['year' => $tahun]) }}">{{ $tahun }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Basic Bootstrap Table -->

                        <div class="row mt-3">
                            {{-- CARD 1 --}}
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="icon-big text-center icon-warning">
                                                    <i class="bi bi-people-fill" style="width: 500px"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="numbers">
                                                    <h5 class="card-category">Jumlah Mahasiswa</h5>
                                                    <h2 class="card-title">{{ $total_mahasiswa }}</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- CARD END 1 --}}
                            {{-- CARD 1 --}}
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="icon-big text-center icon-warning">
                                                    <i class="bi bi-people-fill" style="width: 500px"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="numbers">
                                                    <h5 class="card-category">Jumlah Tepat Waktu</h5>
                                                    <h2 class="card-title">{{ $ontime }}</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- CARD END 1 --}}
                            {{-- CARD 1 --}}
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="icon-big text-center icon-warning">
                                                    <i class="bi bi-people-fill" style="width: 500px"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="numbers">
                                                    <h5 class="card-category">Jumlah Tidak Tepat Waktu</h5>
                                                    <h2 class="card-title">{{ $late_time }}</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- CARD END 1 --}}
                        </div>

                        {{--  --}}

                        <div class="row mt-3">
                            {{-- CARD 1 --}}
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="icon-big text-center icon-warning">
                                                    <i class="bi bi-people-fill" style="width: 500px"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="numbers">
                                                    <h5 class="card-category">Laki Laki Tepat Waktu</h5>
                                                    <h2 class="card-title">{{ $l_ontime }}</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- CARD END 1 --}}
                            {{-- CARD 1 --}}
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="icon-big text-center icon-warning">
                                                    <i class="bi bi-people-fill" style="width: 500px"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="numbers">
                                                    <h5 class="card-category">Laki Laki Tidak Tepat Waktu</h5>
                                                    <h2 class="card-title">{{ $l_late_time }}</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- CARD END 1 --}}
                            {{-- CARD 1 --}}
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="icon-big text-center icon-warning">
                                                    <i class="bi bi-people-fill" style="width: 500px"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="numbers">
                                                    <h5 class="card-category">Perempuan Tepat Waktu</h5>
                                                    <h2 class="card-title">{{ $p_ontime }}</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- CARD END 1 --}}
                            {{-- CARD 1 --}}
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="icon-big text-center icon-warning">
                                                    <i class="bi bi-people-fill" style="width: 500px"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="numbers">
                                                    <h5 class="card-category">Perempuan Tidak Tepat Waktu</h5>
                                                    <h2 class="card-title">{{ $p_late_time }}</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- CARD END 1 --}}
                        </div>



                    </div>
                </div>

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
