@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
					<span class="bg-primary text-white avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-device-tv"><path
                                stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                d="M8.707 2.293l3.293 3.292l3.293 -3.292a1 1 0 0 1 1.32 -.083l.094 .083a1 1 0 0 1 0 1.414l-2.293 2.293h4.586a3 3 0 0 1 3 3v9a3 3 0 0 1 -3 3h-14a3 3 0 0 1 -3 -3v-9a3 3 0 0 1 3 -3h4.585l-2.292 -2.293a1 1 0 0 1 1.414 -1.414"/></svg>
                    </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                                {{ $total }} Total Anime
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3">
                <form action="" method="get" class="mb-2">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <!-- Download SVG icon from http://tabler.io/icons/icon/search -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                          <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                          <path d="M21 21l-6 -6"></path>
                        </svg>
                      </span>
                        <input type="text" value="{{ request('search') ?? '' }}" class="form-control" placeholder="Search…" aria-label="Search" name="search">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="table-responsive mb-3">
                    <table class="table table-vcenter card-table">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Genres</th>
                            <th>Score</th>
                            <th class="w-1"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($animes as $anime)
                            <tr>
                                <td>
                                    <div class="d-flex py-1 align-items-center">
                                        <span class="avatar avatar-2 me-2"
                                              style="background-image: url(@if($anime->cover) {{ $anime->cover }} @else {{ asset('static/MyAnimeList_Logo.png') }} @endif)"></span>
                                        <div class="flex-fill">
                                            <div class="font-weight-medium">{{ $anime->title }}</div>
                                            <div class="text-secondary">{{ $anime->start_date }}
                                                - {{ $anime->end_date }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>{{ $anime->type }}</div>
                                </td>
                                <td>
                                    <div>{!! convert_to_tags($anime->genres) !!}</div>
                                </td>
                                <td>
                                    <div>{{ explode(' (',$anime->score)[0] }}</div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown" aria-expanded="false">Actions</button>
                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                            <a class="dropdown-item" href="{{ route('animes.show',['id'=>$anime->id]) }}"> View </a>
                                            <a class="dropdown-item" href="{{ route('animes.sync',['id'=>$anime->id]) }}"> Sync Detail </a>
                                            <a class="dropdown-item" href="{{ route('animes.sync.episodes',['id'=>$anime->id]) }}"> Sync Episode </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
                {{ $animes->links() }}
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
                        List Anime
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection
