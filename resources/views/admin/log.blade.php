@extends('layouts.dashboard')

@section('title')
Dashboard Aktifitas
@endsection

@section('subtitle')
Dashboard Log Activitas
@endsection

@section('content')
<div class="form mb-5">
    <form action="/dashboard/log" method="get" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col"> <x-custom-input-dropdown-status2 field="nama" label="Nama" namatabel="users" namacolom="name"/></div>
            <div class="col"><x-custom-input field="tanggal" label="Tanggal" type="date"/></div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        @if ($nama!==null or $tanggal!==null)
            <p><a href="/dashboard/log"> <i class="fas fa-times-circle"></i></a>@if ($nama)
                {{ '#'.$nama}}
            @endif
                @if ($tanggal)
                {{ '#'.$tanggal  }}
                @endif
        </p>
        @endif
      </form>
</div>
<div class="table">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Nama</th>
            <th scope="col">Role</th>
            <th scope="col">Url</th>
            <th scope="col">Detail</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
            <tr>
                <th scope="row">{{ ($logs->currentPage() - 1)  * $logs->count() + $loop->iteration }}</th>
                <td>{{\Carbon\Carbon::parse( $log->created_at)->format('d-M-Y H:m:s')}}</td>
                <td>{{ $log->user->name }}</td>
                <td>@if ($log->user->role==null )
                    user
                @else
                     {{ $log->user->role }}
                @endif

                </td>
                <td>{{ $log->nama_route }}</td>

                <td><a class="btn btn-primary btn-sm" href="#" role="button" data-toggle="modal" data-target="#exampleModal-{{ $log->id }}" >Detail</a></td>


              </tr>
            @endforeach
        </tbody>
    </table>
    {{$logs->links("pagination::bootstrap-4")}}
</div>

<!-- Modal -->
@foreach ($logs as $log)
    <div class="modal fade" id="exampleModal-{{ $log->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="info">
                    <div class="row">
                        <div class="col-4">
                            <p>Tanggal</p>
                        </div>
                        <div class="col-1">
                            <p>:</p>
                        </div>
                        <div class="col-7">
                            <p>{{\Carbon\Carbon::parse( $log->created_at)->format('d-M-Y H:m:s')}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Nama</p>
                        </div>
                        <div class="col-1">
                            <p>:</p>
                        </div>
                        <div class="col-7">
                            <p>{{ $log->user->name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Role</p>
                        </div>
                        <div class="col-1">
                            <p>:</p>
                        </div>
                        <div class="col-7">
                            <p>@if ($log->user->role==null )
                                user
                            @else
                                 {{ $log->user->role }}
                            @endif</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Url</p>
                        </div>
                        <div class="col-1">
                            <p>:</p>
                        </div>
                        <div class="col-7">
                            <p>{{ $log->nama_route }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Keterangan</p>
                        </div>
                        <div class="col-1">
                            <p>:</p>
                        </div>
                        <div class="col-7">
                            <p>{{ $log->keterangan }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
@endforeach
@endsection


