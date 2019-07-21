@extends('layouts.header')
@section('title', 'KursusKuy | Home')
@section('content')
  <section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>Kursus Mobil</span></h1>
									<h2>Belajar Mobil dengan cepat</h2>
									<p>Jaminan 3x pertemuan lancar</p>
									<a type="button" class="btn btn-default get" href="/nonformal">Get it now</a>
								</div>
								<div class="col-sm-6">
									<img src="images/kursus_Mobil.jpg" class="img-responsive" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Kursus Bahasa Inggris</span></h1>
									<h2>Speaking more fluently</h2>
									<p>Like the BULE</p>
									<a type="button" class="btn btn-default get"href="/formal">Get it now</a>
								</div>
								<div class="col-sm-6">
									<img src="images/kursus_Inggris.jpg" class="img-responsive" alt="" />
								</div>
							</div>

							<div class="item">
								<div class="col-sm-6">
									<h1><span>Kursus Bahasa Prancis</span></h1>
									<h2>Bonjour les amis</h2>
									<p>Sympa de te parler</p>
									<a type="button" class="btn btn-default get" href="/formal">Get it now</a>
								</div>
								<div class="col-sm-6">
									<img src="images/kursus_Prancis.jpg" class="img-responsive" alt="" />
								</div>
							</div>

						</div>
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>

				</div>
			</div>
		</div>
	</section><!--/slider-->
  <section>
    <div class="row">
      <!--awal row-->
      <div class="col-md-10 col-md-offset-1">
        <!--awal box-->
        <h2>Daftar <small>Semua Kelas</small></h2>
        <hr>
        @forelse ($kelas as $kel)
          <div class="col-xs-6 col-sm-4 col-md-2">
            <div class="box box-primary">
              <div class="box-body box-profile">
                <a href="/detailkelas/{{ $kel->id }}">
                  <img class="img-responsive" src="/images/kelas/{{ $kel->foto }}" alt="Foto">
                <br> <span>{{$kel->nama}}</span> </a>
                <br> Mulai <b> Rp
                {{number_format( $kel->biaya , 2 , ',' , '.' )}}</b>
                <br> </div>
                <div class="box-footer box-profile"> <span class="fa fa-user"><span class="spantext"> {{$kel->guru}}</span>
                <br> <span class="glyphicon glyphicon-map-marker"></span><span class="spantext"> {{$kel->mulai}} - {{$kel->sampai}}</span> </span>
              </div>
            </div>
          </div>
        @empty
          <h1>Coming Soon</h1>
        @endforelse
      </div>
    </div>
    <div class="row">
      <!--awal row-->
      <br>
      <br>
      <div class="col-md-10 col-md-offset-1">
        <nav aria-label="Page navigation">
          <!--awal pagination-->
          <ul class="pagination">
            <li>
              {!! $kelas->links() !!}
            </li>
          </ul>
        </nav>
        <!--akhir pagination-->
      </div>
      <!--akhir thumbnail-->
    </div>
    <!--awal row-->
    <br>
    <br>
  </section>
@endsection
