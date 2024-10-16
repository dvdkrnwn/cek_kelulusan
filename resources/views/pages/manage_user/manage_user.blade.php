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
                        <a type="button" href="{{ route('manage.user_show_add') }}" class="btn btn-primary">Tambah
                            Data</a>
                    </div>
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- Basic Bootstrap Table -->
                        <div class="card">
                            <h5 class="card-header">Daftar User</h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>NAME</th>
                                            <th>EMAIL</th>
                                            <th>USERNAME</th>
                                            <th>IS ACTIVE</th>
                                            <th>ROLES</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @forelse ($user as $item)
                                            <tr>
                                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                    <strong>{{ $item->name }}</strong>
                                                </td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->username }}</td>
                                                <td>{{ $item->is_active == true ? 'Active' : 'Inactive' }}</td>
                                                <td>{{ $item->Roles->roles_name }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('manage.user_edit', $item->username) }}"
                                                            type="button" class="btn btn-primary me-2">Edit</a>
                                                        <form
                                                            action="{{ route('manage.user_edit_password', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @if ($item->is_active == true)
                                                                <button type="submit" name="is_active" value="false"
                                                                    class="btn btn-danger">Non
                                                                    Active</button>
                                                            @else
                                                                <button type="submit" name="is_active" value="true"
                                                                    class="btn btn-success">Re-
                                                                    Active
                                                                </button>
                                                            @endif
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <p>No Data Result</p>
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
