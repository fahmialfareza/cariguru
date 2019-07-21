@extends('layouts.header')
@section('title', 'cariguru.com | Edit Kelas')
@section('content')
  <section>
    <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
          <h1 class="mb-4 text-center">Edit Kelas</h1>
          <form method="post" action="/updatekelas/{{$kelas->id}}" enctype="multipart/form-data" accept-charset="UTF-8">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
              <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Kelas" value="{{$kelas->nama}}" required>
              @if ($errors->has('nama'))
                  <span class="help-block">
                      <strong>{{ $errors->first('nama') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
              <textarea type="text" id="deskripsi" name="deskripsi" class="form-control" placeholder="Deskripsi" value="{{ old('deskripsi') }}" required>{{$kelas->deskripsi}}</textarea>
              @if ($errors->has('deskripsi'))
                  <span class="help-block">
                      <strong>{{ $errors->first('deskripsi') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('guru') ? ' has-error' : '' }}">
              <input type="text" id="guru" name="guru" class="form-control" placeholder="Nama Guru" value="{{$kelas->guru}}" required>
              @if ($errors->has('guru'))
                  <span class="help-block">
                      <strong>{{ $errors->first('guru') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('mulai') ? ' has-error' : '' }}">
              <label for="">Mulai</label>
              <input type="date" id="mulai" name="mulai" value="{{$kelas->mulai}}">
              <label for="">Sampai</label>
              <input type="date" id="sampai" name="sampai" value="{{$kelas->sampai}}">
            </div>
            <div class="form-group{{ $errors->has('groupwa') ? ' has-error' : '' }}">
              <input type="text" id="groupwa" name="groupwa" class="form-control" placeholder="Link Grup WA (http://)" value="{{$kelas->groupwa}}" required>
              @if ($errors->has('groupwa'))
                  <span class="help-block">
                      <strong>{{ $errors->first('groupwa') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
              <input type="file" name="foto" value="">
              @if ($errors->has('foto'))
                  <span class="help-block">
                      <strong>{{ $errors->first('foto') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('biaya') ? ' has-error' : '' }}">
              <input type="number" id="biaya" name="biaya" class="form-control" placeholder="Biaya Kursus" value="{{$kelas->biaya}}" required>
              @if ($errors->has('biaya'))
                  <span class="help-block">
                      <strong>{{ $errors->first('biaya') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('tampil') ? ' has-error' : '' }}">
              <label for="">Tampilkan</label>
              <input type="checkbox" name="tampil" id="tampil"
                @if ($kelas->tampil = 1)
                  value="1" checked
                @else
                  value="0"
                @endif>
              @if ($errors->has('tampil'))
                  <span class="help-block">
                      <strong>{{ $errors->first('tampil') }}</strong>
                  </span>
              @endif
            </div>
            <button type="submit" class="btn btn-primary text-center">Edit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  </section>
@endsection
