@extends('layouts.user')
@section('index')
    @include('user.component.header')
    @include('user.pages.index')
    @include('user.component.registry')
    @include('user.component.footer')
@endsection
