@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Send Invite</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="col-sm-12">
                            @if(Session::has('message'))
                                <div class="alert alert-success">
                                    {{Session::get('message')}}
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

                            <center><h3>Your Details</h3><br></center>

                            <div class="form-group">
                                <label >Affiliate Id</label>
                                {!! Form::text('affiliate_id','',['required','class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label >First Name</label>
                                {!! Form::text('affiliate_fname','',['required','class' => 'form-control']) !!}

                            </div>
                            <div class="form-group">
                                <label >Last Name</label>
                                {!! Form::text('affiliate_lname','',['required','class' => 'form-control']) !!}

                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                {!! Form::text('affiliate_email','',['required','class' => 'form-control']) !!}

                            </div>


                            <center><h3><br>Your Friend<br><br></h3></center>


                            <div class="form-group">
                                <label >First Name</label>
                                {!! Form::text('friend_fname','',['required','class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label >Last Name</label>
                                {!! Form::text('friend_lname','',['required','class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                {!! Form::text('friend_email','',['required','class' => 'form-control']) !!}
                            </div>

                            <center>
                                <a class="btn btn-danger" href="{{ route('home') }}">Back</a>
                                <button type="submit" class="btn btn-default">Send Invite</button>
                            </center>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
