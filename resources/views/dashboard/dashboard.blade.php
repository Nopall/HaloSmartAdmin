@extends('layouts.index')

@section('content')
    @include('dashboard.card-statistic')
    @include('dashboard.expense-cart')
    @include('dashboard.vehicle-data-table')
@endsection
