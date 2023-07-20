@extends('layouts.layoutMasterMurid')

@section('content')
    {{ Breadcrumbs::render('asesmen.learning') }}

    <style>
        .container-frame {
            position: relative;
            overflow: hidden;
            width: 100%;
            padding-top: 56.25%;
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

    @if (!$user)
        <form action="{{ route('asesmen.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach ($asesmen as $data)
                <div class="container border rounded mb-4">
                    <div class="row mt-2 mb-2">
                        <div class="col-12">
                            <h6 class="text-black fw-bold mt-2">{{ $data->order }}</h6>
                            @if ($data->video_asesmen)
                                <div class="container-frame mb-4">
                                    <iframe class="responsive-iframe"
                                        src="{{ asset('assets/video_asesmen/' . $data->video_asesmen) }}"></iframe>
                                </div>
                            @endif
                            {!! $data->soal_asesmen !!}
                        </div>
                    </div>
                    <div class="row mb-9">
                        <label for="jawaban_asesmen" class="form-label text-black fw-bold">Jawaban Asesmen</label>
                        <textarea class="form-control" id="jawaban_asesmen_{{ $data->order }}" name="jawaban_asesmen_{{ $data->order }}"
                            placeholder="Ketik jawaban Anda disini">{{ old('jawaban_asesmen') }}</textarea>
                    </div>
                </div>
            @endforeach
            @if ($asesmen->isNotEmpty())
                <div class="row mb-4">
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">Kirim Jawaban Asesmen <i
                                class="ms-2 fas fa-plane-departure"></i></button>
                    </div>
                </div>
            @else
                <h1 class="mt-4 mb-4 text-black">Asesmen belum tersedia!</h1>
            @endif
        </form>
    @else
        <h1 class="mt-4 mb-4 text-black">Anda telah mengisi Asesmen!</h1>
    @endif
@endsection
