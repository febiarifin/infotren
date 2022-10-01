@extends('layouts.home')

@section('content')
    <!-- Content -->
    <div class="container-fluid mt-5 mb-5" id="content">
        <div class="row">
            <div class="col-md-12 text-center mb-4">
                <h3>{{ $pesantren->nama }}</h3>
                <span class="fs-6 text-secondary">{{ $pesantren->alamat }}</span>
            </div>
            <div class="col-md-8 mb-3">
                <div class="card shadow mb-3">
                    <img src="{{ asset($pesantren->image) }}" alt="" class="fluid">
                    <div class="mt-3 p-3 text-justify">
                        {!! nl2br($pesantren->content) !!}
                    </div>
                </div>

                @if (count($pesantren->galeris) != 0)
                    <div class="card shadow">
                        <div class="card-header">Galeri Pesantren</div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($pesantren->galeris as $galeri)
                                    <div class="col-md-4">
                                        <img src="{{ asset($galeri->image) }}" alt="{{ $galeri->description }}"
                                            class="img-thumbnail">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

            </div>

            <div class="col-md-4 mb-3">
                <!-- Identitas Pesantren -->
                <div class="card shadow mb-3">
                    <div class="card-header">Identitas Pesantren</div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-4">
                                <small>Nama Pesantren</small>
                            </div>
                            <div class="col-8">
                                <small>{{ $pesantren->nama }}</small>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-4">
                                <small>Pengasuh</small>
                            </div>
                            <div class="col-8">
                                <small>{{ $pesantren->pengasuh }}</small>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-4">
                                <small>Alamat</small>
                            </div>
                            <div class="col-8">
                                <small>{{ $pesantren->alamat }}</small>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-4">
                                <small>Jarak</small>
                            </div>
                            <div class="col-8">
                                <small>
                                    @if ($pesantren->jarak >= 1000)
                                        {{ $pesantren->jarak / 1000 }} km
                                    @else
                                        {{ $pesantren->jarak }} m
                                    @endif
                                </small>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-4">
                                <small>Konsentrasi</small>
                            </div>
                            <div class="col-8">
                                @foreach ($pesantren->konsentrasis as $konsentrasi)
                                    <small><input type="checkbox" checked disabled> {{ $konsentrasi->name }}</small><br>
                                @endforeach
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-4">
                                <small>Jenjang</small>
                            </div>
                            <div class="col-8">
                                @foreach ($pesantren->jenjangs as $jenjang)
                                    <span class="badge bg-primary">{{ $jenjang->name }}</span>
                                @endforeach
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-4">
                                <small>Kontak</small>
                            </div>
                            <div class="col-8">
                                <small>{{ $pesantren->kontak }}</small>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-4">
                                <small>PA/PI</small>
                            </div>
                            <div class="col-8">
                                <small>
                                    @if ($pesantren->pa_pi == 'pa_pi')
                                        Putra / Putri
                                    @elseif ($pesantren->pa_pi == 'pa')
                                        Putra
                                    @elseif ($pesantren->pa_pi == 'pi')
                                        Putri
                                    @endif
                                </small>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-4">
                                <small>Lurah PA</small>
                            </div>
                            <div class="col-8">
                                <small>{{ $pesantren->lurah_pa }}</small>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-4">
                                <small>Lurah PI</small>
                            </div>
                            <div class="col-8">
                                <small>{{ $pesantren->lurah_pi }}</small>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-4">
                                <small>Jumlah Santri PA</small>
                            </div>
                            <div class="col-8">
                                <small>{{ $pesantren->jumlah_santri_pa }}</small>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-4">
                                <small>Jumlah Santri PI</small>
                            </div>
                            <div class="col-8">
                                <small>{{ $pesantren->jumlah_santri_pi }}</small>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-4">
                                <small>Instagram</small>
                            </div>
                            <div class="col-8">
                                <small>{{ $pesantren->instagram }}</small>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-4">
                                <small>Facebook</small>
                            </div>
                            <div class="col-8">
                                <small>{{ $pesantren->facebook }}</small>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-4">
                                <small>Youtube</small>
                            </div>
                            <div class="col-8">
                                <small>{{ $pesantren->youtube }}</small>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-4">
                                <small>Website</small>
                            </div>
                            <div class="col-8">
                                <small>
                                    @if ($pesantren->website != null)
                                        <a href="{{ $pesantren->website }}" class="text-decoration-none"
                                            target="_blank">{{ $pesantren->nama }}</a>
                                    @else
                                        -
                                    @endif
                                </small>
                            </div>
                        </div>

                    </div>
                </div>

                @if (count($pesantren->biayas) != 0)
                    <div class="card shadow mb-3">
                        <div class="card-header">Biaya Pendidikan</div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>No</th>
                                    <th>Keterangan</th>
                                    <th>Nominal</th>
                                </tr>
                                @php
                                    $no = 1;
                                    $jumlah = 0;
                                @endphp
                                @foreach ($pesantren->biayas as $biaya)
                                    @php
                                        $jumlah += $biaya->value;
                                    @endphp
                                    <tr>
                                        <td><small>{{ $no++ }}</small></td>
                                        <td><small>{{ $biaya->description }}</small></td>
                                        <td><small>Rp {{ number_format($biaya->value, 2) }}</small></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="2"><small><b>Jumlah</b></small></td>
                                    <td><small><b>Rp {{ number_format($jumlah, 2) }}</b></small></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                @endif

                <!-- Maps -->
                <div class="card shadow">
                    <iframe src="{!! nl2br($pesantren->maps_url) !!}" width="428" height="400" style="border:0;" class="card-maps"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>

    </div>
@endsection
