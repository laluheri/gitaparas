@extends('adminlte::page')

@section('title', 'dashboard')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                          <!-- small box -->
                          <div class="small-box bg-info">
                            <div class="inner">
                              <h3>{{ $instansi }}</h3>
              
                              <p>Jumlah Instansi</p>
                            </div>
                            <div class="icon">
                              <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                        </div>
                        
                        <div class="col-lg-3 col-6">
                          <!-- small box -->
                          <div class="small-box bg-success">
                            <div class="inner">
                              <h3>{{$klasifikasi}}</sup></h3>
              
                              <p>Jumlah Klasifikasi Surat</p>
                            </div>
                            <div class="icon">
                              <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                        </div>
                        <div class="col-lg-3 col-6">
                          <!-- small box -->
                          <div class="small-box bg-warning">
                            <div class="inner">
                              <h3>{{ $arsip }}</h3>
              
                              <p>Jumlah Arsip</p>
                            </div>
                            <div class="icon">
                              <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                        </div>
                        
                        <div class="col-lg-3 col-6">
                          <!-- small box -->
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <h3>{{$arsip_kadaluarsa}}<sup style="font-size: 20px"></sup></h3>
              
                              <p>Jumlah Arsip Kadluarsa</p>
                            </div>
                            <div class="icon">
                              <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                        </div>
                    </div>
               
        </div>
    </div>

    {{-- table jumlah arsip per opd --}}
    <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
                  @if (Auth::user()->role == 'admin')
                  <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama OPD</th>
                        <th>Jumlah Arsip</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($arsip_opd as $key => $arsip)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$arsip->users->name}}</td>
                            <td>{{$arsip->total}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                  @else    
                  <table class="table table-hover table-bordered table-stripped" id="example2">
                      <thead>
                      <tr>
                          <th>No.</th>
                          <th>Kode Klasifikasi</th>
                          <th>Jenis Klasifikasi</th>
                          <th>Jumlah Arsip</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach( $klasifikasi_arsip_opd as $key =>  $klasifikasi)
                          <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$klasifikasi->klasifikasi->kode}}</td>
                              <td>{{$klasifikasi->klasifikasi->nama}}</td>
                              <td>{{$klasifikasi->total}}</td>
                          </tr>
                      @endforeach
                      </tbody>
                  </table>
                  @endif

              </div>
          </div>
      </div>
  </div>

    {{-- end table --}}
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