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
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Tabel Pesantren</h3>
                        <div class="pull-right">
                            <a href="{{ route('pesantren.create') }}" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Tambah Data Pesantren
                            </a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pesantren</th>
                                    <th>Pengasuh</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($pesantrens as $pesantren)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $pesantren->nama }}</td>
                                        <td>{{ $pesantren->pengasuh }}</td>
                                        <td>{{ $pesantren->alamat }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('pesantren.edit', ['pesantren' => $pesantren->id]) }}"
                                                    class="btn btn-primary btn-sm"><i class="fa fa-pencil-square"></i>
                                                    Edit</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pesantren</th>
                                    <th>Pengasuh</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
