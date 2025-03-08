@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-3">
            <form action="" method="get">
                <div class="input-icon mb-3">
                    <input type="text" value="{{ request('search')??'' }}" name="search" class="form-control" placeholder="Search…">
                    <span class="input-icon-addon">
              <!-- Download SVG icon from http://tabler.io/icons/icon/search -->
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                   stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                   class="icon icon-1">
                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                <path d="M21 21l-6 -6"></path>
              </svg>
            </span>
                </div>
            </form>
            <a href="{{ route('topics.create') }}" class="btn btn-primary btn-3">
                <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-2">
                    <path d="M12 5l0 14"></path>
                    <path d="M5 12l14 0"></path>
                </svg>
                Tambah Topic
            </a>
        </div>
        <div class="col-md-9">
            <div class="row row-cards">
                <div class="space-y">
                    @foreach($topics as $topic)
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-auto">
                                    <div class="card-body">
                                        <span class="avatar avatar-1">{{ $topic->initials }}</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-body ps-0">
                                        <div class="row">
                                            <div class="col">
                                                <h3 class="mb-0"><a
                                                        href="{{ route('topics.show',['id'=>$topic->id]) }}">{{ $topic->name }}</a>
                                                </h3>
                                                <div class="text-secondary">{{ strip_tags($topic->description) }}</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md">
                                                <div
                                                    class="mt-3 list-inline list-inline-dots mb-0 text-secondary d-sm-block d-none">
                                                    <div class="list-inline-item">
                                                        <!-- Download SVG icon from http://tabler.io/icons/icon/building-community -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2" stroke-linecap="round"
                                                             stroke-linejoin="round" class="icon icon-inline icon-2">
                                                            <path
                                                                d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path>
                                                            <path d="M13 7l0 .01"></path>
                                                            <path d="M17 7l0 .01"></path>
                                                            <path d="M17 11l0 .01"></path>
                                                            <path d="M17 15l0 .01"></path>
                                                        </svg>
                                                        tags...
                                                    </div>
                                                </div>
                                                <div class="mt-3 list mb-0 text-secondary d-block d-sm-none">
                                                    <div class="list-item">
                                                        <!-- Download SVG icon from http://tabler.io/icons/icon/building-community -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2" stroke-linecap="round"
                                                             stroke-linejoin="round" class="icon icon-inline icon-2">
                                                            <path
                                                                d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path>
                                                            <path d="M13 7l0 .01"></path>
                                                            <path d="M17 7l0 .01"></path>
                                                            <path d="M17 11l0 .01"></path>
                                                            <path d="M17 15l0 .01"></path>
                                                        </svg>
                                                        tags...
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-auto">
                                                <div class="mt-3 badges">
                                                    <a href="#"
                                                       class="badge badge-outline text-secondary fw-normal badge-pill">tags...</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
                        Knowlede Base
                    </div>
                    <h2 class="page-title">
                        Topics
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection
