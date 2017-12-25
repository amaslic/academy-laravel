@extends('layouts.app_without_navbar')

@push('styles')
<style>
    #app {
        display: table;
        height: 100vh;
        width: 100%;
    }
    #page_container {
        display: table-cell;
        vertical-align: middle;
    }
</style>
@endpush

@section('content')
    <div id="page_container" class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                @include('layouts.invite_info')
            </div>
        </div>
    </div>
@endsection

