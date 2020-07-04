@extends('template.index')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <div class="card">
        <div class="card-header">
            <h4>List Pertanyaan</h4>
            <a href="{{url('pertanyaan/create')}}" class="btn btn-primary rounded-pill btn-sm float-right" title="tambah pertanyaan"><i class="fa fa-plus"></i></a>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-success">
                {{ session('error') }}
            </div>
        @endif
        <div class="card-body">
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Isi Pertanyaan</th>
                  <th>Tanggal dibuat</th>
                  <th>Tanggal diedit</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($pertanyaan as $data)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$data->judul }}</td>
                      <td>{{$data->isi_pertanyaan }}</td>
                      <td>{{$data->created_at->format('d F Y H:i')}}</td>
                      <td>{{$data->updated_at->format('d F Y H:i')}}</td>
                      <td>
                          <div class="d-flex justify-content-center">
                              <a href="{{url('jawaban/'.$data->id.'/jawab')}}" class="btn btn-warning btn-sm rounded-pill mx-2" title="jawab pertanyaan"><i class="fa fa-plus"></i></a>
                              <a href="{{url('jawaban/'.$data->id)}}" class="btn btn-success btn-sm rounded-pill mx-2" title="lihat jawaban"><i class="fa fa-eye"></i></a>
                          </div>
                      </td>
                    </tr>                   
                  @endforeach
                </tbody>
          </table>
        </div>
    </div>
  </div>
  <!-- /.content-wrapper -->
@endsection





@push('jsDatatable')
<!-- DataTables -->
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script>
    $(document).ready(function(){
        $('#datatable').DataTable();
    });
</script>
@endpush

@push('cssDatatable')
<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">

  @endpush