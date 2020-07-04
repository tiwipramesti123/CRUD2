@extends('template.index')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container">
        <div class="card mb-3" style="max-width: 25rem;">
            <div class="card-header bg-success"><h3 class="text-center">{{ $pertanyaan->judul }}</h3></div>
            <div class="card-body">
                    <h5 class="card-title">{{$pertanyaan->isi_pertanyaan}}</h5>
                    <div class="">
                        <span class="text-muted">dibuat : {{$pertanyaan->created_at->format('d F Y')}}</span>
                        <span class="text-muted">diupdate : {{$pertanyaan->updated_at->format('d F Y')}}</>  
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($jawaban as $data)
                            <li class="list-group-item text-right">{{$data->isi_jawaban}} - {{ $data->created_at->format('d F Y')}}</li>
                        @endforeach
                    </ul>
                <a href="{{ url('pertanyaan/'.$pertanyaan->id.'/edit') }}" class="card-link" title="edit pertanyaan"><i class="fa fa-edit text-success"></i>Edit Pertanyaan</a>
                <a href="#" class="card-link" title="hapus pertanyaan" data-toggle="modal" data-target="#modalDelete"><i class="fa fa-trash text-danger"></i>Hapus Pertanyaan</a>
                <!-- Modal -->
                <form action="{{ url('pertanyaan/'.$pertanyaan->id) }}" method="POST">
                @csrf
                @method('delete')
                    <div class="modal fade" id="modalDelete" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-body">
                            <h3>Kamu yakin menghapus pertanyaan ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Yakin</button>
                        </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <form action="{{url('jawaban/'.$pertanyaan->id)}}" method="POST">
            <div class="card-footer d-flex justify-content-end">
            @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="jawaban" placeholder="Masukkan jawaban anda">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit" id="">Button</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    
    </div>
  </div>
  <!-- /.content-wrapper -->
@endsection
