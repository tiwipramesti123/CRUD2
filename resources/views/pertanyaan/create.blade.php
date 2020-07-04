@extends('template.index')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <div class="card">
        <div class="card-body">
            <form action="{{url('/pertanyaan')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="judul">Judul Pertanyaan</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{old('judul')}}" placeholder="Ketik judul pertanyaan">
                    @error('judul')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="isi">Isi Pertanyaan</label>
                    <input type="text" class="form-control @error('isi') is-invalid @enderror" id="isi" name="isi" value="{{old('isi')}}"placeholder="Tuliskan pertanyaan anda">
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
