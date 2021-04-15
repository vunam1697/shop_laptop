@extends('web.master')
@section('main')
    <section class="breadcrumbs">
        <div class="container">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#"><i class="fa fa-home" aria-hidden="true"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tin tức</li>
            </ol>
            </nav>
        </div>
    </section>
    <section class="news-list">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="amblog-content">
                        <div class="row">
                            @foreach ($data as $item)
                            <div class="col-md-4">
                                <div class="amblog-item">
                                    <div class="amblog-photo"><a href="{{ route('home.news-detail', ['slug' => $item->slug]) }}" title="{{ $item->tentt }}">
                                        <img src="{{ url('/image/news') .'/'. $item->hinhanh }}" alt="{{ $item->tentt }}">
                                    </a></div>
                                    <div class="amblog-detail">
                                        <p class="news-date">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <span>{{ $item->created_at->format('d/m/Y') }}</span>
                                        </p>
                                        <h4 class="news-name"><a href="{{ route('home.news-detail', ['slug' => $item->slug]) }}" 
                                            title="{{ $item->tentt }}">{{ $item->tentt }}</a></h4>
                                        <p class="news-des">{{ $item->mota }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                        {{-- Phân trang --}}
                        {{ $data->links('web.components.panigation') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop