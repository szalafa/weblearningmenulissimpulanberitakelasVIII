@extends('layouts.layoutMasterAdmin')

@section('content')
    {{ Breadcrumbs::render('dashboard.admin') }}

    <h1 class="mt-4 mb-4 text-black">Selamat Datang, {{ Auth::user()->name }}!</h1>

    <div class="card">
        <div class="card-body">
          <p> Selamat datang Bapak/Ibu Guru di aplikasi laman pembelajaran teks berita. 
            Laman ini memiliki fitur unggah materi berita, forum diskusi, dan asesmen. Berikut ini merupakan penjelasan dari fitur laman menulis simpulan berita:
            pertama, Materi berita yang tersaji dapat berupa teks, gambar, dan video.
            kedua, Di laman ini tersedia ruang diskusi yang dapat digunakan untuk diskusi bagi siswa dan guru secara interaktif.
            ketiga, Ruang Asesmen dapat digunakan untuk menyajikan asesmen.
        </p> 
        
        </div>
      </div>
    {{-- <div class="row"> --}}
        {{-- <div class="col-sm-12 col-md-12 col-lg-4">
            <div class="card text-bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Materi Terindeks</h5>
                    <h1 class="card-title mt-4">{{ $materi }}</h1>
                </div>
            </div>
        </div> --}}
        {{-- <div class="col-sm-12 col-md-12 col-lg-4">
            <div class="card text-bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Asesmen Terindeks</h5>
                    <h1 class="card-title mt-4">{{ $asesmen }}</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4">
            <div class="card text-bg-secondary mb-3">
                <div class="card-body">
                    <h5 class="card-title">User Terindeks</h5>
                    <h1 class="card-title mt-4">{{ $user }}</h1>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
