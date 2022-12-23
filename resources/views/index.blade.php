@extends('layout.master')
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
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Soda</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($items as $items)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $items->id }}</td>
                        <td><a href="{{ route('items.show', $items->id) }}">{{ $items->Nama }}</a></td>
                        <td>{{ $items->Harga }}</td>
                        <td>{{ $items->Stok }}</td>
                        <td>{{ $items->penerbit }}</td>
                        <td style="width: 40%">{{ $items->description }}</td>
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
