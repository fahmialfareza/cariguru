@extends('layouts.header')
@section('title', 'cariguru.com | Kelas')
@section('content')
  {{-- @include('user.sidenav') --}}

<div class="container">
    <div class="row">
        <div class="panel panel-default">
          <div class="panel-heading">Kelas</div>
          <div class="panel-body">
              <div class="col-md-1">
                <b>ID</b>
              </div>
              <div class="col-md-2">
                <b>Nama Kelas</b>
              </div>
              <div class="col-md-2">
                <b>Guru</b>
              </div>
              <div class="col-md-2">
                <b>Periode</b>
              </div>
              <div class="col-md-1">
                <b>Jumlah</b>
              </div>
              <div class="col-md-2">
                <b>Biaya</b>
              </div>
              <div class="col-md-2">
                <b>Aksi</b>
              </div>
              @forelse ($kelas as $kel)
                <div class="row">
                <br>
                <div class="col-md-1">
                  {{ $kel->id }}
                </div>
                <div class="col-md-2">
                  {{$kel->kelas->nama}}
                </div>
                <div class="col-md-2">
                  {{$kel->kelas->guru}}
                </div>
                <div class="col-md-2">
                  {{$kel->kelas->mulai}} - {{$kel->kelas->sampai}}
                </div>
                <div class="col-md-1">
                  {{$kel->jumlah}} orang
                </div>
                <div class="col-md-2">
                    {{$kel->total_biaya}}
                </div>
                <div class="col-md-2">
                    <a type="button" class="btn btn-default get" href="/detailkelas/{{$kel->kelas->id}}">Lihat Kelas</a>
                </div>
                <br>
              </div>
              @empty
                <div class="col-md-5 center">
                  <h3>Belum Ada Kelas Dibuka</h3>
                </div>
              @endforelse
            </div>
            <a type="button" class="btn btn-default get" href="/tambahkelas">Tambah Kelas</a>
            <br>
        </div>
    </div>
</div>
@endsection
