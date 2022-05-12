@extends('adminlte::page')

@section('title', 'daftar pengguna')

@section('content_header')

    @if (Auth::user()->role == 'admin')
        <h1 class="m-0 text-dark">Daftar Pengguna</h1>
    @endif
   
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @if (Auth::user()->role == 'admin')
                    <a href="{{route('users.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    @endif

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $user)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if (Auth::user()->role == 'admin')
                                    <a href="{{route('users.edit', encrypt($user))}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('users.destroy', $user)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                    @else
                                    <a href="{{route('users.edit', encrypt($user))}}" class="btn btn-primary btn-xs">
                                        Ganti Password
                                   @endif
                                   
                                </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

    </script>
@endpush