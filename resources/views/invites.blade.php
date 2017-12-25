@extends('layouts.app')

@push('styles')
<style>

</style>
@endpush

@section('content')
    <div id="page_container" class="container">

        @if( $friends->isEmpty())
            <h3>You haven't invited friends.</h3>
        @else
            @foreach($friends as $friend)
                @php
                    $invite = $friend->invite;
                @endphp
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        @include('layouts.invite_info')
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
