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
        <form action="" method="get">
            <div class="card card-body">
                <div class="row mt-3">
                    <div class="col-md-4 col-xl-3">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="ti ti-search text-dark"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="Cari Nama..." name="search" value="{{ request('search') }}" />
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group mb-4">
                            <select class="form-select mr-sm-2" name="role">
                                <option value="" selected>Pilih Role</option>
                                <option value="admin" {{ request('role') == "admin" ? 'selected' : '' }}>Admin</option>
                                <option value="staff" {{ request('role') == "staff" ? 'selected' : '' }}>Staff</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-auto col-md-auto col-sm-6">
                        <button type="submit"class="btn btn-info d-flex align-items-center m-1">
                            <i class="ti ti-search text-white me-1 fs-5"></i> Cari
                        </button>
                    </div>
                    <div class="col-lg-auto col-md-auto col-sm-6">
                        <a href="{{ url('dashboard/staff/create') }}" class="btn btn-info d-flex align-items-center m-1">
                            <i class="ti ti-users text-white me-1 fs-5"></i> Tambah Staff
                        </a>
                    </div>
                </div>
            </div>
            
        </form>


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
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Role</th>
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
                        </tr>

                        @if ($staffs->count())
                            @foreach ($staffs as $staff)
                                <tr class="search-items">
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
                                            <img src="{{ asset("storage/avatar/") . '/' . $staff->avatar ?? 'default.jpg' }}" alt="avatar" class="rounded-circle"
                                                width="80" height="80"" />

                                        </div>
                                    </td>
                                    <td>
                                        <div class="ms-3">
                                            <div class="user-meta-info">
                                                <h6 class="user-name mb-0" id="staff_name_{{ $staff->id }}">
                                                    {{ $staff->fullname }}</h6>
                                                <span class="user-work fs-3" data-occupation=""
                                                    id="data_lastname_${temp_data.id}">
                                                    {{ '@' . $staff->username }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="usr-email-addr" data-rm-number=""
                                            id="data_rmnumber_${temp_data.id}">{{ $staff->email }}</span>
                                    </td>
                                    <td>
                                        @if ($staff->role == 'admin')
                                        <span
                                            class="bg-primary text-light font-medium p-2 rounded fw-bold">
                                            Admin
                                            {{-- <span class="badge ms-auto bg-primary">1</span> --}}
                                        </span>                                            
                                        @else
                                        <span
                                            class="bg-info text-light font-medium p-2 rounded fw-bold">
                                            Staff
                                            {{-- <span class="badge ms-auto bg-primary">1</span> --}}
                                        </span>                                            
                                            
                                        @endif
                                    </td>
                                    <td>
                                        <div class="action-btn">
                                            <a href="{{ url("dashboard/staff/$staff->id") }}" class="text-light edit btn btn-info">
                                                <i class="ti ti-eye fs-5"></i>
                                            </a>
                                            @if (auth()->user()->id == $staff->id)
                                            <a href="{{ url("dashboard/account") }}" class="text-light edit btn btn-primary">
                                                <i class="ti ti-edit fs-5"></i>
                                            </a>
                                            @else
                                            <a href="{{ url("dashboard/staff/$staff->id/edit") }}" class="text-light edit btn btn-primary">
                                                <i class="ti ti-edit fs-5"></i>
                                            </a>
                                            @endif

                                            @if ($staff->id !== auth()->user()->id)
                                            <a href="javascript:void(0)" class="text-light delete ms-2 btn btn-danger"
                                                onclick="actionDelete('{{ $staff->id }}')">
                                                <i class="ti ti-trash fs-5"></i>
                                            </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="6">No staff data.</td>
                            </tr>
                        @endif

                    </tbody>
                </table>
                <div id="footer_data"></div>
                <span class="m-2 d-flex justify-content-center">
                    Menampilkan {{ $staffs->firstItem() ?? 0 }} - {{ $staffs->lastItem() ?? 0 }}
                    dari {{ $staffs->total() }} data.
                </span>

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        @foreach ($pagination['links'] as $link)
                            <li
                                class="page-item {{ $link['active'] ? 'active' : '' }} {{ $link['url'] === null ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $link['url'] ?? '#' }}">
                                    {!! $link['label'] !!}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </nav>

            </div>
        </div>
    </div>


    <!-- Vertically centered modal -->
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="vertical-center-modal" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content modal-filled bg-danger-subtle">
                <form action="{{ url('dashboard/staff/delete') }}" method="post">
                    @csrf
                    <input type="text" name="id" value="" id="input_staff_id" hidden>
                    <div class="modal-body p-4">
                        <div class="text-center text-danger">
                            <i class="ti ti-hexagon-letter-x fs-7"></i>
                            <h4 class="mt-2" id="modaltitle">Konfirmasi Penghapusan</h4>
                            <p class="mt-3" id="modalmessage">
                                Anda yakin ingin menghapus staff dengan detail berikut ?
                            </p>
                            <div class="text-center mb-3 mt-3">
                                <p class="mb-1">Staff Name: <strong id="staff_name"></strong></p>
                            </div>
    
                            <button type="submit" class="btn btn-danger my-2">
                                Hapus
                            </button>
                            <a class="btn btn-light ms-3 my-2" data-bs-dismiss="modal">
                                Batalkan
                            </a>
                        </div>
                    </div>

                </form>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>

    @endsection
    
@section('script')
    
<script>
function actionDelete(id) {
    $('#modalDelete').modal('show');
    $('#staff_name').text($(`#staff_name_${id}`).text());
    $('#input_staff_id').val(id);
}
</script>
@endsection