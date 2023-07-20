@extends('layouts.layoutMasterMurid')

@section('content')
    {{ Breadcrumbs::render('materi.learning', $data->order) }}

    <h1 class="text-black">
        {{ $data->order }}. {{ $data->header }}
    </h1>

    {!! $data->materi !!}

    <style>
        .container-frame {
            position: relative;
            overflow: hidden;
            width: 100%;
            padding-top: 50%;
            margin-top: 14vh;
            /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
        }

        /* Then style the iframe to fit in the container div with full height and width */
        .responsive-iframe {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 100%;
        }
    </style>

    @if ($data->video_pembelajaran)
        <div class="container-frame mb-4">
            <iframe class="responsive-iframe"
                src="{{ asset('assets/video_pembelajaran/' . $data->video_pembelajaran) }}"></iframe>
        </div>
    @endif

    @if ($data->diskusi == 1)
        <button type="button" class="btn btn-success" onclick="diskusiModal({{ $data->order }})">
            Ruang Diskusi <i class="ms-2 fas fa-fw fa-comments text-white"></i>
        </button>
    @endif

    <div class="row d-flex justify-content-between mb-4 mt-4">
        @if ($data->order != 1)
            <div class="col">
                <a href="{{ route('materi.learning', $data->order - 1) }}" class="btn btn-primary"><i
                        class="fas fa-fw fa-arrow-left"></i> Sebelumnya</a>
            </div>
        @endif
        @if ($data->order < $sum)
            <div class="col text-right">
                <a href="{{ route('materi.learning', $data->order + 1) }}" class="btn btn-primary">Selanjutnya <i
                        class="fas fa-fw fa-arrow-right"></i></a>
            </div>
        @endif
    </div>

    @include('murid.modal.diskusi_modal')
@endsection

@section('script')
    @include('murid.js.diskusi_modal')

    <script>
        $(document).ready(function() {
            $('#pesan_diskusi').summernote({
                placeholder: 'Ketik pesan disini',
                height: 60,
                toolbar: [
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol']],
                ],
            });
        });
    </script>
@endsection
