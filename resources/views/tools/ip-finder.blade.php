@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="get">
                    <div class="mb-3">
                        <div class="input-icon">
                      <span class="input-icon-addon">
                        <!-- Download SVG icon from http://tabler.io/icons/icon/search -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                          <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                          <path d="M21 21l-6 -6"></path>
                        </svg>
                      </span>
                            <input type="text" value="{{ request('ip') ?? '' }}" class="form-control" placeholder="Search…" aria-label="Search" name="ip">
                        </div>
                    </div>
                </form>
            </div>
            @if(!$datas->isEmpty())
                <div class="card-body">
                    <div class="datagrid">
                        <div class="datagrid-item">
                            <div class="datagrid-title">IP</div>
                            <div class="datagrid-content">{{ request('ip') }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">City</div>
                            <div class="datagrid-content">{{ $datas['city']['names']['en'] }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Continent</div>
                            <div class="datagrid-content">{{ $datas['continent']['names']['en'] }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Country</div>
                            <div class="datagrid-content">{{ $datas['country']['names']['en'] }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Location</div>
                            <div class="datagrid-content">latitude : {{ $datas['location']['latitude'] }} | longitude : {{ $datas['location']['longitude'] }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">isp</div>
                            <div class="datagrid-content">{{ $datas['traits']['isp'] }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Time Zone</div>
                            <div class="datagrid-content">{{ $datas['location']['time_zone'] }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Weather Code</div>
                            <div class="datagrid-content">{{ $datas['location']['weather_code'] }}</div>
                        </div>
                    </div>
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
                        Tools
                    </div>
                    <h2 class="page-title">
                        Ip Finder
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection
