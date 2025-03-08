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
            <a href="{{ route('topics.subtopic.content.create',['id'=>$topic->id,'sub_id' => $sub->id]) }}" class="btn btn-primary btn-3 mb-2">
                <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-2">
                    <path d="M12 5l0 14"></path>
                    <path d="M5 12l14 0"></path>
                </svg>
                Tambah Content
            </a>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Contents</h3>
                </div>
                <div class="list-group list-group-flush">
                    @foreach($contents as $content)
                    <a href="{{ route('topics.subtopic.show.content', ['id'=>$topic->id,'sub_id' => $content->subtopic_id,'content_id' => $content]) }}" class="list-group-item list-group-item-action">{{ $content->title }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @if($detail)
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">{{ $detail->title }}</h3>
                        <div class="card-actions">
                            <a href="{{ route('topics.subtopic.show.content.edit',['id'=>$topic->id,'content_id' => $detail->id,'sub_id' => $sub->id]) }}" class="btn btn-info btn-3">
                                <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-2">
                                    <path d="M12 5l0 14"></path>
                                    <path d="M5 12l14 0"></path>
                                </svg>
                                Edit
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! $detail->body !!}
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-body">
                        <h2>No Data</h2>
                    </div>
                </div>
            @endif
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
                        Knowlede Base / {{ $topic->name }}
                    </div>
                    <h2 class="page-title">
                        {{ $sub->name }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection
