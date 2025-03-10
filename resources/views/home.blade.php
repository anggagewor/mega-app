@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header card-header-light">
                <h3 class="card-title">Dota2 Player Widget</h3>
            </div>
            <div class="img-responsive img-responsive-21x9 card-img-top" style="background-image: url({{ $dota2player->avatarfull }})"></div>
            <div class="card-body text-center">
                <div class="card-title mb-1">{{ $dota2player->personaname }}</div>
                <div class="text-secondary">Last Login : {{ \Illuminate\Support\Carbon::parse($dota2player->last_login)->setTimezone('Asia/Jakarta')->format('Y-m-d H:i:s') }}</div>
            </div>
            <a href="#" class="card-btn">View full profile</a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card p-1 mb-2">
            <div class="row g-2">
                <div class="col">
                    <input type="text" class="form-control" placeholder="What's on your mind?">
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-2 btn-icon" aria-label="Button">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-send-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4.698 4.034l16.302 7.966l-16.302 7.966a.503 .503 0 0 1 -.546 -.124a.555 .555 0 0 1 -.12 -.568l2.468 -7.274l-2.468 -7.274a.555 .555 0 0 1 .12 -.568a.503 .503 0 0 1 .546 -.124z" /><path d="M6.5 12h14.5" /></svg>
                    </button>
                </div>
            </div>
        </div>
        @for($x=1;$x<=4;$x++)
            <div class="card mb-2">
                <div class="card-header p-1">
                    <div>
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="avatar avatar-1" style="background-image: url({{ asset('static/pp.png') }})"></span>
                            </div>
                            <div class="col">
                                <div class="card-title">Gewor</div>
                                <div class="card-subtitle">PaluGada</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-actions">
                        <div class="dropdown">
                            <a href="#" class="btn-action dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- Download SVG icon from http://tabler.io/icons/icon/dots-vertical -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                    <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                    <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                </svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Edit user</a>
                                <a class="dropdown-item" href="#">Change permissions</a>
                                <a class="dropdown-item text-danger" href="#">Delete user</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-secondary">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste, itaque minima neque pariatur perferendis
                        sed suscipit velit vitae voluptatem.
                    </p>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-list avatar-list-stacked">
                                <span class="avatar avatar-xs rounded">EP</span>
                                <span class="avatar avatar-xs rounded" style="background-image: url({{ asset('static/avatars/002f.jpg') }})"></span>
                                <span class="avatar avatar-xs rounded" style="background-image: url({{ asset('static/avatars/003f.jpg') }})"></span>
                                <span class="avatar avatar-xs rounded">HS</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="#" class="link-warning">
                                <!-- Download SVG icon from http://tabler.io/icons/icon/calendar -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                    <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"></path>
                                    <path d="M16 3v4"></path>
                                    <path d="M8 3v4"></path>
                                    <path d="M4 11h16"></path>
                                    <path d="M11 15h1"></path>
                                    <path d="M12 15v3"></path>
                                </svg>
                                10 Sep
                            </a>
                        </div>
                        <div class="col-auto text-secondary">
                            <button class="switch-icon switch-icon-scale" data-bs-toggle="switch-icon">
                                  <span class="switch-icon-a text-muted">
                                    <!-- Download SVG icon from http://tabler.io/icons/icon/heart -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                      <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"></path>
                                    </svg>
                                  </span>
                                <span class="switch-icon-b text-red">
                                    <!-- Download SVG icon from http://tabler.io/icons/icon/heart -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-filled icon-2">
                                      <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"></path>
                                    </svg>
                                  </span>
                            </button>
                            6
                        </div>
                        <div class="col-auto">
                            <a href="#" class="link-muted">
                                <!-- Download SVG icon from http://tabler.io/icons/icon/message -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                    <path d="M8 9h8"></path>
                                    <path d="M8 13h6"></path>
                                    <path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z"></path>
                                </svg>
                                2</a>
                        </div>
                        <div class="col-auto">
                            <a href="#" class="link-muted">
                                <!-- Download SVG icon from http://tabler.io/icons/icon/share -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                    <path d="M6 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                    <path d="M18 6m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                    <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                    <path d="M8.7 10.7l6.6 -3.4"></path>
                                    <path d="M8.7 13.3l6.6 3.4"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
    <div class="col-md-3">
        <div class="row">
            <div class="card card-sm mb-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-red text-white avatar">
<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-movie"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" /><path d="M8 4l0 16" /><path d="M16 4l0 16" /><path d="M4 8l4 0" /><path d="M4 16l4 0" /><path d="M4 12l16 0" /><path d="M16 8l4 0" /><path d="M16 16l4 0" /></svg>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">{{ $totalAnime }}</div>
                            <div class="text-secondary"><a href="{{ route('animes.index') }}">Anime</a></div>
                        </div>
                        <div class="col-auto"></div>
                    </div>
                </div>
            </div>
            <div class="card card-sm mb-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-azure text-white avatar">
<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-device-laptop"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 19l18 0" /><path d="M5 6m0 1a1 1 0 0 1 1 -1h12a1 1 0 0 1 1 1v8a1 1 0 0 1 -1 1h-12a1 1 0 0 1 -1 -1z" /></svg>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">{{ $totalLaptops }}</div>
                            <div class="text-secondary"><a href="{{ route('laptops.index') }}">Laptop</a></div>
                        </div>
                        <div class="col-auto"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-header')
{{--    <div class="page-header d-print-none">--}}
{{--        <div class="container-xl">--}}
{{--            <div class="row g-2 align-items-center">--}}
{{--                <div class="col">--}}
{{--                    <!-- Page pre-title -->--}}
{{--                    <div class="page-pretitle">--}}
{{--                        Welcome--}}
{{--                    </div>--}}
{{--                    <h2 class="page-title">--}}
{{--                        Dashboard--}}
{{--                    </h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
