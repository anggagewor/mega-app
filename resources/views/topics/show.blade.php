@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-3">
            <form action="" method="get">
                <div class="input-icon mb-3">
                    <input type="text" value="" class="form-control" placeholder="Search…">
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
            <a href="{{ route('topics.create-sub', ['id'=>$topic->id]) }}" class="btn btn-primary btn-3">
                <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-2">
                    <path d="M12 5l0 14"></path>
                    <path d="M5 12l14 0"></path>
                </svg>
                Tambah Sub Topic
            </a>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="list-group list-group-flush list-group-hoverable">
                    @foreach($subs as $sub)
                        <div class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <a href="{{ route('topics.subtopic.show',['id'=>$topic->id,'sub_id' => $sub->id]) }}">
                                        <span class="avatar avatar-1">{{ $sub->initials }}</span>
                                    </a>
                                </div>
                                <div class="col text-truncate">
                                    <a href="{{ route('topics.subtopic.show',['id'=>$topic->id,'sub_id' => $sub->id]) }}"
                                       class="text-reset d-block">{{ $sub->name }}</a>
                                    <div
                                        class="d-block text-secondary text-truncate mt-n1">{{ strip_tags($sub->description) }}</div>
                                </div>
                                <div class="col-auto">
                                    <a href="#" class="list-group-item-actions">
                                        <!-- Download SVG icon from http://tabler.io/icons/icon/star -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="icon text-secondary icon-2">
                                            <path
                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
                                        </svg>
                                    </a>
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
                        {{ $topic->name }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection
