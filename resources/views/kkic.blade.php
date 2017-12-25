@extends('layouts.app')

@push('styles')
<style>
    h3 {
        width:100%;
        text-align:center;
        border-bottom: 2px solid #000;
        line-height:0.1em !important;
        margin:10px 0 20px;
    }
    h3 span {
        background:#fff;
        padding:0 10px;
    }

    .panel-heading-link{
        color:#333;
    }
    .panel-heading-link:hover{
        text-decoration: none;
    }
</style>
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>Send Invite</span>
                        <a href="{{ route('invites', ['affiliateid'=> $data['aff_id'], 'coupon'=>'']) }}" class="panel-heading-link pull-right">View Invitations</a>
                    </div>


                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="col-sm-12">
                            @if(Session::has('message'))
                                <div class="alert alert-success">
                                    <strong>{{Session::get('message')}}</strong>
                                    <br>You can check your invitations by link:
                                    <a href="{{ route('invites', ['affiliateid'=> session('affid'), 'coupon'=>session('coupon')]) }}">{{ route('invites', ['affiliateid'=> session('affid'), 'coupon'=>session('coupon')]) }}</a>
                                    <!-- <a href="{{-- url('/kkic/invites') --}}/{{--Session::get('uid')--}}">{{-- url('/kkic/invites') --}}/{{--Session::get('uid')--}}</a> -->
                                    <br>You have: {{Session::get('balance')}} invitation(s).
                                </div>

                                <div class="alert alert-warning">
                                    <strong>Your login data:</strong><br>
                                    E-Mail: {{Session::get('email')}}<br>
                                    Affiliate ID: {{Session::get('affid')}}
                                </div>
                            @elseif($errors->count()>0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @elseif(Session::has('error'))
                                <div class="alert alert-danger">
                                    {{Session::get('error')}}
                                </div>
                            @endif

                            {!! Form::model($affiliate,['action' => 'KkicController@store' , 'class' => 'form-horizontal form-label-left']) !!}

                            <h3><span>Your Details</span></h3>
                                <br>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" >Affiliate Id</label>
                                    <div class="col-sm-10">
                                        {!! Form::text('affiliate_id',$data['aff_id'] ? $data['aff_id'] : rand(111111111,999999999),['required','readonly','class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" >First Name</label>
                                    <div class="col-sm-10">
                                        {!! Form::text('affiliate_fname',$data['fname'],['required','class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" >Last Name</label>
                                    <div class="col-sm-10">
                                        {!! Form::text('affiliate_lname',$data['lname'],['required','class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" >Email</label>
                                    <div class="col-sm-10">
                                        {!! Form::email('affiliate_email',$data['email'],['required','readonly','class' => 'form-control']) !!}
                                    </div>
                                </div>


                                <br>
                                <h3><span>Your Friend</span></h3>
                                <br><br>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" >First Name</label>
                                    <div class="col-sm-10">
                                        {!! Form::text('friend_fname','',['required','class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" >Last Name</label>
                                    <div class="col-sm-10">
                                        {!! Form::text('friend_lname','',['required','class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        {!! Form::email('friend_email','',['required','class' => 'form-control']) !!}
                                    </div>
                                </div>

                            <center>
                                <button type="submit" class="btn btn-success">Send Invite</button>
                            </center>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
