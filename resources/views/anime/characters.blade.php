@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-3">@include('anime.sidebar',['anime'=>$anime])</div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">@include('anime.navbar',['anime'=>$anime])</div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="tabs-home-8" role="tabpanel">
                            <h4>Characters</h4>
                            <div>Cursus turpis vestibulum, dui in pharetra vulputate id sed non turpis ultricies
                                fringilla at sed facilisis lacus pellentesque purus nibh
                            </div>
                        </div>
                    </div>
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
