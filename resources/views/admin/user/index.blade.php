@extends('layouts.dashboard')

@section('title')
Dashboard User
@endsection

@section('subtitle')
Dashboard List User
@endsection

@section('content')
    <div class="card mb-2">
        <h5 class="card-header">Search</h5>
        <form class="card-body" action="/dashboard/user" method="GET" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" placeholder="@if($key){{ $key }} @else Search for... @endif" name="q" >
                <span class="input-group-btn">
            <button class="btn btn-secondary" type="submit">Go!</button>
          </span>
            </div>
        </form>
    </div>
<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        {{-- <th scope="col">Alamat</th> --}}
        <th scope="col">no_hp</th>
        <th scope="col">Role</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @php
            $index=1;
        @endphp
        @foreach ($users as $user )
        <tr>
            <th scope="row">{{ $index++ }}</th>
            <td>{{ $user->name}}</td>
            <td>{{ $user->email }}</td>
            {{-- <td>{{ $user->alamat }}</td> --}}
            <td>{{ $user->handphone }}</td>
            <td>{{ $user->role}} </td>
            <td><a href="/dashboard/user/{{ $user->id }}" class="btn btn-primary btn-sm">Detail</a></td>
          </tr>
        @endforeach
    </tbody>
  </table>



@endsection


