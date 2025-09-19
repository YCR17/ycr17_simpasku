@extends('templates.index')

@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Daftar Pasien</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted " href="{{ url('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Pasien</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="widget-content searchable-container list">
        <div class="card card-body">
            <div class="row mt-3">
                <div class="col-md-4 col-xl-3 mb-3">
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="ti ti-search text-dark"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Cari Nama..." id="filter_search"
                            value="" />
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <select class="form-select mr-sm-2" id="filter_gender">
                            <option value="" selected>Pilih Jenis Kelamin</option>
                            <option value="male">Laki-laki</option>
                            <option value="female">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <select class="form-select mr-sm-2" id="filter_ethnic">
                            <option value="" selected>Pilih Etnis</option>
                            <option value="Jawa">Jawa</option>
                            <option value="Sunda">Sunda</option>
                            <option value="Batak">Batak</option>
                            <option value="Minang">Minang</option>
                            <option value="Bugis">Bugis</option>
                            <option value="Papua">Papua</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <select class="form-select mr-sm-2" id="filter_education">
                            <option value="" selected>Pilih Pendidikan</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="D4">D4</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                            <option value="Pendidikan Profesi">Pendidikan Profesi</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <select class="form-select mr-sm-2" id="filter_married_status">
                            <option value="" selected>Pilih Status Pernikahan</option>
                            <option value="Belum Nikah">Belum Kawin</option>
                            <option value="Kawin">Kawin</option>
                            <option value="Cerai Hidup">Cerai Hidup</option>
                            <option value="Cerai Mati">Cerai Mati</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <select class="form-select mr-sm-2" id="filter_job">
                            <option value="">Pilih Pekerjaan</option>
                            <option value="Pelajar">Pelajar</option>
                            <option value="Mahasiswa">Mahasiswa</option>
                            <option value="Pegawai Negeri">Pegawai Negeri</option>
                            <option value="Pegawai Swasta">Pegawai Swasta</option>
                            <option value="Wiraswasta">Wiraswasta</option>
                            <option value="Petani">Petani</option>
                            <option value="Nelayan">Nelayan</option>
                            <option value="Buruh">Buruh</option>
                            <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                            <option value="TidakBekerja">TidakBekerja</option>
                            <option value="Pensiunan">Pensiunan</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                        <select class="form-select mr-sm-2" id="filter_blood_type">
                            <option value="" selected>Pilih Golongan Darah</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="O">O</option>
                            <option value="AB">AB</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="d-flex w-100 justify-content-end">
                <div class="row">
                    <div class="col-lg-auto col-md-auto col-sm-6">
                        <a onclick="resetFilter();" id="btn-add-contact"
                            class="btn btn-danger d-flex align-items-center m-1">
                            <i class="ti ti-refresh text-white me-1 fs-5"></i> Reset Filter
                        </a>
                    </div>
                    <div class="col-lg-auto col-md-auto col-sm-6">
                        <a onclick="getData();" id="btn-add-contact" class="btn btn-info d-flex align-items-center m-1">
                            <i class="ti ti-refresh text-white me-1 fs-5"></i> Refresh Data
                        </a>
                    </div>
                    <div class="col-lg-auto col-md-auto col-sm-6">
                        <a onclick="showCreate();" class="btn btn-info d-flex align-items-center m-1">
                            <i class="ti ti-users text-white me-1 fs-5"></i> Tambah Pasien
                        </a>
                    </div>
                    <div class="col-lg-auto col-md-auto col-sm-6">
                        <a onclick="getData();" id="btn-add-contact" class="btn btn-info d-flex align-items-center m-1">
                            <i class="ti ti-search text-white me-1 fs-5"></i> Cari
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <div class="card card-body">
            <div class="table-responsive">
                <table class="table search-table align-middle text-nowrap">
                    <thead class="header-item">
                        <th class="d-none">
                            <div class="n-chk align-self-center text-center">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input primary" id="contact-check-all" />
                                    <label class="form-check-label" for="contact-check-all"></label>
                                    <span class="new-control-indicator"></span>
                                </div>
                            </div>
                        </th>
                        <th>Avatar</th>
                        <th>Nama</th>
                        <th>No. RM</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>No. Telepon</th>
                        <th>Action</th>
                    </thead>
                    <tbody id="pasien">
                        <tr class="search-items">
                            <td>

                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nametext" aria-describedby="name"
                                        placeholder="Name">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nametext" aria-describedby="name"
                                        placeholder="Name">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nametext" aria-describedby="name"
                                        placeholder="Name">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nametext" aria-describedby="name"
                                        placeholder="Name">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nametext" aria-describedby="name"
                                        placeholder="Name">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nametext" aria-describedby="name"
                                        placeholder="Name">
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>
            <div class="d-flex flex-column justify-content-center" id="footer_data"></div>
        </div>
    </div>


    <!-- Vertically centered modal -->
    <div class="modal fade" id="modalDetail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="vertical-center-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content modal-filled">
                <div class="modal-body p-4">

                    <ul class="nav nav-pills user-profile-tab ms-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                                id="pills-account-tab" data-bs-toggle="pill" data-bs-target="#pills-account"
                                type="button" role="tab" aria-controls="pills-account" aria-selected="true">
                                <i class="ti ti-user-circle me-2 fs-6"></i>
                                <span class="d-none d-md-block">Account</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                                id="pills-personal-tab" data-bs-toggle="pill" data-bs-target="#pills-personal"
                                type="button" role="tab" aria-controls="pills-personal" aria-selected="false">
                                <i class="ti ti-id me-2 fs-6"></i>
                                <span class="d-none d-md-block">Personal</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                                id="pills-address-tab" data-bs-toggle="pill" data-bs-target="#pills-address"
                                type="button" role="tab" aria-controls="pills-address" aria-selected="false">
                                <i class="ti ti-map-pin me-2 fs-6"></i>
                                <span class="d-none d-md-block">Address</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                                id="pills-identity-tab" data-bs-toggle="pill" data-bs-target="#pills-identity"
                                type="button" role="tab" aria-controls="pills-identity" aria-selected="false">
                                <i class="ti ti-id-badge me-2 fs-6"></i>
                                <span class="d-none d-md-block">Identity</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                                id="pills-emergency-tab" data-bs-toggle="pill" data-bs-target="#pills-emergency"
                                type="button" role="tab" aria-controls="pills-emergency" aria-selected="false">
                                <i class="ti ti-phone-call me-2 fs-6"></i>
                                <span class="d-none d-md-block">Emergency</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                                id="pills-metadata-tab" data-bs-toggle="pill" data-bs-target="#pills-metadata"
                                type="button" role="tab" aria-controls="pills-metadata" aria-selected="false">
                                <i class="ti ti-clock me-2 fs-6"></i>
                                <span class="d-none d-md-block">Metadata</span>
                            </button>
                        </li>
                    </ul>
                    <form action="" method="post">
                        <div class="tab-content pt-3 pb-3" id="pills-tabContent">
                            <div class="text-center mb-3 mt-3 bio-card">
                                <img src="https://api.dicebear.com/6.x/identicon/svg?seed=nadine.megantara" alt="avatar"
                                    id="detail_avatar" class="img-fluid rounded-circle mb-3" width="120"
                                    height="120">
                                <h4 class="fw-bold"><span id="detail_text_name"></span></h4>
                                <p class="mb-1">RM Number: <strong id="detail_text_rm"></strong></p>
                                <p class="mb-0">Gender: <span id="detail_text_gender"></span></p>
                            </div>
                            <!-- Account -->
                            <div class="tab-pane fade show active" id="pills-account" role="tabpanel"
                                aria-labelledby="pills-account-tab">
                                <div class="mb-3">
                                    <label class="form-label">RM Number</label>
                                    <input type="text" class="form-control field-detail-protected"
                                        id="detail_rm_number" value="" disabled>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control field-detail field-detail-required"
                                            id="detail_first_name" value="" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control field-detail field-detail-required"
                                            id="detail_last_name" value="" disabled>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group mb-4">
                                        <label class="form-label">Gender</label>
                                        <select class="form-select mr-sm-2 field-detail field-detail-required"
                                            id="detail_gender" value="" disabled>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="male">Laki-laki</option>
                                            <option value="female">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Personal -->
                            <div class="tab-pane fade" id="pills-personal" role="tabpanel"
                                aria-labelledby="pills-personal-tab">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Birth Place</label>
                                        <input type="text" class="form-control field-detail" id="detail_birth_place"
                                            value="" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Birth Date</label>
                                        <input type="date" class="form-control field-detail" id="detail_birth_date"
                                            value="" disabled>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group mb-4">
                                        <label class="form-label">Blood Type</label>
                                        <select class="form-select mr-sm-2 field-detail" id="detail_blood_type"
                                            value="" disabled>
                                            <option value="">Pilih Golongan Darah</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="O">O</option>
                                            <option value="AB">AB</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group mb-4">
                                        <label class="form-label">Married Status</label>
                                        <select class="form-select mr-sm-2 field-detail field-detail-required"
                                            id="detail_married_status" value="" disabled>
                                            <option value="">Pilih Status Pernikahan</option>
                                            <option value="Belum Kawin">Belum Kawin</option>
                                            <option value="Kawin">Kawin</option>
                                            <option value="Cerai Hidup">Cerai Hidup</option>
                                            <option value="Cerai Mati">Cerai Mati</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group mb-4">
                                        <label class="form-label">Job</label>
                                        <select class="form-select mr-sm-2 field-detail" id="detail_job" value=""
                                            disabled>
                                            <option value="" selected>Pilih Pekerjaan</option>
                                            <option value="Pelajar">Pelajar</option>
                                            <option value="Mahasiswa">Mahasiswa</option>
                                            <option value="Pegawai Negeri">Pegawai Negeri</option>
                                            <option value="Pegawai Swasta">Pegawai Swasta</option>
                                            <option value="Wiraswasta">Wiraswasta</option>
                                            <option value="Petani">Petani</option>
                                            <option value="Nelayan">Nelayan</option>
                                            <option value="Buruh">Buruh</option>
                                            <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                            <option value="TidakBekerja">TidakBekerja</option>
                                            <option value="Pensiunan">Pensiunan</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group mb-4">
                                        <label class="form-label">Education</label>
                                        <select class="form-select mr-sm-2 field-detail" id="detail_education"
                                            value="" disabled>
                                            <option value="" selected>Pilih Pendidikan</option>
                                            <option value="SD">SD</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA">SMA</option>
                                            <option value="D1">D1</option>
                                            <option value="D2">D2</option>
                                            <option value="D3">D3</option>
                                            <option value="D4">D4</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                            <option value="Pendidikan Profesi">Pendidikan Profesi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group mb-4">
                                        <label class="form-label">Ethnic</label>
                                        <select class="form-select mr-sm-2 field-detail" id="detail_ethnic"
                                            value="" disabled>
                                            <option value="" selected>Pilih Etnis</option>
                                            <option value="Jawa">Jawa</option>
                                            <option value="Sunda">Sunda</option>
                                            <option value="Batak">Batak</option>
                                            <option value="Minang">Minang</option>
                                            <option value="Bugis">Bugis</option>
                                            <option value="Papua">Papua</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Communication Barrier</label>
                                    <input type="text" class="form-control field-detail"
                                        id="detail_communication_barrier" value="" disabled>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Disability Status</label>
                                    <input type="text" class="form-control field-detail" id="detail_disability_status"
                                        value="" disabled>
                                </div>
                            </div>
                            <!-- Address -->
                            <div class="tab-pane fade" id="pills-address" role="tabpanel"
                                aria-labelledby="pills-address-tab">
                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="text" class="form-control field-detail" id="detail_phone_number"
                                        value="" disabled>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Street Address</label>
                                    <input type="text" class="form-control field-detail" id="detail_street_address"
                                        value="" disabled>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control field-detail" id="detail_city_address"
                                        value="" disabled>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">State</label>
                                    <input type="text" class="form-control field-detail" id="detail_state_address"
                                        value="" disabled>
                                </div>
                            </div>
                            <!-- Identity -->
                            <div class="tab-pane fade" id="pills-identity" role="tabpanel"
                                aria-labelledby="pills-identity-tab">
                                <div class="mb-3">
                                    <label class="form-label">Identity Number</label>
                                    <input type="text" class="form-control field-detail" id="detail_identity_number"
                                        value="" disabled>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">BPJS Number</label>
                                    <input type="text" class="form-control field-detail" id="detail_bpjs_number"
                                        value="" disabled>
                                </div>
                            </div>
                            <!-- Emergency -->
                            <div class="tab-pane fade" id="pills-emergency" role="tabpanel"
                                aria-labelledby="pills-emergency-tab">
                                <div class="mb-3">
                                    <label class="form-label">Emergency Full Name</label>
                                    <input type="text" class="form-control field-detail"
                                        id="detail_emergency_full_name" value="" disabled>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Emergency Phone</label>
                                    <input type="text" class="form-control field-detail"
                                        id="detail_emergency_phone_number" value="" disabled>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Father Name</label>
                                    <input type="text" class="form-control field-detail" id="detail_father_name"
                                        value="" disabled>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Mother Name</label>
                                    <input type="text" class="form-control field-detail" id="detail_mother_name"
                                        value="" disabled>
                                </div>
                            </div>
                            <!-- Metadata -->
                            <div class="tab-pane fade" id="pills-metadata" role="tabpanel"
                                aria-labelledby="pills-metadata-tab">
                                <ul class="list-group">
                                    <li class="list-group-item">Created At: <span id="detail_text_ca"></span></li>
                                    <li class="list-group-item">Updated At: <span id="detail_text_ua"></span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between">

                            <div class="d-flex gap-3">
                                <a onclick="deleteMdl()" data-delete-id="" id="actionDeletemdl" class="btn btn-danger"
                                    disabled>Delete</a>
                            </div>
                            <div class="d-flex gap-3">
                                <a onclick="actionSave();" id="actionSave" class="btn btn-primary hide" disabled>Save</a>
                                <a onclick="actionEdit();" data-edit-id="" id="actionEdit" class="btn btn-info">Edit</a>
                                <a onclick="checkFiledCreate();" id="actionCreate" class="btn btn-info hide">Create</a>
                                <a class="btn btn-light-danger text-danger" data-bs-dismiss="modal">Tutup</a>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>


    <!-- Vertically centered modal -->
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="vertical-center-modal" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content modal-filled bg-danger-subtle">
                <div class="modal-body p-4">
                    <div class="text-center text-danger">
                        <i class="ti ti-hexagon-letter-x fs-7"></i>
                        <h4 class="mt-2" id="modaltitle">Konfirmasi Penghapusan</h4>
                        <p class="mt-3" id="modalmessage">
                            Anda yakin ingin menghapus pasien dengan detail berikut ?
                        </p>
                        <div class="text-center mb-3 mt-3">
                            <h4 class="fw-bold"><span id="delete_text_name"></span></h4>
                            <p class="mb-1">RM Number: <strong id="delete_text_rm"></strong></p>
                        </div>

                        <button type="button" class="btn btn-danger my-2" id="btnHapusPasien" data-pasien-id="">
                            Hapus
                        </button>
                        <button type="button" class="btn btn-light ms-3 my-2" data-bs-dismiss="modal">
                            Batalkan
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
@endsection

@section('script')
    <script>
        function markRequiredFields() {
            $('.field-detail-required').each(function() {
                let $el = $(this);

                // Cari label terdekat
                let $label = $el.siblings('.form-label');

                // Cek apakah sudah ada tanda *
                if ($label.find('.text-danger').length === 0) {
                    $label.append(' <b class="text-danger">*</b>');
                }
            });
        }

        function showDetail(id) {
            $('.field-detail').val('');
            $('.field-detail').each(function() {
                let $el = $(this);
                $el.prop('disabled', true);
            });
            $('#actionEdit').text('Edit');
            $('#actionEdit').prop('disabled', false).show();
            $('#actionSave').prop('disabled', true).hide();
            $('#actionCreate').prop('disabled', true).hide();
            $('#actionDeletemdl').prop('disabled', false).show();
            $('.field-detail-protected').each(function() {
                let $el = $(this);
                $el.prop('disabled', true).show();
                $el.siblings('.form-label').show();
            });
            $('.bio-card').show();
            getDetail(id);
        }

        function callEdit(id) {
            showDetail(id);
            actionEdit();

        }

        function actionEdit() {
            $('.field-detail').each(function() {
                let $el = $(this);
                $el.prop('disabled', !$el.prop('disabled'));
            });

            // cek status setelah toggle
            let isDisabled = $('.field-detail:first').prop('disabled');

            if (isDisabled) {
                // kalau fields disable → tombol hilang dan disable
                $('#actionEdit').text('Edit');
                $('#actionSave').prop('disabled', true).hide();
            } else {
                // kalau fields enable → tombol muncul dan aktif
                $('#actionEdit').text('Cancel Edit');
                $('#actionSave').prop('disabled', false).show();
            }
            // console.log($('#actionEdit').attr('data-edit-id'))
        }

        function actionSave() {
            let pasien_id = $('#actionEdit').attr('data-edit-id');
            if (pasien_id > 0) {
                //
                let birth_date = $('#detail_birth_date'),
                    birth_place = $('#detail_birth_place'),
                    blood_type = $('#detail_blood_type'),
                    bpjs_number = $('#detail_bpjs_number'),
                    city_address = $('#detail_city_address'),
                    communication_barrier = $('#detail_communication_barrier'),
                    disability_status = $('#detail_disability_status'),
                    education = $('#detail_education'),
                    emergency_full_name = $('#detail_emergency_full_name'),
                    emergency_phone_number = $('#detail_emergency_phone_number'),
                    ethnic = $('#detail_ethnic'),
                    father_name = $('#detail_father_name'),
                    first_name = $('#detail_first_name'),
                    gender = $('#detail_gender'),
                    identity_number = $('#detail_identity_number'),
                    job = $('#detail_job'),
                    last_name = $('#detail_last_name'),
                    married_status = $('#detail_married_status'),
                    mother_name = $('#detail_mother_name'),
                    phone_number = $('#detail_phone_number'),
                    state_address = $('#detail_state_address'),
                    street_address = $('#detail_street_address'),
                    created_at = $('#detail_text_ca'),
                    updated_at = $('#detail_text_ua');


                let avatar = 'https://api.dicebear.com/6.x/identicon/svg?seed=' + first_name.val() + last_name.val();

                $.ajax({
                    url: `{{ url('api/pasien/${pasien_id}') }}`,
                    // url: `https://mockapi.pkuwsb.id/api/patient/${pasien_id}`,
                    type: "POST",
                    // contentType: "application/json",
                    // processData: false,
                    dataType: "json",
                    data: {
                        first_name: first_name.val(),
                        // rm_number: rm_number.val(),
                        birth_date: birth_date.val(),
                        birth_place: birth_place.val(),
                        blood_type: blood_type.val(),
                        bpjs_number: bpjs_number.val(),
                        city_address: city_address.val(),
                        communication_barrier: communication_barrier.val(),
                        disability_status: disability_status.val(),
                        education: education.val(),
                        emergency_full_name: emergency_full_name.val(),
                        emergency_phone_number: emergency_phone_number.val(),
                        // ethnic: ethnic.val(),
                        father_name: father_name.val(),
                        first_name: first_name.val(),
                        gender: gender.val(),
                        identity_number: identity_number.val(),
                        job: job.val(),
                        last_name: last_name.val(),
                        married_status: married_status.val(),
                        mother_name: mother_name.val(),
                        phone_number: phone_number.val(),
                        state_address: state_address.val(),
                        street_address: street_address.val(),
                    },

                    beforeSend: function() {
                        showLoading('Memuat...');
                    },

                    success: function(response) {
                        console.info('Error', response)
                        if (typeof response === "object" && response !== null) {
                            let data_pasien = response.data,
                                data = '',
                                temp, temp_data, i;
                            // console.log(response);

                            if (response.status) {
                                showModal('success', 'Success', 'Data telah diupdate', function() {
                                    modal = $('#modalDetail');
                                    modal.modal('hide');
                                    getData();
                                    callEdit(response.data.id);
                                    // console.log(response.data.id);

                                })

                            }


                        } else {
                            console.warn("Response bukan JSON object:", response);
                        }
                    },

                    error: function(xhr, status, error) {
                        // $('#modalLoading').modal('hide');
                        // console.error("Gagal:", status, error);
                        // let res = JSON.parse(xhr.responseText);
                        // showModal('danger', 'Error', res.message);
                        showModal('danger', 'Error', xhr.responseText);

                        let res;
                        try {
                            res = JSON.parse(xhr.responseText);
                        } catch (e) {
                            res = {
                                message: xhr.responseText
                            };
                        }
                        showModal("danger", "Error", res.message || "Terjadi kesalahan");
                    },

                    complete: function() {
                        // $('#modalLoading').modal('hide');
                        hideLoading();
                    }
                });
            }
        }

        function actionDelete(id_delete, ondelete = null) {
            $('#btnHapusPasien').attr('data-pasien-id', id_delete);
            let fname = $(`#data_firstname_${id_delete}`).text();
            let lname = $(`#data_lastname_${id_delete}`).text();
            let rmno = $(`#data_rmnumber_${id_delete}`).text();
            $('#delete_text_name').text(`${fname} ${lname}`);
            $('#delete_text_rm').text(`${rmno}`);
            let modal_hapus
            modal_hapus = $('#modalDelete');
            modal_hapus.modal('show');

            $('#btnHapusPasien').off('click').on('click', function() {
                let pasien_id = $(this).attr('data-pasien-id');
                $.ajax({
                    url: `{{ url('api/pasien/${pasien_id}') }}`,
                    type: "DELETE",
                    // contentType: "application/json",
                    // processData: false,
                    dataType: "json",
                    // data: ,

                    beforeSend: function() {
                        showLoading('Memuat...');
                    },

                    success: function(response) {
                        console.info('Error', response)
                        if (typeof response === "object" && response !== null) {
                            let data_pasien = response.data,
                                data = '',
                                temp, temp_data, i;
                            // console.log(response);

                            if (response.status) {
                                modal_hapus.modal('hide');
                                if (typeof ondelete === "function") {
                                    ondelete();
                                }
                                showModal('success', 'Success', 'Data pasien berhasil dihapus',
                                    function() {
                                        getData();

                                    });

                            }


                        } else {
                            console.warn("Response bukan JSON object:", response);
                        }
                    },

                    error: function(xhr, status, error) {
                        showModal('danger', 'Error', xhr.responseText);

                        let res;
                        try {
                            res = JSON.parse(xhr.responseText);
                        } catch (e) {
                            res = {
                                message: xhr.responseText
                            };
                        }
                        showModal("danger", "Error", res.message || "Terjadi kesalahan");
                    },

                    complete: function() {
                        // $('#modalLoading').modal('hide');
                        hideLoading();
                    }
                });
            });
        }

        function resetFilter() {
            let search = $('#filter_search'),
                gender = $('#filter_gender'),
                ethnic = $('#filter_ethnic'),
                education = $('#filter_education'),
                married_status = $('#filter_married_status'),
                job = $('#filter_job');
            blood_type = $('#filter_blood_type');

            search.val('')
            gender.val('')
            ethnic.val('')
            education.val('')
            married_status.val('')
            job.val('')
            blood_type.val('')
            getData();
        }

        function showCreate() {
            markRequiredFields();
            $('.field-detail').each(function() {
                let $el = $(this);
                $el.prop('disabled', false);
                $el.val('');
            });
            $('.field-detail-protected').each(function() {
                let $el = $(this);
                $el.prop('disabled', false).hide();
                $el.siblings('.form-label').hide();
                $el.val('');
            });

            $('#actionSave').prop('disabled', true).hide();
            $('#actionEdit').prop('disabled', true).hide();
            $('#actionCreate').prop('disabled', false).show();
            $('#actionDeletemdl').prop('disabled', true).hide();

            $('#detail_text_name').text('');
            $('#detail_text_rm').text('');
            $('#detail_text_gender').text('');
            $('.bio-card').hide();
            let modal
            modal = $('#modalDetail');
            modal.modal('show');
        }

        function deleteMdl() {
            let id = $('#actionDeletemdl').attr('data-delete-id');
            actionDelete(id, function() {
                let modal
                modal = $('#modalDetail');
                modal.modal('hide');
                clearModalDetailField();
            });
        }

        function clearModalDetailField() {
            $('#detail_avatar').val('');
            $('#detail_birth_date').val('');
            $('#detail_birth_place').val('');
            $('#detail_blood_type').val('');
            $('#detail_bpjs_number').val('');
            $('#detail_city_address').val('');
            $('#detail_communication_barrier').val('');
            $('#detail_disability_status').val('');
            $('#detail_education').val('');
            $('#detail_emergency_full_name').val('');
            $('#detail_emergency_phone_number').val('');
            $('#detail_ethnic').val('');
            $('#detail_father_name').val('');
            $('#detail_first_name').val('');
            $('#detail_gender').val('');
            $('#detail_id').val('');
            $('#detail_identity_number').val('');
            $('#detail_job').val('');
            $('#detail_last_name').val('');
            $('#detail_married_status').val('');
            $('#detail_mother_name').val('');
            $('#detail_phone_number').val('');
            $('#detail_rm_number').val('');
            $('#detail_text_ca').val('');
            $('#detail_state_address').val('');
            $('#detail_street_address').val('');
            $('#detail_text_ua').val('');

            $('#detail_text_name').text('');
            $('#detail_text_rm').text('');
            $('#detail_text_gender').text('');
            $('#actionDeletemdl').attr('data-delete-id', '');
        }

        function checkFiledCreate() {
            let filledRequired = true;
            let emptyFields = [];

            $('.field-detail-required').each(function() {
                let $el = $(this);
                let fieldValue = $el.val();
                let fieldLabel = "";

                fieldLabel = $el.siblings('.form-label').text().trim();

                if (!fieldValue) {
                    filledRequired = false;
                    emptyFields.push(fieldLabel);

                    // Tambahkan error state Bootstrap
                    $el.addClass('is-invalid');

                    // Tambahkan pesan error dinamis kalau belum ada
                    if ($el.next('.invalid-feedback').length === 0) {
                        $el.after(`<div class="invalid-feedback">${fieldLabel} wajib diisi.</div>`);
                    }
                } else {
                    // Kalau field valid, hapus error state
                    $el.removeClass('is-invalid');
                    $el.next('.invalid-feedback').remove();
                }
            });

            if (filledRequired) {
                actionCreate();
            } else {
                showModal('danger', 'Field required wajib di isi',
                    `Field required [${emptyFields.join(", ")}] wajib diisi.`);
            }
        }


        function actionCreate() {
            //
            let birth_date = $('#detail_birth_date'),
                birth_place = $('#detail_birth_place'),
                blood_type = $('#detail_blood_type'),
                bpjs_number = $('#detail_bpjs_number'),
                city_address = $('#detail_city_address'),
                communication_barrier = $('#detail_communication_barrier'),
                disability_status = $('#detail_disability_status'),
                education = $('#detail_education'),
                emergency_full_name = $('#detail_emergency_full_name'),
                emergency_phone_number = $('#detail_emergency_phone_number'),
                ethnic = $('#detail_ethnic'),
                father_name = $('#detail_father_name'),
                first_name = $('#detail_first_name'),
                gender = $('#detail_gender'),
                identity_number = $('#detail_identity_number'),
                job = $('#detail_job'),
                last_name = $('#detail_last_name'),
                married_status = $('#detail_married_status'),
                mother_name = $('#detail_mother_name'),
                phone_number = $('#detail_phone_number'),
                state_address = $('#detail_state_address'),
                street_address = $('#detail_street_address'),
                created_at = $('#detail_text_ca'),
                updated_at = $('#detail_text_ua');
            $.ajax({
                url: `{{ url('api/pasien') }}`,
                type: "POST",
                // contentType: "application/json",
                // processData: false,
                dataType: "json",
                data: {
                    avatar: `https://api.dicebear.com/6.x/identicon/svg?seed=${first_name.val()}.${last_name.val()}`,
                    first_name: first_name.val(),
                    birth_date: birth_date.val(),
                    birth_place: birth_place.val(),
                    blood_type: blood_type.val(),
                    bpjs_number: bpjs_number.val(),
                    city_address: city_address.val(),
                    communication_barrier: communication_barrier.val(),
                    disability_status: disability_status.val(),
                    education: education.val(),
                    emergency_full_name: emergency_full_name.val(),
                    emergency_phone_number: emergency_phone_number.val(),
                    ethnic: ethnic.val(),
                    father_name: father_name.val(),
                    first_name: first_name.val(),
                    gender: gender.val(),
                    identity_number: identity_number.val(),
                    job: job.val(),
                    last_name: last_name.val(),
                    married_status: married_status.val(),
                    mother_name: mother_name.val(),
                    phone_number: phone_number.val(),
                    state_address: state_address.val(),
                    street_address: street_address.val(),
                },

                beforeSend: function() {
                    showLoading('Memuat...');
                },

                success: function(response) {
                    console.info('Error', response)
                    if (typeof response === "object" && response !== null) {
                        let data_pasien = response.data,
                            data = '',
                            temp, temp_data, i;
                        let modal
                        modal = $('#modalDetail');
                        modal.modal('hide');

                        if (response.status) {
                            showModal('success', 'Success', 'Data pasien berhasil dihapus',
                                function() {
                                    getData();
                                    showDetail(data_pasien.data.id);

                                });

                        }


                    } else {
                        console.warn("Response bukan JSON object:", response);
                    }
                },

                error: function(xhr, status, error) {
                    showModal('danger', 'Error', xhr.responseText);

                    let res;
                    try {
                        res = JSON.parse(xhr.responseText);
                    } catch (e) {
                        res = {
                            message: xhr.responseText
                        };
                    }
                    showModal("danger", "Error", res.message || "Terjadi kesalahan");
                },

                complete: function() {
                    hideLoading();
                }
            });

        }
    </script>

    <script>
        $(document).ready(function() {
            getData();

        });

        function formDataToQueryString(formData) {
            const params = new URLSearchParams();
            for (const [key, value] of formData.entries()) {
                params.append(key, value);
            }
            return params.toString();
        }





        function getData(xurl = '') {
            let search = $('#filter_search'),
                gender = $('#filter_gender'),
                ethnic = $('#filter_ethnic'),
                education = $('#filter_education'),
                married_status = $('#filter_married_status'),
                job = $('#filter_job');
            blood_type = $('#filter_blood_type');

            let formData = new FormData();
            formData.append("xurl", encodeURIComponent(xurl));
            formData.append("search", search.val());
            formData.append("gender", gender.val());
            formData.append("ethnic", ethnic.val());
            formData.append("education", education.val());
            formData.append("married_status", married_status.val());
            formData.append("job", job.val());
            formData.append("blood_type", blood_type.val());

            let queryString = formDataToQueryString(formData);

            $.ajax({
                url: '{{ url('api/pasien') }}' + '?' + queryString,
                type: "GET",
                // data: formData,
                contentType: false,
                processData: false,
                dataType: "json",

                beforeSend: function() {
                    showLoading('Memuat');
                },

                success: function(response) {
                    // response sudah berupa objek JSON
                    if (typeof response === "object" && response !== null) {
                        // console.log(response.status);
                        // console.log(response);
                        let pasien = $('#pasien'),
                            data = '',
                            temp, temp_data, i;
                        const pasienList = response.data.data;

                        // contoh ambil pasien pertama
                        for (i = 0; i < pasienList.length; i++) {
                            temp_data = pasienList[i];
                            // console.log(temp_data);
                            temp = `<tr class="search-items">
                                          <td class="d-none">
                                              <div class="n-chk align-self-center text-center">
                                                  <div class="form-check">
                                                      <input type="checkbox" class="form-check-input contact-chkbox primary"
                                                          id="checkbox1" />
                                                      <label class="form-check-label" for="checkbox1"></label>
                                                  </div>
                                              </div>
                                          </td>
                                          <td>
                                              <div class="d-flex align-items-center">
                                                  <img src="${temp_data.avatar}" alt="avatar" class="rounded-circle"
                                                      width="55" />
  
                                              </div>
                                          </td>
                                          <td>
                                              <div class="ms-3">
                                                  <div class="user-meta-info">
                                                      <h6 class="user-name mb-0" data-name="" id="data_firstname_${temp_data.id}">
                                                      ${temp_data.first_name}</h6>
                                                      <span class="user-work fs-3"
                                                          data-occupation="" id="data_lastname_${temp_data.id}"> ${temp_data.last_name}</span>
                                                  </div>
                                              </div>
                                          </td>
                                          <td>
                                              <span class="usr-email-addr" data-rm-number=""  id="data_rmnumber_${temp_data.id}">${temp_data.rm_number}</span>
                                          </td>
                                          <td>
                                              <span class="usr-location" data-gender="">${temp_data.gender}</span>
                                          </td>
                                          <td>
                                              <span class="usr-ph-no" data-birth="">${temp_data.birth_place + ', ' + temp_data.birth_date}</span>
                                          </td>
                                          <td>
                                              <span class="usr-ph-no" data-phone="+1 (070) 123-4567">${temp_data.city_address}</span>
                                          </td>
                                          <td>
                                              <span class="usr-ph-no" data-phone="+1 (070) 123-4567">${temp_data.phone_number}</span>
                                          </td>
                                          <td>
                                              <div class="action-btn">
                                                  <a href="javascript:void(0)" class="text-light edit btn btn-info" onclick="showDetail('${temp_data.id}')">
                                                      <i class="ti ti-eye fs-5"></i>
                                                  </a>
                                                  <a href="javascript:void(0)" class="text-light edit btn btn-primary" onclick="callEdit('${temp_data.id}')">
                                                      <i class="ti ti-edit fs-5"></i>
                                                  </a>
                                                  <a href="javascript:void(0)" class="text-light delete ms-2 btn btn-danger" onclick="actionDelete('${temp_data.id}')">
                                                      <i class="ti ti-trash fs-5"></i>
                                                  </a>
                                              </div>
                                          </td>
                                      </tr>`;
                            data = data + temp;
                        }
                        pasien.html(data);
                        let footer_data = $('#footer_data'),
                            data2 = response.data;
                        footer_data.html('')

                        let textTotal = `<span class="m-2 d-flex justify-content-center">
        Menampilkan ${data2.from} - ${data2.to} dari ${data2.total} data.
    </span>`;

                        let li = '';

                        // Cari index page aktif
                        let current = data2.links.findIndex(l => l.active);
                        let lastIndex = data2.links.length - 1;

                        // Previous
                        li += `
      <li class="page-item ${data2.links[0].url === null ? 'disabled' : ''}">
        <a class="page-link" onclick="getData('${data2.links[0].url}')">
          «
        </a>
      </li>`;

                        // Halaman pertama
                        li += `
      <li class="page-item ${current === 1 ? 'active' : ''}">
        <a class="page-link" onclick="getData('${data2.links[1].url}')">1</a>
      </li>`;

                        // Ellipsis sebelum current
                        if (current > 3) {
                            li += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
                        }

                        // Window sekitar current (±2 halaman)
                        for (let i = current - 2; i <= current + 2; i++) {
                            if (i > 1 && i < lastIndex - 1) {
                                let link = data2.links[i];
                                li += `
              <li class="page-item ${link.active ? 'active' : ''}">
                <a class="page-link" onclick="getData('${link.url}')">${link.label}</a>
              </li>`;
                            }
                        }

                        // Ellipsis setelah current
                        if (current < lastIndex - 3) {
                            li += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
                        }

                        // Halaman terakhir (sebelum Next)
                        let lastPage = data2.links[lastIndex - 1];
                        li += `
      <li class="page-item ${lastPage.active ? 'active' : ''}">
        <a class="page-link" onclick="getData('${lastPage.url}')">${lastPage.label}</a>
      </li>`;

                        // Next
                        let next = data2.links[lastIndex];
                        li += `
      <li class="page-item ${next.url === null ? 'disabled' : ''}">
        <a class="page-link" onclick="getData('${next.url}')">»</a>
      </li>`;

                        let nav = `
      <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
              ${li}
          </ul>
      </nav>
    `;

                        footer_data.html(textTotal + nav);


                    } else {
                        console.warn("Response bukan JSON object:", response);
                    }
                },

                error: function(xhr, status, error) {

                    let res;
                    try {
                        res = JSON.parse(xhr.responseText);
                    } catch (e) {
                        res = {
                            message: xhr.responseText
                        };
                    }
                    showModal("danger", "Error", res.message || "Terjadi kesalahan");
                },

                complete: function() {
                    hideLoading();
                }
            });
        }

        var pub_id;

        function getDetail(id_pasien) {
            let avatar = $('#detail_avatar'),
                birth_date = $('#detail_birth_date'),
                birth_place = $('#detail_birth_place'),
                blood_type = $('#detail_blood_type'),
                bpjs_number = $('#detail_bpjs_number'),
                city_address = $('#detail_city_address'),
                communication_barrier = $('#detail_communication_barrier'),
                disability_status = $('#detail_disability_status'),
                education = $('#detail_education'),
                emergency_full_name = $('#detail_emergency_full_name'),
                emergency_phone_number = $('#detail_emergency_phone_number'),
                ethnic = $('#detail_ethnic'),
                father_name = $('#detail_father_name'),
                first_name = $('#detail_first_name'),
                gender = $('#detail_gender'),
                id = $('#detail_id'),
                identity_number = $('#detail_identity_number'),
                job = $('#detail_job'),
                last_name = $('#detail_last_name'),
                married_status = $('#detail_married_status'),
                mother_name = $('#detail_mother_name'),
                phone_number = $('#detail_phone_number'),
                rm_number = $('#detail_rm_number'),
                created_at = $('#detail_text_ca'),
                state_address = $('#detail_state_address'),
                street_address = $('#detail_street_address'),
                updated_at = $('#detail_text_ua');

            $.ajax({
                url: `{{ url('api/pasien/${id_pasien}') }}`,
                type: "GET",
                contentType: false,
                processData: false,
                dataType: "json",

                beforeSend: function() {
                    showLoading('Memuat...');
                },

                success: function(response) {
                    if (typeof response === "object" && response !== null) {
                        let data_pasien = response.data,
                            data = '',
                            temp, temp_data, i;
                        let modal
                        modal = $('#modalDetail');
                        modal.modal('show');

                        avatar.attr('src', data_pasien.avatar);
                        birth_date.val(data_pasien.birth_date);
                        birth_place.val(data_pasien.birth_place);
                        blood_type.val(data_pasien.blood_type);
                        bpjs_number.val(data_pasien.bpjs_number);
                        city_address.val(data_pasien.city_address);
                        communication_barrier.val(data_pasien.communication_barrier);
                        created_at.text(data_pasien.created_at);
                        disability_status.val(data_pasien.disability_status);
                        education.val(data_pasien.education);
                        emergency_full_name.val(data_pasien.emergency_full_name);
                        emergency_phone_number.val(data_pasien.emergency_phone_number);
                        ethnic.val(data_pasien.ethnic);
                        father_name.val(data_pasien.father_name);
                        first_name.val(data_pasien.first_name);
                        gender.val(data_pasien.gender);
                        id.val(data_pasien.id);
                        // pub_id = data_pasien.id;
                        $('#actionEdit').attr('data-edit-id', data_pasien.id);
                        identity_number.val(data_pasien.identity_number);
                        job.val(data_pasien.job);
                        last_name.val(data_pasien.last_name);
                        married_status.val(data_pasien.married_status);
                        mother_name.val(data_pasien.mother_name);
                        phone_number.val(data_pasien.phone_number);
                        rm_number.val(data_pasien.rm_number);
                        state_address.val(data_pasien.state_address);
                        street_address.val(data_pasien.street_address);
                        updated_at.text(data_pasien.updated_at);
                        $('#detail_text_name').text(data_pasien.first_name + ' ' + data_pasien.last_name);
                        $('#detail_text_rm').text(data_pasien.rm_number);
                        $('#detail_text_gender').text(data_pasien.gender);
                        $('#actionDeletemdl').attr('data-delete-id', data_pasien.id);


                    } else {
                        console.warn("Response bukan JSON object:", response);
                    }
                },

                error: function(xhr, status, error) {
                    showModal('danger', 'Error', xhr.responseText);

                    let res;
                    try {
                        res = JSON.parse(xhr.responseText);
                    } catch (e) {
                        res = {
                            message: xhr.responseText
                        };
                    }
                    showModal("danger", "Error", res.message || "Terjadi kesalahan");
                },

                complete: function() {
                    hideLoading();
                }
            });


        }
    </script>
@endsection
