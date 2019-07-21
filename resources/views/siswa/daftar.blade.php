@extends('layouts.header')
@section('title', 'cariguru.com | Daftar Kelas')
@section('content')
  <section>
    <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
          <h1 class="mb-4 text-center">Tambah Kelas</h1>
          <form method="post" action="/daftarkelas/{{$kelas->id}}" enctype="multipart/form-data" accept-charset="UTF-8">
             {{ csrf_field() }}
            <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
              <input type="hidden" id="kelas_id" name="kelas_id" class="form-control" value="{{ $kelas->id }}" required>
              @if ($errors->has('kelas_id'))
                  <span class="help-block">
                      <strong>{{ $errors->first('kelas_id') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
              <input type="hidden" id="user_id" name="user_id" class="form-control" value="{{ $user->id }}" required>
              @if ($errors->has('kelas_id'))
                  <span class="help-block">
                      <strong>{{ $errors->first('kelas_id') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('guru') ? ' has-error' : '' }}">
              <input type="hidden" id="jumlah" name="jumlah" class="form-control" value="{{ $request->jumlah }}" required>
              @if ($errors->has('jumlah'))
                  <span class="help-block">
                      <strong>{{ $errors->first('jumlah') }}</strong>
                  </span>
              @endif
            </div>
            @for ($i = 1; $i <= $request->jumlah; $i++)
              <div class="form-group{{ $errors->has('nama'.$i) ? ' has-error' : '' }}">
                <input type="text" id="nama{{$i}}" name="nama{{$i}}" class="form-control" placeholder="Nama Siswa {{$i}}" value="{{ old('nama'.$i) }}" required>
                @if ($errors->has('nama'.$i))
                    <span class="help-block">
                        <strong>{{ $errors->first('nama'.$i) }}</strong>
                    </span>
                @endif
              </div>
            @endfor
            <div class="form-group{{ $errors->has('biaya') ? ' has-error' : '' }}">
              <input type="number" id="total_biaya" name="total_biaya" class="form-control" placeholder="Total Biaya Kursus" value="{{ $kelas->biaya * $request->jumlah }}" required readonly>
              @if ($errors->has('biaya'))
                  <span class="help-block">
                      <strong>{{ $errors->first('biaya') }}</strong>
                  </span>
              @endif
            </div>
            <button type="submit" class="btn btn-primary text-center">Tambahkan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  </section>
@endsection
