@extends('layouts.layoutMasterAdmin')

@section('content')
    {{ Breadcrumbs::render('asesmen.edit', $data) }}

    <div class="border">
        <form class="mt-4 mb-4" action="{{ route('asesmens.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 mt-2">
                        <label for="order" class="form-label">Order Soal</label>
                        <input type="text" class="form-control" id="order" name="order" placeholder="Order"
                            value="{{ old('order') ?? ($data->order ?? '') }}" readonly>
                        @error('order')
                            <div class="form-text text-danger">{{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 mt-2">
                        <label for="header" class="form-label">Soal Asesmen</label>
                        <textarea class="form-control" id="soal_asesmen" name="soal_asesmen" placeholder="Soal Asesmen">{{ $data->soal_asesmen }}</textarea>
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
                        <button type="submit" class="btn btn-warning w-100">
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
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
    </script>
@endsection
