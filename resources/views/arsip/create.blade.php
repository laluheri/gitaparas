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
                                    <select name="asal_surat" id='select2' class="select2 custom-select my-1 mr-sm-2 bg-light" id="inlineFormCustomSelectPref"
                                    required>
                                    <option selected="selected">-- Pilih Asal Surat --</option>
                                    @foreach($instansi as $instansi)
                                    <option value="{{$instansi->nama}}">{{$instansi->nama}}</option>
                                    @endforeach
                                    <option value="lainnya" class="otherSelected">LAINNYA</option>
                                </select>
                                <input value="" name="asal_surat_lain" type="hidden" class="form-control bg-light"
                                    id="asalSuratlain" placeholder="Asal Surat" required>
                                <label for="kode">Kode Klasifikasi</label>
                                <select name="klasifikasiId" class=" select2 custom-select my-1 mr-sm-2 bg-light" id=""
                                required>
                                <option selected="selected">-- Pilih Klasifikasi Surat --</option>
                                @foreach($data_klasifikasi as $klasifikasi)
                                <option value="{{$klasifikasi->id}}">{{$klasifikasi->nama}} ( {{$klasifikasi->kode}} )
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

                                <label for="jra">Masa Kadualuarsa</label>
                                <select name="jra" class=" custom-select my-1 mr-sm-2 bg-light"
                                required>
                                <option value="1" >1 Tahun</option>
                                <option value="2" >2 Tahun</option>
                                <option value="3" >3 Tahun</option>
                                <option value="4" >4 Tahun</option>
                                <option value="5" selected="selected">5 Tahun</option>
                                <option value="6">6 Tahun</option>
                                <option value="7">7 Tahun</option>
                                <option value="8">8 Tahun</option>
                                <option value="9">9 Tahun</option>
                                <option value="10">10 Tahun</option>
                                </select>
                                
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


@push('js')
 <script>

     $('.select2').select2();

     $('#select2').change(function(){
         if($(this).val() === "lainnya"){
             $('#asalSuratlain').attr('type', 'text');
         }else{
             $('#asalSuratlain').attr('type', 'hidden');
         }
     });
     
 </script>
@endpush