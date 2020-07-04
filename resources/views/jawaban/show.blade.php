@extends('template.index')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <div class="card mt-5">
        <div class="card-header">
            Pertanyaan : {{$pertanyaan->isi_pertanyaan}}
        </div>
        <ul class="list-group list-group-flush">
        <li class="list-group-item bg-success"> Jawaban dari pertanyaan di atas adalah :</li>
        @foreach($jawaban as $data)
            <li class="list-group-item bg-secondary">{{ $data->isi_jawaban}}</li>  
        @endforeach
        </ul>
        </div>
  </div>
  <!-- /.content-wrapper -->
@endsection
