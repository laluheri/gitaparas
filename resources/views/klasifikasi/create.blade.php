@extends('adminlte::page')

@section('title', 'Tambah klasifikasi')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah klasifikasi surat</h1>
@stop

@section('content')
    <form action="{{route('klasifikasi.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputName">Kode Klasifikasi</label>
                        <input type="text" class="form-control @error('kode') is-invalid @enderror" id="exampleInputName" placeholder="Kode Klasifikasi" name="kode" value="{{old('kode')}}">
                        @error('kode') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Jenis  Surat</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputName" placeholder="Jenis Surat" name="nama" value="{{old('nama')}}">
                        @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('klasifikasi.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop