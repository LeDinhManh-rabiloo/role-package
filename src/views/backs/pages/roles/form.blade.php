@extends('backs.layouts.app')

@section('title', __('Roles management'))

@section('content')
@component('backs.components.page-header')
<a href="{{ route('admin.roles.create') }}" class="btn btn-sm btn-primary">{{ __('Create Role')}}</a>
@endcomponent

<div class="card">
  <div class="card-body">
    {!! $dataTable->table() !!}
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ mix('js/datatables.js') }}"></script>
{!! $dataTable->scripts() !!}
@endpush

@push('styles')
<link rel="stylesheet" href="{{ mix('css/datatables.css') }}">
@endpush
