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

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- Basic Bootstrap Table -->
                        <div class="card">
                            <h5 class="card-header">Upload Excel</h5>
                            <div class="table-responsive text-nowrap m-3">
                                <form id="formAuthentication" action="{{ route('predict.process') }}" method="POST"
                                    enctype="multipart/form-data" class="mb-3">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Upload File Here</label>
                                        <input type="file" class="form-control" id="name" name="file"
                                            required placeholder="Enter your file" autofocus accept=".xlsx, .csv" />
                                        @if ($errors->has('Name'))
                                            <div class="alert alert-danger mt-2">{{ $errors->first('Name') }}</div>
                                        @endif
                                    </div>
                                    <div class="mt-3 pt-3">
                                        <button class="btn btn-primary d-grid w-100" type="submit">Upload &
                                            Predict</button>
                                    </div>
                            </div>
                            </form>
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
