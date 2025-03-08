@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-3">@include('anime.sidebar',['anime'=>$anime])</div>
        <div class="col-md-9">
            <div class="card mb-2">
                <div class="card-header">@include('anime.navbar',['anime'=>$anime])</div>
            </div>
            <div class="card mb-2">
                <div class="col-auto ms-auto d-print-none p-2">
                    <a href="#" class="btn btn-primary btn-3">
                        <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-2">
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                        Add new
                    </a>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">Pilih Server</button>
                        <div class="dropdown-menu dropdown-menu-end">
                            @foreach($links as $l)
                                <a class="dropdown-item" href="{{ route('animes.episodes.show.link',['id' => $anime->id,'link_id' => $l->id,'episode_id' => $l->episode_id]) }}"> {{ parse_url($l->link, PHP_URL_HOST) }} </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="ratio ratio-16x9">
                        {!! $link->embed !!}
                    </div>

                </div>
                <div class="card-footer">
                    <a href="{{ $link->link }}" target="_blank" class="btn btn-primary btn-3">
                        Download
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-header')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Anime
                    </div>
                    <h2 class="page-title">
                        {{ $anime->title }} #{{ $anime->mal_id }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection
