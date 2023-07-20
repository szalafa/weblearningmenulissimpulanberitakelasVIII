@extends('layouts.layoutMaster')

@section('content')
<style>
    .bg-login-image {
        background: url('{{ asset('assets/img_media/background.jpg') }}');
        background-position: center;
        background-size: cover;
    }
</style>
    @extends('auth.login')
@endsection
