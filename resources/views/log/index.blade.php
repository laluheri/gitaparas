@extends('adminlte::page')

@section('title', 'log')

@section('content_header')
    <h1 class="m-0 text-dark">Log Aktifitas</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Pengguna</th>
                            <th>Aktifitas</th>
                            <th>Keterangan</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($logs as $key => $log)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$log->users->name}}</td>
                                <td>{{$log->event}}</td>
                                <td>{{$log->extra}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@stop