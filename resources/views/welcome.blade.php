@extends('layouts.layoutMaster')

@section('header')
    @include('landing.header')
@endsection

@section('content')
    <div class="container">
        <div class="container">
            @include('layouts.flashMessage')
        </div>
    </div>

    @include('landing.content')

@endsection
