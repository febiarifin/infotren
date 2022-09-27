@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ $title }}
            <small>{{ $title }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> {{ $title }}</a></li>
            <li class="active">{{ $title }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Tabel Konsentrasi</h3>
                        <div class="pull-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal-add-konsentrasi">
                                <i class="fa fa-plus"></i> Tambah Konsentrasi
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Konsentrasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                    $noModal = 1;
                                @endphp
                                @foreach ($konsentrasis as $konsentrasi)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $konsentrasi->name }}</td>
                                        <td>
                                            <div style="display: flex !important">
                                                <a href="#" class="btn btn-primary btn-sm mr-1" data-toggle="modal"
                                                    data-target="#modal-edit-konsentrasi-{{ $noModal++ }}">
                                                    <i class="fa fa-pencil-square"></i> Edit
                                                </a>
                                                @if (count($konsentrasi->pesantrens) == 0)
                                                    <form action="{{ route('konsentrasi.delete') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $konsentrasi->id }}">
                                                        <button type="submit" class="btn btn-danger btn-sm show_confirm"
                                                            data-toggle="tooltip" title='Delete'>
                                                            <i class="fa fa-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Konsentrasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>

            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Tabel Jenjang</h3>
                        <div class="pull-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal-add-jenjang">
                                <i class="fa fa-plus"></i> Tambah Jenjang
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenjang</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                    $noModal = 1;
                                @endphp
                                @foreach ($jenjangs as $jenjang)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $jenjang->name }}</td>
                                        <td>
                                            <div style="display: flex !important">
                                                <a href="#" class="btn btn-primary btn-sm mr-1" data-toggle="modal"
                                                    data-target="#modal-edit-jenjang-{{ $noModal++ }}">
                                                    <i class="fa fa-pencil-square"></i> Edit
                                                </a>
                                                @if (count($jenjang->pesantrens) == 0)
                                                    <form action="{{ route('jenjang.delete') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $jenjang->id }}">
                                                        <button type="submit" class="btn btn-danger btn-sm show_confirm"
                                                            data-toggle="tooltip" title='Delete'>
                                                            <i class="fa fa-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Jenjang</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>

    {{-- Modal Add Konsentrasi --}}
    <div class="modal fade" id="modal-add-konsentrasi">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('konsentrasi.store') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tambahkan Konsentrasi</h4>
                    </div>
                    <div class="modal-body">
                        <label class="control-label" for="inputError">Konsentrasi</label>
                        <input type="text" class="form-control" placeholder="Tahfidz Al-Qur'an" name="name">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Sumbit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Edit Konsentrasi --}}
    @php
        $noModal = 1;
    @endphp
    @foreach ($konsentrasis as $konsentrasi)
        <div class="modal fade" id="modal-edit-konsentrasi-{{ $noModal++ }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('konsentrasi.update') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $konsentrasi->id }}">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Konsentrasi</h4>
                        </div>
                        <div class="modal-body">
                            <label class="control-label" for="inputError">Konsentrasi</label>
                            <input type="text" class="form-control" value="{{ $konsentrasi->name }}" name="name">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Sumbit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Modal Add Jenjang --}}
    <div class="modal fade" id="modal-add-jenjang">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('jenjang.store') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tambahkan Jenjang</h4>
                    </div>
                    <div class="modal-body">
                        <label class="control-label" for="inputError">Jenjang</label>
                        <input type="text" class="form-control" placeholder="SMP,SMA,SMK" name="name">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Sumbit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Edit Jenjang --}}
    @php
        $noModal = 1;
    @endphp
    @foreach ($jenjangs as $jenjang)
        <div class="modal fade" id="modal-edit-jenjang-{{ $noModal++ }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('jenjang.update') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $jenjang->id }}">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Jenjang</h4>
                        </div>
                        <div class="modal-body">
                            <label class="control-label" for="inputError">jenjang</label>
                            <input type="text" class="form-control" value="{{ $jenjang->name }}" name="name">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Sumbit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
