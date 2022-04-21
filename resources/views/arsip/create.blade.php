@extends('adminlte::page')

@section('title', 'Tambah Arsip')

@section('content_header')
    
@stop

@section('content')
    <form action="{{route('arsip.store')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">                   
                        <h3><i class="nav-icon fas fa-envelope-open-text my-1 btn-sm-1"></i> Arsip Surat</h3>
                        <hr />
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-6">
                                <label for="nomorsurat">Nomor Surat</label>
                                <input value="{{old('no_surat')}}" name="no_surat" type="text" class="form-control bg-light"
                                    id="nomorsurat" placeholder="Nomor Surat" required>
                                <label for="kode">Asal Surat</label>
                                    <select name="asal_surat" class="custom-select my-1 mr-sm-2 bg-light" id="inlineFormCustomSelectPref"
                                        required>
                                        <option value="">-- Pilih Asal Surat --</option>
                                        @foreach($instansi as $instansi)
                                        <option value="{{$instansi->name}}">{{$instansi->name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="kode">Kode Klasifikasi</label>
                                    <select name="kode" class="custom-select my-1 mr-sm-2 bg-light" id="inlineFormCustomSelectPref"
                                    required>
                                    <option value="">-- Pilih Klasifikasi Surat --</option>
                                    @foreach($data_klasifikasi as $klasifikasi)
                                    <option value="{{$klasifikasi->kode}}">{{$klasifikasi->nama}} ( {{$klasifikasi->kode}} )
                                    </option>
                                    @endforeach
                                </select>
                                <label for="keterangan">Lokasi Fisik Arsip</label>
                                <input value="{{old('keterangan')}}" name="keterangan" type="text" class="form-control bg-light"
                                id="keterangan" placeholder="Asrip No:..., Box Arsip No..., atau Filling Cabinet No:.., Laci No:..." required>
                                <label for="isisurat">Isi Ringkas</label>
                                <textarea name="isi" class="form-control bg-light" id="isisurat" rows="3"
                                    placeholder="Isi Ringkas Surat Masuk" required>{{old('isi')}}</textarea>
                            </div>
                            <div class="col-6">
                                <label for="tglsurat">Tanggal Surat</label>
                                <input value="{{old('tgl_surat')}}" name="tgl_surat" type="date" class="form-control bg-light"
                                    id="tglsurat" required>
                                <label for="tglditerima">Tanggal Diterima</label>
                                <input value="{{old('tgl_terima')}}" name="tgl_terima" type="date" class="form-control bg-light"
                                    id="tglditerima" required>
                                <label for="tglditerima">Tanggal Arsip</label>
                                <input value="{{old('tgl_arsip')}}" name="tgl_arsip" type="date" class="form-control bg-light"
                                    id="tgldiarsip" required>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">File</label>
                                    <input name="filemasuk" type="file" class="form-control-file" id="exampleFormControlFile1"
                                        required>
                                    <small id="exampleFormControlFile1" class="text-danger">
                                        Pastikan file anda ( jpg,jpeg,png,doc,docx,pdf ) !!!
                                    </small>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-success btn-sm "><i class="fas fa-save"></i> SIMPAN</button>
                        <a class="btn btn-danger btn-sm" href={{route('arsip.index')}} role="button"><i class="fas fa-undo"></i> BATAL</a>
                    </div>
                </div>
            </div>
        </div>
@stop