@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-3">@include('anime.sidebar',['anime'=>$anime])</div>
        <div class="col-md-9">
            <div class="card mb-2">
                <div class="card-header">@include('anime.navbar',['anime'=>$anime])</div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('animes.sync.episodes',['id'=>$anime->id]) }}" class="btn btn-primary btn-3">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-refresh"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" /><path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" /></svg>
                        Sync Episode
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-bordered">
                        <thead>
                        <tr>
                            <th class="w-1"></th>
                            <th>Name</th>
                            <th>Aired</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($episodes as $episode)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>
                                    <div class="d-flex py-1 align-items-center">
                                                    <span class="avatar avatar-2 me-2">
                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-video"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20.117 7.625a1 1 0 0 0 -.564 .1l-4.553 2.275v4l4.553 2.275a1 1 0 0 0 1.447 -.892v-6.766a1 1 0 0 0 -.883 -.992z" /><path d="M5 5c-1.645 0 -3 1.355 -3 3v8c0 1.645 1.355 3 3 3h8c1.645 0 3 -1.355 3 -3v-8c0 -1.645 -1.355 -3 -3 -3z" /></svg>
                                                    </span>
                                        <div class="flex-fill">
                                            <div class="font-weight-medium"><a href="{{ route('animes.episodes.show',['id' => $anime->id,'episode_id' => $episode->id]) }}">{{$episode->name}}</a></div>
                                            <div class="text-secondary">{{ $episode->title }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-secondary text-nowrap">{{ $episode->aired }}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No Data</td>
                                </tr>
                        @endforelse
                        </tbody>
                    </table>
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
