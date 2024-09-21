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

                    <div class="container-xxl col-12 demo-inline-spacing" >
                        <button type="button" class="btn btn-primary">Tambah Data</button>
                        <button
                                id="btnGroupDrop1"
                                type="button"
                                class="btn btn-secondary dropdown-toggle"
                                >Angkatan
                        </button>
                        <button
                                id="btnGroupDrop1"
                                type="button"
                                class="btn btn-secondary dropdown-toggle"
                                >Status
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
                                <th>IPS 1</th>
                                <th>IPS 2</th>
                                <th>IPS 3</th>
                                <th>Jenis Kelamin</th>
                                <th>Prediksi</th>
                              </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                              <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>213140714111000</strong></td>
                                <td>3.96</td>
                                <td>3.96</td>
                                <td>3.96</td>
                                <td>Laki - Laki</td>
                                <td><span class="badge bg-label-success me-1">Tepat Waktu</span></td>
                              </tr>
                              <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>213140714111000</strong></td>
                                <td>1.5</td>
                                <td>3.96</td>
                                <td>2.4</td>
                                <td>Laki - Laki</td>
                                <td><span class="badge bg-label-warning me-1">Tidak Tepat Waktu</span></td>
                              </tr>
                              <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>213140714111000</strong></td>
                                <td>3.96</td>
                                <td>3.96</td>
                                <td>3.96</td>
                                <td>Laki - Laki</td>
                                <td><span class="badge bg-label-success me-1">Tepat Waktu</span></td>
                              </tr>
                              <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>213140714111000</strong></td>
                                <td>1.5</td>
                                <td>3.96</td>
                                <td>2.4</td>
                                <td>Laki - Laki</td>
                                <td><span class="badge bg-label-warning me-1">Tidak Tepat Waktu</span></td>
                              </tr>
                              <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>213140714111000</strong></td>
                                <td>3.96</td>
                                <td>3.96</td>
                                <td>3.96</td>
                                <td>Laki - Laki</td>
                                <td><span class="badge bg-label-success me-1">Tepat Waktu</span></td>
                              </tr>
                              <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>213140714111000</strong></td>
                                <td>3.96</td>
                                <td>3.96</td>
                                <td>3.96</td>
                                <td>Laki - Laki</td>
                                <td><span class="badge bg-label-success me-1">Tepat Waktu</span></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <!--/ Basic Bootstrap Table -->
                      

                <!-- / Content -->


                <!-- Core JS -->
                <!-- build:js assets/vendor/js/core.js -->
                <script src="{{asset('sneat')}}/assets/vendor/libs/jquery/jquery.js"></script>
                <script src="{{asset('sneat')}}/assets/vendor/libs/popper/popper.js"></script>
                <script src="{{asset('sneat')}}/assets/vendor/js/bootstrap.js"></script>
                <script src="{{asset('sneat')}}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

                <script src="{{asset('sneat')}}/assets/vendor/js/menu.js"></script>
                <!-- endbuild -->

                <!-- Vendors JS -->

                <!-- Main JS -->
                <script src="{{asset('sneat')}}/assets/js/main.js"></script>

                <!-- Page JS -->

                <!-- Place this tag in your head or just before your close body tag. -->
                <script async defer src="https://buttons.github.io/buttons.js"></script>
    </body>
</html>
