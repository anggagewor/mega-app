@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-3">@include('anime.sidebar',['anime'=>$anime])</div>
        <div class="col-md-9">
            <div class="card mb-2">
                <div class="card-header">@include('anime.navbar',['anime'=>$anime])</div>
            </div>

            <ul class="pagination mb-2">
                @if($previusEpisode)
                <li class="page-item page-prev ">
                    <a class="page-link" href="{{ route('animes.episodes.show',['id' => $anime->id,'episode_id' => $previusEpisode->id]) }}" tabindex="-1" aria-disabled="true">
                        <div class="page-item-subtitle">previous</div>
                        <div class="page-item-title">{{ $previusEpisode->name }}</div>
                    </a>
                </li>
                @endif
                @if($nextEpisode)
                        <li class="page-item page-next">
                            <a class="page-link" href="{{ route('animes.episodes.show',['id' => $anime->id,'episode_id' => $nextEpisode->id]) }}">
                                <div class="page-item-subtitle">next</div>
                                <div class="page-item-title">{{ $nextEpisode->name }}</div>
                            </a>
                        </li>
                @endif
            </ul>
            <div class="card mb-2">
                <div class="card-header">
                    <a href="{{ route('animes.episodes.link.create',['id' => $anime->id,'episode_id' => $episode->id]) }}" class="btn btn-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                        Tambah Link
                    </a>
                    <div class="card-actions">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">Pilih Server</button>
                            <div class="dropdown-menu dropdown-menu-end">
                                @foreach($links as $l)
                                    <a class="dropdown-item" href="{{ route('animes.episodes.show.link',['id' => $anime->id,'link_id' => $l->id,'episode_id' => $l->episode_id]) }}"> {{ parse_url($l->link, PHP_URL_HOST) }} </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @if($link)
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
                @else
                    <div class="card-body">
                        <h3>No Data</h3>
                    </div>
                @endif
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
