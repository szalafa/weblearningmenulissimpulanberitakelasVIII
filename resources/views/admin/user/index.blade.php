@extends('layouts.layoutMasterAdmin')

@section('content')
    {{ Breadcrumbs::render('user') }}

    <div class="text-end">
        <p class="demo-inline-spacing">
            <a class="btn btn-primary me-1" data-bs-toggle="collapse" href="#collapseExample" role="button"
                aria-expanded="false" aria-controls="collapseExample">
                Tambah User
            </a>
        </p>
    </div>

    <div class="collapse mb-4" id="collapseExample">
        <div class="border">
            <form class="mt-4 mb-4" action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-4 mt-2">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama"
                                value="{{ old('nama') }}">
                            @error('nama')
                                <div class="form-text text-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4 mt-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                value="{{ old('email') }}">
                            @error('email')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4 mt-2">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Kata Sandi" value="{{ old('password') }}">
                            @error('password')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 mt-2">
                            <label for="role" class="form-label">Role</label>
                            <select id="role" name="role">
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>
                                    Admin
                                </option>
                                <option value="guru" {{ old('role') == 'guru' ? 'selected' : '' }}>
                                    Guru
                                </option>
                                <option value="murid" {{ old('role') == 'murid' ? 'selected' : '' }}>
                                    Murid
                                </option>
                            </select>
                            @error('role')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 mt-2">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status">
                                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>
                                    Aktif
                                </option>
                                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>
                                    Nonaktif
                                </option>
                            </select>
                            @error('status')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
                            <button type="submit" class="btn btn-primary w-100">
                                Tambahkan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-bordered materi_dt" style="width: 99%">
                <thead class="text-center">
                    <tr>
                        <th width="5%">Index</th>
                        <th width="15%">Nama</th>
                        <th width="15%">Role</th>
                        <th width="15%">Status</th>
                        <th width="15%">Email</th>
                        <th width="15%">Tanggal Dibuat</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center"></tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script>
        @if (count($errors) > 0)
            $('#collapseExample').collapse('show');
        @endif

        $(function() {
            var table = $('.materi_dt').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json'
                },
                processing: true,
                serverSide: true,
                ajax: "{{ route('user.index-table') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'role_badge',
                        name: 'role',
                    },
                    {
                        data: 'status',
                        name: 'status',
                    },
                    {
                        data: 'email',
                        name: 'email',
                    },
                    {
                        data: 'created_date',
                        name: 'created_at',
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        orderable: false,
                        searchable: false,
                    },
                ],
            });
        });

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
