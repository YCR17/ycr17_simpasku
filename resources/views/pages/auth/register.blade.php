@extends('templates.main')

@section('wrapper')
      <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
          <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-3">
              <div class="card mb-0">
                <div class="card-body">
                  <h4 class="text-center">Selamat datang di <br> Sistem Manajemen Pasien.</h4>
                  <div class="position-relative text-center my-4">
                    <p class="mb-0 fs-3 px-3 d-inline-block bg-white text-dark z-index-5 position-relative">Seilahkan mendaftar untuk melanjutkan mengakses sistem</p>
                    <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                  </div>
                  <form action="" method="post">
                    @csrf
                    <div class="mb-3">
                      <label for="username" class="form-label">Username <b class="text-danger">*</b></label>
                      <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
                    </div>
                    <div class="mb-3">
                      <label for="fullname" class="form-label">Fullname <b class="text-danger">*</b></label>
                      <input type="text" class="form-control" id="fullname" name="fullname" value="{{ old('fullname') }}">
                    </div>
                    <div class="mb-4">
                      <label for="email" class="form-label">Email <b class="text-danger">*</b></label>
                      <input type="mail" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="mb-4">
                      <label for="password" class="form-label">Password <b class="text-danger">*</b></label>
                      <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-4">
                      <label for="confirm_password" class="form-label">Confirm Password <b class="text-danger">*</b></label>
                      <input type="confirm_password" class="form-control" id="confirm_password" name="confirm_password">
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Daftar</button>
                    <div class="d-flex align-items-center justify-content-center">
                      <p class="fs-4 mb-0 fw-medium">Sudah punya akun?</p>
                      <a class="text-primary fw-medium ms-2" href="{{ url('auth/login') }}">Masuk</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection