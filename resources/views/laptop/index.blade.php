@extends('layouts.app')
@section('content')
    <div class="row mt-3">
        <div class="col-md-3">
{{--            <form action="{{ route('laptops.fetch') }}" method="post" class="mb-2">@csrf--}}
{{--                <div class="input-icon">--}}
{{--                      <span class="input-icon-addon">--}}
{{--                        <!-- Download SVG icon from http://tabler.io/icons/icon/search -->--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">--}}
{{--                          <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>--}}
{{--                          <path d="M21 21l-6 -6"></path>--}}
{{--                        </svg>--}}
{{--                      </span>--}}
{{--                    <input type="text" value="{{ request('search') ?? '' }}" class="form-control" placeholder="Fetch…" aria-label="Fetch" name="search">--}}
{{--                </div>--}}
{{--            </form>--}}
        </div>
    </div>
    <div class="row">
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
            <div class="card">
                <div class="card-body"></div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <table class="table table-vcenter card-table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Brand</th>
                        <th>S/N</th>
                        <th class="w-1"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($laptops as $laptop)
                        <tr>
                            <td><a href="{{ route('laptops.show',['id' => $laptop->id]) }}" class="text-reset">{{ $laptop->model }}</a></td>
                            <td><a href="{{ route('laptops.show',['id' => $laptop->id]) }}" class="text-reset">{{ $laptop->brand->name ?? '-' }}</a></td>
                            <td>{{ $laptop->part_number }}</td>
                            <td>
                                <a href="#">Edit</a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>

            <div class="d-flex mt-5">
                {{ $laptops->links() }}
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
                        Laptop
                    </div>
                    <h2 class="page-title">
                        Database
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection
