@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-3">@include('anime.sidebar',['anime'=>$anime])</div>
        <div class="col-md-9">
            <div class="card mb-2">
                <div class="card-header">@include('anime.navbar',['anime'=>$anime])</div>
            </div>
            <form action="{{ route('animes.episodes.link.store',['id' => $anime->id,'episode_id' => $episode->id]) }}" method="post">@csrf
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">link</label>
                            <input type="text" class="form-control" name="link" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Embed Code</label>
                            <textarea name="embed" id="embed" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-3">
                            <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-2">
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                            </svg>
                            Tambah Link
                        </button>
                    </div>
                </div>
            </form>
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
