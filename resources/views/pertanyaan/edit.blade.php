@extends('template.index')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <div class="card">
        <div class="card-body">
            <form action="{{url('pertanyaan/'.$pertanyaan->id)}}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="judul">Judul Pertanyaan</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ $pertanyaan->judul}}" placeholder="Ketik judul pertanyaan">
                    @error('judul')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="isi">Isi Pertanyaan</label>
                    <input type="text" class="form-control @error('isi') is-invalid @enderror" id="isi" name="isi" value="{{$pertanyaan->isi_pertanyaan}}" placeholder="Tuliskan pertanyaan anda">
                    @error('isi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
  </div>
  <!-- /.content-wrapper -->
@endsection
