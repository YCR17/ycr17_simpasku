@extends('templates.index')

@section('content')
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6 d-flex align-items-stretch">
                <div class="card w-100 position-relative overflow-hidden">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold">Change Profile</h5>
                        <p class="card-subtitle mb-4">Change your profile picture from here</p>
                        <div class="text-center">
                            <img id="preview" src="{{ asset('storage/avatar/default.jpg') }}" alt="avatar preview"
                                class="img-fluid rounded-circle" width="120" height="120">

                            <div class="d-flex align-items-center justify-content-center my-4 gap-3">
                                <input type="file" name="avatar" id="avatar" accept="image/*" style="display: none;">
                                <a onclick="selectImg();" class="btn btn-primary">Select Img</a>
                                <a onclick="resetImg();" class="btn btn-outline-danger">Reset</a>
                            </div>

                            <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 d-flex align-items-stretch">
                <div class="card w-100 position-relative overflow-hidden mb-0">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold">Personal Details</h5>
                        <p class="card-subtitle mb-4">To change your personal detail , edit and save from here</p>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="username" class="form-label fw-semibold">Username</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        placeholder="Mathew Anderson" value="{{ old('username') }}">
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="form-label fw-semibold">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="info@pkuwsb.id" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="fullname" class="form-label fw-semibold">Full Name</label>
                                    <input type="text" class="form-control" id="fullname" name="fullname"
                                        placeholder="Maxima Studio" value="{{ old('fullname') }}">
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Role</label>
                                    <select class="form-select" aria-label="Default select example" name="role">
                                        <option value="staff" selected>Staff</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-4">
                                    <label for="password" class="form-label fw-semibold">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        value="">
                                </div>
                                <div class="">
                                    <label for="confirm_password" class="form-label fw-semibold">Confirm
                                        Password</label>
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                                        value="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                                    <button class="btn btn-primary">Save</button>
                                    <a href="{{ url('dashboard/staff') }}" class="btn btn-light-danger text-danger">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

    <script>
    const avatarInput = document.getElementById('avatar');
    const previewImg  = document.getElementById('preview');
    const defaultImg  = "{{ asset('storage/avatar/default.jpg') }}";

    function selectImg() {
        avatarInput.click(); // trigger file input
    }

    avatarInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            // cek size maksimal 800KB
            if (file.size > 800 * 1024) {
                alert("Ukuran file maksimal 800KB");
                avatarInput.value = ""; // reset
                previewImg.src = defaultImg;
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result; // tampilkan preview
            }
            reader.readAsDataURL(file);
        }
    });

    function resetImg() {
        avatarInput.value = "";
        previewImg.src = defaultImg; // kembali ke default
    }
</script>
@endsection
