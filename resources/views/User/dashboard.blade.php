@extends('main')

@push('styles')

@endpush

@section('content')
    <div>
        <div id="app">
            <router-view name="default"></router-view>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ mix('js/dashboard.js') }}"></script>
@endpush