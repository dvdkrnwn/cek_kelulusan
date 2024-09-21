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
                            <h5 class="card-header">Add User</h5>
                            <div class="table-responsive text-nowrap m-3">
                                <form id="formAuthentication" action="{{ route('manage.user_add') }}" method="POST"
                                    class="mb-3">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="Name"
                                            required placeholder="Enter your name" autofocus />
                                        @if ($errors->has('Name'))
                                            <div class="alert alert-danger mt-2">{{ $errors->first('Name') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="Username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="Username" name="Username"
                                            required placeholder="Enter your Username" autofocus />
                                        @if ($errors->has('Username'))
                                            <div class="alert alert-danger mt-2">{{ $errors->first('Username') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="Email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="Email" name="Email"
                                            required placeholder="Enter your email or username" autofocus />
                                        @if ($errors->has('Email'))
                                            <div class="alert alert-danger mt-2">{{ $errors->first('Email') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <div class="row justify-content-between">
                                            <div class="col-md-6">
                                                <label for="Is_Active" class="form-label">Is_Active</label>
                                                <select name="Is_Active" class="form-control" id="Is_Active" required>
                                                    <option value="true"> ACTIVE </option>
                                                    <option value="false"> INACTIVE </option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="Roles" class="form-label">Roles</label>
                                                <select name="Role_Id" class="form-control" id="Roles" required>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->id }}">
                                                            {{ Str::upper($role->Roles_Name) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 form-password-toggle">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control" name="Password"
                                                required
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="password" />
                                            <span class="input-group-text cursor-pointer"><i
                                                    class="bx bx-hide"></i></span>
                                            @if ($errors->has('Password'))
                                                <div class="alert alert-danger mt-2">{{ $errors->first('Password') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mt-3 pt-3">
                                        <button class="btn btn-primary d-grid w-100" type="submit">ADD USER</button>
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
