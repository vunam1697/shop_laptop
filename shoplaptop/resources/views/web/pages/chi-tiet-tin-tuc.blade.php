@extends('web.master')
@section('main')
    <section class="breadcrumbs">
        <div class="container">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#"><i class="fa fa-home" aria-hidden="true"></i></a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('home.news') }}">Tin tức</a>
                </li>
                <li class="breadcrumb-item active" >{{ $data->tentt }}</li>
            </ol>
            </nav>
        </div>
    </section>
    <section class="project-list">
        <div class="container">
            <h1 class="d-none">hidden</h1>
            <div class="row">
                <div class="col-md-12 padd-large">
                    <h2 class="pjdetail-title">{{ $data->tentt }}</h2>
                    <p class="amblog-date">Tin tức  —  {{ $data->created_at->format('d/m/Y') }}</p>
                    <div class="pj-info">
                        {!! $data->noidung !!}
                    </div>
                </div>
            </div>			
        </div>
    </section>
@stop