@extends('layouts.home')

@section('content')
    <!--about-us start -->
	<section id="home" class="about-us">
		<div class="container">
			<div class="about-us-content">
				<div class="row">
					<div class="col-sm-12">
						<div class="single-about-us">
							<div class="about-us-txt">
								<h2>Infotren (Sistem Informasi Pondok Pesantren)</h2>
								<div class="about-btn">
									<button class="about-view" onclick="location.href = '#search-box'">cari pesantren</button>
								</div>
								<!--/.about-btn-->
							</div>
							<!--/.about-us-txt-->
						</div>
						<!--/.single-about-us-->
					</div>
					<!--/.col-->
					<div class="col-sm-0">
						<div class="single-about-us"></div>
						<!--/.single-about-us-->
					</div>
					<!--/.col-->
				</div>
				<!--/.row-->
			</div>
			<!--/.about-us-content-->
		</div>
		<!--/.container-->
	</section>
	<!--/.about-us-->
	<!--about-us end -->

	<!--travel-box start-->
	<section class="travel-box" id="search-box">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="single-travel-boxes">
						<div id="desc-tabs" class="desc-tabs">

							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active fade in" id="tours">
									<div class="tab-para">
										<div class="row">

											<form action="{{ route('pesantren.search') }}" method="post">
                                                @csrf
												<div class="col-lg-2 col-md-2 col-sm-12">
													<div class="single-tab-select-box">
														<h2>konsentrasi</h2>

														<div class="travel-select-icon">
															<select class="form-control" name="konsentrasi">
																<option value="default">
																	pilih konsentrasi
																</option>
																<!-- /.option-->
                                                                @foreach ($konsentrasis as $konsentrasi)
                                                                <option value="{{ $konsentrasi->slug }}">{{ $konsentrasi->name }}</option>
                                                                @endforeach

															</select><!-- /.select-->
														</div>
													</div>
													<!--/.single-tab-select-box-->
												</div>
												<!--/.col-->

												<div class="col-lg-2 col-md-2 col-sm-12">
													<div class="single-tab-select-box">
														<h2>jenjang</h2>

														<div class="travel-select-icon">
															<select class="form-control" name="jenjang">
																<option value="default">
																	pilih jenjang
																</option>
																<!-- /.option-->

																@foreach ($jenjangs as $jenjang)
                                                                <option value="{{ $jenjang->slug }}">{{ $jenjang->name }}</option>
                                                                @endforeach

															</select><!-- /.select-->
														</div>
													</div>
													<!--/.single-tab-select-box-->
												</div>
												<!--/.col-->

												<div class="col-lg-5 col-md-3 col-sm-4">
													<div class="single-tab-select-box">
														<h2>Kata Kunci pencarian</h2>
														<div>
															<input type="text" name="keyword" class="form-control"
																placeholder="kata kunci pencarian"
																style="padding: 22px 20px; margin: 8px 0;" />
														</div>
														<!-- /.travel-check-icon -->
													</div>
													<!--/.single-tab-select-box-->
												</div>
												<!--/.col-->

												<div class="col-lg-3 col-md-2 col-sm-3">
													<div class="about-btn travel-mrt-0 pull-right">
														<button class="about-view travel-btn" type="submit"
															style="margin-top: 22px;">cari</button><!--/.travel-btn-->
													</div>
													<!--/.about-btn-->
												</div>
											</form>
											<!--/.row-->
										</div>
										<!--/.tab-para-->
									</div>
									<!--/.tabpannel-->

								</div>
								<!--/.tab content-->
							</div>
							<!--/.desc-tabs-->
						</div>
						<!--/.single-travel-box-->
					</div>
					<!--/.col-->
				</div>
				<!--/.row-->
			</div>
			<!--/.container-->
	</section>
	<!--/.travel-box-->
	<!--travel-box end-->

	<!--packages start-->
	<section id="pack" class="packages">
		<div class="container">
			<div class="gallary-header text-center">
				<h2>Pondok Pesantren</h2>
				<p>
					Daftar Pondok Pensatren
				</p>
			</div>
			<!--/.gallery-header-->
			<div class="packages-content">
				<div class="row">

                    @foreach ($pesantrens as $pesantren)
                    <div class="col-md-4 col-sm-6">
						<div class="single-package-item">
							<img src="{{ asset($pesantren->image) }}"/>
							<div class="single-package-item-txt">
								<h3>{{ $pesantren->nama }}</h3>
								<div class="packages-para">
									<p>
										<span>
											<i class="fa fa-angle-right"></i> Pengasuh
										</span>
										<b>{{$pesantren->pengasuh}}</b>
									</p>
									<p>
										<span>
											<i class="fa fa-angle-right"></i> Peneriamaan
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
								</div>
								<div class="about-btn">
									<a class="my-btn" href="{{ route('pesantren.detail', $pesantren->slug) }}">Detail</a>
								</div>
								<!--/.about-btn-->
							</div>
							<!--/.single-package-item-txt-->
						</div>
						<!--/.single-package-item-->
					</div>
                    @endforeach

				</div>
				<!--/.row-->

                <center style="margin-top: 20px">
                    {{ $pesantrens->links() }}
                </center>
			</div>
			<!--/.packages-content-->
		</div>
		<!--/.container-->
	</section>
	<!--/.packages-->
	<!--packages end-->

@endsection
