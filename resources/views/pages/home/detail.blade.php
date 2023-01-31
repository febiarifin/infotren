@extends('layouts.home')

@section('content')


	<!--about-us start -->
	<section id="home" class="about-us" style="background-image: url({{asset($pesantren->image)}});">
		<div class="container">
			<div class="about-us-content">
				<div class="row">
					<div class="col-sm-12">
						<div class="single-about-us">
							<div class="about-us-txt">
								<h3 class="my-text-title">{{ $pesantren->nama }}</h3>
								<div class="about-btn">
									<button class="about-view" onclick="location.href = '#detail'">Detail</button>
								</div>
								<!--/.about-btn-->
							</div>
							<!--/.about-us-txt-->
						</div>
						<!--/.single-about-us-->
					</div>
					<div class="col-sm-0">
						<div class="single-about-us"></div>
						<!--/.single-about-us-->
					</div>
				</div>

			</div>
			<!--/.about-us-content-->
		</div>
		<!--/.container-->
	</section>
	<!--/.about-us-->
	<!--about-us end -->

	<!--packages start-->
	<section id="detail" class="packages">
		<div class="container">
			<div class="gallary-header text-center">
				<h2>{{ $pesantren->nama }}</h2>
				<p>
					{{ $pesantren->alamat }}
				</p>
			</div>
			<!--/.gallery-header-->
			<div class="packages-content">
				<div class="row">
					<div class="col-md-8 col-sm-12">
						<div class="single-package-item">
							<div class="single-package-item-txt">
								<h3>{{ $pesantren->nama }}</h3>
								<div class="packages-para">
                                    <div style="color: #727272 !important; text-align:justify">
                                        {!! nl2br($pesantren->content) !!}

                                        <br><br>

                                        <div class="row">
                                            <div class="col-md-2">
                                                <p>Konsentrasi</p>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="my-badge-box">

                                                    @foreach ($pesantren->konsentrasis as $konsentrasi)
                                                    <small class="my-badge">{{ $konsentrasi->name }}</small>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <p>Jenjang</p>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="my-badge-box">
                                                    @foreach ($pesantren->jenjangs as $jenjang)
                                                    <small class="my-badge">{{ $jenjang->name }}</small>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
								</div>
							</div>
						</div>

                        <div class="single-package-item">
							<div class="single-package-item-txt">
								<div class="packages-para">
                                    <iframe src="{!! $pesantren->maps_url !!}" class="my-maps-box" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
								</div>
							</div>
						</div>

                        <div class="single-package-item">
							<div class="single-package-item-txt">
								<h3>Galeri</h3>
								<div class="packages-para">
                                    <div class="row">

                                        @foreach ($pesantren->galeris as $galeri)
                                        <div class="col-md-3">
                                            <img src="{{ asset($galeri->image) }}" alt="package-place" class="my-image-box"/>
                                        </div>
                                        @endforeach

                                    </div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4 col-sm-6">
						<div class="single-package-item">
							<div class="single-package-item-txt">
								<h3>Indentitas Pesantren</h3>
								<div class="packages-para">
									<p>
										<span>
										Nama Pesantren
										</span>
										<b>{{ $pesantren->nama }}</b>
									</p>

                                    <p>
										<span>
										Pengasuh
										</span>
										<b>{{ $pesantren->pengasuh }}</b>
									</p>

                                    <p>
										<span>
										Alamat
										</span>
										<b>{{ $pesantren->alamat }}</b>
									</p>

                                    <p>
										<span>
										Kontak
										</span>
										<b>{{ $pesantren->kontak }}</b>
									</p>

                                    <p>
										<span>
										PA/PI
										</span>
										<b>
                                            @if ($pesantren->pa_pi == 'pa_pi')
                                            PA/PI
                                            @elseif($pesantren->pa_pi == 'pa')
                                                PA
                                            @elseif($pesantren->pa_pi == 'pi')
                                                PI
                                            @endif
                                        </b>
									</p>

                                    <p>
										<span>
										Lurah PA
										</span>
										<b>{{ $pesantren->lurah_pa }}</b>
									</p>

                                    <p>
										<span>
										Lurah PI
										</span>
										<b>{{ $pesantren->lurah_pi }}</b>
									</p>

                                    <p>
										<span>
										Santri PA
										</span>
										<b>{{ $pesantren->jumlah_santri_pa }}</b>
									</p>

                                    <p>
										<span>
										Santri PI
										</span>
										<b>{{ $pesantren->jumlah_santri_pi }}</b>
									</p>

                                    <p>
										<span>
										Instagram
										</span>
										<b><a href="https://instagram.com/{{ $pesantren->instagram }}" target="_blank">{{ $pesantren->instagram }}</a></b>
									</p>

                                    <p>
										<span>
										Facebook
										</span>
										<b><a href="https://facebook.com/{{ $pesantren->facebook }}" target="_blank">{{ $pesantren->facebook }}</a></b>
									</p>

                                    <p>
										<span>
										YouTube
										</span>
										<b><a href="https://youtube.com/{{ $pesantren->youtube }}" target="_blank">{{ $pesantren->youtube }}</a></b>
									</p>

                                    <p>
										<span>
										Website
										</span>
										<b><a href="{{ $pesantren->website }}" target="_blank">{{ $pesantren->website }}</a></b>
									</p>
								</div>

								<!--/.about-btn-->
							</div>
							<!--/.single-package-item-txt-->
						</div>

                        <div class="single-package-item">
							<div class="single-package-item-txt">
								<h3>Biaya Pendidikan</h3>
								<div class="packages-para">
									@foreach ($pesantren->biayas as $biaya)
                                    <p>
										<span>
										{{ $biaya->description }}
										</span>
										<b>{{ $biaya->value }}</b>
									</p>
                                    @endforeach
								</div>

								<!--/.about-btn-->
							</div>
							<!--/.single-package-item-txt-->
						</div>
						<!--/.single-package-item-->
					</div>
				</div>

			</div>
			<!--/.packages-content-->
		</div>
		<!--/.container-->
	</section>
	<!--/.packages-->
	<!--packages end-->

@endsection
