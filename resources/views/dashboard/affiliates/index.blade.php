@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Affiliates
                        <a href="{{ route('affiliates.create') }}" class="btn btn-success pull-right">Add Affiliate</a>
                        <div class="clearfix"></div>
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Invites Left</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($affiliates as $affiliate)
                                <tr>
                                    <th scope="row">{{ $affiliate->id }}</th>
                                    <td>{{ $affiliate->first_name }}</td>
                                    <td>{{ $affiliate->last_name }}</td>
                                    <td>{{ $affiliate->email }}</td>
                                    <td>{{ $affiliate->invites_left }}</td>
                                    <td>{{ $affiliate->created_at }}</td>
                                    <td>
                                        <a href="{{ route('affiliates.edit',$affiliate->id) }}" class="btn btn-primary">Edit</a>

                                        {!! Form::open(['method' => 'DELETE', 'route' => ['affiliates.destroy', $affiliate->id], 'style' => 'display: inline']) !!}
                                            <button type="submit" href="#" class="btn btn-danger">x</button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $affiliates->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
