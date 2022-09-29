@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ $title }}
            <small>Detail Pesantren</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Pesantren</a></li>
            <li class="active">{{ $title }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-7">
                <div class="box">
                    <div class="box-body">
                        <div class="p-2">
                            <img src="{{ asset($pesantren->image) }}" alt="{{ $pesantren->nama }}" class="image-responsive">
                            <div class="mt-2 text-justify">
                                {!! nl2br($pesantren->content) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Detail</h3>
                    </div>
                    <div class="box-body">
                        <div class="row mb-1">
                            <div class="col-md-4">Nama Pesantren</div>
                            <div class="col-md-8"><b>{{ $pesantren->nama }}</b></div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-4">Pengasuh</div>
                            <div class="col-md-8"><b>{{ $pesantren->pengasuh }}</b></div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-4">Alamat</div>
                            <div class="col-md-8"><b>{{ $pesantren->alamat }}</b></div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-4">Jarak</div>
                            <div class="col-md-8"><b>{{ $pesantren->jarak }}</b></div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-4">Konsentrasi</div>
                            <div class="col-md-8">
                                @foreach ($pesantren->konsentrasis as $konsentrasi)
                                    <input type="checkbox" checked disabled> {{ $konsentrasi->name }} <br>
                                @endforeach
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-4">Jenjang Santri</div>
                            <div class="col-md-8">
                                @foreach ($pesantren->jenjangs as $jenjang)
                                    <span class="badge bg-primary">{{ $jenjang->name }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-4">Kontak</div>
                            <div class="col-md-8"><b>{{ $pesantren->kontak }}</b></div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-4">Putra/Putri</div>
                            <div class="col-md-8">
                                <b>
                                    @if ($pesantren->pa_pi == 'pa_pi')
                                        Putra/Putri
                                    @elseif ($pesantren->pa_pi == 'pa')
                                        Putra
                                    @elseif ($pesantren->pa_pi == 'pi')
                                        Putri
                                    @endif
                                </b>
                            </div>
                        </div>
                        @if ($pesantren->pa_pi == 'pa_pi')
                            <div class="row mb-1">
                                <div class="col-md-4">Jumlah Santri Putra</div>
                                <div class="col-md-8"><b>{{ $pesantren->jumlah_santri_pa }}</b></div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-md-4">Jumlah Santri Putri</div>
                                <div class="col-md-8"><b>{{ $pesantren->jumlah_santri_pi }}</b></div>
                            </div>
                        @elseif ($pesantren->pa_pi == 'pa')
                            <div class="row mb-1">
                                <div class="col-md-4">Jumlah Santri Putra</div>
                                <div class="col-md-8"><b>{{ $pesantren->jumlah_santri_pa }}</b></div>
                            </div>
                        @elseif ($pesantren->pa_pi == 'pi')
                            <div class="row mb-1">
                                <div class="col-md-4">Jumlah Santri Putri</div>
                                <div class="col-md-8"><b>{{ $pesantren->jumlah_santri_pi }}</b></div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="box">
                    <div class="box-header">Media Sosial</div>
                    <div class="box-body p-2">
                        <a href="#" class="btn btn-block btn-social btn-facebook">
                            <i class="fa fa-facebook"></i> {{ $pesantren->facebook }}
                        </a>
                        <a href="#" class="btn btn-block btn-social btn-foursquare">
                            <i class="fa fa-instagram"></i> {{ $pesantren->instagram }}
                        </a>
                        <a href="#" class="btn btn-block btn-social btn-danger">
                            <i class="fa fa-youtube"></i> {{ $pesantren->youtube }}
                        </a>
                        <a href="{{ $pesantren->website }}" class="btn btn-block btn-social btn-github" target="blank">
                            <i class="fa fa-globe"></i> {{ $pesantren->nama }}
                        </a>
                    </div>
                </div>

                <div class="box">
                    <div class="box-header">Rincian Biaya</div>
                    <div class="box-body p-2">
                        <button type="button" class="btn btn-primary col-md-12 mb-2" data-toggle="modal"
                            data-target="#modal-import">
                            <i class="fa fa-upload"></i> Import Rincian Biaya
                        </button>
                        <div class="mt-2">
                            <table class="table table-hover">
                                <tr>
                                    <th>No</th>
                                    <th>Keterangan</th>
                                    <th>Biaya</th>
                                    <th>Aksi</th>
                                </tr>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($pesantren->biayas as $biaya)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $biaya->description }}</td>
                                        <td>{{ $biaya->value }}</td>
                                        <td>
                                            <form action="{{ route('pesantren.biaya.delete') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $biaya->id }}">
                                                <button type="submit"
                                                    class="btn btn-danger btn-sm col-md-12 mb-1 show_confirm"
                                                    data-toggle="tooltip" title='Delete'><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="box-header">Galeri</div>
                    <div class="box-body p-2">
                        <button type="button" class="btn btn-primary col-md-12 mb-2" data-toggle="modal"
                            data-target="#modal-galeri">
                            <i class="fa fa-plus"></i> Tambahkan Galeri
                        </button>
                        <div>
                            @foreach ($pesantren->galeris as $galeri)
                                <img src="{{ asset($galeri->image) }}" alt="Galeri {{ $pesantren->nama }}"
                                    class="image-square">
                                <div onclick="confirmDelete()">
                                    <form action="{{ route('pesantren.galeri.delete') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $galeri->id }}">
                                        <button type="submit" class="btn btn-danger btn-sm col-md-12 mb-1 show_confirm"
                                            data-toggle="tooltip" title='Delete'><i class="fa fa-trash"></i> Hapus
                                            Galeri</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="box-body">
                        <iframe src="{!! $pesantren->maps_url !!}" class="box-maps" style="border:0;" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Modal Add Galeri --}}
    <div class="modal fade" id="modal-galeri">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('pesantren.galeri.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $pesantren->id }}">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tambahkan Galeri</h4>
                    </div>
                    <div class="modal-body">
                        <label for="exampleInputFile">Choose Image</label>
                        <input type="file" name="galeri[]" id="galeri" multiple>

                        <p class="help-block">
                            <small>Maksimal <b>500Kb</b>, Format file <b>jpg, jpeg, png</b></small>
                        </p>
                        @error('galeri')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Import --}}
    <div class="modal fade" id="modal-import">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('pesantren.biaya.import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $pesantren->id }}">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Import Rincian Biaya</h4>
                    </div>
                    <div class="modal-body">
                        <label for="exampleInputFile">Choose File <a href="#" type="button" data-toggle="modal"
                                data-target="#modal-help">
                                <i class="fa fa-info-circle"></i> Petunjuk
                            </a></label>
                        <input type="file" name="biaya" id="biaya" required>

                        <p class="help-block">
                            <small>Format file <b>csv / xlsx</b></small>
                        </p>
                        @error('galeri')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Help --}}
    <div class="modal fade" id="modal-help">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambahkan Galeri</h4>
                </div>
                <div class="modal-body">

                    <ol>
                        <li>Siapkan file csv / xlsx</li>
                        <li>Pastikan format document memiliki field <b>description</b> berisi keterangan biaya dan field
                            <b>value</b> berisi nominal biaya yang harus dibayarkan, contoh seperti gambar dibawah ini :
                        </li>
                        <div class="card rounded bg-dark p-2">
                            <img src="{{ asset('assets/img/help-5.png') }}" alt="Help 5" class="image-responsive">
                        </div>
                        <li>Kemudian klik submit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
