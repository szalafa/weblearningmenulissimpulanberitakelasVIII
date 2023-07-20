@extends('layouts.layoutMasterAdmin')

@section('content')
    {{ Breadcrumbs::render('materi.edit', $data) }}

    <div class="border">
        <form class="mt-4 mb-4" action="{{ route('materi.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-4 mt-2">
                        <label for="order" class="form-label">Order</label>
                        <input type="text" class="form-control" id="order" name="order" placeholder="Order"
                            value="{{ old('order') ?? ($data->order ?? '') }}" readonly>
                        @error('order')
                            <div class="form-text text-danger">{{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4 mt-2">
                        <label for="header" class="form-label">Header</label>
                        <input type="text" class="form-control" id="header" name="header" placeholder="Header"
                            value="{{ old('header') ?? ($data->header ?? '') }}">
                        @error('header')
                            <div id="emailHelp" class="form-text text-danger">{{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4 mt-2">
                        <label for="diskusi" class="form-label">Status Diskusi</label>
                        <select id="diskusi" name="diskusi">
                            <option value="1" {{ old('diskusi') ?? $data->diskusi == 1 ? 'selected' : '' }}>
                                Aktif
                            </option>
                            <option value="0" {{ old('diskusi') ?? $data->diskusi == 0 ? 'selected' : '' }}>
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
                        <textarea id="materi" class="form-control" name="materi" rows="10" cols="100" placeholder="Materi">{{ $data->materi }}</textarea>
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
    <script>
        $('#diskusi').selectize();
        
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
    </script>
@endsection
