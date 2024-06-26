@extends('layouts.backend.app')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">Data {{ __('sidebar.course') }}</h4>
    </div>
    <div class="card-body">
        <a href="{{ route('backend.feature.course.create') }}" class="btn btn-primary">{{ __('button.add') }} {{ __('sidebar.course') }}</a>
       <div class="table-responsive">
            <div class="table-responsive">
                {!! $dataTable->table(['class' => 'table table-striped table-bordered']) !!}
            </div>
       </div>
    </div>
</div>
@endsection
@push('js')
{!! $dataTable->scripts() !!}
@endpush