@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ $title }}
            <small>Tabel Pesantren</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Pesantren</a></li>
            <li class="active">Tabel Pesantren</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Pesantren</h3>
                    </div>
                    <form action="{{ route('pesantren.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $pesantren->id }}">
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group col-md-6 @error('nama') has-error @enderror">
                                    <label class="control-label" for="inputError">Nama Pesantren</label>
                                    <input type="text" class="form-control" id="inputError" placeholder="Nama Pesantren"
                                        name="nama" value="{{ $pesantren->nama }}" required>
                                    @error('nama')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 @error('pengasuh') has-error @enderror">
                                    <label class="control-label" for="inputError">Pengasuh Pesantren</label>
                                    <input type="text" class="form-control" id="inputError"
                                        placeholder="pengasuh Pesantren" value="{{ $pesantren->pengasuh }}" name="pengasuh"
                                        required>
                                    @error('pengasuh')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 @error('alamat') has-error @enderror">
                                    <label class="control-label" for="inputError">Alamat Pesantren</label>
                                    <input type="test" class="form-control" id="inputError"
                                        value="{{ $pesantren->alamat }}" placeholder="Alamat Pesantren" name="alamat"
                                        required>
                                    @error('alamat')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 @error('maps_url') has-error @enderror">
                                    <label class="control-label" for="inputError">Url Google Maps <a href="#"
                                            type="button" data-toggle="modal" data-target="#modal-help">
                                            <i class="fa fa-info-circle"></i> Petunjuk
                                        </a></label>
                                    <input type="link" class="form-control" id="inputError"
                                        value="{{ $pesantren->maps_url }}"
                                        placeholder="https://goo.gl/maps/bLvbxs2m7crFn9XP7" name="maps_url">
                                    @error('maps_url')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 @error('jarak') has-error @enderror">
                                    <label class="control-label" for="inputError">Jarak Pesantren dari Unsiq</label>
                                    <input type="number" class="form-control" id="inputError"
                                        value="{{ $pesantren->jarak }}" placeholder="jarak Pesantren" name="jarak"
                                        required>
                                    @error('jarak')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 @error('kontak') has-error @enderror">
                                    <label class="control-label" for="inputError">Kontak Pesantren</label>
                                    <input type="text" class="form-control" id="inputError"
                                        placeholder="kontak Pesantren" value="{{ $pesantren->kontak }}" name="kontak"
                                        required>
                                    @error('kontak')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 @error('konsentrasi') has-error @enderror">
                                    <label class="control-label" for="inputError">Konsentrasi Pesantren</label>
                                    <div class="card rounded p-1">
                                        @foreach ($konsentrasis as $konsentrasi)
                                            <div>
                                                <input type="checkbox" name="konsentrasi[]" value="{{ $konsentrasi->id }}"
                                                    @foreach ($pesantren->konsentrasis as $konsentasiPesantren)
                                                    {{ $konsentrasi->id == $konsentasiPesantren->id ? 'checked' : '' }} @endforeach>
                                                {{ $konsentrasi->name }}
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('konsentrasi')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 @error('jenjang') has-error @enderror">
                                    <label class="control-label" for="inputError">Jenjang Pesantren</label>
                                    <div class="card rounded p-1">
                                        @foreach ($jenjangs as $jenjang)
                                            <div>
                                                <input type="checkbox" name="jenjang[]" value="{{ $jenjang->id }}"
                                                    @foreach ($pesantren->jenjangs as $jenjangPesantren)
                                                    {{ $jenjang->id == $jenjangPesantren->id ? 'checked' : '' }} @endforeach>
                                                {{ $jenjang->name }}
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('jenjang')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="inputError">Lurah Putra</label>
                                    <input type="text" class="form-control" id="inputError" placeholder="Lurah Putra"
                                        name="lurah_pa" value="{{ $pesantren->lurah_pa }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="control-label" for="inputError">Lurah Putri</label>
                                    <input type="text" class="form-control" id="inputError" placeholder="Lurah Putri"
                                        name="lurah_pi" value="{{ $pesantren->lurah_pi }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 ">
                                    <label class="control-label" for="inputError">Link Instagram</label>
                                    <input type="link" class="form-control" id="inputError"
                                        placeholder="https://instagram.com/" name="instagram"
                                        value="{{ $pesantren->instagram }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="control-label" for="inputError">Link Facebook</label>
                                    <input type="link" class="form-control" id="inputError"
                                        placeholder="https://facebook.com/" name="facebook"
                                        value="{{ $pesantren->facebook }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="inputError">Link Youtube</label>
                                    <input type="link" class="form-control" id="inputError"
                                        placeholder="https://youtube.com/" name="youtube"
                                        value="{{ $pesantren->youtube }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="control-label" for="inputError">Link Website</label>
                                    <input type="link" class="form-control" id="inputError"
                                        placeholder="https://website.com/" name="website"
                                        value="{{ $pesantren->website }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4 @error('pa_pi') has-error @enderror">
                                    <label>Pesantren Putra / Putri</label>
                                    <select class="form-control" name="pa_pi" id="type-pesantren"
                                        onchange="choseType()" required>
                                        <option value="pa_pi" {{ $pesantren->pa_pi == 'pa_pi' ? 'selected' : '' }}>
                                            Pesantren Putra / Putri</option>
                                        <option value="pa" {{ $pesantren->pa_pi == 'pa' ? 'selected' : '' }}>Pesantren
                                            Putra</option>
                                        <option value="pi" {{ $pesantren->pa_pi == 'pi' ? 'selected' : '' }}>Pesantren
                                            Putri</option>
                                    </select>
                                    @error('pa_pi')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4" id="box-pa" style="display: none">
                                    <label class="control-label" for="inputError">Jumlah Santri Putra</label>
                                    <input type="number" class="form-control" id="qty-pa" placeholder="0"
                                        name="jumlah_santri_pa" value="{{ $pesantren->jumlah_santri_pa }}">
                                </div>

                                <div class="form-group col-md-4" id="box-pi" style="display: none">
                                    <label class="control-label" for="inputError">Jumlah Santri Putri</label>
                                    <input type="number" class="form-control" id="qty-pi" placeholder="0"
                                        name="jumlah_santri_pi" value="{{ $pesantren->jumlah_santri_pi }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 @error('image') has-error @enderror">
                                    <label for="exampleInputFile">Gambar Thumbnail</label>
                                    <input type="file" name="image" id="image" onchange="previewImage()">

                                    <p class="help-block">
                                        <small>Maksimal <b>1 Mb</b>, Format file <b>jpg, jpeg, png</b></small>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <img class="file-preview" src="{{ asset($pesantren->image) }}" alt="Image post"
                                        height="150">
                                </div>
                            </div>

                            <div class="form-group bg-gray rounded mt-2 p-1">
                                <label class="control-label" for="inputError">Konten</label>
                                <textarea class="textarea form-control" rows="20" placeholder="Place some text here" name="content" required>{{ $pesantren->content }}</textarea>
                            </div>

                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

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
                        <li>Cari Alamat Pada Google Maps</li>
                        <li>Klik icon Bagikan</li>
                        <div class="card rounded bg-dark p-2">
                            <img src="{{ asset('assets/img/help-1.png') }}" alt="Help 1" class="image-responsive">
                        </div>
                        <li>Klik Salin Html</li>
                        <div class="card rounded bg-dark p-2">
                            <img src="{{ asset('assets/img/help-2.png') }}" alt="Help 1" class="image-responsive">
                        </div>
                        <li>Kemudian akan mendapatkan hasil seperti berikut : </li>
                        <div class="card rounded bg-dark p-2">
                            <img src="{{ asset('assets/img/help-3.png') }}" alt="Help 1" class="image-responsive">
                        </div>
                        <li>Kemudian ambil dibagian src, maka akan menjadi seperti berikut : </li>
                        <div class="card rounded bg-dark p-2">
                            <img src="{{ asset('assets/img/help-4.png') }}" alt="Help 1" class="image-responsive">
                        </div>
                        <li>Kemudian inputkan di field Url Google Maps</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
