@extends('layouts.layoutMasterMurid')

@section('content')
    {{ Breadcrumbs::render('diskusi') }}

    <div class="row">
        @foreach ($materi as $data)
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="card mb-3">
                    <div class="card-header fw-bold text-center text-white bg-primary">Ruang Diskusi Materi
                        {{ $data->order }}</div>
                    <div class="card-body">
                        <div class="text-black text-center mb-4">"{{ $data->header }}"</div>
                        <button class="btn btn-success w-100" onclick="diskusiModal({{ $data->order }})">Buka Ruang Diskusi <i
                                class="ms-2 fas fa-fw fa-comments text-white"></i></button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @include('murid.modal.diskusi_modal')
@endsection

@section('script')
    @include('murid.js.diskusi_modal')

    <script>
        $(document).ready(function() {
            $('#pesan_diskusi').summernote({
                placeholder: 'Ketik pesan disini',
                height: 50,
                toolbar: [
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol']],
                ],
            });
        });
    </script>
@endsection
