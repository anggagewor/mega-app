@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-4">
                @foreach($laptop->galleries as $gallery)
            <div class="card mb-2">
                <div class="card-body">
                    <img src="{{ $gallery->image_url }}" alt="" class="card-img">
                </div>
            </div>
                @endforeach
    </div>
    <div class="col-md-8">
        <div class="card">
            <table class="table table-vcenter card-table">
                <tbody>
                @foreach($laptop->features as $feature)
                    <tr>
                        <td class="text-nowrap">{{ $feature->feature_name }}</td>
                        <td class="w-1">:</td>
                        <td>{{ $feature->feature_value }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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
                        Database
                    </div>
                    <h2 class="page-title">
                        {{ $laptop->model }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection
