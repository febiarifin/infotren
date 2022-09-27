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
                        <h2>Hallo {{ Auth::user()->name }}, selamat datang kembali di {{ config('app.name') }}</h2>
                        <p class="text-secondary mt-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt,
                            quo. Consequatur, fugiat assumenda! Eum ex, expedita aspernatur explicabo dolores dolorem
                            aperiam nesciunt, quidem animi ea dicta, corporis beatae quibusdam id?</p>
                        <a href="#" class="btn btn-primary btn-sm mt-2" target="_blank"><i class="fa fa-download"></i>
                            Proposal</a>
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
                                <h4>Bootstrap</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>Universitas</h4>
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
