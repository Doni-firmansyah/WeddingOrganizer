@extends('layouts.user')
@section('index')
    @include('user.component.header')
    @include('user.component.slider')
    {{-- @include('user.component.detail') --}}
    @include('user.service.undangan.detail')
    @include('user.component.registry')
    @include('user.component.galery2')
    @include('user.component.footer')
@endsection
