@php
    $user = auth()->user();
    $avatar = $user->avatar ?? 'default.jpg';

@endphp
@extends('templates.index')

@section('content')
    <div class="p-3">
        <div class="d-flex align-items-center gap-4 mb-4">
            <div class="position-relative">
                <div class="border border-2 border-primary rounded-circle">
                    <img src="{{ asset("storage/avatar/$avatar") }}" class="rounded-circle m-1" alt="user1" width="80" height="80" />
                </div>
            </div>
            <div>
                <h3 class="fw-semibold">Halo, <span class="text-dark">{{ $user->fullname }}</span>
                </h3>
                <span>Selamat datang di manajemen pasien!</span>
            </div>
        </div>
    </div>

    <h3 class="fw-semibold mb-4">Quick Access</h3>
    <div class="row">
        <div class="col-md-4 d-flex align-items-stretch">
            <a href="{{ url('dashboard/pasien') }}" class="card bg-success text-white w-100 card-hover">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div id="total_pasien">
                            

                        </div>
                        <div class="ms-auto">
                            <i class="ti ti-arrow-right fs-8"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h4 class="card-title mb-1 text-white">Pasien</h4>
                        <h6 class="card-text fw-normal text-white-50">
                            PKU Wonosobo
                        </h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 d-flex align-items-stretch">
            <a href="{{ url('dashboard/staff') }}" class="card bg-primary text-white w-100 card-hover">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <b class="display-6">{{ $total_staff }}</b>
                        <div class="ms-auto">
                            <i class="ti ti-arrow-right fs-8"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h4 class="card-title mb-1 text-white">
                            Staff
                        </h4>
                        <h6 class="card-text fw-normal text-white-50">
                            PKU Wonosobo
                        </h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 d-flex align-items-stretch">
            <a href="{{ url('dashboard/account') }}" class="card bg-info text-white w-100 card-hover">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="ti ti-user display-6"></i>
                        <div class="ms-auto">
                            <i class="ti ti-arrow-right fs-8"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h4 class="card-title mb-1 text-white">Pengaturan Akun</h4>
                        <h6 class="card-text fw-normal text-white-50">
                            Atur akun email dan password Anda
                        </h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 d-flex align-items-stretch">
            <a onclick="showLogout();" class="card bg-danger text-white w-100 card-hover">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="ti ti-alert-octagon display-6"></i>
                        <div class="ms-auto">
                            <i class="ti ti-logout fs-8"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h4 class="card-title mb-1 text-white">
                            Logout
                        </h4>
                        <h6 class="card-text fw-normal text-white-50">
                            Keluar dari akun Anda
                        </h6>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function() {
            getData();

        });

        function getData() {
            let total_pasien = $('#total_pasien');
                $.ajax({
                    url: '{{ url('api/pasien') }}',
                    type: "GET",
                    // data: formData,
                    contentType: false,
                    processData: false,
                    dataType: "json",

                    beforeSend: function() {
                        total_pasien.html(`<div class="d-flex align-items-center">
                            <strong class="fs-4 fw-bold">Loading...</strong>
                      <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
                    </div>`);
                    },

                    success: function(response) {

                        if (typeof response === "object" && response !== null) {
                            const pasienList = response.data;
                            total_pasien.html(`<span class="display-6">${pasienList.total}</span>`)

                        } else {
                            total_pasien.html('<span class="fs-4">Terjadi kesalahan</span>');
                            console.warn("Response bukan JSON object:", response);
                        }
                    },

                    error: function(xhr, status, error) {
                        // $('#modalLoading').modal('hide');
                        // console.error("Gagal:", status, error);
                        // let res = JSON.parse(xhr.responseText);
                        // showModal('danger', 'Error', res.message);
                        // showModal('danger', 'Error', xhr.responseText);

                        let res;
                        try {
                            res = JSON.parse(xhr.responseText);
                        } catch (e) {
                            res = {
                                message: xhr.responseText
                            };
                        }
                        total_pasien.html(`
                    <span class="fs-4">${res.message || "Terjadi kesalahan"} <a href="#" onclick="getData();" class="btn btn-info text-light ms-2"><i class="ti ti-refresh"></i></a></span>
                    `);
                    },

                    complete: function() {

                    }
                });
        }
    </script>
@endsection
