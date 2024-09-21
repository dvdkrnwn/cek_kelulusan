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

                <h4 class="fw-bold p-4">Blank Page</h4>

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
