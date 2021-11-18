@extends('layouts.user')
@section('index')
    @include('user.component.header')
    @include('user.component.slider')
    @include('user.component.story')
    @include('user.component.service')
    {{-- @include('user.component.timer') --}}
    @include('user.component.galery')
    {{-- @include('user.component.gift')
    @include('user.component.contact') --}}
    @include('user.component.registry')
    @include('user.component.galery2')
    @include('user.component.footer')
@endsection

