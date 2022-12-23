
@extends('layouts.master')
@section('title', 'items List')
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
                    <h2>items List</h2>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('item.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
                        <span>Add New Item</span>
                    </a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($Items as $items)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $items->id }}</td>
                        <td><a href="{{ route('item.show', $items->id) }}">{{ $items->nama }}</a></td>
                        <td>{{ $items->harga }}</td>
                        <td>{{ $items->stok }}</td>

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
