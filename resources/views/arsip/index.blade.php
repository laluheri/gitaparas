@extends('adminlte::page')

@section('title', 'Daftar arsip')

@section('content_header')
    <h1 class="m-0 text-dark">Daftar arsip</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('arsip.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No. Surat</th>
                            <th>Isi</th>
                            <th>Asal</th>
                            <th>Tgl Surat</th>
                            <th>Tgl Terima</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($jml_arsip as $key => $jml_arsip)
                        @if (date('Y-m-d') >= $jml_arsip->tgl_kadaluarsa)
                        <tr class="bg-danger">
                        @else
                        <tr>
                        @endif                                
                                <td>{{$jml_arsip->no_surat}}</td>
                                <td>{{$jml_arsip->isi}}</td>
                                <td>{{$jml_arsip->asal_surat}}</td>
                                <td>{{$jml_arsip->tgl_surat}}</td>
                                <td>{{$jml_arsip->tgl_terima}}</td>
                                
                                <td>
                                   <a href="{{route('arsip.download', $jml_arsip)}}"><i class="fa fa-fw fa-download text-dark"></i></a>
                                    </a>
                                    <a href="{{route('arsip.destroy', $jml_arsip)}}" onclick="notificationBeforeDelete(event, this)">
                                        <i class="fa fw fa-trash text-dark"></i>
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