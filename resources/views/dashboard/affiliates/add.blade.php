@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add Affiliate
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {!! Form::open(['route' => 'affiliates.store', 'method'=>'POST']) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>First Name:</strong>
                                    {!! Form::text('first_name', null, array('placeholder' => 'First Name', 'class' => 'form-control')) !!}
                                </div>

                                <div class="form-group">
                                    <strong>Last Name:</strong>
                                    {!! Form::text('last_name', null, array('placeholder' => 'Last Name', 'class' => 'form-control')) !!}
                                </div>

                                <div class="form-group">
                                    <strong>Email:</strong>
                                    {!! Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control')) !!}
                                </div>

                                <div class="form-group">
                                    <strong>Invites Left:</strong>
                                    {!! Form::text('invites_left', null, array('placeholder' => 'Invites Left', 'class' => 'form-control')) !!}
                                </div>

                                <div class="form-group">
                                    <strong>Thrivecart ID:</strong>
                                    {!! Form::text('thrivecart_affiliate_id', null, array('placeholder' => 'Thrivecart ID', 'class' => 'form-control')) !!}                                    
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
