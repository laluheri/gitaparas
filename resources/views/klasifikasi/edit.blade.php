@extends('adminlte::page')

@section('title', 'Edit klasifikasi')

@section('content_header')
    <h1 class="m-0 text-dark">Edit klasifikasi</h1>
@stop

@section('content')
    <form action="{{route('klasifikasi.update', $klasifikasi)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputName">Kode Klasifikasi</label>
                        <input type="text" class="form-control @error('kode') is-invalid @enderror" id="exampleInputName" placeholder="Nama lengkap" name="kode" value="{{$klasifikasi->kode ?? old('kode')}}">
                        @error('kode') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Jenis  Surat</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputName" placeholder="Nama lengkap" name="nama" value="{{$klasifikasi->nama ?? old('nama')}}">
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