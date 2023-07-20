@extends('layouts.layoutMasterMurid')

@section('content')
    {{ Breadcrumbs::render('dashboard.learning') }}

    <h1 class="mt-4 mb-4 text-black">Selamat Datang, {{ Auth::user()->name }}!</h1>

    <div class="card">
        <h1>Laman Pembelajaran Menulis Teks Simpulan Berita</h1>
        <p> Laman ini memiliki fitur materi, diskusi, dan asesemen yang digunakan sebagai penunjang dari pembelajaran. Berikut merupakan paparan dari menu di laman elearning. 
            Menu materi memiliki akses melihat materi menulis simpulan berita.
            Menu diskusi dapat digunakan untuk menuliskan ide atau pendapat.
            Menu asesmen digunakan untuk mengumpulkan tugas mandiri.</p>
        <p> Selanjutnya kalian menuju menu materi untuk mempelajari materi menulis simpulan berita.</p>
      </div>
      
    {{-- <div class="card">
        <div class="card-body">
         Selamat datang di laman pembelajaran Menulis Simpulan Berita Siswa-Siswi kelas VIII. 
         Laman ini memiliki fitur materi, diskusi, dan asesemen. 
         Adik-Adik Siswa dapat memilih materi untuk memulai kegiatan pembelajaran. 
         Terdapat fitur diskusi yang dapat diakses dibawah tampilan materi. 
         Menu asesmen digunakan untuk mengumpulkan asesmen. 

        </div>
      </div> --}}
    
    {{-- <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-4">
            <div class="card text-bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Materi Terindeks</h5>
                    <h1 class="card-title mt-4">{{ $materi }}</h1>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
