@extends('layouts.layoutMasterAdmin')

@section('content')
    {{ Breadcrumbs::render('materi.admin') }}

    <div class="text-end">
        <p class="demo-inline-spacing">
            <a class="btn btn-primary me-1" data-bs-toggle="collapse" href="#collapseExample" role="button"
                aria-expanded="false" aria-controls="collapseExample">
                Tambah Materi
            </a>
        </p>
    </div>

    <div class="collapse mb-4" id="collapseExample">
        <div class="border">
            <form class="mt-4 mb-4" action="{{ route('materi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-4 mt-2">
                            <label for="order" class="form-label">Order</label>
                            <input type="text" class="form-control" id="order" name="order" placeholder="Order"
                                value="{{ old('order') }}" readonly>
                            @error('order')
                                <div class="form-text text-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4 mt-2">
                            <label for="header" class="form-label">Header</label>
                            <input type="text" class="form-control" id="header" name="header" placeholder="Header"
                                value="{{ old('header') }}">
                            @error('header')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4 mt-2">
                            <label for="diskusi" class="form-label">Status Diskusi</label>
                            <select id="diskusi" name="diskusi">
                                <option value="1" {{ old('diskusi') == 1 ? 'selected' : '' }}>
                                    Aktif
                                </option>
                                <option value="0" {{ old('diskusi') == 0 ? 'selected' : '' }}>
                                    Nonaktif
                                </option>
                            </select>
                            @error('diskusi')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 mt-2">
                            <label for="materi" class="form-label">Materi</label>
                            <textarea id="materi" class="form-control" name="materi" placeholder="Materi" value="{{ old('materi') }}"></textarea>
                            @error('materi')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 mt-2">
                            <label for="video_pembelajaran" class="form-label">Video Pembelajaran</label>
                            <input type="file" class="form-control" id="video_pembelajaran" name="video_pembelajaran"
                                placeholder="Video Pembelajaran" value="{{ old('video_pembelajaran') }}">
                            @error('video_pembelajaran')
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
            <table class="table table-bordered materi_dt">
                <thead class="text-center">
                    <tr>
                        <th width="5%">Order</th>
                        <th width="10%">Header</th>
                        <th width="40%">Materi</th>
                        <th width="15%">Video Pembelajaran</th>
                        <th width="15%">Status Diskusi</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center"></tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        @if (count($errors) > 0)
            $('#collapseExample').collapse('show');
        @endif

        $('#diskusi').selectize();

        $(function() {
            var table = $('.materi_dt').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json'
                },
                processing: true,
                serverSide: true,
                ajax: "{{ route('materi.index-table') }}",
                columns: [{
                        data: 'order',
                        name: 'order',
                    },
                    {
                        data: 'header',
                        name: 'header',
                    },
                    {
                        data: 'materi',
                        name: 'materi',
                    },
                    {
                        data: 'video_pembelajaran',
                        name: 'video_pembelajaran',
                    },
                    {
                        data: 'diskusi',
                        name: 'diskusi',
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

        $(document).ready(function() {
            $('#materi').summernote({
                placeholder: 'Materi',
                height: 200,
                toolbar: [
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol']],
                    ['insert', ['link', 'picture', 'video']]
                ],
            });
        });

        var url = '{{ route('get-order-materi') }}';
        $.get(url, function(data) {
            $('#order').val(data);
        });
    </script>
@endsection
