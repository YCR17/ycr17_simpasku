@extends('templates.index')

@section('content')
<div class="card w-100 position-relative overflow-hidden mb-0">
    <div class="card-body p-4">
        <h5 class="card-title fw-semibold">Profile</h5>
        <div class="text-center mb-4">
            <img id="preview" src="{{ asset("storage/avatar/$staff->avatar") }}" alt="avatar preview"
                class="img-fluid rounded-circle" width="220" height="120">
        </div>
        <h5 class="card-title fw-semibold">Personal Details</h5>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-4">
                    <label class="form-label fw-semibold">Username</label>
                    <h5>{{ $staff->username }}</h5>
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <h5>{{ $staff->email }}</h5>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-4">
                    <label class="form-label fw-semibold">Full Name</label>
                    <h5>{{ $staff->fullname }}</h5>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold">Role</label>
                    <h5>{{ $staff->role }}</h5>
                </div>
            </div>

            <div class="col-12">
                <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                    <a href="{{ url("dashboard/staff/$staff->id/edit") }}" class="btn btn-primary">Edit</a>
                    <a href="{{ url('dashboard/staff') }}"
                        class="btn btn-light-danger text-info">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
