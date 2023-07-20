@extends('layouts.layoutMasterAdmin')

@section('content')
    {{ Breadcrumbs::render('asesmen.admin') }}

    <div class="row d-flex justify-content-between">
        <div class="col">
            <div class="text-start">
                <p class="demo-inline-spacing">
                    <a class="btn btn-success me-1" href="{{ route('hasil-asesmen') }}">
                        Lihat Hasil Asesmen
                    </a>
                </p>
            </div>
        </div>
        @if ($asesmen < 5)
            <div class="col">
                <div class="text-end">
                    <p class="demo-inline-spacing">
                        <a class="btn btn-primary me-1" data-bs-toggle="collapse" href="#collapseExample" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            Tambah Asesmen
                        </a>
                    </p>
                </div>
            </div>
        @endif
    </div>


    <div class="collapse mb-4" id="collapseExample">
        <div class="border">
            <form class="mt-4 mb-4" action="{{ route('asesmens.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="row d-flex">
                        <div class="col-sm-12 col-md-12 col-lg-12 mt-2">
                            <label for="order" class="form-label">Order Soal</label>
                            <input type="text" class="form-control" id="order" name="order" placeholder="Order"
                                value="{{ old('order') }}" readonly>
                            @error('order')
                                <div class="form-text text-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 mt-2">
                            <label for="header" class="form-label">Soal Asesmen</label>
                            <textarea class="form-control" id="soal_asesmen" name="soal_asesmen" placeholder="Soal Asesmen"
                                value="{{ old('soal_asesmen') }}"></textarea>
                            @error('soal_asesmen')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 mt-2">
                            <label for="video_asesmen" class="form-label">Video Asesmen</label>
                            <input type="file" class="form-control" id="video_asesmen" name="video_asesmen"
                                placeholder="Video Asesmen" value="{{ old('video_asesmen') }}">
                            @error('video_asesmen')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-12 mt-4">
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
                        <th width="50%">Soal Asesmen</th>
                        <th width="15%">Video Asesmen</th>
                        <th width="15%">Dibuat Tanggal</th>
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

        $(function() {
            var table = $('.materi_dt').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json'
                },
                processing: true,
                serverSide: true,
                ajax: "{{ route('asesmen.index-table') }}",
                columns: [{
                        data: 'order',
                        name: 'order',
                    },
                    {
                        data: 'soal',
                        name: 'soal_asesmen',
                    },
                    {
                        data: 'video_asesmen',
                        name: 'video_asesmen',
                    },
                    {
                        data: 'created_date',
                        name: 'created_at',
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                    },
                ],
            });
        });

        $(document).ready(function() {
            $('#soal_asesmen').summernote({
                placeholder: 'Tulis Soal Asesmen',
                height: 200,
                toolbar: [
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol']],
                    ['insert', ['link', 'picture', 'video']]
                ],
            });
        });

        var url = '{{ route('get-order-asesmen') }}';
        $.get(url, function(data) {
            $('#order').val(data);
        });
    </script>
@endsection
