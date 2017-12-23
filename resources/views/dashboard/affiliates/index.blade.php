@extends('layouts.app')

@push('scripts')
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function(){
        $('.table').DataTable(
            {"columnDefs": [
                { "orderable": true, "targets": 0 },
                { "orderable": true, "targets": 1 },
                { "orderable": true, "targets": 2 },
                { "orderable": true, "targets": 3 },
                { "orderable": true, "targets": 4 },
                { "orderable": false, "targets": 5 },
                { "orderable": true, "targets": 6 },
                { "orderable": false, "targets": 7 },
            ]
        });
    });
</script>
@endpush

@push('styles')
<link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush

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
                                <th>Thrivecat ID</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($affiliates as $affiliate)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $affiliate->first_name }}</td>
                                    <td>{{ $affiliate->last_name }}</td>
                                    <td>{{ $affiliate->email }}</td>
                                    <td>{{ $affiliate->invites_left }}</td>
                                    <td>{{ $affiliate->thrivecart_affiliate_id }}</td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
