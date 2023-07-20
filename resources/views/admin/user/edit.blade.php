@extends('layouts.layoutMasterAdmin')

@section('content')
    {{ Breadcrumbs::render('user.edit', $data) }}

    <div class="d-flex border mb-4">
        <form class="mt-4 mb-4" action="{{ route('user.update', $data->id) }}" method="POST"
            enctype="multipart/form-data
            ">
            @csrf
            {{ method_field('PUT') }}
            <div class="container">
                {{-- Profil Data --}}
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6 mt-2">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input class="form-control" type="text" id="name" name="name"
                            value="{{ old('name') ?? $data->name }}" placeholder="Masukkan nama Anda" autofocus />
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 mt-2">
                        <label for="email" class="form-label">E-mail</label>
                        <input class="form-control" type="text" id="email" name="email"
                            value="{{ old('email') ?? $data->email }}" placeholder="Masukkan email Anda" />
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 mt-2">
                        <label for="role" class="form-label">Role</label>
                        <select id="role" name="role">
                            <option value="admin" {{ old('role') ?? $data->role == 'admin' ? 'selected' : '' }}>
                                Admin
                            </option>
                            <option value="guru" {{ old('role') ?? $data->role == 'guru' ? 'selected' : '' }}>
                                Guru
                            </option>
                            <option value="murid" {{ old('role') ?? $data->role == 'murid' ? 'selected' : '' }}>
                                Murid
                            </option>
                        </select>
                        @error('role')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 mt-2">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" name="status">
                            <option value="1" {{ old('status') ?? $data->status == 1 ? 'selected' : '' }}>
                                Aktif
                            </option>
                            <option value="0" {{ old('status') ?? $data->status == 0 ? 'selected' : '' }}>
                                Nonaktif
                            </option>
                        </select>
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 mt-2">
                        <label for="password" class="form-label">Kata sandi</label>
                        <input class="form-control" type="password" id="password" name="password" value=""
                            placeholder="Masukkan password" autocomplete="off"/>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 mt-2">
                        <label for="password" class="form-label">Konfirmasi kata sandi</label>
                        <input class="form-control" type="password" id="password_confirmation" name="password_confirmation"
                            value="" placeholder="Masukkan ulang password" autocomplete="off"/>
                        @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-12 mt-4">
                        <button type="submit" class="btn btn-primary me-2">Simpan perubahan</button>
                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('uploadedAvatar');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
        }

        $("#role").selectize({
            create: true,
            sortField: "text",
        });
        $("#status").selectize({
            create: true,
            sortField: "text",
        });
    </script>
@endsection
