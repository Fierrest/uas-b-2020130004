
@extends('layouts.master')
@section('title', 'order List')
@push('css_after')
    <style>
        td {
            max-width: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
@endpush
@section('content')
    <div class="table-responsive" <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>orders List</h2>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('order.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
                        <span>Add New order</span>
                    </a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>

                    <th>id</th>
                    <th>Status</th>


                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $orders)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>

                        <td><a href="{{ route('order.show', $orders->id) }}">{{ $orders->status }}</a></td>
                        <td>{{ $orders->id }}</td>

                    </tr>
                @empty
                    <tr>
                        <td align="center" colspan="6">No data yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    </div>
@endsection
