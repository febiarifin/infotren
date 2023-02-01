@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ $title }}
            <small>Dashboard</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> {{ $title }}</a></li>
            <li class="active">{{ $title }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <div class="box-body">
                        <h2>Hai {{ Auth::user()->name }}, selamat datang di {{ config('app.name') }}.</h2>
                        <p class="text-secondary mt-2">Sistem Pencarian Informasi Pondok Pesantren
                            ({{ config('app.name') }}) adalah sebuah website informasi pondok pesantren, informasi tersebut
                            berguna sekali bagi para siswa yang ingin menempuh pendidikan pesantren. Informasi tersebut
                            meliputi :</p>
                        <ul>
                            <li>Deskripsi pesantren</li>
                            <li>Identitas lengkap pesantren</li>
                            <li>Biaya pesantren</li>
                            <li>Lokasi pesantren dengan google maps</li>
                            <li>Jarak pesantren dari kampus Universitas Sains Al-Qur'an</li>
                            <li>Galeri pesantren</li>
                        </ul>
                        <p class="text-secondary mt-2">Selain itu {{ config('app.name') }} juga dilengkapi fitur pencarian
                            dengan rincian :</p>
                        <ul>
                            <li>Pencarian berdasarkan popularitas pesantren</li>
                            <li>Pencarian berdasarkan jarak dari kampus Universitas Sains Al-Qur'an</li>
                            <li>Pencarian berdasarkan biaya</li>
                            <li>Pencarian berdasarkan konsentrasi pesantren</li>
                            <li>Pencarian berdasarkan jenjang pesantren</li>
                        </ul>
                        {{-- <a href="#" class="btn btn-primary btn-sm mt-2" target="_blank"><i class="fa fa-download"></i>
                            Proposal</a> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h4>Nama</h4>
                            </div>
                            <div class="col-md-8">
                                <h4>{{ config('app.name') }}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>Versi</h4>
                            </div>
                            <div class="col-md-8">
                                <h4>1.0</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>Teknologi</h4>
                            </div>
                            <div class="col-md-8">
                                <h4>Laravel 8</h4>
                                <h4>Admin LTE 2</h4>
                                <h4>Bootstrap 5</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>TIM</h4>
                            </div>
                            <div class="col-md-8">
                                <h4>ITQ</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>Kampus</h4>
                            </div>
                            <div class="col-md-8">
                                <h4>Universitas Sains Al-Qur'an</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>Pesantren</h4>
                            </div>
                            <div class="col-md-8">
                                <h4><b>{{ count($pesantrens) }}</b></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
