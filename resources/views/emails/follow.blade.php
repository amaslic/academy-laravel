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

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Headline for Webinar</b></div>

                    <div class="panel-body">

                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="embed-responsive embed-responsive-16by9"> <iframe class="embed-responsive-item" src="//www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen=""></iframe></div>
                            </div>
                        </div>

                        <br><br>

                        <p class="text-center">{{ $affiliate['first_name'] }} gave you a $100 discount...You get in for only <strike><b>$297</b></strike> <b>$197</b>/month</p>

                        <br><br>
                        <center>
                            <a href="{{ route('order', ['affiliateid'=> $affiliate['thrivecart_affiliate_id'], 'coupon'=>$invite->coupon]) }}" style="text-decoration: none; background: green; font-size: 17px; padding: 22px 60px; color: white; display: inline-block;">I WANT IN!</a>&nbsp;&nbsp;
                            <a href="#" style="text-decoration: none; background: orange; font-size: 17px; padding: 22px 60px; color: white; display: inline-block;">I'M NOT CONVINCED, PLEASE CALL ME</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

