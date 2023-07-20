@php
    use App\Models\Title;
    $title = Title::first();
@endphp

<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ $title->title }}</title>

    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="{{ url('assets/img_media/logo.PNG ') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.6/css/selectize.bootstrap5.min.css"
        integrity="sha512-w4sRMMxzHUVAyYk5ozDG+OAyOJqWAA+9sySOBWxiltj63A8co6YMESLeucKwQ5Sv7G4wycDPOmlHxkOhPW7LRg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    @yield('style')

    <script src="{{ url('/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ url('/assets/js/config.js') }}"></script>
    


    <!-- Custom styles for this template-->
    <link href="{{ url('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/grcard.css') }}" rel="stylesheet">

</head>



<body>

    @include('landing.header')

    @yield('content')

    <div class="fixed-bottom">
        @include('layouts.footer')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js"
        integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.6/js/standalone/selectize.min.js"
        integrity="sha512-pgmLgtHvorzxpKra2mmibwH/RDAVMlOuqU98ZjnyZrOZxgAR8hwL8A02hQFWEK25V40/9yPYb/Zc+kyWMplgaA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.6/js/standalone/selectize.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- Auto loading  --}}
            <script>
                    const isi = document.querySelector('.isi');
                    const sections = isi.querySelectorAll('section');
                    let currentSectionIndex = 0;

                    function autoScroll() {
                    sections[currentSectionIndex].scrollIntoView({ behavior: 'smooth' });
                    currentSectionIndex++;
                    if (currentSectionIndex === sections.length) {
                        currentSectionIndex = 0; // Kembali ke awal setelah mencapai akhir
                    }
                    setTimeout(autoScroll, 5000); // Menjalankan fungsi autoScroll setiap 5 detik
                    }

                    autoScroll(); // Memulai auto scrolling saat halaman dimuat
            </script>
{{-- end script --}}

        
    @yield('script')

</body>

</html>
