@extends('layouts.header')
@section('title', 'KursusKuy | Tempat Kursus')
@section('content')
  <div class="container-fluid">
    <!--awal dari conta-->
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <!--level1-->
        <h2>Deskripsi {{$kelas->nama}}</h2>
        <hr>
        <div class="row">
          <div class="col-md-3">
            <!--level2 gambar-->
            <div class="thumbnail">
              <img src="/images/kelas/{{ $kelas->foto }}" alt=""> </div>
          </div>
          <div class="col-md-5">
            <!--level2 deskripsi-->
            @if ($kelas->siswakelas)
              @if ($kelas->siswakelas->user_id == Auth::user()->id)
                <b>Silahkan add Whatsapp dengan klik link yang tertera di bawah ini!</b>
                <p><b>Whatsapp : <a href="{{$kelas->groupwa}}">{{$kelas->groupwa}}</a> </b></p>
              @else
              @endif
            @endif
            <p><b>Deskripsi : </b>
              <br>
              {!!nl2br($kelas->deskripsi)!!}</p>
            <p><b>Guru </b> : {{$kelas->guru}}</p>
            <p><b>Periode </b> : {{$kelas->mulai}} sampai {{$kelas->sampai}}</p>
            @if ($kelas->siswakelas)
              <p><b>Total Biaya </b> : Rp {{number_format( $kelas->siswakelas->total_biaya , 2 , ',' , '.' )}}</p>
            @else
              <p><b>Biaya </b> : Rp {{number_format( $kelas->biaya , 2 , ',' , '.' )}}</p>
            @endif
          </div>
          @if ($kelas->siswakelas)
          @else
            <form action="/daftarkelas/{{$kelas->id}}" method="get">
              {{ csrf_field() }}
              <select class="form-control" id="jumlah" style="width: 250px;" name="jumlah" required>
                <option value="1"><b>1 orang</b></option>
                <option value="2"><b>2 orang</b></option>
                <option value="3"><b>3 orang</b></option>
                <option value="4"><b>4 orang</b></option>
                <option value="5"><b>5 orang</b></option>
              </select>
              <span><button type="submit" class="btn btn-primary">Daftar</button></span>
            </form>
          @endif
        </div>
      </div>
      <hr> </div>
  </div>
  <br>
@endsection
