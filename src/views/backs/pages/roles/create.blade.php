@extends('backs.layouts.app')

@section('title', __('Create New Role'))

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h2>@yield('title')</h2>
  <div class="btn-toolbar mb-2 mb-md-0">
    <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-secondary">{{ __('Back to list')}}</a>
  </div>
</div>

<div class="card ">
  <div class="card-body">
    @include('backs.pages.roles.form', ['method' => 'POST', 'route' => route('admin.roles.store')])
  </div>
</div>
@endsection
