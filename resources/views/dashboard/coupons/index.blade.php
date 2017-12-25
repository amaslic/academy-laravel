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
                { "orderable": false, "targets": 3 },
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
                        Coupons
                        <a href="{{ route('coupons.create') }}" class="btn btn-success pull-right">Add Coupon</a>
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
                                <th>Code</th>
                                <th class="text-center">Used</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($coupons as $coupon)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $coupon->code }}</td>
                                    <td class="{{$coupon->has_been_used ? 'bg-success' : 'bg-danger' }} text-center">{{ $coupon->has_been_used }}</td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['coupons.destroy', $coupon->id]]) !!}
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
