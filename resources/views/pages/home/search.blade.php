@extends('layouts.home')

@section('content')
    <!-- Content -->
    <div class="container mt-5 content" id="content">
        <div class="row">
            <!-- Navigation FIlter -->
            @include('partials.navigation')

            <!-- Pesantren List -->
            <div class="col-md-9 content-pesantren">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="mt-3">
                            <form action="{{ route('pesantren.search') }}" method="post">
                                @csrf
                                <input type="search" name="keyword" class="form-control rounded-pill shadow"
                                    placeholder="Masukkan kata kunci pencarian..." />
                            </form>
                        </div>

                        <div class="mt-5">
                            <div class="row list-pesantrens">

                                <div class="text-center text-secondary mt-3 mb-5">
                                    {{ $keyword }}
                                </div>

                                @if (count($pesantrens) != 0)
                                    @foreach ($pesantrens as $pesantren)
                                        <!-- Pesantren Card -->
                                        <div class="col-md-4 mb-3">
                                            <div class="card card-pesantren">
                                                <img src="{{ asset('assets/img/thumbnail.png') }}" class="card-img-top"
                                                    alt="Thumbnail" height="220" />
                                                <div class="card-body text-center">
                                                    <small class="card-title fw-bolder">
                                                        {{ $pesantren->nama }}
                                                    </small>
                                                    <p class="card-text text-secondary">
                                                        <small><b>Pengasuh</b> <br />
                                                            {{ $pesantren->pengasuh }}</small>
                                                        <br>
                                                        <small> <b>Jarak</b> <br />
                                                            <i class="bi bi-plus-slash-minus"></i>
                                                            @if ($pesantren->jarak >= 1000)
                                                                {{ $pesantren->jarak / 1000 }} km
                                                            @else
                                                                {{ $pesantren->jarak }} m
                                                            @endif
                                                        </small>
                                                        <br>
                                                        <small> <b>Penerimaan</b> <br />
                                                            @if ($pesantren->pa_pi == 'pa_pi')
                                                                Putra / Putri
                                                            @elseif ($pesantren->pa_pi == 'pa')
                                                                Putra
                                                            @elseif ($pesantren->pa_pi == 'pi')
                                                                Putri
                                                            @endif
                                                        </small>
                                                    </p>
                                                    <a href="{{ route('pesantren.detail', ['pesantren' => $pesantren->slug]) }}"
                                                        class="btn btn-outline-primary btn-sm col-md-12">Detail
                                                        <i class="bi bi-chevron-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-center text-secondary mt-3 mb-5">
                                        Pesantren Tidak Ditemukan dengan kata kunci <b>{{ $keyword }}</b>
                                    </div>
                                @endif

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
