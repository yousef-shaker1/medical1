<?php use Carbon\Carbon; ?>
@extends('layouts.master_admin')

@section('title')
الرئيسية
@endsection

@section('css')
<style>

  .card {
    /* height: 50%; */
  width: 100%;
}


.card-title {
  font-size: 1.25rem; /* Increase font size */
}


</style>
@endsection

@section('sid1')
الادمن
@endsection
@section('sid2')
الرئيسية
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Services Card -->
        <div class="col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">All Services</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    {{-- @can('الخدمات') --}}
                    <a href="{{ route('services.index') }}" class="btn btn-primary">
                    {{ \App\Models\service::count() }}
                    </a>
                    {{-- @endcan --}}
                </div>
            </div>
        </div>

        <!-- Cities Card -->
        <div class="col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">All Cities</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    {{-- @can('المدن') --}}
                    <a href="{{ route('city.index') }}" class="btn btn-primary">
                    {{ \App\Models\city::count() }}
                    </a>
                    {{-- @endcan --}}
                </div>
            </div>
        </div>

        <!-- Orders Card -->
        <div class="col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">All Orders</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    {{-- @can('الطلبات') --}}
                    <a href="{{ route('services.index') }}" class="btn btn-primary">{{\App\Models\service::count() }}</a>
                    {{-- @endcan --}}
                </div>
            </div>
        </div>

        <!-- Today's Orders Card -->
        <div class="col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">All Orders This Day</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    {{-- @can('الطلبات') --}}
                    <a href="{{ route('order.index') }}" class="btn btn-primary">
                        {{ \App\Models\order::whereDate('created_at', \Carbon\Carbon::today())->count() }}
                    </a>
                    {{-- @endcan --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection


