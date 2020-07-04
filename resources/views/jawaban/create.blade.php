@extends('template.index')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <div class="card">
        <div class="card-body">
            <form action="{{url('jawaban/'.$pertanyaan->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="pertanyaan">Pertanyaan</label>
                    <input type="text" class="form-control @error('pertanyaan') is-invalid @enderror" id="pertanyaan" name="pertanyaan" readonly value="{{$pertanyaan->isi_pertanyaan}}" placeholder="Ketik judul pertanyaan">
                    @error('pertanyaan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jawaban">Isi jawaban</label>
                    <input type="text" class="form-control @error('jawaban') is-invalid @enderror" id="jawaban" name="jawaban" value="{{old('jawaban')}}"placeholder="Tuliskan jawaban anda">
                    @error('jawaban')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan jawaban</button>
            </form>
        </div>
    </div>
  </div>
  <!-- /.content-wrapper -->
@endsection
